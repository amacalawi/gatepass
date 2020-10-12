<?php
include 'connection/conn.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <title>Appzia - Responsive Admin Dashboard Template</title>

        <link rel="shortcut icon" href="assets/public/images/favicon.ico">

        <link href="assets/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/public/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/public/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body>
        <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "error"){?>
                <div class="alert alert-danger alert-dismissible fade show text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Invalid Username and Password.
                </div>
            <?php
            }
        }
        ?>
        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">

                <div class="card-body">
                    <h3 class="text-center m-t-0 m-b-15">
                        <a href="index.html" class="logo"><img src="assets/public/images/logo_white.png" alt="logo-img"></a>
                    </h3>
                    <h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>

                    <form id="form-login" method="POST" action="action/login-action.php" class="form-horizontal m-t-20">

                        <div class="form-group">
                            <div class="col-12">
                                <input name="username" class="form-control" type="text" required="" placeholder="Username" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <input name="password" class="form-control" type="password" required="" placeholder="Password" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox" checked>
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group row m-t-30 m-b-0">
                            <div class="col-sm-7">
                                <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                            <div class="col-sm-5 text-right">
                                <a href="pages-register.html" class="text-muted">Create an account</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>



        <!-- jQuery  -->
        <script src="assets/public/js/jquery.min.js"></script>
        <script src="assets/public/js/popper.min.js"></script>
        <script src="assets/public/js/bootstrap.min.js"></script>
        <script src="assets/public/js/modernizr.min.js"></script>
        <script src="assets/public/js/detect.js"></script>
        <script src="assets/public/js/fastclick.js"></script>
        <script src="assets/public/js/jquery.slimscroll.js"></script>
        <script src="assets/public/js/jquery.blockUI.js"></script>
        <script src="assets/public/js/waves.js"></script>
        <script src="assets/public/js/wow.min.js"></script>
        <script src="assets/public/js/jquery.nicescroll.js"></script>
        <script src="assets/public/js/jquery.scrollTo.min.js"></script>

        <script src="assets/public/js/app.js"></script>
    </body>
</html>