<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper" style="background:white">
              @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                
                <div>
                  <table class="min-w-full" style="background:white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-200 text-black">Order ID</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Customer Name</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Email</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Contact</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Address</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Product Title</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Product Image</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Quantity</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Price</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Payment Status</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Delivery Status</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $order)
                        <tr>
                            <td class="px-4 py-2 text-black">{{ $order->uuid }}</td>
                            <td class="px-4 py-2 text-black">{{ $order->name }}</td>
                            <td class="px-4 py-2 text-black">{{ $order->email }}</td>
                            <td class="px-4 py-2 text-black">{{ $order->contact }}</td>
                            <td class="px-4 py-2 text-black">{{ $order->address }}</td>
                            <td class="px-4 py-2 text-black">{{ $order->product_title }}</td>
                            <td class="px-4 py-2 text-black"><img src="product/{{ $order->product_image }}"></td>
                            <td class="px-4 py-2 text-black">{{ $order->quantity }}</td>
                            <td class="px-4 py-2 text-black">{{ $order->price }}</td>
                            <td class="px-4 py-2 text-black">{{ $order->payment_status }}</td>
                            <td class="px-4 py-2 text-black">{{ $order->delivery_status }}</td>
                            <td class="px-4 py-2 text-black">   
                              <a href="{{ url('/updatestatus_order',$order->id) }}" class="ml-2 text-blue-500 hover:underline">Update</a>                        
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                </div>   
            </div>
        </div>
      </div>
    </div>

    @include('admin.js')
  </body>
</html>