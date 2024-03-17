<?php
function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

require_once('../../lib/functions.php');

$db    =    new login_function();
$message =    "";
debug_to_console("abc1");

$user_name = "";
$user1 = "";
$email = "";
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['user_email'])) {
    $user = $_SESSION['user_email'];
    $user_name = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];
    $user1 = $user;
} else {


    debug_to_console("error1");

    header("Location: ../../login");
    exit();
}



if (isset($_GET['teacher_id'])) {


    debug_to_console("teacher_id");
    debug_to_console($_GET['teacher_id']);

    $var_class_id                    =    $_GET['teacher_id'];
    $_SESSION['session_class_id']    =    $var_class_id;
} else if (isset($_SESSION['session_class_id'])) {
    $var_class_id    =    $_SESSION['session_class_id'];
}



$e1_class_name =  $db->get_class_name1($var_class_id);
$all_asigned_teachers =  $db->get_assigned_teacher_e($var_class_id);

$e1_get_class_duration =  $db->get_class_duration1();

debug_to_console("class_duration");
debug_to_console($e1_get_class_duration);

$time = strtotime($e1_get_class_duration);

$endTime = date("h:i", strtotime('+40 minutes', $time));
$time1 = strtotime($endTime);
$endTime1 = date("h:i", strtotime('+40 minutes', $time1));
$time2 = strtotime($endTime1);

$endTime2 = date("h:i", strtotime('+40 minutes', $time2));
$time3 = strtotime($endTime2);


$endTime3 = date("h:i", strtotime('+40 minutes', $time3));
$time4 = strtotime($endTime3);


$endTime3_1 = date("h:i", strtotime('+20 minutes', $time4));
$time4_1 = strtotime($endTime3_1);



$endTime4 = date("h:i", strtotime('+40 minutes', $time4_1));
$time5 = strtotime($endTime4);





$endTime5 = date("h:i", strtotime('+40 minutes', $time5));
$time6 = strtotime($endTime5);

$endTime6 = date("h:i", strtotime('+40 minutes', $time6));
$time7 = strtotime($endTime6);


$endTime7 = date("h:i", strtotime('+40 minutes', $time7));
debug_to_console($endTime);


$duration = $e1_get_class_duration . '-' . $endTime;
$duration1 = $endTime . '-' . $endTime1;
$duration2 = $endTime1 . '-' . $endTime2;



$duration3 = $endTime2 . '-' . $endTime3;



$duration4 = $endTime3_1 . '-' . $endTime4;




$duration5 = $endTime4 . '-' . $endTime5;
$duration6 = $endTime5 . '-' . $endTime6;
$duration7 = $endTime6 . '-' . $endTime7;







