<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
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
            <div class="content-wrapper flex justify-center items-center "style="background-color:white;">
              <div class="max-w-full overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-200 text-black">Product Title</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Description</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Price</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Quantity</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Image</th>
                            <th class="px-4 py-2 bg-gray-200 text-black">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $product)
                        <tr>
                            <td class="px-4 py-2 text-black">{{ $product->title }}</td>
                            <td class="px-4 py-2 text-black">{{ $product->description }}</td>
                            <td class="px-4 py-2 text-black">{{ $product->price }}</td>
                            <td class="px-4 py-2 text-black">{{ $product->quantity }}</td>
                            <td class="px-4 py-2 text-black"><img src='/product/{{ $product->image }}' class="w-10 h-10"/></td>
                            <td class="px-4 py-2 text-black">
                                <a href="{{ url('/product_delete', $product->id) }}" onclick="return confirm('Are you sure you want to remove the product?')"class="text-red-500 hover:underline">Delete</a>
                                <a href="{{ url('/product_update', $product->id) }}" class="ml-2 text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
      </div>
    </div>

    @include('admin.js')
  </body>
</html>