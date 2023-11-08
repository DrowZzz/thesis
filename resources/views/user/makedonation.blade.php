<!DOCTYPE html>
<html lang="en">
  <head>

    @include('user.css')

  </head>
  <body>
    @include('user.navbar')
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
            <div class="w-full max-w-md p-4">
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
  <div class="max-w-xl mx-auto p-4 border-black shadow-md rounded-md">
    @if(Auth::check()) 
    <form action="{{ url('/adddonation') }}" method="POST" class="bg-white p-4 rounded shadow-md">
        @csrf
        <h2 class="text-2xl font-semibold mb-4 text-center">Make Donations</h2>
        <div class="mb-4 flex flex-row sm:w-full">
            <div class="w-full sm:w-1/2 pr-2">
                <label class="text-black mb-2" for="name">Name</label>
                <input type="text" name="name" class="rounded shadow border-0 w-full" value="{{ Auth::user()->name }}" readonly>
            </div>
        </div>

        <div class="mb-4 flex flex-row">
            <div class="w-full sm:w-1/2 pr-2">
                <label class="text-black mb-2" for="email">Email</label>
                <input type="text" name="email" class="rounded shadow border-0 w-full" value="{{ Auth::user()->email }}" email> 
            </div>

            <div class="w-full sm:w-1/2 pl-2">
                <label class="text-black mb-2" for="contact">Contact Details</label>
                <input type="number" name="contact" class="rounded shadow border-0 w-full" value="{{ Auth::user()->contact }}">
            </div>
        </div>

        <div class="border-b mb-4"></div>

        <div class="w-full sm:w-1/2 pr-2 mb-4 flex flex-row items-center">
            <label class="text-black mb-2 mr-4" for="date_pickup">Quantity</label>
            <input type="number" name="quantity" class="rounded shadow border-0 w-1/2" placeholder="in KG" required>
        </div>

        <div class="border-b mb-4"></div>
        
        <div class="mb-4">
            <label class="text-black mb-2">Choose your Mode of Donation</label>
            <select name="mode_of_delivery" id="mode" class="rounded shadow border-0 w-full" onchange="toggleSections()" required>
                <option value="">...</option>
                <option value="Pick Up">Pick Up</option>
                <option value="Delivery">Delivery</option>
            </select>
        </div>

        <div id="pickUpDiv" class="hidden">
            <div class="mb-4 flex flex-row">
                <div class="w-full sm:w-1/2 pr-2">
                <label class="text-black mb-2" for="date_pickup">Date of Pick Up</label>
                <input type="date" name="date" class="rounded shadow border-0 w-full" id="date">
                </div>
            </div>
            <div>
                <label class="text-black mb-2" for="pickup_location">Pick Up Location</label>
                <input type="text" name="pickup_location" class="rounded shadow border-0 w-full mb-3" id="pickup_location">
                <div class="flex items-center justify-center">
                <div id="map" class="rounded shadow" style="width: 30vh; height: 30vh; background-color: black;"></div>
                </div>
            </div>
        </div>

        <div id="deliveryDiv" class="hidden">
            <div class="mb-4 flex flex-row">
            <div class="w-full sm:w-1/2 pr-2">
            <label class="text-black mb-2" for="date_delivery">Date of Delivery</label>
            <input type="date" name="dropoff_date" class="rounded shadow border-0 w-full" id="dropoff_date">
            </div>
            </div>

            <label class="text-black mb-2" for="courier">Courier</label>
            <input type="text" name="courier" class="rounded shadow border-0 w-full">
            <label class="text-black mb-2" for="dropoff_location">Drop Off Location</label>
            <input type="text" name="dropoff_location" class="rounded shadow border-0 w-full" id="dropoff_location">
        </div>
        <div class="mb-4 mt-4">
            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-full w-full" style="background: blue">
                Add Donation
            </button>
        </div>
    </form>
    @endif
</div>

        
          </div>
        </div>
    </div>
   
    <script>
        function toggleSections() {
            var modeDropdown = document.getElementById("mode");
            var pickUpDiv = document.getElementById("pickUpDiv");
            var deliveryDiv = document.getElementById("deliveryDiv");
            var date = document.getElementById('date');
            var pickup = document.getElementById('pickup_location');
            var dropoff_date = document.getElementById('dropoff_date');
            var dropoff_location = document.getElementById('dropoff_location');
        
            if (modeDropdown.value === "Pick Up") {
                pickUpDiv.classList.remove("hidden");
                deliveryDiv.classList.add("hidden");

                date.setAttribute('required', 'required')
                pickup.setAttribute('required', 'required')


            } else if (modeDropdown.value === "Delivery") {
                pickUpDiv.classList.add("hidden");
                deliveryDiv.classList.remove("hidden");

                dropoff_date.setAttribute('required', 'required')
                dropoff_Location.setAttribute('required', 'required')
                date.setAttribute('required', '')
                pickup.setAttribute('required', '')

            } else {
                pickUpDiv.classList.add("hidden");
                deliveryDiv.classList.add("hidden");
            }
        }

        const datePicker = document.getElementById('date');
        const datePicker2 = document.getElementById('dropoff_date');
// Get the current date and format it as YYYY-MM-DD
const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, '0');
const day = String(today.getDate()).padStart(2, '0');
const currentDate = `${year}-${month}-${day}`;

// Set the 'min' attribute of the date input to the current date
datePicker.setAttribute('min', currentDate);
datePicker2.setAttribute('min', currentDate);
        </script>
        
    @include('user.js')
 
  </body>
</html>
