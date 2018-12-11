<?php
    session_start();
    if(isset($_SESSION["login"]) && isset($_SESSION["hak_akses"])){
        if($_SESSION["hak_akses"] == "guru"){
            header("location: guru/index.php");
        }else{
            header("location: siswa/index.php");
        }
    }
 ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eLearning - Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="guru/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="guru/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="guru/assets/css/themify-icons.css">
    <!-- amchart css -->
    <!-- others css -->
    <link rel="stylesheet" href="guru/assets/css/typography.css">
    <link rel="stylesheet" href="guru/assets/css/default-css.css">
    <link rel="stylesheet" href="guru/assets/css/styles.css">
    <link rel="stylesheet" href="guru/assets/lib/sweet alert/sweetalert.css">
    <link rel="stylesheet" href="guru/assets/css/responsive.css">
    <!-- modernizr css -->
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form id="login">
                    <div class="login-form-head">
                        <h4>Sign In</h4>
                        <p>Hello there, Sign in and start managing your guru Template</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" id="exampleInputEmail1">
                            <i class="ti-email" ></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="register.html">Sign up</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="guru/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="guru/assets/js/popper.min.js"></script>
    <script src="guru/assets/js/bootstrap.min.js"></script>
    <script src="guru/assets/js/owl.carousel.min.js"></script>
    <script src="guru/assets/js/metisMenu.min.js"></script>
    <script src="guru/assets/js/jquery.slimscroll.min.js"></script>
    <script src="guru/assets/js/jquery.slicknav.min.js"></script>
    <script src="guru/assets/lib/sweet alert/sweetalert.min.js"></script>
    
    <!-- others plugins -->
    <script src="guru/assets/js/plugins.js"></script>
    <script src="guru/assets/js/scripts.js"></script>
    <script src="guru/assets/js/ajax.js"></script>
</body>

</html>