@extends('layouts.admin') {{-- PurpleAdmin genel layout dosyasını kullanıyoruz --}}

@section('title', 'Courses')

@section('content')

  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-3">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/" target="_blank" class="btn me-2 buy-now-btn border-0">Buy Now</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white mr-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->




      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
             <nav aria-label="breadcrumb">
  <ul class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">
      <span></span>Dashboard <i class="mdi mdi-school icon-sm text-primary align-middle"></i>
    </li>
  </ul>
</nav>
</div>
<div class="row">
 <!-- Students -->
<div class="col-md-4 stretch-card grid-margin">
  <div class="card bg-gradient-primary card-img-holder text-white">
    <div class="card-body">
      <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
      <h4 class="font-weight-normal mb-3">Total Students <i class="mdi mdi-account-group mdi-24px float-end"></i></h4>
      <h2 class="mb-5">{{ $totalStudents }}</h2>
      <h6 class="card-text">Increased by 12% this month</h6>
    </div>
  </div>
</div>

<!-- Courses -->
<div class="col-md-4 stretch-card grid-margin">
  <div class="card bg-gradient-info card-img-holder text-white">
    <div class="card-body">
      <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
      <h4 class="font-weight-normal mb-3">Active Courses <i class="mdi mdi-book-open-page-variant mdi-24px float-end"></i></h4>
      <h2 class="mb-5">{{ $totalCourses }}</h2>
      <h6 class="card-text">5 new courses added this week</h6>
    </div>
  </div>
</div>

<!-- Teachers -->
<div class="col-md-4 stretch-card grid-margin">
  <div class="card bg-gradient-success card-img-holder text-white">
    <div class="card-body">
      <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
      <h4 class="font-weight-normal mb-3">Teachers <i class="mdi mdi-teach mdi-24px float-end"></i></h4>
      <h2 class="mb-5">{{ $totalTeachers }}</h2>
      <h6 class="card-text">90% currently active</h6>
    </div>
  </div>
</div>


<div class="row">
<!-- Course Enrollment Statistics -->
<div class="col-md-7 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="clearfix">
        <h4 class="card-title float-start">Course Enrollment Statistics</h4>
        <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-end"></div>
      </div>
      <canvas id="visit-sale-chart" class="mt-4"></canvas>
    </div>
  </div>
</div>

<!-- User Login Sources -->
<div class="col-md-5 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">User Login Sources</h4>
      <div class="doughnutjs-wrapper d-flex justify-content-center">
        <canvas id="traffic-chart"></canvas>
      </div>
      <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
    </div>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Course Enrollment Chart (Bar)
  var ctx1 = document.getElementById('visit-sale-chart').getContext('2d');
  var visitSaleChart = new Chart(ctx1, {
      type: 'bar',
      data: {
          labels: @json($chartLabels),
          datasets: [
              {
                  label: 'Students',
                  data: @json($studentData),
                  backgroundColor: 'rgba(54, 162, 235, 0.5)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1
              },
              {
                  label: 'Teachers',
                  data: @json($teacherData),
                  backgroundColor: 'rgba(255, 99, 132, 0.5)',
                  borderColor: 'rgba(255, 99, 132, 1)',
                  borderWidth: 1
              }
          ]
      },
      options: {
          responsive: true,
          scales: {
              y: { beginAtZero: true }
          },
          plugins: {
              legend: { position: 'top' }
          }
      }
  });

  // User Login Sources Chart (Doughnut)
  var ctx2 = document.getElementById('traffic-chart').getContext('2d');
var loginData = @json($loginData);      // Örn: [50, 30]
var loginLabels = @json($loginLabels);  // Örn: ['Students','Teachers']

var total = loginData.reduce((a,b) => a + b, 0);

var trafficChart = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: loginLabels,
        datasets: [{
            data: loginData,
            backgroundColor: [
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    generateLabels: function(chart) {
                        return chart.data.labels.map(function(label, i) {
                            let value = chart.data.datasets[0].data[i];
                            let percent = ((value / total) * 100).toFixed(1);
                            return {
                                text: label + ' (' + percent + '%)',
                                fillStyle: chart.data.datasets[0].backgroundColor[i],
                                strokeStyle: chart.data.datasets[0].borderColor[i],
                                lineWidth: 1,
                                hidden: false,
                                index: i
                            };
                        });
                    }
                }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let value = context.raw;
                        let percent = ((value / total) * 100).toFixed(1);
                        return context.label + ': ' + value + ' (' + percent + '%)';
                    }
                }
            }
        }
    }
});

</script>




</div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved. Distributed by <a href="http://themewagon.com" target="_blank">ThemeWagon</a></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

  </body>
</html>
@endsection
