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
                <div class="content-wrapper" style="background-color:white;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <div class="card ">
                                    <div class="card-header bg-white ">
                                        <h2 class="text-2xl font-bold mb-4 text-black">Add Product</h2>
                                        @if (session()->has('message'))
                                        @php
                                        $alertClass = session('success') ? 'alert-success' : 'alert-danger';
                                        @endphp
                                        <div class="alert {{ $alertClass }}">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/add_product') }}" class="border" method="POST" enctype="multipart/form-data">
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
                                                        <input name = "title" type="text" class="form-control border border-secondary-subtle" id="productname" placeholder="Product Name" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="productslug" class="form-label">Product Slug</label>
                                                        <input name = "slug" type="text" id="productslug" class="form-control border border-secondary-subtle" placeholder="Product Slug" aria-describedby="">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                                        <textarea name = "description" class="form-control border border-secondary-subtle" placeholder="Product Description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="SEO-tab-pane" role="tabpanel" aria-labelledby="SEO_tags">
                                                    <div class="mb-3">
                                                        <label for="metatitle" class="form-label">Meta Title</label>
                                                        <input name = "metaname" type="text" class="form-control border border-secondary-subtle" id="metatitle" placeholder="Meta Title">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="metakeyword" class="form-label">Meta Keyword</label>
                                                        <input name = "metakeyword" type="text" id="metakeyword" class="form-control border border-secondary-subtle" aria-describedby="">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Meta Description</label>
                                                        <textarea name = "metadescription" class="form-control border border-secondary-subtle" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="originalPrice" class="form-label">Original Price</label>
                                                                <input name = "price" type="number" class="form-control border border-secondary-subtle" id="originalPrice" placeholder="Original Price" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="discountedPrice" class="form-label">Discounted Price</label>
                                                                <input name = "discount_price" type="number" class="form-control border border-secondary-subtle" id="discountedPrice" placeholder="Discounted Price">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="quantity" class="form-label">Quantity</label>
                                                        <input name = "quantity" type="number" class="form-control border border-secondary-subtle" id="quantity" placeholder="Quantity" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name = "image" type="file" class="form-control border border-secondary-subtle" id="inputGroupFile02" required>
                                                    </div>
                                                    <div class="d-flex justify-content-center align-items-center mb-4">
                                                        <img src="" class="w-20 h-20" alt="Your Image">
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <input type="submit" name="submit" value="Add Product"
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
            </div>
        </div>
    </div>

    @include('admin.js')
</body>
</html>
