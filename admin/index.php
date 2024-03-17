<?php


function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}



require_once('../lib/functions.php');

$db    =    new login_function();
$message =    "";

$email = "";

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['user_email'])) {
    $user = $_SESSION['user_email'];

    debug_to_console($user);
    $email = $user;
    check_user($user);
} else {




    header("Location: ../login");
    exit();
}



function check_user($user)
{

    require_once('../lib/functions.php');

    $db    =    new login_function();
    $message =    "";

    debug_to_console($user);

    $db_vale    =    array();
    $db_vale = $db->forget($user);


    if ($db_vale['active'] != "") {


        if ($db_vale['active'] == "0") {
        }


        if ($db_vale['active'] == "1") {

            $message    =    11;
            unset($_SESSION['user_type']);
            unset($_SESSION['user_email']);
            header("Location: ../login");
            exit();
        }

        if ($db_vale['active'] == "2") {
            $message    =    12;
            unset($_SESSION['user_type']);
            unset($_SESSION['user_email']);
            header("Location: ../login");
            exit();
        }


        if ($db_vale['active'] == "3") {
            $message    =    13;
            unset($_SESSION['user_type']);
            unset($_SESSION['user_email']);
            header("Location: ../login");
            exit();
        }
    } else {
        $message    =    2;

        header("Location: ../login");
        exit();
    }
}








$name          =                          "";


$data    =    array();
$data    =    $db->get_user_id($email);

if (!empty($data)) {





    $name                         =              $data[1];

    if (!isset($_SESSION)) {
        session_start();
    }

    $_SESSION['user_name'] = $name;
}





$da1    =    $db->dashboard_student($email);
$da2    =    $db->dashboard_teacher($email);
$da3    =    $db->dashboard_admin($email);
$da4    =    $db->dashboard_class($email);

$da5    =    $db->dashboard_a_all_operator($email);
$da6    =    $db->dashboard_a_all_a_operator($email);

$da7 =  $da5 - $da6;

$da8    =    $db->dashboard_a_all_admin($email);


$time1 = strtotime("-1 year", time());
$newDate = date("Y-m-d", $time1);



$newDate1 = date('Y-m-d', strtotime('-1 month'));





?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">




        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HASSC Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link" href="teacher">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>All Teacher</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="class_list">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Class</span>
                </a>

            </li>


            <li class="nav-item">
                <a class="nav-link" href="subject_list/addsubject.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Add Subject</span>
                </a>

            </li>



            <li class="nav-item">
                <a class="nav-link" href="subject_list">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Class Subject</span>
                </a>

            </li>




            <li class="nav-item">
                <a class="nav-link" href="teacher_add_list">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Add Teacher</span>
                </a>

            </li>




            <li class="nav-item">
                <a class="nav-link" href="techaer_assign_list">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Teacher Assign</span>
                </a>

            </li>




            <li class="nav-item">
                <a class="nav-link" href="class_duration">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Class Duration</span>
                </a>

            </li>


            <li class="nav-item">

                <a class="nav-link" href="class_routine">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Create Class Routine</span>
                </a>



            </li>


            <li class="nav-item">
                <a class="nav-link" href="student">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>All Student </span>
                </a>

            </li>


            <li class="nav-item">
                <a class="nav-link" href="teacher_routine">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Teacher Routine</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_routine">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Admin Routine</span>
                </a>

            </li>












            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="profile">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Profile</span>
                </a>
            </li>

            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                All Student
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                                <?php echo $da1 ?>

                                            </div>
                                        </div>



                                        <a class="col-auto" href="#">
                                            <i class="fas fa-file-export fa-2x"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                All Teacher
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $da2 ?> </div>
                                        </div>
                                        <a class="col-auto" href="#">
                                            <i class="fas fa-file-export fa-2x "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                All Admin
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $da3 ?> </div>
                                        </div>
                                        <a class="col-auto" href="#">
                                            <i class="fas fa-file-export fa-2x "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                All Class
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $da4 ?> </div>
                                        </div>
                                        <a class="col-auto" href="#">
                                            <i class="fas fa-file-export fa-2x "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->

                        <!-- Content Row -->


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->

                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">�</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="../login?logout=1">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>