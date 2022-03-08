<?php  
$alert = '';
require_once 'class/apiClass.php';
require_once 'authAdmin.php';
if($_SESSION['login_store_pore'] == true){
    header('Location:'. $_SESSION['revious_page']);
    exit();
}
?>

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login Seller | Pore Kopi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="PoreKopi" name="author"/>

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />
        <script src="assets/js/onfocus.js"></script>
    </head>

    <body class="bg-pattern">
        <div class="bg-overlay"></div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="">
                                    <div class="text-center">
                                        <a href="index" class="">
                                            <img src="assets/images/logo-dark.png" alt="" height="24" class="auth-logo logo-dark mx-auto">
                                        </a>
                                    </div>
                                    <!-- end row -->
                                    <h4 class="font-size-18 mt-2 text-center browns-text">Welcome Back !</h4>
                                    <p class="mb-5 text-center browns-text">Sign in to Panel Seller.</p>
                                    <form class="form-horizontal" action="index" method="post">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label browns-text" for="username">Username</label>
                                                    <input type="text" name="username" class="form-control <?= $alert == 1 || $alert == 3 ? 'is-invalid' : ''  ?>" value="<?= isset($_POST['get_login']) ? $_POST['username'] : '' ?>" id="username" placeholder="Enter username" style="text-transform: lowercase;" <?= $alert == 1 || $alert == 3 || $alert == '' ? 'autofocus' : '' ?> onfocus="if(typeof moveCursorToEnd != 'undefined') moveCursorToEnd(this, true)">
                                                    <?php  
                                                    if($alert == 1 || $alert == 3){
                                                    ?>
                                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                                        Wrong Username.
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label browns-text" for="userpassword">Password</label>
                                                    <div class="input-group password">
                                                        <input type="password" name="password" class="form-control <?= $alert == 2 || $alert == 3 ? 'is-invalid' : ''  ?> pass" id="userpassword" placeholder="enter password" <?= $alert == 2 ? 'autofocus' : '' ?>>
                                                        <i class="ri-eye-off-line toggle input-group-text"></i>
                                                    </div>
                                                    <?php  
                                                    if($alert == 2 || $alert == 3){
                                                    ?>
                                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                                        Wrong Password.
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-sm-5 col-md-5">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customControlInline">
                                                            <label class="form-label browns-text" style="cursor: pointer;" for="customControlInline">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-7 col-md-7">
                                                        <div class="text-md-end text-sm-end mt-md-0">
                                                            <a href="#" class="browns-text"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-grid mt-4">
                                                    <button class="btn button-brown waves-effect waves-light" name="get_login" type="submit">Log In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script> Pore Kopi. Created by budi</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>
        <script src="assets/js/jquery.js"></script>
    
    </body>
</html>