?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Operator dashboard</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>


    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            color: black;
        }
    </style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../sidebar.html'; ?>

        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>





                    <!-- Topbar Search -->
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">





                        <div class="topbar-divider d-none d-sm-block"></div>


                        <li class="nav-item" style="margin-top: 20px;">





                            <Button onclick="printDiv()">
                                <span style="color:red" class="mr-2 d-none d-lg-inline ">
                                    Print</span>

                            </Button>
                            <!-- Dropdown - User Information -->

                        </li>

                        <li class="nav-item " style="margin-top: 20px;">

                            <!-- Dropdown - User Information -->

                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">





                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $user_name ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../profile">
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
                <div class="container-fluid" id="printing">


                    <!-- Page Heading -->



                    <h2 style="color:black;font-weight: bold; text-align: center;">Hazi Abdus sattas School & College</h2>


                    <h2 style="color:black;font-weight: bold;text-align: center">Sreepur, Gazipur</h2>

                    <h2 style="color:black;text-align: center">Teacher Routine for <u><?php echo $_GET['teacher_id']; ?></u></h2>


                    <!-- DataTales Example -->

                    <div class=" p-4">



                        <div style="width: 80%;margin: auto;">

                            <table class="m-1" style="width: 100%;">
                                <tr>
                                    <th style="color:black;text-align: center display:block">Period</th>
                                    <th rowspan="2" style="color:black;text-align: center">
                                        1st
                                        <br>
                                        <?php //echo $duration; 
                                        ?>

                                    </th>
                                    <th rowspan="2" style="color:black;text-align: center">
                                        2nd
                                        <br>
                                        <?php //echo $duration1; 
                                        ?>
                                    </th>
                                    </th>

                                    <th rowspan="2" style="color:black;text-align: center">
                                        3rd
                                        <br>
                                        <?php //echo $duration2; 
                                        ?>
                                    </th>
                                    <th rowspan="2" style="color:black;text-align: center">
                                        4th
                                        <br>
                                        <?php //echo $duration3; 
                                        ?>
                                    </th>

                                    </th>
                                    <th rowspan="8" style="color:black;text-align: center;writing-mode: vertical-rl;">
                                        TIFFIN
                                    </th>

                                    <th rowspan="2" style="color:black;text-align: center">
                                        5th
                                        <br>
                                        <?php //echo $duration4; 
                                        ?>
                                    </th>
                                    <th rowspan="2" style="color:black;text-align: center">
                                        6th
                                        <br>
                                        <?php //echo $duration5; 
                                        ?>
                                    </th>
                                    <th rowspan="2" style="color:black;text-align: center">
                                        7th
                                        <br>
                                        <?php //echo $duration6; 
                                        ?>
                                    </th>

                                </tr>


                                <tr>
                                    <th style="color:black;text-align: center">Day</th>
                                </tr>

                                <tr>
                                    <th style="color:black;text-align: center"> Sat</th>


                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'saturday' && $ttc[9] == '1') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'saturday' && $ttc[9] == '2') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'saturday' && $ttc[9] == '3') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'saturday' && $ttc[9] == '4') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'saturday' && $ttc[9] == '5') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'saturday' && $ttc[9] == '6') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'saturday' && $ttc[9] == '7') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>


                                </tr>

                                <tr>
                                    <th style="color:black;text-align: center"> Sun</th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'sunday' && $ttc[9] == '1') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'sunday' && $ttc[9] == '2') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'sunday' && $ttc[9] == '3') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'sunday' && $ttc[9] == '4') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'sunday' && $ttc[9] == '5') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'sunday' && $ttc[9] == '6') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'sunday' && $ttc[9] == '7') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                </tr>

                                <tr>
                                    <th style="color:black;text-align: center"> Mon</th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'monday' && $ttc[9] == '1') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'monday' && $ttc[9] == '2') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'monday' && $ttc[9] == '3') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'monday' && $ttc[9] == '4') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'monday' && $ttc[9] == '5') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'monday' && $ttc[9] == '6') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'monday' && $ttc[9] == '7') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                </tr>

                                <tr>
                                    <th style="color:black;text-align: center"> Tue</th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'tuesday' && $ttc[9] == '1') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'tuesday' && $ttc[9] == '2') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'tuesday' && $ttc[9] == '3') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'tuesday' && $ttc[9] == '4') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'tuesday' && $ttc[9] == '5') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'tuesday' && $ttc[9] == '6') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'tuesday' && $ttc[9] == '7') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                </tr>

                                <tr>
                                    <th style="color:black;text-align: center"> Wed</th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'wednesday' && $ttc[9] == '1') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'wednesday' && $ttc[9] == '2') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'wednesday' && $ttc[9] == '3') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'wednesday' && $ttc[9] == '4') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'wednesday' && $ttc[9] == '5') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'wednesday' && $ttc[9] == '6') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'wednesday' && $ttc[9] == '7') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                </tr>

                                <tr>
                                    <th style="color:black;text-align: center"> Thu</th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'thursday' && $ttc[9] == '1') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'thursday' && $ttc[9] == '2') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'thursday' && $ttc[9] == '3') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'thursday' && $ttc[9] == '4') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'thursday' && $ttc[9] == '5') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'thursday' && $ttc[9] == '6') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                    <th style="color:black;text-align: center">
                                        <?php
                                        foreach ($all_asigned_teachers as $ttc) {
                                            if ($ttc[10] == 'thursday' && $ttc[9] == '7') {
                                                echo $ttc[2];
                                            }
                                        } ?>
                                    </th>

                                </tr>


                            </table>

                            <div style="padding-top:10px">
                                <p>Total Number of Classes Per Week :- <?php
                                    $class = array();
                                    foreach ($all_asigned_teachers as $ttc) {
                                        $class[] = $ttc[2];
                                    }
                                    echo count($class); ?></p>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">

        </div>
    </footer>
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
                    <a class="btn btn-primary" href="../../login?logout=1">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script>
        function ExportToExcel() {
            TableToExcel.convert(document.getElementById("dataTable"), {
                name: "routine.xlsx"
            });
        }


        function AddStudent() {
            window.location.href = "../addclass";
        }


        function printDiv() {
            //Get the HTML of div
            var divElements = document.getElementById("printing").innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;
            //Reset the page's HTML with div's HTML only
            document.body.innerHTML =
                "<html><head><title></title></head><body>" +
                divElements + "</body>";
            //Print Page
            window.print();
            //Restore orignal HTML
            document.body.innerHTML = oldPage;

        }
    </script>

</body>

</html>
