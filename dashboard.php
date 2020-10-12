<?php
    include 'connection/conn.php';
    session_start();

    if(!isset($_SESSION['username'])){
        header('location: login.php');
    }
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

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/public/plugins/morris/morris.css">

        <link href="assets/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/public/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/public/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><img src="assets/public/images/logo.png" alt="logo-img"></a>
                        <a href="index.html" class="logo-sm"><img src="assets/public/images/logo_sm.png" alt="logo-img"></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                

                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left waves-light waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <li class="hide-phone app-search float-left">
                                <form role="search" class="navbar-form">
                                    <input type="text" placeholder="Search..." class="form-control search-bar">
                                    <a href="" class="btn-search"><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                        </ul>
    
                        <ul class="nav navbar-right float-right list-inline">
                            <li class="dropdown d-none d-sm-block">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light notification-icon-box" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-bell"></i> <span class="badge badge-xs badge-danger"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg">
                                    <li class="text-center notifi-title">Notification <span class="badge badge-xs badge-success">3</span></li>
                                    <li class="list-group">
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-heading">Your order is placed</div>
                                                <p class="m-0">
                                                <small>Dummy text of the printing and typesetting industry.</small>
                                                </p>
                                            </div>
                                        </a>
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-body clearfix">
                                                <div class="media-heading">New Message received</div>
                                                <p class="m-0">
                                                    <small>You have 87 unread messages</small>
                                                </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-body clearfix">
                                                <div class="media-heading">Your item is shipped.</div>
                                                <p class="m-0">
                                                    <small>It is a long established fact that a reader will</small>
                                                </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- last list item -->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <small class="text-primary">See all notifications</small>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="d-none d-sm-block">
                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light notification-icon-box"><i class="mdi mdi-fullscreen"></i></a>
                            </li>
                            
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                    <img src="assets/public/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle">
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)" class="dropdown-item"> <?php echo $_SESSION['username'] ?></a></li>
                                    <li><a href="javascript:void(0)" class="dropdown-item"><span class="badge badge-success float-right">5</span> Settings </a></li>
                                    <li><a href="javascript:void(0)" class="dropdown-item"> Lock screen</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a href="action/logout-action.php" class="dropdown-item"> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <?php
                            $query = mysqli_query($conn, "SELECT DISTINCT b.name Menu, b.code MenuCode FROM gp_menu_sub_menu a INNER JOIN gp_menu b ON a.menu = b.code INNER JOIN gp_sub_menu c ON a.sub_menu = c.code INNER JOIN gp_user_access d ON a.id = d.menu_sub_menu WHERE d.username='".$_SESSION['username']."'");
                            while($rows = mysqli_fetch_array($query)){
                                echo '
                                <ul>
                                    <li class="has_sub">
                                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table"></i><span> '.$rows['Menu'].' </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                ';
                        ?>
                        <?php
                            $query1 = mysqli_query($conn, "SELECT DISTINCT c.name SubMenu, c.code SubMenuCode FROM gp_menu_sub_menu a INNER JOIN gp_menu b ON a.menu = b.code INNER JOIN gp_sub_menu c ON a.sub_menu = c.code INNER JOIN gp_user_access d ON a.id = d.menu_sub_menu WHERE d.username='".$_SESSION['username']."' AND b.code = '".$rows['MenuCode']."'");
                            while($rows1 = mysqli_fetch_array($query1)){
                                echo '
                                        <li><a href="'.$rows1['SubMenuCode'].'.php">'.$rows1['SubMenu'].'</a></li>
                                ';
                            }
                        ?>

                        <?php
                        echo'
                                </ul>
                                    </li>
                                </ul>
                                ';
                            }
                        ?>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">Total Subscription</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-down text-danger m-r-10"></i><b>8952</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b>48%</b> From Last 24 Hours</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">Order Status</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-up text-success m-r-10"></i><b>6521</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b>42%</b> Orders in Last 10 months</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">Unique Visitors</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-up text-success m-r-10"></i><b>452</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b>22%</b> From Last 24 Hours</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">Monthly Earnings</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-down text-danger m-r-10"></i><b>5621</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b>35%</b> From Last 1 Month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0">Email Sent</h4>

                                            <ul class="list-inline widget-chart m-t-20 text-center">
                                                <li>
                                                    <h4 class=""><b>3654</b></h4>
                                                    <p class="text-muted m-b-0">Marketplace</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>954</b></h4>
                                                    <p class="text-muted m-b-0">Last week</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>8462</b></h4>
                                                    <p class="text-muted m-b-0">Last Month</p>
                                                </li>
                                            </ul>

                                            <div id="morris-donut-example" style="height: 300px"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0">Revenue</h4>

                                            <ul class="list-inline widget-chart m-t-20 text-center">
                                                <li>
                                                    <h4 class=""><b>5248</b></h4>
                                                    <p class="text-muted m-b-0">Marketplace</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>321</b></h4>
                                                    <p class="text-muted m-b-0">Last week</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>964</b></h4>
                                                    <p class="text-muted m-b-0">Last Month</p>
                                                </li>
                                            </ul>

                                            <div id="morris-bar-example" style="height: 300px"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0">Email Sent</h4>

                                            <ul class="list-inline widget-chart m-t-20 text-center">
                                                <li>
                                                    <h4 class=""><b>3654</b></h4>
                                                    <p class="text-muted m-b-0">Marketplace</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>954</b></h4>
                                                    <p class="text-muted m-b-0">Last week</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>8462</b></h4>
                                                    <p class="text-muted m-b-0">Last Month</p>
                                                </li>
                                            </ul>

                                            <div id="morris-area-example" style="height: 300px"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-b-30 m-t-0">Recent Contacts</h4>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover m-b-0">
                                                            <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-b-30 m-t-0">Goal Completion</h4>

                                            <p class="font-600 m-b-5">Add Product to cart <span class="text-primary float-right"><b>80%</b></span></p>
                                            <div class="progress  m-b-20">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                                </div><!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->

                                            <p class="font-600 m-b-5">Complete Purchases <span class="text-primary float-right"><b>50%</b></span></p>
                                            <div class="progress  m-b-20">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                                </div><!-- /.progress-bar .progress-bar-pink -->
                                            </div><!-- /.progress .no-rounded -->

                                            <p class="font-600 m-b-5">Visit Premium plan <span class="text-primary float-right"><b>70%</b></span></p>
                                            <div class="progress  m-b-20">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                                </div><!-- /.progress-bar .progress-bar-info -->
                                            </div><!-- /.progress .no-rounded -->

                                            <p class="font-600 m-b-5">Send Inquiries <span class="text-primary float-right"><b>65%</b></span></p>
                                            <div class="progress  m-b-20">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;">
                                                </div><!-- /.progress-bar .progress-bar-warning -->
                                            </div><!-- /.progress .no-rounded -->

                                            <p class="font-600 m-b-5">Monthly Purchases <span class="text-primary float-right"><b>25%</b></span></p>
                                            <div class="progress  m-b-20">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                                </div><!-- /.progress-bar .progress-bar-warning -->
                                            </div><!-- /.progress .no-rounded -->

                                            <p class="font-600 m-b-5"> Daily Visits<span class="text-primary float-right"><b>40%</b></span></p>
                                            <div class="progress  m-b-0">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                </div><!-- /.progress-bar .progress-bar-success -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div><!-- container-fluid -->


                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                     © 2016 - 2018 Appzia - All Rights Reserved.
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


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

        <!--Morris Chart-->
        <script src="assets/public/plugins/morris/morris.min.js"></script>
        <script src="assets/public/plugins/raphael/raphael-min.js"></script>

        <script src="assets/public/pages/dashborad.js"></script>

        <script src="assets/public/js/app.js"></script>

    </body>
</html>
