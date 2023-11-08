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
            <div class="content-wrapper flex justify-center items-center" style="background-color:white;">
              <div class="max-w-md mx-auto p-4 bg-white rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-black">Add Users</h2>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form action="{{ url('users_add') }}" method="POST" class="space-y-4">
                    @csrf
                
                    <div class="mb-4">
                        <input type="text" name="name" placeholder="Name" required class="w-full p-2 border border-gray-300 rounded text-black">
                    </div>
                    <div class="mb-4">
                        <input type="email" name="Email" placeholder="Email" required class="w-full p-2 border border-gray-300 rounded text-black">
                    </div>
                    <div class="mb-4">
                        <input type="text" name="address" placeholder="Address" required class="w-full p-2 border border-gray-300 rounded text-black">
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" placeholder="Password" required class="w-full p-2 border border-gray-300 rounded text-black">
                    </div>
                    <div class="mb-4">
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required class="w-full p-2 border border-gray-300 rounded text-black">
                    </div>
                    <div class="mb-4">
                        <button type="submit" name="submit" class="text-white font-semibold py-2 px-4 rounded w-full" style="background-color:rgb(0, 47, 255);">
                            Add User
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>

    @include('admin.js')
  </body>
</html>