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
        <div class="main-panel">
          <div class="content-wrapper" style="background:white">
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-md-4 mb-3">
            <div class="border border-black p-2 rounded-xl h-28" style="background:#fdfafd">
              <p class="text-center mb-2 sm-text-left sm-text-sm">Sales</p>
              <div class="text-center">
                <p class="text-5xl">{{ $totalSales }}</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-3">
            <div class="border border-black p-2 rounded-xl h-28" style="background:#fdfafd">
              <p class="text-center mb-2 sm-text-left sm-text-sm">Donations</p>
              <div class="text-center d-flex flex-row justify-content-center">
                <p class="text-5xl me-1">{{ $totalDonations }}</p>
                <span>kg</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-3">
            <div class="border border-black p-2 rounded-xl h-28" style="background:#fdfafd">
              <p class="text-center mb-2 sm-text-left sm-text-sm">Users</p>
              <div class="text-center">
                <p class="text-5xl">{{ $userCount }}</p>
              </div>
            </div>
          </div>
        </div> 

        <div class ="row">
          <div class="col-xl-6">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area me-1">Total Sales</i>
              </div>
              <div class="card-body"><canvas id = "myChart" width="100%" height="40%"></canvas></div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area me-1">Total Donations</i>
              </div>
              <div class="card-body"><canvas id = "myChart2" canvas width="100%" height="40%"></canvas></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    @include('admin.js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Define the data variables -->
    <script>
      var _ydata = JSON.parse('{!! json_encode($days) !!}');
      var _xdata = JSON.parse('{!! json_encode($dayTotalSales) !!}');
    </script>
    
    <!-- Create the Chart.js instance -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('myChart');
    
        new Chart(ctx, {
          type: 'line',
          data: {
            labels: _ydata,
            datasets: [{
              label: 'Sales in the Month of November',
              data: _xdata,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
                // Customize the y-axis ticks
                ticks: {
                  stepSize: 20, // Set the step size between ticks
                  min: 0,      // Set the minimum value
                  max: 1000      // Set the maximum value
                }
              }
            }
          }
        });
      });
    </script>

<script>
  var _ydata2 = JSON.parse('{!! json_encode($daysDonation) !!}');
  var _xdata2 = JSON.parse('{!! json_encode($dayTotalDonation) !!}');
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('myChart2');
    
        new Chart(ctx, {
          type: 'line',
          data: {
            labels: _ydata2,
            datasets: [{
              label: 'Donations in the Month of November',
              data: _xdata2,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
                // Customize the y-axis ticks
                ticks: {
                  stepSize: 20, // Set the step size between ticks
                  min: 0,      // Set the minimum value
                  max: 1000      // Set the maximum value
                }
              }
            }
          }
        });
      });
</script>
  </body>
</html>