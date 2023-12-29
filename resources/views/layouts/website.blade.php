<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from doccure-html.dreamguystech.com/template2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 06:34:14 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure</title>
        <link type="image/x-icon" href="{{ asset('contents/fontend') }}/assets/img/favicon.png" rel="icon">
        <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/css/bootstrap.min.css" media='screen,print'>
        <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/css/feather.css">
        <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/css/bootstrap-datetimepicker.min.css">
        <link href="{{ asset('contents/backend') }}/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/css/style.css">
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{ asset('contents/fontend') }}/assets/js/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('contents/fontend') }}/assets/js/bootstrap-datetimepicker.min.js"></script>
        <script src="{{ asset('contents/backend') }}/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
        @stack('css')
        <!--[if lt IE 9]>
        <script src="{{ asset('contents/fontend') }}/assets/js/html5shiv.min.js"></script>
        <script src="{{ asset('contents/fontend') }}/assets/js/respond.min.js"></script>
        <![endif]-->
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
        <div class="main-wrapper">
            <header class="header min-header">
                <nav class="navbar navbar-expand-lg header-nav">
                    <div class=" {{ request()->is('/') ? 'container' : 'container-fluid' }}">
                        <div class="navbar-header">
                            <a id="mobile_btn" href="javascript:void(0);">
                            <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                            </span>
                            </a>
                            <a href="/" class="navbar-brand logo">
                            <img src="{{ asset('contents/fontend') }}/assets/img/logo.png" class="img-fluid" alt="Logo">
                            </a>
                        </div>
                        <div class="main-menu-wrapper">
                            <div class="menu-header">
                                <a href="index.html" class="menu-logo">
                                <img src="{{ asset('contents/fontend') }}/assets/img/logo.png" class="img-fluid" alt="Logo">
                                </a>
                                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                                </a>
                            </div>
                            <ul class="main-nav">
                                <li class="active">
                                    <a href="/">Home</a>
                                </li>
                                 <li class="">
                                    <a href="{{ route('aboutus') }}">About Us</a>
                                </li>
                                 <li class="">
                                    <a href="{{ route('website.contactus') }}">Contact</a>
                                </li>
                                

                                <li class="login-link">
                                    <a href="login.html">Login / Signup</a>
                                </li>
                            </ul>
                        </div>
                        @if (!session()->has('doctor') && !session()->has('patient'))
                        <ul class="nav header-navbar-rht">
                            <li class="nav-item">
                                <a class="nav-link header-login" href="{{ route('website.patient.login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link header-login login" href="{{ route('website.patient.register') }}">Sign Up</a>
                            </li>
                        </ul>
                        @endif
                        @if (session()->has('doctor'))
                        <ul class="nav header-navbar-rht">
                            <li class="nav-item">
                                <a class="nav-link header-login login" href="{{ route('website.doctor.appointment') }}">{{ session()->get('doctor')['name'] }}</a>
                            </li>
                        </ul>
                        @endif
                        @if (session()->has('patient'))
                        <ul class="nav header-navbar-rht">
                            <li class="nav-item">
                                <a class="nav-link header-login login" href="{{ route('website.patient.dashboard') }}">{{ session()->get('patient')['name'] }}</a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </nav>
            </header>
            @yield('content')
            <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="footer-widget footer-about">
                                    <div class="footer-logo">
                                        <img src="{{ asset('contents/fontend') }}/assets/img/logo.png" alt="logo">
                                    </div>
                                    <div class="footer-about-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#" target="_blank"><i class="feather-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank"><i class="feather-instagram"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank"><i class="feather-linkedin"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank"><i class="feather-twitter"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="footer-widget footer-menu">
                                    <h2 class="footer-title">For Patients</h2>
                                    <ul>
                                        <li><a href="{{ route('website.patient.login') }}">Login</a></li>
                                        <li><a href="{{ route('website.patient.register') }}">Register</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-6">
                                <div class="footer-widget footer-contact">
                                    <h2 class="footer-title">Contact Us</h2>
                                    <div class="footer-contact-info">
                                        <div class="footer-address">
                                            <span><i class="feather-map-pin"></i></span>
                                            <p> 4/1 Block a Lalmatia Dhaka</p>
                                        </div>
                                        <p>
                                            <i class="feather-phone"></i>
                                            +88 01843635461
                                        </p>
                                        <p class="mb-0">
                                            <i class="feather-mail"></i>
                                            <a href="">sayemakther78446@gmnail.com </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="copyright">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="copyright-text">
                                        <p class="mb-0">&copy; 2022 DoctorLink. All rights reserved.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="copyright-menu">
                                        <ul class="policy-menu">
                                            <li><a href="term-condition.html">Terms and Conditions</a></li>
                                            <li><a href="privacy-policy.html">Policy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <script src="{{ asset('contents/fontend') }}/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('contents/fontend') }}/assets/js/slick.js"></script>
        <script src="{{ asset('contents/fontend') }}/assets/js/script.js"></script>
        <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
        @stack('js')
    </body>
    <!-- Mirrored from doccure-html.dreamguystech.com/template2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 06:34:34 GMT -->
</html>