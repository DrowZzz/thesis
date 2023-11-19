<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Donations;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class HomeController extends Controller
{

    public function home()
    {
        return view('home.home');
    }
    public function profile()
    {
        $user = Auth::user();
        $payments = Payment::where('user_id', $user->id)->get();
        $orders = Order::where('user_id', $user->id)->paginate(3);
        return view('user.userprofile', compact('user', 'orders', 'payments'));
    }
    

    public function editprofile()
    {
        $user = Auth::user();
        return view('user.editprofile',compact('user'));
    }
    public function saveprofile(Request $request)
    {
    $user = Auth::user();
    $user->name = $request->name;
    $user->birthday = $request->birthday;
    $user->email = $request->email;
    $user->address = $request->address; // Assuming you want to update the user's name
    $user->contact = $request->contact;
    $user->zip = $request->zip;
    
    $user->save();

    return redirect('/userprofile')->with('message', 'Profile updated successfully')->with('success', true);
    }

    public function deleteprofile()
    {
        $user = Auth::user();
        $user->delete();
        return redirect('/login');
    }

    public function makedonation()
    {
        return view('user.makedonation');
    }

    public function adddonation(Request $request)
{
    $user = Auth::user();

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'contact' => 'required',
        'quantity' => 'required|numeric',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withInput()
            ->withErrors($validator)
            ->with('message', 'Donation failed, Input Proper Date')->with('success', false);
    }

    $donation = new Donations;

    // Generate a random 10-digit ID
    $randomID = $this->generateRandomID(10);

    $donation->name = $request->name;
    $donation->contact_number = $request->contact;
    $donation->user_id = $user->id;
    $donation->quantity = $request->quantity;
    $donation->mode_of_delivery = $request->mode_of_delivery;
    $donation->dropoff_date = $request->dropoff_date;
    $donation->date = $request->date;
    $donation->pickup_location = $request->pickup_location;
    $donation->courier = $request->courier;
    $donation->reason = "";
    $donation->uuid = $randomID; // Assign the generated 10-digit ID
    $donation->status = "pending";
    $donation->save();

    return redirect()->back()->with('message', 'Donation successful')->with('success', true);
}

