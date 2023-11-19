<!DOCTYPE html>
<html lang="en">
<head>
  @include('user.css')
  <!-- Link to Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body  style="background:#F0EBED">
  @include('user.navbar')
  <div class="az-content az-content-dashboard" >
    <div class="container">
      <div class="az-content-body">

        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-md-4 mb-3">
            <div class="border border-black p-2 rounded-xl h-28" style="background:#fdfafd">
              <p class="text-center mb-2 sm-text-left sm-text-sm">Donations</p>
              <div class="text-center">
                <p class="text-5xl">{{ $totalDonations }}</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-3">
            <div class="border border-black p-2 rounded-xl h-28" style="background:#fdfafd">
              <p class="text-center mb-2 sm-text-left sm-text-sm">Total Donations:</p>
              <div class="text-center d-flex flex-row justify-content-center">
                <p class="text-5xl me-1">{{ $totalQuantity }}</p>
                <span>kg</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-3">
            <div class="border border-black p-2 rounded-xl h-28" style="background:#fdfafd">
              <p class="text-center mb-2 sm-text-left sm-text-sm">Orders</p>
              <div class="text-center">
                <p class="text-5xl">{{ $totalOrders }}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-12 col-md-8 mt-3 space-y-3">
            <div class="text-xl font-bold ">Recent Donations</div>
            @if ($donations->isEmpty())

            <div class="flex text-center items-center justify-center">
              <a href="/makedonation" class="text-xl font-bold mb-4 text-white p-3 rounded-full m-3 no-underline hover:no-underline px-4" style="background: #5e2c04">Donate now</a>
            </div>
              
            @else 
              
            @foreach ($donations as $donation)
            <div class="p-3 rounded-lg shadow text-black space-y-2 mb-2" style="background:#fdfafd">
              <div class="row justify-content-between align-items-center mb-2">

                <div class="col-6 col-md-8">
                  <div class="d-flex flex-row justify-content-end justify-content-md-start" >
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
                  <p class="text-gray-500 text-sm">{{ $donation->created_at }}</p>
                </div>
              </div>
              <hr class="border-top"> <!-- Add a horizontal line here -->
              <div class="text-sm text-gray-700 m-2">Status: {{ $donation->status }}</div>
              <hr class="border-top"> <!-- Add another horizontal line here -->
              <div class="row justify-content-between">
                <div class="col-12 flex flex-row items-center justify-between">
                    <div class="text-sm font-medium">Donation ID: #{{ $donation->uuid }}</div>
                    @if($donation->status === 'Approved')
                    <button id="openButton" class="text-sm font-bold text-white p-2 rounded-full" style="background: #5e2c04" onclick="toggleDetails()">View Details</button>
                @endif
                </div>
            </div>
            </div>
            @endforeach
            @endif
          </div>

          <div class="col-12 col-md-4 mt-3 space-y-3">
            <div class="text-xl font-bold">Your Orders</div>
            <div class="border border-black p-3 rounded-xl">
              @foreach ($orders as $order)
              <div class=" p-3 rounded-lg shadow text-black space-y-2 mb-2" style="background:#fdfafd">
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
        <div id="donationModal" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50 hidden">
          <!-- Donation details styled like a receipt -->
          <div class="border border-gray-300 p-8 bg-white max-w-md relative">
              <button class="absolute top-4 right-4 text-red-600 border-none p-2 cursor-pointer c" onclick="toggleDetails()">x</button>
              <img src="/images/logo.png" alt="" class="w-1/2 h-auto mb-4 mt-4">
              <h1 class="text-3xl font-bold mb-4">Your Donation is Approved</h1>

              <h2 class="text-xl font-bold mb-4">Hello Donor,</h2>
              <p class="text-lg font-bold mb-4">Here's your donation Details</p>


              <div class="border-b"></div> <!-- Add another horizontal line here -->
      
              <div class="mb-4">
                  <div class="font-bold text-gray-800">Donor: {{ $donation->name }}</div>
                  <div class="font-bold text-gray-500">Date: {{ $donation->created_at }}</div>
              </div>

              <div class="flex flex-row justify-between mb-4 space-x-2">
                <div class=" text-gray-500">ID: {{ $donation->uuid }}</div>
                @if ($donation->mode_of_delivery = 'Pick Up')
                <div class="text-gray-500">Mode of Donation: {{ $donation->mode_of_delivery }}</div>
                <div class=" text-gray-500">Pick-Up Date: {{ $donation->date }}</div>
                <div class="text-gray-500">Location: {{ $donation->pickup_location }}</div>

                @elseif ($donation->mode_of_delivery = 'Delivery')
                <div class="text-gray-500">Mode of Donation: {{ $donation->mode_of_delivery}}</div>
                <div class=" text-gray-500">Pick-Up Date: {{ $donation->dropoff_date }}</div>
                <div class="text-gray-500">Location: Manila</div>
                  
                @endif

                
            </div>

            <div class="border-b"></div> <!-- Add another horizontal line here -->
                <div class="flex flex-col m-2">
                    <div class="font-bold text-gray-600">Spent Coffee Grounds</div>
                    <div class="text-gray-700">Quantity: {{ $donation->quantity }} kg</div>
                </div>
            <div class="border-b"></div> <!-- Add another horizontal line here -->

              <div class="text-center mt-4">
                  <p class="text-lg font-bold text-indigo-800 mb-4">Thank you for your donation!</p>
              </div>

              <a href="{{ url('print_pdf', $donation->id) }}" class="text-sm font-bold text-white p-2 rounded-full flex justify-center " style="background: #5e2c04">Print</a>
          </div>
      </div>
      </div>
    </div>
  </div>

  @include('user.js')
  <script>
    function toggleDetails() {
        var modal = document.getElementById("donationModal");
        modal.style.display = modal.style.display === "none" ? "flex" : "none";
    }
</script>
</body>
</html>
