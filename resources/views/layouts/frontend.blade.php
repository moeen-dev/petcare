<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title') - Animal Life Style</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('assets/frontend/img/icon.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Flaticon Font -->
    <link href="{{ asset('assets/frontend/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
    <!-- Fontawesome Icon -->
    <link href="{{ asset('assets/frontend/lib/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit(token) {
            document.getElementById("contactForm").submit();
        }
    </script>

    <style>
        .custom {
            padding: 15px 40px;
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 9999;
            transition: opacity 0.3s ease-out;
        }
    </style>
    
</head>

<body>

    @if (session('success'))
    <div class="alert alert-success custom" id="alert">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger custom" id="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white pr-3" href="{{ route('faq')}}">FAQs</a>
                    <span class="text-white">|</span>
                    <a class="text-white px-3" href="{{ route('terms')}}">T&C</a>
                    <span class="text-white">|</span>
                    <a class="text-white pl-3" href="mailto:support@animal-life-style.top">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><img src="{{ url('assets/frontend/img/logo.png')}}" style="width: 200px; height: auto;" alt="animal-life-style">
                    </h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                        <h6>Opening Hours</h6>
                        <p class="m-0">8.00AM - 9.00PM</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                        <h6>Email Us</h6>
                        <p class="m-0">info@example.com</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
                        <h6>Call Us</h6>
                        <p class="m-0">+012 345 6789</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white">
                    <img src="{{ url('assets/frontend/img/logo.png')}}" style="width: 200px; height: auto; background: #fff;" alt="animal-life-style">
                </h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ route('home')}}" class="nav-item nav-link {{ Route::is('home') ? 'active' : ''}}">Home</a>
                    <a href="{{ route('about')}}" class="nav-item nav-link {{ Route::is('about') ? 'active' : ''}}">About</a>
                    <a href="{{ route('service')}}" class="nav-item nav-link {{ Route::is('service') ? 'active' : ''}}">Service</a>
                    <a href="{{ route('pricing')}}" class="nav-item nav-link {{ Route::is('pricing') ? 'active' : ''}}">Pricing</a>
                    <a href="{{ route('blog')}}" class="nav-item nav-link {{ Request::is('blog') || Request::is('blog/blog-details/*') ? 'active' : '' }}">Blog</a>
                    <a href="{{ route('faq')}}" class="nav-item nav-link {{ Route::is('faq') ? 'active' : ''}}">FAQs</a>
                    <a href="{{ route('contact')}}" class="nav-item nav-link {{ Route::is('contact') ? 'active' : ''}}">Contact</a>
                </div>
                <a href="mailto:support@animal-life-style.top" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Mail Us</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-6 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize">
                    <img src="{{ url('assets/frontend/img/logo.png')}}" style="width: 200px; height: auto;background: #fff;" alt="animal-life-style">
                </h1>
                <p class="m-0">You are specifically restricted from all of the following: publishing any Website material in any other media; selling, sublicensing and/or otherwise commercializing any Website material; publicly performing and/or showing any Website material; using this Website in any way that is or may be damaging to this Website.</p>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope mr-2"></i>newsletter@animal-life-style.top</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary mb-4">Popular Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="{{ route('home')}}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="{{ route('about')}}"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-white mb-2" href="{{ route('service')}}"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                            <a class="text-white" href="{{ route('contact')}}"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                            <a class="text-white" href="{{ route('blog')}}"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                            <a class="text-white" href="{{ route('faq')}}"><i class="fa fa-angle-right mr-2"></i>FAQs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="https://www.animal-life-style.top">Animal Life Style</a>. All Rights Reserved. Developed by
                    <a class="text-white font-weight-bold" target="_blank" href="https://www.moeenuddin.com">Moeen Uddin</a>
                </p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="{{ route('terms')}}">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="{{ route('faq')}}">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('assets/frontend/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    <script>
        function copyPassword(id) {
        // Get the password text
            var passwordText = document.getElementById('password-' + id).innerText;
            
        // Create a temporary textarea element to hold the password text
            var tempInput = document.createElement('textarea');
            tempInput.value = passwordText;
            document.body.appendChild(tempInput);
            
        // Select and copy the text
            tempInput.select();
            document.execCommand('copy');
            
        // Remove the temporary element
            document.body.removeChild(tempInput);

        // Optional: Notify the user that the password was copied
            alert('Password copied to clipboard');
        }


        document.addEventListener("DOMContentLoaded", function() {
            let currentYear = new Date().getFullYear();
            document.getElementById('year').textContent = currentYear;
        });

        document.addEventListener('DOMContentLoaded', function() {
            let alertElement = document.getElementById('alert');
            if (alertElement) {
                setTimeout(function() {
                    let bsAlert = new bootstrap.Alert(alertElement);
                    bsAlert.close();
                }, 3000); 
            }
        });
    </script>
</body>

</html>