private function generateRandomID($length)
{
    $characters = '0123456789';
    $randomID = '';

    for ($i = 0; $i < $length; $i++) {
        $randomID .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomID;
}

public function donationhistory()
{
    $id = Auth::user()->id;
    $donation = donations::where('user_id', '=', $id)
                        ->orderBy('created_at', 'desc') // Order by date in descending order
                        ->get();

    return view('user.donationhistory', compact('donation'));
}


    


    public function productlist()
    {
        $product=Product::all();
        return view('user.productlist',compact('product'));
    }
    
    public function mycart()
    {
        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();

        return view('user.cart',compact('cart'));
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function add_cart(Request $request, $id)
    {
        $user=Auth::user();
        $product=product::find($id);
        
        $cart=new cart;
        //get user data//
        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->contact=$user->contact;
        $cart->address=$user->address;
        $cart->user_id=$user->id;

        //get product data//
        $cart->product_id=$product->id;
        $cart->product_title=$product->title;
        $cart->price=$product->price * $request->quantity;
        $cart->product_image=$product->image;
        $cart->quantity=$request->quantity;
        $cart->save();

        return redirect()->back();
    }
    
    public function cash_order()
{
    $user = Auth::user();
    $userid = $user->id;
    $data = cart::where('user_id', '=', $userid)->get();

    foreach ($data as $cartItem) {
        $order = new order;
        $order->user_id = $cartItem->user_id;
        $order->product_id = $cartItem->product_id;
        $order->name = $cartItem->name;
        $order->contact = $cartItem->contact;
        $order->email = $cartItem->email;
        $order->address = $cartItem->address;
        $order->product_image = $cartItem->product_image;
        $order->product_title = $cartItem->product_title;
        $order->quantity = $cartItem->quantity;
        $order->price = $cartItem->price;

        // Generate a random 10-digit string as the UUID
        $order->uuid = rand(1000000000, 9999999999);

        $order->payment_status = "Cash on Delivery";
        $order->delivery_status = "processing";

        $order->save();

        // Subtract the ordered quantity from the product's quantity
        $product = Product::find($cartItem->product_id);

        if ($product->quantity - $cartItem->quantity >= 0) {
            $product->quantity -= $cartItem->quantity;
            $product->save();
        } else {
            return redirect()->back()->with('message', 'Out of stock');
        }

        // Delete the cart item
        $cartItem->delete();
    }
    
    return redirect()->back()->with('message', 'We have received your order.');
}
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == '1'){
            $targetMonth = '2023-11';

            $data = DB::table('orders')
                ->select(DB::raw('DATE(created_at) as order_date'), DB::raw('SUM(price) as total_sales'))
                ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$targetMonth])
                ->groupBy('order_date')
                ->get();
    
            $days = [];
            $dayTotalSales = [];
    
            foreach ($data as $record) {
                $days[] = $record->order_date;
                $dayTotalSales[] = $record->total_sales;
            }

            $data2 = DB::table('donations')
                ->select(DB::raw('DATE(created_at) as donation_date'), DB::raw('SUM(quantity) as total_donations'))
                ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$targetMonth])
                ->groupBy('donation_date')
                ->get();
    
            $daysDonation= [];
            $dayTotalDonation = [];
    
            foreach ($data2 as $records) {
                $daysDonation[] = $records->donation_date;
                $dayTotalDonation[] = $records->total_donations;
            }

            // If you're retrieving orders from the database using Eloquent
            $orders = Order::all();
            $totalSales = $orders->sum('price');

            $donations = Donations::all();
            $totalDonations = $donations->sum('quantity');
            $userCount = User::count();

            return view('admin.home', ['data' => $data, 'days' => $days, 'dayTotalSales' => $dayTotalSales, 'daysDonation' => $daysDonation, 'dayTotalDonation'=>$dayTotalDonation,'totalSales'=>$totalSales, 'totalDonations'=>$totalDonations, 'userCount'=> $userCount]);
        }
        else
        {
            $id = Auth::user()->id;
            $donations = donations::where('user_id', $id)
            ->orderBy('created_at', 'desc') // Order by date in descending order
            ->paginate(3);
            $orders = order::where('user_id', $id)->paginate(3);
            
            $totalOrders = $orders->total();
            $totalDonations = $donations->total(); // Use total() to get the total count, which considers pagination.
            $totalQuantity = 0;
        
            foreach ($donations as $donation) {
                $totalQuantity += $donation->quantity;
            }
        
            return view('user.userpage', compact('donations', 'totalDonations', 'totalQuantity','orders','totalOrders'));
        }
    }

    public function index()
    {
        $id = Auth::user()->id;
        $donations = donations::where('user_id', $id)
            ->orderBy('created_at', 'desc') // Order by date in descending order
            ->paginate(3);
            $orders = order::where('user_id', $id)->paginate(3);
            
        $orders = order::where('user_id', $id)->paginate(3);
        
        $totalOrders = $orders->total();
        $totalDonations = $donations->total(); // Use total() to get the total count, which considers pagination.
        $totalQuantity = 0;
    
        foreach ($donations as $donation) {
            $totalQuantity += $donation->quantity;
        }
    
        return view('user.userpage', compact('donations', 'totalDonations', 'totalQuantity','orders','totalOrders'));
    }
    public function addpayment(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'cvv' => 'required|digits:3', // Requires CVV to be 3 digits
            'date' => 'required',
            'card_number' => 'required|numeric', // Requires card number to be 16 digits
        ]);
        

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message', 'Input Proper Data')->with('success', false);
        }
    
        $payment = new Payment;
    

        $payment->name = $request->name;
        $payment->card_number = $request->card_number;
        $payment->date = $request->date;
        $payment->cvv = $request->cvv;
        $payment->user_id=$user->id;
        
        $payment->save();

        return redirect()->back()->with('message', 'Payment Options Added')->with('success', true);
    }

    public function print_pdf($id){
        $donation = Donations::find($id);

        $pdf=PDF::loadview('admin.pdf',compact('donation'));
        return $pdf->download('donation_details.pdf');
    }
    
}


