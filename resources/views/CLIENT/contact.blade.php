<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ URL::asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
    <link
        href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap') }}"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css') }}"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ URL::asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css') }}">
    <script src="{{ URL::asset('https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js') }}"></script>
    <script src="{{ URL::asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js') }}"></script>
    <script src="{{ URL::asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <script>
        function isInputNumber(evt) {
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }
        }

        function isCnic(evt) {
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }
        }
    </script>

    <!-- Libraries Stylesheet -->
    <link href="{{ URL::asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

   

    <!-- Navbar Start -->
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="{{ URL::to('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src="img\logo.png" alt="Hire a Carpenter Logo" height="" width="200">
        <h2 class="m-0 text-primary ml-2" style="font-family: sans-serif;"></h2>
    </a>
    
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ URL::to('/') }}" class="nav-item nav-link ">Home</a>

            @if (session()->has('user_id'))
                <a href="{{ URL::to('client_ads') }}" class="nav-item nav-link">My Ads</a>
                <a href="{{ URL::to('client_orders') }}" class="nav-item nav-link">My Orders</a>
            @endif
    
       
        @if (session()->has('user_id'))
            <a href="{{ URL::to('logout') }}" class="nav-item nav-link active">LOGOUT</a>
        @else
            <a href="{{ URL::to('login') }}" class="nav-item nav-link active">GET STARTED</a>
        @endif
    </div>   
    </div>
</nav>

<!-- Navbar End -->
<!-- Feature Start -->
<div class="container-xxl py-5">
<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="section-title">
                    <div class="row">

                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <h1 class="display-5 mb-5">Contact Us</h1>
                        </div>

                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-6">
                            <form action="{{ URL::to('contact_us') }}" method="post">
                                @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="" class="form-control" placeholder="Enter E-mail">
                            </div>
                            <div class="form-group">
                                <textarea name="msg" id="" cols="30" rows="10" class="form-control" placeholder="Enter Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"> Send </button>
                            </div>
                            </form>
                        </div>
                        <div class="col-lg-2">
                        </div>
                    </div>
            </div>
        </div>

        </div>

    </div>
</div>
<!-- Team End -->
<x-footer />
