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
                <form action="{{ url('/confirm_update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @csrf
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="Home-pane" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="SEO_tags" data-bs-toggle="tab" data-bs-target="#SEO-tab-pane" type="button" role="tab" aria-controls="SEO-tags-pane" aria-selected="false">SEO tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Details</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content border border-secondary-subtle" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                            <div class="mb-3">
                                <label for="productname" class="form-label">Product Name</label>
                                <input name = "title" type="text" class="form-control border border-secondary-subtle" id="productname" placeholder="Product Name" value="{{ $product->title}}">
                            </div>

                            <div class="mb-3">
                                <label for="productslug" class="form-label">Product Slug</label>
                                <input name = "slug" type="text" id="productslug" class="form-control border border-secondary-subtle" placeholder="Product Slug" aria-describedby="" value="{{ $product->slug}}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea name = "description" class="form-control border border-secondary-subtle" placeholder="Product Description" id="exampleFormControlTextarea1" rows="3">{{ $product->description}}</textarea>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="SEO-tab-pane" role="tabpanel" aria-labelledby="SEO_tags">
                            <div class="mb-3">
                                <label for="metatitle" class="form-label">Meta Title</label>
                                <input name = "metaname" type="text" class="form-control border border-secondary-subtle" id="metatitle" placeholder="Meta Title" value="{{ $product->metaname}}">
                            </div>

                            <div class="mb-3">
                                <label for="metakeyword" class="form-label">Meta Keyword</label>
                                <input name = "metakeyword" type="text" id="metakeyword" class="form-control border border-secondary-subtle" aria-describedby="" value="{{ $product->metakeyword}}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Meta Description</label>
                                <textarea name = "metadescription" class="form-control border border-secondary-subtle" id="exampleFormControlTextarea1" rows="3" >{{ $product->metadescription}}</textarea>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="originalPrice" class="form-label">Original Price</label>
                                        <input name = "price" type="number" class="form-control border border-secondary-subtle" id="originalPrice" placeholder="Original Price"  value="{{ $product->price}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="discountedPrice" class="form-label">Discounted Price</label>
                                        <input name = "discount_price" type="number" class="form-control border border-secondary-subtle" id="discountedPrice" placeholder="Discounted Price" value="{{ $product->discount_price}}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input name = "quantity" type="number" class="form-control border border-secondary-subtle" id="quantity" placeholder="Quantity" value="{{ $product->quantity}}">
                            </div>
                            <div class="mb-3">
                                <input name = "image" type="file" class="form-control border border-secondary-subtle" id="inputGroupFile02" value="{{$product->image}}">
                            </div>
                            <div class="d-flex justify-content-center align-items-center mb-4">
                                <img src="product/{{ $product->image}}" class="w-20 h-20" alt="Your Image">
                            </div>
                        </div>
                        <div class="mb-4">
                            <input type="submit" name="submit" value="Update Product"
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