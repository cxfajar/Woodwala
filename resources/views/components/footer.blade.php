<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <a href="{{ URL::to('/') }}">
                    <img src="img\logo.png" alt="Hire a Carpenter Logo" height="" width="200">

                </a>

            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Address</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> Gujrat, Pakisatn</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+92 322 6201898</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>fyp.hirecarpenter@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Services</h4>
                <a class="btn btn-link">General Carpentry</a>
                <a class="btn btn-link">Furniture Remodeling</a>
                <a class="btn btn-link">Wooden Floor</a>
                <a class="btn btn-link" >Wooden Furniture</a>
                <a class="btn btn-link" >Custom Carpentry</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Quick Links</h4>
                <a class="btn btn-link" href="#about">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Our Services</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>
            </div>

          
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i
                class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="{{ URL::asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ URL::asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('lib/wow/wow.min.js') }}"></script>
        <script src="{{ URL::asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ URL::asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ URL::asset('lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ URL::asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ URL::asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ URL::asset('lib/lightbox/js/lightbox.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ URL::asset('js/main.js') }}"></script>
        <script>
            $(document).ready(function() {
                var fname_err = false;
                var lname_err = false;
                var email_err = false;
                var pass_err = false;
                var contact_errr = false;
                var cnic_errr = false;
                // <--------------------------------for name-------------------------->
                $('#fnameid').keyup(function() {
                    check_fname();
                });
                $('#lnameid').keyup(function() {
                    check_lname();
                });

                function check_fname() {
                    var name = $('#fnameid').val();
                    var pattern = /^[a-zA-Z ]{1,30}$/;
                    if (pattern.test(name) && name !== '') {
                        $('.fname-err').text("");
                    } else if ($('#fnameid').val() == '') {
                        $('#fnameid').focus();
                        $('.fname-err').text("Please Input Value").css('color', 'red');
                        fname_err = true;
                    } else if (name.length > 12) {
                        $('.fname-err').text("To much Length").css('color', 'red');
                        fname_err = true;
                    } else {
                        $('.fname-err').text("Invalid Input").css('color', 'red');
                        fname_err = true;
                    }
                }

                function check_lname() {
                    var name = $('#lnameid').val();
                    var pattern = /^[a-zA-Z ]{1,30}$/;
                    if (pattern.test(name) && name !== '') {
                        $('.lname-err').text("");
                    } else if ($('#lnameid').val() == '') {
                        $('#lnameid').focus();
                        $('.lname-err').text("Please Input Value").css('color', 'red');;
                        lname_err = true;
                    } else if (name.length > 12) {
                        $('.lname-err').text("To much Length").css('color', 'red');
                        lname_err = true;
                    } else {
                        $('.lname-err').text("Invalid Input").css('color', 'red');
                        lname_err = true;
                    }
                }


                // <------------------------------for Email------------------->
                $('#emailid').focusout(function() {
                    check_email();
                });

                function check_email() {
                    var email = $('#emailid').val();
                    var pattren =
                        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    if (pattren.test(email)) {
                        $('#emailerr').text("");
                    } else if ($('#emailid').val() == '') {
                        $('#emailid').focus();
                        $('#emailerr').text("Please Input Value").css('color', 'red');
                        email_err = true;
                    } else {
                        $('#emailerr').text("Invalid Input").css('color', 'red');;
                        email_err = true;
                    }
                }
                // <---------------------------password------------------------------------------>

                $('#passid').keyup(function() {
                    check_pass();
                });

                function check_pass() {
                    var pass = $('#passid').val();
                    if (pass == '') {
                        $('#password-err').text("Please input value").css('color', 'red');
                        pass_err = true;
                    } else
                    if (pass.length > 12) {
                        $('#password-err').text("To much Length").css('color', 'red');
                        pass_err = true;
                    } else if (pass.length < 8) {
                        $('#password-err').text("Enter Min 8 numbers and Max 12").css('color', 'orange');
                        pass_err = true;
                    } else if ($('#passid').val() == '') {
                        $('#passid').focus();
                        $('#password-err').text("Please Input Value").css('color', 'red');
                        pass_err = true;
                    } else {
                        $('#password-err').text("");
                    }
                }



                // <------------------------contact-length-------------------------------->
                $('#contact').keyup(function() {
                    check_contact();
                });

                function check_contact() {
                    var contct = $('#contact').val();
                    if (contct == '') {
                        $('#errmsg').text("Enter Your Number").css('color', 'orange');
                        contact_errr = true;
                    } else
                    if (contct.length > 11) {
                        $('#errmsg').text("To much Length").css('color', 'red');
                        contact_errr = true;
                    }
                }

                $('#cnic').keyup(function() {
                    check_cnic();
                });

                function check_cnic() {
                    var cnic = $('#cnic').val();
                    if (cnic == '') {
                        $('#cnicerr').text("Enter Your Number").css('color', 'orange');
                        cnic_errr = true;
                    } else
                    if (cnic.length > 11) {
                        $('#cnicerr').text("To much Length").css('color', 'red');
                        cnic_errr = true;
                    }
                }
                // <----------------------------------------------------------------->
            });
        </script>
        </body>

        </html>
