<!DOCTYPE html>
<html lang="en">
  <head>

    @include('user.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body>
    @include('user.navbar')
    <div class="az-content az-content-dashboard">
            <div class="az-content-body flex items-center justify-center">
                <div class="overflow-x-auto">    
                    <table class= "w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-300 text-left">Date</th>
                                <th class="px-6 py-3 bg-gray-300 text-left">Donation ID</th>
                                <th class="px-6 py-3 bg-gray-300 text-left">Quantity</th>
                                <th class="px-6 py-3 bg-gray-300 text-left">Mode of Delivery</th>
                                <th class="px-6 py-3 bg-gray-300 text-left">Courier</th>
                                <th class="px-6 py-3 bg-gray-300 text-left">Scheduled Date</th>
                                <th class="px-6 py-3 bg-gray-300 text-left">Status</th>
                            </tr>
                        </thead>

                        @foreach ( $donation as $donation)     
                            <tbody>
                                <tr>
                                    <td class="px-6 py-4">{{ $donation->created_at }}</td>
                                    <td class="px-6 py-4">{{ $donation->uuid }}</td>
                                    <td class="px-6 py-4">{{ $donation->quantity }}</td>
                                    <td class="px-6 py-4">{{ $donation->mode_of_delivery}}</td>
                                    <td class="px-6 py-4">{{ $donation->courier }}</td>
                                    <td class="px-6 py-4">{{ $donation->date }}</td>
                                    <td class="px-6 py-4">{{ $donation->status }}</td>
                                </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
        </div>
    </div>
    
  
  @include('user.js')
  </body>
</html>