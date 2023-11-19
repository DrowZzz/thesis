<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="border border-gray-300 p-8 bg-white max-w-md relative">

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
    </div>

</body>
</html>