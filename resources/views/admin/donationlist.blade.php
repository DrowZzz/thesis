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
        <div class="main-panel">
            <div class="content-wrapper" style="background:white">
              <div class="card-body">
                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="Home-pane" aria-selected="true">Pending</button>
                  </li>
                  <li class="nav-item" role="presentation">
                      <button class="nav-link" id="SEO_tags" data-bs-toggle="tab" data-bs-target="#SEO-tab-pane" type="button" role="tab" aria-controls="SEO-tags-pane" aria-selected="false">Approved</button>
                  </li>
                  <li class="nav-item" role="presentation">
                      <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Disapproved</button>
                  </li>
              </ul>

              <div class="tab-content border border-secondary-subtle" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">

                  @foreach ($pendingDonations as $donation)
                  <div class="grid grid-cols-1 gap-4 mb-3 md:hidden text-black">
                    <div class="grid grid-cols-1 gap-4 mb-3 md:hidden text-black">
                      <div class="bg-white p-4 rounded-lg shadow text-black space-y-3">
                        <div class="flex items-center space-x-2 text-sm justify-between">
                          <div class="text-black font-bold">@ {{ $donation->name }}</div>
                          <div class="text-gray-500">{{ $donation->date }}</div>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                          <div>
                            <img class="w-20 h-20" src="images/123.jpg" alt="">
                          </div>
                          <div>
                            <div class="font-bold">Spent Coffee Grounds</div>
                            <div>Quantity: {{ $donation->quantity }} kg</div>
                          </div>
                        </div>
                        <div class="border-b"></div> <!-- Add a horizontal line here -->
                        <div class="text-sm text-gray-700">Status: {{ $donation->status }}</div>
                        <div class="border-b"></div> <!-- Add another horizontal line here -->
                        <div class="flex items-center justify-between">
                          <div class="text-sm font-medium">Donation ID: #{{ $donation->uuid }}</div>
                          <div><a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out">Update</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
                <div class="flex items-center justify-center">
                {{ $pendingDonations->links('pagination::bootstrap-4', ['page' => 'pending_page']) }}
                </div>
                </div>

                <div class="tab-pane fade" id="SEO-tab-pane" role="tabpanel" aria-labelledby="SEO_tags">
                  @foreach ($approvedDonations as $donation)
                    <div class="grid grid-cols-1 gap-4 mb-3 md:hidden text-black">
                      <div class="bg-white p-4 rounded-lg shadow text-black space-y-3">
                        <div class="flex items-center space-x-2 text-sm justify-between">
                          <div class="text-black font-bold">@ {{ $donation->name }}</div>
                          <div class="text-gray-500">{{ $donation->date }}</div>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                          <div>
                            <img class="w-20 h-20" src="images/123.jpg" alt="">
                          </div>
                          <div>
                            <div class="font-bold">Spent Coffee Grounds</div>
                            <div>Quantity: {{ $donation->quantity }} kg</div>
                          </div>
                        </div>
                        <div class="border-b"></div> <!-- Add a horizontal line here -->
                        <div class="text-sm text-gray-700">Status: {{ $donation->status }}</div>
                        <div class="border-b"></div> <!-- Add another horizontal line here -->
                        <div class="flex items-center justify-between">
                          <div class="text-sm font-medium">Donation ID: #{{ $donation->uuid }}</div>
                        </div>
                      </div>
                    </div>
                @endforeach
                <div class="flex items-center justify-center">
                {{ $approvedDonations->links('pagination::bootstrap-4', ['page' => 'approved_page']) }}
                </div>
                </div>

                <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab">
                  @foreach ($disapprovedDonations as $donation)
                    <div class="grid grid-cols-1 gap-4 mb-3 md:hidden text-black">
                      <div class="bg-white p-4 rounded-lg shadow text-black space-y-3">
                        <div class="flex items-center space-x-2 text-sm justify-between">
                          <div class="text-black font-bold">@ {{ $donation->name }}</div>
                          <div class="text-gray-500">{{ $donation->date }}</div>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                          <div>
                            <img class="w-20 h-20" src="images/123.jpg" alt="">
                          </div>
                          <div>
                            <div class="font-bold">Spent Coffee Grounds</div>
                            <div>Quantity: {{ $donation->quantity }} kg</div>
                          </div>
                        </div>
                        <div class="border-b"></div> <!-- Add a horizontal line here -->
                        <div class="text-sm text-gray-700">Status: {{ $donation->status }}</div>
                        <div class="border-b"></div> <!-- Add another horizontal line here -->
                        <div class="flex items-center justify-between">
                          <div class="text-sm font-medium">Donation ID: #{{ $donation->uuid }}</div>
                        </div>
                      </div>
                    </div>
                @endforeach
                <div class="flex items-center justify-center">
                {{ $disapprovedDonations->links('pagination::bootstrap-4', ['page' => 'disapproved_page']) }}
                </div>        
            </div>

              </div>
            </div>


        </div>
      </div>
    </div>
    
    @include('admin.js')
  </body>
</html>