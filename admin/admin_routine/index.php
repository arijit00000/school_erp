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

    $e1_class_id        = $_POST['class_id'];

    header("Location: ../Previou_routine/index.php?class_id=$e1_class_id");
    exit();
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
    <style>
      
      
        html,body{
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        }
        

    </style>
</head>

<body id="fullwidth" >

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
                         <li class="nav-item"  style="margin-top: 20px;">





                            <Button  onclick="printDiv()" >
                                <span style="color:red" class="mr-2 d-none d-lg-inline ">
                                 Print</span>
                                
                            </Button>
                            <!-- Dropdown - User Information -->
                           
                        </li>
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
                        <h1 class="h3 mb-0 text-gray-800">Admin Routine</h1>

                    </div>




                  <div class="container-fluid" id="printing">






                    <div >

                        <table cellspacing="0" border="0" style="display: block;
    overflow-x: auto;
    white-space: nowrap;">
                            <colgroup width="50"></colgroup>
                            <colgroup width="126"></colgroup>
                            <colgroup width="70"></colgroup>
                            <colgroup span="42" width="25"></colgroup>
                            <colgroup width="38"></colgroup>




                            <tr>
                                <td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=2 height="41" align="center" valign=bottom><b>
                                        <font color="#000000">SL. NO</font>
                                    </b></td>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=bottom><b>
                                        <font color="#000000">Teacher</font>
                                    </b></td>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000" rowspan=2 align="center" valign=bottom><b>
                                        <font color="#000000">Subject</font>
                                    </b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=7 align="center" valign=middle><b>
                                        <font color="#000000">SATURDAY</font>
                                    </b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=7 align="center" valign=bottom><b>
                                        <font color="#000000">SUNDAY</font>
                                    </b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 align="center" valign=bottom><b>
                                        <font color="#000000">MONDAY</font>
                                    </b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 align="center" valign=bottom><b>
                                        <font color="#000000">TUESDAY</font>
                                    </b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 align="center" valign=bottom><b>
                                        <font color="#000000">WEDNESDAY</font>
                                    </b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=7 align="center" valign=bottom><b>
                                        <font color="#000000">THURSDAY</font>
                                    </b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" rowspan=2 align="center" valign=middle><b>
                                        <font color="#000000">Total</font>
                                    </b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="1" sdnum="1033;"><b>
                                        <font color="#000000">1</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="2" sdnum="1033;"><b>
                                        <font color="#000000">2</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="3" sdnum="1033;"><b>
                                        <font color="#000000">3</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="4" sdnum="1033;"><b>
                                        <font color="#000000">4</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="5" sdnum="1033;"><b>
                                        <font color="#000000">5</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="6" sdnum="1033;"><b>
                                        <font color="#000000">6</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle sdval="7" sdnum="1033;"><b>
                                        <font color="#000000">7</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="1" sdnum="1033;"><b>
                                        <font color="#000000">1</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="2" sdnum="1033;"><b>
                                        <font color="#000000">2</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="3" sdnum="1033;"><b>
                                        <font color="#000000">3</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="4" sdnum="1033;"><b>
                                        <font color="#000000">4</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="5" sdnum="1033;"><b>
                                        <font color="#000000">5</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="6" sdnum="1033;"><b>
                                        <font color="#000000">6</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="7" sdnum="1033;"><b>
                                        <font color="#000000">7</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="1" sdnum="1033;"><b>
                                        <font color="#000000">1</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="2" sdnum="1033;"><b>
                                        <font color="#000000">2</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="3" sdnum="1033;"><b>
                                        <font color="#000000">3</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="4" sdnum="1033;"><b>
                                        <font color="#000000">4</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="5" sdnum="1033;"><b>
                                        <font color="#000000">5</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="6" sdnum="1033;"><b>
                                        <font color="#000000">6</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="7" sdnum="1033;"><b>
                                        <font color="#000000">7</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="8" sdnum="1033;"><b>
                                        <font color="#000000">1</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="9" sdnum="1033;"><b>
                                        <font color="#000000">2</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="10" sdnum="1033;"><b>
                                        <font color="#000000">3</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="11" sdnum="1033;"><b>
                                        <font color="#000000">4</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="12" sdnum="1033;"><b>
                                        <font color="#000000">5</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="13" sdnum="1033;"><b>
                                        <font color="#000000">6</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="14" sdnum="1033;"><b>
                                        <font color="#000000">7</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="15" sdnum="1033;"><b>
                                        <font color="#000000">1</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="16" sdnum="1033;"><b>
                                        <font color="#000000">2</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="17" sdnum="1033;"><b>
                                        <font color="#000000">3</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="18" sdnum="1033;"><b>
                                        <font color="#000000">4</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="19" sdnum="1033;"><b>
                                        <font color="#000000">5</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="20" sdnum="1033;"><b>
                                        <font color="#000000">6</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="21" sdnum="1033;"><b>
                                        <font color="#000000">7</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="22" sdnum="1033;"><b>
                                        <font color="#000000">1</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="23" sdnum="1033;"><b>
                                        <font color="#000000">2</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="24" sdnum="1033;"><b>
                                        <font color="#000000">3</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="25" sdnum="1033;"><b>
                                        <font color="#000000">4</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="26" sdnum="1033;"><b>
                                        <font color="#000000">5</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="27" sdnum="1033;"><b>
                                        <font color="#000000">6</font>
                                    </b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="center" valign=bottom sdval="28" sdnum="1033;"><b>
                                        <font color="#000000">7</font>
                                    </b></td>
                            </tr>



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

                                             <tr>
                                           <?php
                                               $total_c=0;
                                         for ($i1 = 0; $i1 <= 45; $i1++) {
                                         
                                           //  echo $i1;

                                            ?>

                                            <td style="border-top: 2px solid 
                #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; 
                border-right: 1px solid #000000" height="20" align="center" valign=bottom sdval="1" sdnum="1033;">
                                                                <font color="#000000">
                                             


                                                                




                                                                
                                                                  <?php
                                                                  if($i1==0)
                                                                  {

                                                                  
                                                                    ?>

                                                                  <?php
                                                                  
                                                                  $counter1=$counter+1;
                                                                  echo $counter1  ?>

                                                                  <?php
                                                                

                                                                  }
                                                                    ?>




                                                                   <?php
                                                                  if($i1==1)
                                                                  {

                                                                  
                                                                    ?>

                                                                   <?php echo $e2.$e3 ?>

                                                                  <?php
                                                                

                                                                  }
                                                                    ?>



                                                                  <?php
                                                                  if($i1==2)
                                                                  {


                                                                     //  $response1 = array();

                                                                       $response1 =  $db->get_admin_teacher($e1);
                                                                  
                                                                    ?>

                                                                     <?php
                                                                     
                                                                     if($response1=="ANY")
                                                                     {
                                                                          echo $response1;
    
                                                                     }
                                                                     else {
                                                                         


                                                                          $e1_subject_name =  $db->get_subject_name2($response1);
                                                                          echo $e1_subject_name;
	
                                                                        }

                                                                     
                                                                     
                                                                    
                                                                     
                                                                     
                                                                     ?>

                                                                  <?php
                                                                

                                                                  }
                                                                    ?>




                                                                 <?php
                                                                  if($i1>=3 &&  $i1<=9)
                                                                  {
                                                                      
                                                    
                                                    
                                                                   $response1 = array();

                                                                   $i1_a=$i1-2;

                                                                    $response1 =  $db->get_class_routine_value11($i1_a, "saturday", $e1);

                                                                    if (!empty($response1)) {
                                                                        echo $db->get_class_name1($response1["teacher"]);
                                                                        $total_c++;
                                                                    } else {
                                                                        echo "NA";
                                                                    }


                                                                   ?>






                                                                   <?php
                                                                

                                                                  }
                                                                    ?>







                                                                 <?php
                                                                  if($i1>=10 &&  $i1<=16)
                                                                  {



                                                                   $response1 = array();
                                                                   $i1_a=$i1-9;
                                                                    $response1 =  $db->get_class_routine_value11($i1_a, "sunday", $e1);

                                                                    if (!empty($response1)) {
                                                                        echo $db->get_class_name1($response1["teacher"]);
                                                                           $total_c++;
                                                                    } else {
                                                                        echo "NA";
                                                                    }


                                                                   ?>






                                                                   <?php
                                                                

                                                                  }
                                                                    ?>




                                                                 <?php
                                                                  if($i1>=17 &&  $i1<=23)
                                                                  {



                                                                   $response1 = array();
                                                                         $i1_a=$i1-16;
                                                                    $response1 =  $db->get_class_routine_value11($i1_a, "monday", $e1);

                                                                    if (!empty($response1)) {
                                                                        echo $db->get_class_name1($response1["teacher"]);
                                                                           $total_c++;
                                                                    } else {
                                                                        echo "NA";
                                                                    }


                                                                   ?>






                                                                   <?php
                                                                

                                                                  }
                                                                    ?>





                                                                 <?php
                                                                  if($i1>=24 &&  $i1<=30)
                                                                  {



                                                                   $response1 = array();
                                                                       $i1_a=$i1-23;
                                                                    $response1 =  $db->get_class_routine_value11($i1_a, "tuesday", $e1);

                                                                    if (!empty($response1)) {
                                                                        echo $db->get_class_name1($response1["teacher"]);
                                                                           $total_c++;
                                                                    } else {
                                                                        echo "NA";
                                                                    }


                                                                   ?>






                                                                   <?php
                                                                

                                                                  }
                                                                    ?>

                                                                       <?php
                                                                  if($i1>=31 &&  $i1<=37)
                                                                  {



                                                                   $response1 = array();
                                                                      $i1_a=$i1-30;
                                                                    $response1 =  $db->get_class_routine_value11($i1_a, "wednesday", $e1);

                                                                    if (!empty($response1)) {
                                                                        echo $db->get_class_name1($response1["teacher"]);
                                                                           $total_c++;
                                                                    } else {
                                                                        echo "NA";
                                                                    }


                                                                   ?>





                                                                   
                                                                   <?php
                                                                

                                                                  }
                                                                    ?>

                                                                  <?php
                                                                  if($i1>=38 &&  $i1<=44)
                                                                  {



                                                                   $response1 = array();
                                                                      $i1_a=$i1-37;
                                                                    $response1 = $db->get_class_routine_value11($i1_a, "thursday", $e1);

                                                                    if (!empty($response1)) {
                                                                        echo $db->get_class_name1($response1["teacher"]);
                                                                           $total_c++;
                                                                    } else {
                                                                        echo "NA";
                                                                    }


                                                                   ?>







                                                                   <?php
                                                                

                                                                  }
                                                                    ?>








                                                                    
                                                                  <?php
                                                                  if($i1==45)
                                                                  {

                                                                  
                                                                    ?>

                                                                  <?php
                                                                  
                                                                 // $counter1=$counter+1;
                                                                  echo $total_c  ?>

                                                                  <?php
                                                                

                                                                  }
                                                                    ?>



                                                
                                                </font>
                                            </td>


                                          <?php

                                         }


                                         
                                           ?>

                                             </tr>
                                           <?php


                                      $counter++;
									}
                                }


                            ?>



                            
                        </table>
                    </div>
                    </div>








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