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




$user1 = "";
$user_name = "";
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['user_email'])) {
    $user = $_SESSION['user_email'];
    $user_name = $_SESSION['user_name'];

    $user1 = $user;
} else {




    header("Location: ../../login");
    exit();
}




$email =    $user1;





if (isset($_POST['submit'])) {
    $e1_teacher_id        = $_POST['teacher_id'];
    $e1_priority_id        = $_POST['priority_id'];
    $e1_subject_id        = $_POST['subject_id'];
    $e1_class_id       = implode(",", $_POST['class_id']);
    $e1_performance_type        = $_POST['performance_type'];


    $e1_teacher_name =  $db->get_techer_name1($e1_teacher_id);


    $check_data =  $db->check_techer($e1_teacher_id, $e1_subject_id);


    debug_to_console("value");
    debug_to_console($check_data);

    if ($check_data != "") {
        $message    =    3;
    } else {




        if ($db->add_add_techer_new($e1_class_id, $e1_performance_type, $e1_teacher_id, $e1_priority_id, $e1_subject_id, $e1_teacher_name)) {


            $message    =    1;
        } else {

            $message    =    2;
        }
    }
} //end


?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin profileedit</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../sidebar.html'; ?>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user_name ?></span>
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Techer</h1>

                    </div>


                    <form action="index.php" method="post" name="myForm" enctype="multipart/form-data" autocomplete="off">




                        <?php
                        if ($message == 2) {
                        ?>
                            <div class="alert alert-success">
                                Failed try Again!!!
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($message == 1) {
                        ?>
                            <div class="alert alert-success">
                                Successfully Added!!!
                            </div>
                        <?php
                        }
                        ?>


                        <?php
                        if ($message == 3) {
                        ?>
                            <div class="alert alert-success">
                                Already Assign!
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($message == 4) {
                        ?>
                            <div class="alert alert-success">
                                Already Assign Class!
                            </div>
                        <?php
                        }
                        ?>





                        <div class="col">
                            <div class="form-outline">

                                <select name="teacher_id" id="s2" class="form-control">



                                    <?php
                                    $data    =    array();
                                    $data    =    $db->get_teacher();

                                    if (!empty($data)) {
                                        $counter = 0;
                                        foreach ($data as $record) {

                                            $e1                                         =    $record[0];
                                            $e2                         =              $record[1];
                                            $e3                                 =  $record[2];
                                            $e4                                     =    $record[3];
                                            $e5                                     =    $record[4];
                                            $e6                                     =    $record[5];
                                            $e7                                     =    $record[6];
                                            $e8                                     =    $record[7];
                                            $e9                                 =    $record[8];
                                            $e10                                 =    $record[9];
                                            $e11                                     =    $record[10];
                                            $e12                                     =    $record[11];
                                            $e13                                     =    $record[12];
                                            $e14                                     =    $record[13];
                                            $e15                                     =    $record[14];
                                            $e16                                     =    $record[15];
                                            $e17                                     =    $record[16];
                                            $e18                                     =    $record[17];
                                            $e19                                     =    $record[18];
                                            $e20                                     =    $record[19];
                                            $e21                                     =    $record[20];
                                            $e22                                     =    $record[21];




                                    ?>
                                            <option value=<?php echo $e1; ?>><?php echo $e2.$e3; ?></option>

                                    <?php
                                            $counter++;
                                        }
                                    }
                                    ?>







                                </select>

                                <label class="form-label" for="username">Teacher</label>


                            </div>
                        </div>



                        <div class="col">
                            <div class="form-outline">
                                <select name="priority_id" id="s2" class="form-control">

                                    <option value="1">High</option>
                                    <option value="2">Medium</option>
                                    <option value="3">Low</option>
                                    <option value="4">Any</option>



                                </select>

                                <label class="form-label" for="username">Priority</label>

                            </div>
                        </div>





                        <div class="col">
                            <div class="form-outline">

                                <select name="subject_id" id="s2" class="form-control">



                                    <?php
                                    $data    =    array();
                                    $data    =    $db->get_subject_new2();

                                    if (!empty($data)) {
                                        $counter = 0;
                                        foreach ($data as $record) {

                                            $e1                                         =    $record[0];
                                            $e2                         =              $record[1];






                                    ?>
                                            <option value=<?php echo $e1; ?>><?php echo $e2; ?></option>

                                    <?php
                                            $counter++;
                                        }
                                    }
                                    ?>







                                </select>

                                <label class="form-label" for="username">Select Subject</label>


                            </div>
                        </div>

                        <div class="col">
                            <div class="form-outline">
                                <select name="performance_type" onchange="performance(this.value)" id="performanceid" class="form-control">

                                    <option value="1">No</option>
                                    <option value="2">Yes</option>




                                </select>

                                <label class="form-label" for="username">Preference</label>

                            </div>
                        </div>
                        <div id="chosen">
                            <div class="col">
                                <div class="form-outline">

                                    <select name="class_id[]" id="s2" class="form-control chosen-select" multiple="multiple">


                                        <option value="1">Period  1</option>
                                        <option value="2">Period  2</option>
                                        <option value="3">Period  3</option>
                                        <option value="4">Period  4</option>
                                        <option value="5">Period  5</option>
                                        <option value="6">Period  6</option>
                                        <option value="7">Period  7</option>
                                        <option value="8">Period  8</option>







                                    </select>

                                    <label class="form-label" for="username">Select Class Pride</label>


                                </div>
                            </div>
                        </div>
                        <!-- Checkbox -->


                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Submit</button>

                    </form>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PKT 2022</span>
                    </div>
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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>




    <script>
        function checkPass() {
            var pass1 = document.getElementById('pass1');

            var message = document.getElementById('error-nwl');
            var goodColor = "#66cc66";
            var badColor = "#ff6666";

            if (pass1.value.length > 5) {
                //   pass1.style.backgroundColor = goodColor;
                message.style.color = goodColor;
                message.innerHTML = "character number ok!"
            } else {
                // pass1.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = " you have to enter at least 6 digit!"
                return;
            }


        }

        function login() {
            window.location.href = "../login/";
            //    $('#toast').toast('show')

            //var x = document.getElementById("snackbar");
            //x.className = "show";
            //setTimeout(function () { x.className = x.className.replace("show", ""); }, 2500);

        }

        function toast(msg) {

            //    $('#toast').toast('show')

            var x = document.getelementbyid("snackbar");
            var x1 = document.getelementbyid("snackbar").innerHTML;
            x1 = msg;

            x.classname = "show";
            settimeout(function() {
                x.classname = x.classname.replace("show", "");
            }, 2500);

        }

        function performance(id) {
            if (id == 1) {
                $("#chosen").hide();
            } else {
                $("#chosen").show();
            }
        }

        $(document).ready(function() {
            $('.chosen-select').select2();
            var id = $("#performanceid").val();
            performance(id);
        });
    </script>
</body>

</html>