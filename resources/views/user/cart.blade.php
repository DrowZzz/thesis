<!DOCTYPE html>
<html lang="en">
  <head>

    @include('user.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body>
    @include('user.navbar')
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

    <div class="az-content az-content-dashboard">
        <div class="flex flex-wrap justify-center">
            <div class="flex flex-wrap items-center justify-center h-full">
                
                @if ($cart->isEmpty())

                        <p class="text-xl font-bold text-center mb-4 text-gray-400">Your Cart is Empty</p>

                @else

                <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                    <?php $totalprice = 0; ?>
                    @foreach ($cart as $cart)
                    <div class="max-w-xl rounded-lg overflow-hidden shadow-lg bg-white md:flex items-center mb-4">
                        <!-- Part 1: Image -->
                        <div class="md:w-1/3 p-2">
                            <img class="w-full h-auto md:h-full object-cover" src="product/{{$cart->product_image}}" alt="Card Image">
                        </div>
                        <!-- Part 2: Title and Description -->
                        <div class="md:w-2/3 p-4">
                            <div class="font-bold text-xl mb-2 text-gray-800"> {{ $cart->product_title }}</div>
                            <p class="text-gray-600 text-base ml-3">
                                Quantity: {{ $cart->quantity }}
                            </p>
                            <p class="text-gray-600 text-base ml-3">
                                ₱ {{ $cart->price}}
                            </p>
                        </div>
                        <!-- Part 3: Action Buttons -->
                        <div class="md:p-4 md:pt-8 flex justify-center md:justify-end items-center flex-col">                           
                            <a href="{{ url('/remove_cart', $cart->id) }}" onclick="return confirm('Are you sure you want to remove the product?')"class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full m-1">
                                Remove
                            </a>
                        </div>
                    </div>
                    <?php $totalprice = $totalprice + $cart->price?>
                    @endforeach
                </div>
            </div>
            
        </div>
        <div class="flex items-center justify-center">
        <a href="{{ url('/cash_order')}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full m-1"  onclick="return confirm('Are you done?')">
            Cash On Delivery
        </a>
        <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full m-1" onclick="toggleDetails()">
            Card Payment
        </a>
        </div>
        @endif

        <div id="paymentModal" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50 hidden">
            <!-- Donation details styled like a receipt -->
            <div class="border border-gray-300 p-8 bg-white max-w-md relative">
                <button class="absolute top-4 right-4 text-red-600 border-none p-2 cursor-pointer c" onclick="toggleDetails()">x</button>
                <div class="flex flex-col space-y-4 abc">
                    <img src="https://th.bing.com/th/id/OIP.RLOCPPaVBFqcBC5JTGSXfAAAAA?w=400&h=400&rs=1&pid=ImgDetMain" alt="">
                    <input type="file" required>
                    <a href="/mycart" class="flex justify-center text-white p-2 rounded-full" style="background: brown">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    
 
  
  @include('user.js')
  <script>
    function toggleDetails() {
        var modal = document.getElementById("paymentModal");
        modal.style.display = modal.style.display === "none" ? "flex" : "none";
    }
</script>
  </body>
</html>