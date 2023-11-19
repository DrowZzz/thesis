<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
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
        <div class="main-panel flex justify-center items-center ">
          <div class="flex justify-center items-center ">
            <div class="card bg-white p-4 rounded-lg shadow text-black space-y-3">
              <form action="{{url('/confirm_donationupdate', $donation->id)}}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4 mb-3  text-black">
                  <div class="grid grid-cols-1 gap-4 mb-3  text-black">
                    <div class="bg-white p-4 rounded-lg shadow text-black space-y-3">
                      <div class="flex items-center space-x-2 text-sm justify-between">
                        @<input name="name" class="text-black font-bold border-0 pointer-events-none" value='{{ $donation->name}}' readonly/>
                        <input name="uuid" class="text-sm font-medium border-0 w-auto text-right pointer-events-none" value='{{ $donation->uuid }}' readonly/>
                      </div>
                      <div class="flex flex-row items-center space-x-2">
                        <div>
                          <img class="w-20 h-20" src="/images/123.jpg" alt="">
                        </div>
                        <div>
                          <div class="font-bold">Spent Coffee Grounds</div>
                          <div class="flex flex-row items-center">
                            Quantity:
                             <input class="w-10 border-0 pointer-events-none" name="quantity" value="{{ $donation->quantity }}" readonly/>kg
                          </div>
                        </div>
                      </div>
                      <div class="border-b"></div> <!-- Add a horizontal line here -->
                      @if($donation->mode_of_delivery == 'Delivery')
                      <div class="flex flex-col">
                        <div class="text-md" >Mode of Delivery:  <input name="mode_of_delivery" class="text-gray-600 text-md font-medium border-0 w-auto text-right pointer-events-none" value='{{ $donation->mode_of_delivery }}' readonly/></div>
                        <div class="text-md" >Courier:  <input name="courier" class="text-gray-600 text-md font-medium border-0 w-auto text-right pointer-events-none" value='{{ $donation->courier }}' readonly/></div>
                        <div class="text-md" >Date:  <input name="dropoff_date" class="text-gray-600 text-md font-medium border-0 w-auto text-right pointer-events-none" value='{{ $donation->dropoff_date }}' readonly/></div>
                      </div>
                    @else
                      <div class="flex flex-col">
                        <div class="text-md">Mode of Delivery: <input name="mode_of_delivery" class="text-gray-600 text-md font-medium border-0 w-auto pointer-events-none" value='{{ $donation->mode_of_delivery }}' readonly/></div>
                        <div class="text-md">Pick-up Date: <input name="date" class="text-gray-600 text-md font-medium border-0 w-auto pointer-events-none" value='{{ $donation->date}}' readonly/></div>
                        <div class="text-md">Pick-up Location: <input name="pickup_location" class="text-gray-600 text-md font-medium border-0 w-auto pointer-events-none" value='{{ $donation->pickup_location }}' readonly/></div>
                      </div>
                    @endif
                      <div class="border-b"></div> <!-- Add another horizontal line here -->
                      
                      <div class="flex flex-row items-center">
                        <div class="text-sm text-gray-700 mr-2">Status: </div>
                        <select class="text-sm text-gray-700 rounded-xl border border-gray-400" name="status" id="statusDropdown" onchange="toggleTextBox()">
                          <option value="" disabled selected>{{ $donation->status }}</option>
                          <option value="Approved">Approved</option>
                          <option value="Disapproved">Disapproved</option>
                        </select>
                      </div>
                      <label for="reason" class="hidden text-gray-700" id='label'>Reason:</label>
                      <textarea type="text" id="textBox" name="reason" class="text-sm text-gray-700 rounded-lg border border-gray-400 hidden w-full" placeholder="Enter reason for disapproval"></textarea>
                    </div>
                  </div>
                </div>
                <div class="flex flex-row-reverse">
                  <button type="submit" class="ml-2 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out focus:outline-none focus:ring focus:border-blue-300" style="background: blue">
                    Update
                </button>
                
                <button onclick="closeCard()" class="ml-2 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out focus:outline-none focus:ring focus:border-blue-300">
                    Close
                </button>
                
                </div>
              </form>
 
            </div>
          </div>

        </div>
        <div>
      </div>
    </div>

    <script>
      function closeCard() {
        window.location.href = '/donation'; // Replace '/previous-page-url' with the actual URL you want to redirect to
      }
    </script>

<script>
  function toggleTextBox() {
    var statusDropdown = document.getElementById('statusDropdown');
    var textBox = document.getElementById('textBox');
    var label = document.getElementById('label');

    if (statusDropdown.value === 'Disapproved') {
      textBox.setAttribute('required', 'required');
      label.classList.remove('hidden');
      textBox.classList.remove('hidden');
    } else {
      textBox.removeAttribute('required');
      label.classList.add('hidden');
      textBox.classList.add('hidden');
      textBox.value = ''; // Clear the text box when status is not Disapproved
    }
  }
</script>
    
    @include('admin.js')
  </body>
</html>