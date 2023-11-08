<!DOCTYPE html>
<html lang="en">
<head>
  @include('user.css')
  <!-- Link to Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  @include('user.navbar')
  <div class="az-content az-content-dashboard">
    <div class="container">
      <div class="az-content-body">

        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-md-4 mb-3">
            <div class="border border-black p-2 rounded-xl h-28 bg-white">
              <p class="text-center mb-2 sm-text-left sm-text-sm">Donations</p>
              <div class="text-center">
                <p class="text-5xl">{{ $totalDonations }}</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-3">
            <div class="border border-black p-2 rounded-xl h-28 bg-white">
              <p class="text-center mb-2 sm-text-left sm-text-sm">Total Donations:</p>
              <div class="text-center d-flex flex-row justify-content-center">
                <p class="text-5xl me-1">{{ $totalQuantity }}</p>
                <span>kg</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="border border-black p-2 rounded-xl h-28 bg-white">
              <p class="text-center mb-2 sm-text-left sm-text-sm">Orders</p>
              <div class="text-center">
                <p class="text-5xl">{{ $totalOrders }}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-12 col-md-8 mt-3 space-y-3">
            <div class="text-xl font-bold">Recent Donations</div>
            @foreach ($donations as $donation)
            <div class="bg-white p-3 rounded-lg shadow text-black space-y-2 mb-2">
              <div class="row justify-content-between align-items-center mb-2">

                <div class="col-6 col-md-8">
                  <div class="d-flex flex-row justify-content-end justify-content-md-start">
                    <div class="me-2">
                      <img class="w-20 h-20" src="images/123.jpg" alt="">
                    </div>
                    <div>
                      <div class="font-bold">Spent Coffee Grounds</div>
                      <div>Quantity: {{ $donation->quantity }} kg</div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-md-4">
                  <p class="text-gray-500 text-sm">{{ $donation->date }}</p>
                </div>
              </div>
              <hr class="border-top"> <!-- Add a horizontal line here -->
              <div class="text-sm text-gray-700 m-2">Status: {{ $donation->status }}</div>
              <hr class="border-top"> <!-- Add another horizontal line here -->
              <div class="row justify-content-between">
                <div class="col-12 col-md-6">
                  <div class="text-sm font-medium">Donation ID: #{{ $donation->uuid }}</div>
                </div>
              </div>
            </div>
            @endforeach
          </div>

          <div class="col-12 col-md-4 mt-3 space-y-3">
            <div class="text-xl font-bold">Your Orders</div>
            <div class="border border-black p-3 rounded-xl">
              @foreach ($orders as $order)
              <div class="bg-white p-3 rounded-lg shadow text-black space-y-2 mb-2">
                <div class="row justify-content-between align-items-center mb-2">
                  <div class="col-6 col-md-4">
                    <p class="text-gray-500 text-sm">{{ $order->date }}</p>
                  </div>
                  <div class="flex justify-between">
                    <div class="flex flex-row">
                      <div class="me-2">
                        <img class="w-20 h-20" src="product/{{ $order->product_image }}" alt="">
                      </div>
                      <div>
                        <div class="font-bold">{{ $order->product_title }}</div>
                        <div>Quantity: {{ $order->quantity }}</div>
                        <div>Price: P {{ $order->price }}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="border-top"> <!-- Add a horizontal line here -->
                <div class="text-sm text-gray-700 m-2">Status: {{ $order->delivery_status }}</div>
                <hr class="border-top"> <!-- Add another horizontal line here -->
                <div class="row justify-content-between">
                  <div class="">
                    <div class="text-sm font-medium">Order ID: #{{ $order->uuid }}</div>
                  </div>
                </div>
              </div>  
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('user.js')
</body>
</html>
