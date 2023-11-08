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
        <div class="main-panel" style="background-color:white;">
            <div class="content-wrapper flex justify-center items-center" style="background-color:white;">
               <div class="max-w-full overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 bg-gray-200 text-black">Name</th>
                                <th class="px-4 py-2 bg-gray-200 text-black">Email</th>
                                <th class="px-4 py-2 bg-gray-200 text-black">Address</th>
                                <th class="px-4 py-2 bg-gray-200 text-black">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td class="px-4 py-2 text-black">{{ $data->name }}</td>
                                <td class="px-4 py-2 text-black">{{ $data->email }}</td>
                                <td class="px-4 py-2 text-black">{{ $data->address }}</td>
                                <td class="px-4 py-2 text-black">
                                    @if ($data->usertype === "0")
                                        <a href="{{ url('/users_delete', $data->id) }}" onclick="return confirm('Are you sure you want to remove the user?')"class="text-red-500 hover:underline">Delete</a>
                                    @endif
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