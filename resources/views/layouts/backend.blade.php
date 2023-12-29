<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('pageTitle','SmartTech - Responsive Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="A premium admin dashboard template by Mannatthemes" name="description">
    <meta content="Mannatthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('contents/backend') }}/assets/images/favicon.ico">
    <link href="{{ asset('contents/backend') }}/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- App css -->
    <link href="{{ asset('contents/backend') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('contents/backend') }}/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('contents/backend') }}/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('contents/backend') }}/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet">
    @stack('css-link')
    <link href="{{ asset('contents/backend') }}/assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('contents/backend') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
    @stack('css')
</head>

<body>
    @if(session()->has('success'))
    <script type="text/javascript">
        swal({
          title: "Success!",
          text: "{{session('success')}}",
          type: "success",
          timer: 3000,
      });
  </script>
  @endif

  @if(session()->has('error'))
  <script type="text/javascript">
    swal({
      title: "Error!",
      text: "{{session('error')}}",
      type: "warning",
      timer: 3000,
  });
</script>
@endif
    <!-- Top Bar Start -->
    <x-backend.topbar />
    <!-- Top Bar End -->
    <div class="page-wrapper">
        <!-- Left Sidenav -->
        <x-backend.sidebar />
        <!-- end left-sidenav-->

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                {{-- page title --}}
                <x-backend.breadcrumb/>
                {{-- page title end --}}
                 @include('layouts.include.order_status_change')
                @yield('content')
            </div>
            <!-- end page content -->
            <!-- container -->
            <footer class="footer text-center text-sm-left">&copy; 2019 Metrica <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span></footer>
            <!--end footer-->
        </div>
    </div>

    {{-- profile modal --}}

    <x-backend.modal.profile-modal />
    <!-- end page-wrapper -->
    <!-- jQuery  -->
    
    <script src="{{ asset('contents/backend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/js/metisMenu.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/js/waves.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/js/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/moment/moment.js"></script>
    <!-- App js -->
    @stack('js-link')
    <script src="{{ asset('contents/backend') }}/assets/pages/jquery.eco_dashboard.init.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/js/app.js"></script>
    @stack('js')
</body>

</html>
