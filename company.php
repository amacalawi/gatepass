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

        <!-- Sweet Alert -->
        <link href="assets/public/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">

        <!-- DataTables -->
        <link href="assets/public/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/public/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/public/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/public/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/public/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/public/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="assets/public/images/favicon.ico">

        <link href="assets/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/public/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/public/css/style.css" rel="stylesheet" type="text/css">

        <link href="assets/private/css/company.css" rel="stylesheet" type="text/css">

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
                            <h4 class="page-title">Company</h4>
                        </div>
                    </div>
                    <div class="page-content-wrapper ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div id="alert-success">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="m-b-30 m-t-0">
                                            	<span data-toggle="modal" data-target="#maintenance-width-modal">
                                            		<a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Add"><span class="mdi mdi-shape-circle-plus btn btn-primary"></span></a>
                                            	</span>
                                            </h4>
											<div class="row">
                                                <div class="col-lg-12 col-sm-12 col-12">
                                                    <div class="table-responsive">
                                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th>Code</th>
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End Row -->

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

        <!-- modal content -->
        <div id="maintenance-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="maintenance-width-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content card">
                    <div class="modal-header">
                        <h4 class="page-title" id="maintenance-width-modalLabel">Form -  Add</h4>
                        <input id="id" name="id" type="hidden" value="0" autocomplete="off" />
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
						<div class="col-sm-12 col-xs-12">
                            <div class="m-t-20">
                                <form id="form-maintenance" action="#" method="POST">

                                    <div class="form-group">
                                        <label>Code</label>
                                        <div>
                                            <input id="code" name="code" type="text" class="form-control" required data-parsley-minlength="4" placeholder="Min 4 chars." autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <div>
                                            <input id="name" name="name" type="text" class="form-control" required data-parsley-minlength="4" placeholder="Max 4 chars." autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Desc</label>
                                        <div>
                                            <input id="description" name="description" type="text" class="form-control" data-parsley-maxlength="100" placeholder="Type Something" autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="form-group m-b-0">
                                        <div>
                                            <button id="btn-save" name="btn-save" type="button" class="btn btn-success waves-effect waves-light"><span class="ti-save"></span></button>
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal"><span class="ti-close"></span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

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

        <!-- Required datatable js-->
        <script src="assets/public/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/public/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <script src="assets/public/js/app.js"></script>

        <script type="text/javascript" src="assets/public/plugins/parsleyjs/parsley.min.js"></script>

        <!-- Sweet-Alert  -->
        <script src="assets/public/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>        

        <script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
		</script>

		<script src="assets/private/js/company.js" type="text/javascript"></script>
    </body>
</html>