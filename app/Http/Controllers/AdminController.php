<?php

namespace App\Http\Controllers;

use App\Rules\NonZeroQuantity;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Laravel\Fortify\Contracts\CreatesNewUsers;  
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Donations;
use App\Models\Order;

class AdminController extends Controller
{
    public function users_manage()
    {
            $data=user::all();
            return view('admin.manageusers',compact("data"));
    }

    public function users_delete($id)
    {
            $data=user::find($id);
            $data->delete();
            return redirect()->back();
    }

    public function users_addform()
    {
        return view('admin.addusersform');
    }



    public function users_add(Request $request)
{
    // Define validation rules
    $rules = [
        'name' => 'required|string|max:255',
        'Email' => 'required|email|unique:users,email',
        'address' => 'required|string',
        'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])/',
        'confirm_password' => 'required|string|same:password'
    ];

    // Define custom error messages
    $messages = [
        'name.required' => 'Name is required.',
        'name.max' => 'Name must not exceed 255 characters.',
        'email.required' => 'Email is required.',
        'email.email' => 'Invalid email format.',
        'email.unique' => 'Email address is already in use.',
        'address.required' => 'Address is required.',
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 8 characters long.',
    ];

    // Validate the request
    $validatedData = $request->validate($rules, $messages);

    // If the validation passes, create and save the user
    $data = new User;
    $data->name = $request->name;
    $data->Email = $request->Email; // Use the correct field name
    $data->address = $request->address;
    $data->password = Hash::make($request->password);
    $data->save();

    return redirect()->back()->with('message', 'Account Created');
}
public function donationlist()
{
    $pendingDonations = Donations::where('status', 'Pending')->paginate(3, ['*'], 'pending_page');
    $approvedDonations = Donations::where('status', 'Approved')->paginate(3, ['*'], 'approved_page');
    $disapprovedDonations = Donations::where('status', 'Disapproved')->paginate(3, ['*'], 'disapproved_page');

    return view('admin.donationlist', compact('pendingDonations', 'approvedDonations', 'disapprovedDonations'));
}

public function donationupdate($id)
{
    $donation=Donations::find($id);
    return view('admin.donationupdate',compact('donation'));
}

public function confirm_donationupdate(Request $request, $id)
{ 
    $donation = Donations::find($id);

    $donation->status = $request->status;

    $donation->save();

    return redirect('/donation')->with('message', 'Status Updated')->with('success', true);
}

    public function products_manage()
{
    // Retrieve all products
    $product = product::all();

    // After processing all products, return the view
    return view('admin.manageproducts', compact("product"));
}

    
    public function products_addform()
    {
        return view('admin.productsaddform');
    }

    public function add_product(Request $request)
    {
    // Define validation rules
    $rules = [
        'title' => 'required',
        'description' => 'required',
        'quantity' => ['required','numeric',new NonZeroQuantity],
        'price' => 'required|numeric',
        'metadescription' => 'required',
        'metaname' => 'required',
        'metakeyword' => 'required',
        'image' => 'required|image', // Adjust image rules as needed
    ];

    // Create a custom error message for image validation
    $customMessages = [
        'image.required' => 'Please upload an image file.',
        'image.image' => 'The uploaded file must be an image.',
        'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
        'image.max' => 'The image must not exceed 2MB in size.',
    ];

    // Validate the request data
    $validator = Validator::make($request->all(), $rules, $customMessages);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('message', 'Input all required Data')->with('success', false);
    }

    // If validation passes, continue with saving the product
    $product = new Product;
    $product->title = $request->title;
    $product->slug = $request->slug;
    $product->description = $request->description;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->discount_price = $request->discount_price;
    $product->metadescription = $request->metadescription;
    $product->metaname = $request->metaname;
    $product->metakeyword = $request->metakeyword;

    $image = $request->file('image');
    $imagename = time() . '.' . $image->getClientOriginalExtension();
    $image->move('product', $imagename);

    $product->image = $imagename;
    $product->save();

    return redirect()->back()->with('message', 'Product Added')->with('success', true);
    }

    public function product_delete($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect()->back();
    }

    public function product_update($id)
    {
        $product=product::find($id);
        return view('admin.updateproduct',compact('product'));
    }
    public function confirm_update(Request $request, $id)
{
    $product = Product::find($id); // Find the existing product by ID

    if (!$product) {
        return redirect()->back()->with('message', 'Product not found')->with('success', false);
    }

    $rules = [
        'title' => 'required',
        'description' => 'required',
        'quantity' => 'required|numeric',
        'price' => 'required|numeric',
        'metadescription' => 'required',
        'metaname' => 'required',
        'metakeyword' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image rules as needed
    ];

    // Create a custom error message for image validation
    $customMessages = [
        'image.image' => 'The uploaded file must be an image.',
        'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
        'image.max' => 'The image must not exceed 2MB in size.',
    ];

    // Validate the request data
    $validator = Validator::make($request->all(), $rules, $customMessages);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('message', 'Input all required data')->with('success', false);
    }

    $product->title = $request->title;
    $product->slug = $request->slug;
    $product->description = $request->description;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->discount_price = $request->discount_price;
    $product->metadescription = $request->metadescription;
    $product->metaname = $request->metaname;
    $product->metakeyword = $request->metakeyword;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('product', $imagename);
        $product->image = $imagename;
    }

    $product->save(); // Update the existing product

    return redirect()->back()->with('message', 'Product Updated')->with('success', true);
}



    public function orderlist()
    {
        $order=Order::all();
        return view('admin.orders',compact('order'));
    }

    public function updatestatus_order($id)
    {  
        $order=order::find($id);
       return view('admin.updatestatus_order', compact('order'));
    }

    public function confirmupdatestatus_order(Request $request, $id)
    {
        $order = Order::find($id); // Find the existing product by ID
    
        if (!$order) {
            return redirect()->back()->with('message', 'order not found')->with('success', false);
        }
    
        $rules = [
            'product_title' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'delivery_status' => 'required',
            'payment_status' => 'required',
        ];
    
        // Create a custom error message for image validation
        $customMessages = [

        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $customMessages);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('message', 'Input all required data')->with('success', false);
        }
    
        $order->product_title = $request->product_title;
        $order->quantity = $request->quantity;
        $order->price = $request->price;
        $order->delivery_status = $request->delivery_status;
        $order->payment_status= $request->payment_status;

        $order->save(); // Update the existing order
    
        return redirect('/orderlist')->with('message', 'Order Updated')->with('success', true);
    }
    
}

