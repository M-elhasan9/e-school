<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Purple Admin')</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">

      {{-- Navbar --}}
      @include('admin.partials.navbar')

      <div class="container-fluid page-body-wrapper">

        {{-- Sidebar --}}
        @include('admin.partials.sidebar')
        {{-- Flash Success Message --}}
@if(session('success'))
  <div id="flashMessage"
       style="position: fixed; top: 20px; right: 20px; min-width: 300px; z-index: 9999; background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white; padding: 15px 20px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); display: flex; justify-content: space-between; align-items: center;">
    <span>{{ session('success') }}</span>
    <button onclick="closeFlash()"
            style="background: transparent; border: none; color: white; font-size: 18px; cursor: pointer;">&times;</button>
  </div>

  <script>
    function closeFlash() {
      document.getElementById('flashMessage').style.display = 'none';
    }
    setTimeout(() => {
      const flash = document.getElementById('flashMessage');
      if(flash) flash.style.display = 'none';
    }, 5000);
  </script>
@endif


        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>

        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </body>
</html>
