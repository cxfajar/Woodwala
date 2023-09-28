<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Sign Up</title>
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


<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-3">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">SIGNUP HERE</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ URL::to('/') }}">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Signup</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- 404 Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container text-center">

        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <strong>Error!</strong> {{ session()->get('emailerror') }}
                    </div>
                @endif
                <div class="card shadow p-5" style="border-radius: 5px">
                    <div class="card-body">
                        <i class="fa fa-user text-primary" style="font-size: 70px"></i>
                        <br> <br>
                        <form action="{{ URL::to('register_user') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <select name="type" id="" class="form-control">
                                    <option value="CLIENT">Client</option>
                                    <option value="WHOLESALLER">WholeSaller</option>
                                    <option value="CARPENTER">Carpenter</option>
                                </select>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="fname" id="fnameid"
                                            placeholder="Enter First Name" class="form-control" required>
                                        <span class="fname-err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="lname" id="lnameid"
                                            placeholder="Enter Last Name" class="form-control" required>
                                        <span class="lname-err"></span>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <input type="email" id="emailid" name="email" placeholder="Enter E-mail"
                                    class="form-control" required>
                                <span id="emailerr"></span>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="password" name="password" id="passid" placeholder="Enter Password"
                                    class="form-control" required>
                                <span id="password-err"></span>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="cnic" id="cnic" onkeypress="isCnic(event)"
                                            placeholder="Enter CNIC" class="form-control" required>
                                        <span id="cnicerr"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="contact" id="contact"
                                            onkeypress="isInputNumber(event)" placeholder="Enter Contact"
                                            class="form-control" required>
                                        <span id="errmsg"></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="city" id="" placeholder="Enter City"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="country" id="" placeholder="Enter country"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="file" name="img" id="" class="form-control" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"> Signup </button>
                            </div>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->


<x-footer />
