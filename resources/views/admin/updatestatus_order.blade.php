<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
          <div class="content-wrapper" style="background-color:white;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card ">
                            <div class="card-header bg-white ">
                <h2 class="text-2xl font-bold mb-4  text-black">Update Product</h2>
                @if (session()->has('message'))
                @php
                $alertClass = session('success') ? 'alert-success' : 'alert-danger';
                @endphp
                <div class="alert {{ $alertClass }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session('message') }}
                </div>
            @endif
                <form action="{{ url('/confirmupdatestatus_order', $order->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
 
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="Home-pane" aria-selected="true">Home</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content border border-secondary-subtle" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                            <div class="mb-3">
                                <label for="productname" class="form-label">Product Name</label>
                                <input name = "product_title" type="text" class="form-control border border-secondary-subtle" id="productname" placeholder="Product Name" value="{{ $order->product_title}}">
                            </div>

                            <div class="mb-3">
                                <label for="productslug" class="form-label">Quantity</label>
                                <input name = "quantity" type="text" id="productslug" class="form-control border border-secondary-subtle" placeholder="Product Slug" aria-describedby="" value="{{ $order->quantity}}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Price</label>
                                <textarea name = "price" class="form-control border border-secondary-subtle" placeholder="Product Description" id="exampleFormControlTextarea1" rows="3">{{ $order->price}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label"></label>
                                <select name = "delivery_status" value="{{ $order->delivery_status }}">
                                    <option>{{ $order->delivery_status }}</option>
                                    <option>To Shipped</option>
                                    <option>To Recieved</option>
                                    <option>Cancelled</option>
                                </select>
                             </div>

                             <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label"></label>
                                <select name = "payment_status" value="{{ $order->payment_status }}">
                                    <option>{{$order->payment_status}}</option>
                                    <option>Paid</option>
                                    <option>Cancelled</option>
                                </select>
                             </div>
                             


                        <div class="mb-4">
                            <input type="submit" name="submit" value="Update Order Status"
                                   class="w-full px-4 py-2 text-white rounded-lg cursor-pointer" style="background: rgba(49, 21, 2, 0.877)">
                        </div>
                    </div> 
                </form>
            </div>
            </div>
        </div>
      </div>
    </div>
</div>

    @include('admin.js')
  </body>
</html>