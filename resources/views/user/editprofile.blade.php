<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.css')
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
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
                            </li>
                        </ul>

                        <div class="tab-content border border-secondary-subtle" id="myTabContent">
                            <!-- Home Tab Content -->
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="container">
                                    <div class="col-md-8 mx-auto">
                                        <div class="card m-5 border border-0">
                                            <form class="m-4" action="{{ url('/saveprofile') }}" method="POST"> 
                                                @csrf
                                                <!-- Form Inputs -->
                                                <div class="row g-3 mb-3">
                                                    <div class="col">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" class="form-control border border-secondary-subtle" id="name" name = "name" placeholder="Name" aria-label="Name" value="{{$user->name}}" >
                                                    </div>
                                                    <div class="col">
                                                        <label for="birthday" class="form-label">Birthday</label>
                                                        <input type="date" class="form-control border border-secondary-subtle" id="birthday" name = "birthday" placeholder="Birthday" aria-label="Birthday" value="{{$user->birthday}}" >
                                                    </div>
                                                </div>
                                                <!-- Form Inputs End -->

                                                <!-- Email Input -->
                                                <div class="row g-3 mb-3">
                                                    <div class="col">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control border border-secondary-subtle" id="email" name = "email" placeholder="Email" aria-label="Email" value="{{$user->email}}" >
                                                    </div>
                                                </div>
                                                <!-- Email Input End -->

                                                <!-- Address Input -->
                                                <div class="row g-3 mb-3">
                                                    <div class="col">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" class="form-control border border-secondary-subtle" id="address" name = "address" placeholder="Address" aria-label="Address" value="{{$user->address}}" >
                                                    </div>
                                                </div>
                                                <!-- Address Input End -->

                                                <!-- Contact and Zip Inputs -->
                                                <div class="row g-3 mb-3">
                                                    <div class="col">
                                                        <label for="contact" class="form-label">Contact</label>
                                                        <input type="number" class="form-control border border-secondary-subtle" id="contact" name = "contact" placeholder="Contact" aria-label="Contact" value="{{$user->contact}}" >
                                                    </div>
                                                    <div class="col">
                                                        <label for="zip" class="form-label">Zip code</label>
                                                        <input type="number" class="form-control border border-secondary-subtle" id="zip" name = "zip" placeholder="Zip code" aria-label="Zip code" value="{{$user->zip}}" >
                                                    </div>
                                                </div>
                                                <!-- Contact and Zip Inputs End -->

                                                <!-- Save Button -->
                                                <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-full w-full" style="background: blue">
                                                    Save
                                                </button>
                                                <!-- Save Button End -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Home Tab Content End -->

                            <!-- Profile Tab Content -->
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
                            <!-- Profile Tab Content End -->

                            <!-- Contact Tab Content -->
                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
                            <!-- Contact Tab Content End -->
                        </div>
                    </div>
                    <!-- Tab Content Column End -->
                </div>
            </div>
        </div>
    </div>

    @include('user.js')
</body>
</html>
