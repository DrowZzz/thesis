<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('user.navbar')
    
    <div class="az-content az-content-dashboard d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="az-content-body">
                <div class="row">
                    <!-- User Details Column -->
                    <div class="col-md-3 prsldtls">
                        <div class="card">
                            <div class="text-center">
                                <div class="flex items-center justify-center m-4 rounded-full">
                                    <img src="profile/default.jpg" class="card-img-top rounded-full h-auto w-auto" alt="User Image">
                                </div>
                            </div>
                            <div class="card-body">
                                <h2 class="card-title">{{$user->name}}</h2>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>Contact No.</strong><br>
                                        + {{$user->contact}}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Email</strong><br>
                                        {{$user->email}}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Address</strong><br>
                                        {{$user->address}}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Birthday</strong><br>
                                        {{$user->birthday}}
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer d-flex justify-content-center align-items-center border border-0 bg-white">
                                <a href="{{ url('/deleteprofile') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove the user?')">Delete Account</a>
                            </div>
                        </div>
                    </div>
                    <!-- User Details Column End -->

                    <!-- Tab Content Column -->
                    <div class="col-md-9">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Orders</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Payment</button>
                            </li>
                        </ul>

                        <div class="tab-content border border-secondary-subtle" id="myTabContent">
                            <!-- Home Tab Content -->
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="container">
                                    <div class="col-md-8 mx-auto">
                                        <div class="card m-5 border border-0">
                                            <form class="m-4">
                                                <!-- Form Inputs -->
                                                <div class="row g-3 mb-3">
                                                    <div class="col">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" class="form-control border border-secondary-subtle" id="name" placeholder="Name" aria-label="Name" value="{{$user->name}}" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <label for="birthday" class="form-label">Birthday</label>
                                                        <input type="text" class="form-control border border-secondary-subtle" id="birthday" placeholder="Birthday" aria-label="Birthday" value="{{$user->birthday}}" readonly>
                                                    </div>
                                                </div>
                                                <!-- Form Inputs End -->

                                                <!-- Email Input -->
                                                <div class="row g-3 mb-3">
                                                    <div class="col">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control border border-secondary-subtle" id="email" placeholder="Email" aria-label="Email" value="{{$user->email}}" readonly>
                                                    </div>
                                                </div>
                                                <!-- Email Input End -->

                                                <!-- Address Input -->
                                                <div class="row g-3 mb-3">
                                                    <div class="col">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" class="form-control border border-secondary-subtle" id="address" placeholder="Address" aria-label="Address" value="{{$user->address}}" readonly>
                                                    </div>
                                                </div>
                                                <!-- Address Input End -->

                                                <!-- Contact and Zip Inputs -->
                                                <div class="row g-3 mb-3">
                                                    <div class="col">
                                                        <label for="contact" class="form-label">Contact</label>
                                                        <input type="text" class="form-control border border-secondary-subtle" id="contact" placeholder="Contact" aria-label="Contact" value="{{$user->contact}}" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <label for="zip" class="form-label">Zip code</label>
                                                        <input type="text" class="form-control border border-secondary-subtle" id="zip" placeholder="Zip code" aria-label="Zip code" value="{{$user->zip}}" readonly>
                                                    </div>
                                                </div>
                                                <!-- Contact and Zip Inputs End -->

                                                <!-- Save Button -->
                                                <a href="{{ url('/editprofile') }}" class="btn btn-primary text-white" style="background:blue"type="submit">Edit</a>
                                                <!-- Save Button End -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Home Tab Content End -->

                            <!-- Profile Tab Content -->
                            <div class="tab-pane fade p-4" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
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
                                <div class="flex items-center justify-center">
                                    {{ $orders->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                            <!-- Profile Tab Content End -->

                            <!-- Contact Tab Content -->
                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                <div class="flex flex-col justify-center items-center h-20">
                                    @if ($payments->isEmpty())

                                        <p class="text-xl font-bold text-center mb-4 text-gray-400">No Payment Options</p>
        
                                    @else
                                                                  
                                </div>
                                <div class="flex flex-col items-center justify-center m-2 ">
                                <div class="flex flex-col justify-center w-full p-2 border border-black rounded-xl shadow">
                                    @foreach ($payments as $payment)
                                    <div>
                                    <div>@ {{ $payment->name }}</div>
                                    <div class="m-4">
                                        <label for="">Card Number: </label>
                                        {{ $payment->card_number }}
                                    </div>
                                    <div class="flex flex-row justify-around">
                                        
                                        <div>
                                            <label for="">Expiration Date: </label>
                                            {{ $payment->date}}
                                        </div>
                                        <div>
                                            <label for="">CVV: </label>
                                            {{ $payment->cvv }}
                                        </div>

                                    </div>
                                    </div>
                                    @endforeach
                                </div>
                                </div>
                                <div div class="flex flex-col justify-center items-center">
                                    <button class="border border-black p-2 rounded-lg" style="background: yellow" onclick="showCard()">Add Payment option</button>
                                </div>
                                @endif
                                <form action="{{url('/addpayment')}}" method="POST">
                                    @csrf
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
                                <div class="m-10 border border-black p-3 shadow hidden" id="card">
                                    <div class="mb-4 flex flex-row sm:w-full">
                                        <div class="w-full sm:w-1/2 pr-2">
                                            <label class="text-black mb-2" for="name">Account Name:</label>
                                            <input type="text" name="name" class="rounded shadow border-0 w-full" >
                                        </div>
                                    </div>
                                    <div class="mb-4 flex flex-row sm:w-full">
                                        <div class="w-full sm:w-1/2 pr-2">
                                            <label class="text-black mb-2" for="name">Card Number:</label>
                                            <input type="number" name="card_number" class="rounded shadow border-0 w-full">
                                        </div>
                                    </div>
                                    <div class="mb-4 flex flex-row">
                                        <div class="w-full sm:w-1/2 pr-2">
                                            <label class="text-black mb-2" for="email">Expiration Date</label>
                                            <input type="month" name="date"  class="rounded shadow border-0 w-full"> 
                                        </div>
                            
                                        <div class="w-full sm:w-1/2 pl-2">
                                            <label class="text-black mb-2" for="contact">CVV</label>
                                            <input type="number" name="cvv" class="rounded shadow border-0 w-full">
                                        </div>
                                    </div>
                                    <div class="flex justify-center items-center">
                                    <button type="submit" class="border border-black p-3 text-center text-white font-bold rounded-xl" style="background: blue">Add Payment Method</button>
                                    </div>
                                </div>
                                </form>
                            </div>


                            <!-- Contact Tab Content End -->
                        </div>
                    </div>
                    <!-- Tab Content Column End -->
                </div>
            </div>
        </div>
    </div>
    <script>
function showCard() {
    const card = document.getElementById('card');
    card.classList.remove('hidden');
}

    </script>
    @include('user.js')
</body>
</html>
