<?php
function debug_to_console($data)
{
  $output = $data;
  if (is_array($output))
    $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}



require_once('../../lib/functions.php');

$db  =  new login_function();
$message =  "";
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



if (isset($_GET['class_id'])) {


  debug_to_console("class_id");
  debug_to_console($_GET['class_id']);

  $var_class_id          =  $_GET['class_id'];
  $_SESSION['session_class_id']  =  $var_class_id;
} else if (isset($_SESSION['session_class_id'])) {
  $var_class_id  =  $_SESSION['session_class_id'];
}



$e1_class_name =  $db->get_class_name1($var_class_id);



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








$tasks = array();
$tasks1 = array();


$data  =  $db->get_subject_new1($var_class_id);


if (empty($data)) {
}


if (!empty($data)) {
  $counter = 0;
  $counter2 = 0;

  $row = 0;
  $col = 0;
  foreach ($data as $record) {

    $e1_1                             =  $record[0];
    $e2_1                               =    $record[1];
    $e3_1                               =  $record[2];
    $e4_1                             =  $record[3];
    $e5_1                             =  $record[4];
    $e6_1                             =  $record[5];
    $e7_1                             =  $record[6];
    $e8_1                             =  $record[7];





    //  debug_to_console($e7_1);
    debug_to_console($e8_1); //subject id




    $data1 = $db->get_allowacate_teacher($var_class_id, $e8_1);

    if (!empty($data)) {
      $counter1 = 0;

      foreach ($data1 as $record1) {

        $e1                             =  $record1[0];
        $e2                                 =    $record1[1];
        $e3                               =  $record1[2];
        $e4                             =  $record1[3];
        $e5                             =  $record1[4];
        $e6                             =  $record1[5];
        $e7                             =  $record1[6];
        $e8                             =  $record1[7];
        $e9                             =  $record1[8];



        debug_to_console("tecaher");
        debug_to_console($e6);


        $count = $db->get_count_techer($var_class_id, $e8_1);
        $count1 = $db->get_avalibale_v2($var_class_id, $e8_1);

        //  $quotient = (int)(10/3)

        if ($count == $count1) {
        } else {



          $divident = (int)($e7_1 / $count);
          debug_to_console($divident);



          for ($k1 = 0; $k1 < $divident; $k1++) {

            $tasks[$counter2] = $e6;
            $tasks1[$counter2] = $e8_1;
            debug_to_console("count");
            debug_to_console($counter2);
            $counter2++;

            //  tasks.push({firstName: firstName.value, lastName: lastName.value, DOB: dateofBirth.toString()});

          }
        }
      }
    }




    $col++;

    $counter++;
  }
}


for ($k = 0; $k < count($tasks); $k++) {

  for ($i = 0; $i <= 6; $i++) {



    for ($j = 0; $j <= 5; $j++) {
      debug_to_console("code104");

      if ($i >= 4 && $j == 5) {
      } else {

        $temp1 = $i - 1;
        $temp2 = $i + 1;



        $cond1 = "";
        $cond2 = "";
        $cond3 = "";
        $cond4 = "";
        $cond5 = "";






        $left_v =  $db->get_avalibale_left($tasks[$k], $temp1, $j);
        $right_v = $db->get_avalibale_left($tasks[$k], $temp2, $j);
        $same_v = $db->get_avalibale_left($tasks[$k], $i, $j);
        $avala_v = $db->get_avalibale_1($var_class_id, $i, $j);



        if ($left_v == "") {
        } else {

          $temp1_1 = $temp1 - 1;
          $left_v1 =  $db->get_avalibale_left($tasks[$k], $temp1_1, $j);

          if ($left_v1 == "") {
          } else {

            $cond1 = "yes";
          }
        }





        if ($right_v == "") {
        } else {

          $temp2_1 = $temp2 + 1;
          $right_v1 =  $db->get_avalibale_left($tasks[$k], $temp2_1, $j);

          if ($right_v1 == "") {
          } else {

            $cond2 = "yes";
          }
        }





        if ($left_v != "" && $right_v != "") {
          $cond3 = "yes";
        }



        if ($avala_v != "") {
          $cond4 = "yes";
        }





        if ($same_v != "") {
          $cond5 = "yes";
        }





        if ($cond1 == "yes" || $cond2 == "yes" || $cond3 == "yes" || $cond4 == "yes" || $cond5 == "yes") {




          $count1 =  $db->check_total_count($var_class_id);

          if ($count1 > 39) {
            debug_to_console("count1");
            debug_to_console($count1);
          } else {


            if ($i == 6 && $j == 4) {




              $pos_i;
              $pos_j;
              $try1 = false;

              for ($ti = 0; $ti <= 6; $ti++) {



                for ($tj = 0; $tj <= 5; $tj++) {

                  if ($ti >= 4 && $tj == 5) {
                  } else {


                    $avala_tv = $db->get_avalibale_1($var_class_id, $ti, $tj);
                    debug_to_console("Code501");
                    debug_to_console($ti);
                    debug_to_console($tj);
                    debug_to_console($avala_tv);

                    if ($avala_tv == "") {

                      $pos_i = $ti;
                      $pos_j = $tj;
                      $try1 = true;
                      break 2;
                    }
                  }
                }
              }



              if ($try1) {


                for ($ki = 0; $ki <= 6; $ki++) {



                  for ($kj = 0; $kj <= 5; $kj++) {

                    //$avala_tv= $db->get_avalibale_1($var_class_id,$ti,$tj);

                    $techer_1 =  $db->get_avalibale_teacher($var_class_id, $ki, $kj);
                    $id1 =  $db->get_avalibale_teacher_id($var_class_id, $ki, $kj);
                    $sid1 =  $db->get_avalibale_teacher_s_id($var_class_id, $ki, $kj);





                    $temp1 = $pos_i - 1;
                    $temp2 = $pos_i + 1;



                    $cond1 = "";
                    $cond2 = "";
                    $cond3 = "";
                    $cond4 = "";






                    $left_v =  $db->get_avalibale_left($techer_1, $temp1, $pos_j);
                    $right_v = $db->get_avalibale_left($techer_1, $temp2, $pos_j);
                    $same_v = $db->get_avalibale_left($techer_1, $pos_i, $pos_j);
                    $avala_v = $db->get_avalibale_1($var_class_id, $pos_i, $pos_j);



                    if ($left_v == "") {
                    } else {

                      $temp1_1 = $temp1 - 1;
                      $left_v1 =  $db->get_avalibale_left($techer_1, $temp1_1, $pos_j);

                      if ($left_v1 == "") {
                      } else {

                        $cond1 = "yes";
                      }
                    }





                    if ($right_v == "") {
                    } else {

                      $temp2_1 = $temp2 + 1;
                      $right_v1 =  $db->get_avalibale_left($techer_1, $temp2_1, $pos_j);

                      if ($right_v1 == "") {
                      } else {

                        $cond2 = "yes";
                      }
                    }





                    if ($left_v != "" && $right_v != "") {
                      $cond3 = "yes";
                    }




                    if ($same_v != "") {
                      $cond4 = "yes";
                    }





                    if ($cond1 == "yes" || $cond2 == "yes" || $cond3 == "yes" || $cond4 == "yes") {
                    } else {







                      $temp1 = $ki - 1;
                      $temp2 = $ki + 1;



                      $cond1 = "";
                      $cond2 = "";
                      $cond3 = "";
                      $cond4 = "";






                      $left_v =  $db->get_avalibale_left($tasks[$k], $temp1, $kj);
                      $right_v = $db->get_avalibale_left($tasks[$k], $temp2, $kj);
                      $same_v = $db->get_avalibale_left($tasks[$k], $pos_i, $kj);
                      $avala_v = $db->get_avalibale_1($var_class_id, $ki, $kj);


                      if ($left_v == "") {
                      } else {

                        $temp1_1 = $temp1 - 1;
                        $left_v1 =  $db->get_avalibale_left($tasks[$k], $temp1_1, $kj);

                        if ($left_v1 == "") {
                        } else {

                          $cond1 = "yes";
                        }
                      }





                      if ($right_v == "") {
                      } else {

                        $temp2_1 = $temp2 + 1;
                        $right_v1 =  $db->get_avalibale_left($tasks[$k], $temp2_1, $kj);

                        if ($right_v1 == "") {
                        } else {

                          $cond2 = "yes";
                        }
                      }





                      if ($left_v != "" && $right_v != "") {
                        $cond3 = "yes";
                      }




                      if ($same_v != "") {
                        $cond4 = "yes";
                      }








                      if ($cond1 == "yes" || $cond2 == "yes" || $cond3 == "yes" || $cond4 == "yes") {
                      } else {


                        // swapping

                        debug_to_console($i);


                        debug_to_console($ki);
                        debug_to_console($kj);
                        debug_to_console($pos_i);
                        debug_to_console($techer_1);
                        debug_to_console($sid1);
                        debug_to_console($tasks[$k]);
                        debug_to_console($tasks1[$k]);


                        $data1 =  $db->add_class_routine1($ki, $kj, $tasks[$k], $tasks1[$k], $var_class_id, $id1);



                        $data1 =  $db->add_class_routine($pos_i, $pos_j, $techer_1, $sid1, $var_class_id);
                        break 2;
                      }
                    }
                  }
                }
              }
            }
          }
        } else {
          $data1 =  $db->add_class_routine($i, $j, $tasks[$k], $tasks1[$k], $var_class_id);
          break 2;
        }
      }
    }
  }
}














// list




if (isset($_GET['class_id'])) {


  debug_to_console("class_id");
  debug_to_console($_GET['class_id']);

  $var_class_id          =  $_GET['class_id'];
  $_SESSION['session_class_id']  =  $var_class_id;
} else if (isset($_SESSION['session_class_id'])) {
  $var_class_id  =  $_SESSION['session_class_id'];
}



$e1_class_name =  $db->get_class_name1($var_class_id);

$e1_class_noclp =  $db->get_class_period($var_class_id);

$all_asigned_teachers =  $db->get_assigned_teacher_c($var_class_id);


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

        <div class="container-fluid">

          <h2 style="color:black;font-weight: bold; text-align: center;">Class <?php echo $e1_class_name ?> Schedule Done</h2>
        </div>

        <div class="container-fluid" id="printing">

          <h2 style="color:black;font-weight: bold; text-align: center;">Hazi Abdus sattas School & College</h2>


          <h2 style="color:black;font-weight: bold;text-align: center">Sreepur, Gazipur</h2>

          <h2 style="color:black;text-align: center">Class Routine for <u><?php echo $e1_class_name; ?></u></h2>

          <div class=" p-4">

            <div style="width: 80%;margin: auto;">

              <table class="m-1" style="width: 100%;">
                <tr>
                  <th style="color:black;text-align: center">Period</th>
                  <?php
                  $class_per = $e1_class_noclp;
                  if ($class_per == 7) {
                  ?>
                    <th rowspan="2" style="color:black;text-align: center">
                      1st
                      <br>
                      <?php echo $duration; ?>

                    </th>
                    <th rowspan="2" style="color:black;text-align: center">
                      2nd
                      <br>
                      <?php echo $duration1; ?>
                    </th>
                    </th>

                    <th rowspan="2" style="color:black;text-align: center">
                      3rd
                      <br>
                      <?php echo $duration2; ?>
                    </th>
                    <th rowspan="2" style="color:black;text-align: center">
                      4th
                      <br>
                      <?php echo $duration3; ?>
                    </th>

                    </th>
                    <th rowspan="8" style="color:black;text-align: center;writing-mode: vertical-rl;">

                      TIFFIN

                    </th>

                    <th rowspan="2" style="color:black;text-align: center">
                      5th
                      <br>
                      <?php echo $duration4; ?>
                    </th>
                    <th rowspan="2" style="color:black;text-align: center">
                      6th
                      <br>
                      <?php echo $duration5; ?>
                    </th>
                    <th rowspan="2" style="color:black;text-align: center">
                      7th
                      <br>
                      <?php echo $duration6; ?>
                    </th>
                  <?php } elseif ($class_per == 6) { ?>

                    <th rowspan="2" style="color:black;text-align: center">
                      1st
                      <br>
                      <?php echo $duration; ?>

                    </th>
                    <th rowspan="2" style="color:black;text-align: center">
                      2nd
                      <br>
                      <?php echo $duration1; ?>
                    </th>
                    </th>

                    <th rowspan="2" style="color:black;text-align: center">
                      3rd
                      <br>
                      <?php echo $duration2; ?>
                    </th>

                    </th>
                    <th rowspan="8" style="color:black;text-align: center;writing-mode: vertical-rl;">

                      TIFFIN

                    </th>

                    <th rowspan="2" style="color:black;text-align: center">
                      4th
                      <br>
                      <?php echo $duration4; ?>
                    </th>
                    <th rowspan="2" style="color:black;text-align: center">
                      5th
                      <br>
                      <?php echo $duration5; ?>
                    </th>
                    <th rowspan="2" style="color:black;text-align: center">
                      6th
                      <br>
                      <?php echo $duration6; ?>
                    </th>

                  <?php } elseif ($class_per == 4) { ?>

                    <th rowspan="2" style="color:black;text-align: center">
                      1st
                      <br>
                      <?php echo $duration; ?>

                    </th>
                    <th rowspan="2" style="color:black;text-align: center">
                      2nd
                      <br>
                      <?php echo $duration1; ?>
                    </th>
                    </th>

                    </th>
                    <th rowspan="8" style="color:black;text-align: center;writing-mode: vertical-rl;">
                      TIFFIN
                    </th>

                    <th rowspan="2" style="color:black;text-align: center">
                      3th
                      <br>
                      <?php echo $duration4; ?>
                    </th>
                    <th rowspan="2" style="color:black;text-align: center">
                      4th
                      <br>
                      <?php echo $duration5; ?>
                    </th>


                  <?php } ?>
                </tr>

                <tr>
                  <th style="color:black;text-align: center">Day</th>
                </tr>

                <tr>
                  <th style="color:black;text-align: center"> Sat</th>

                  <?php if ($class_per == 7) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '7') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } elseif ($class_per == 6) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } elseif ($class_per == 4) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'saturday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } ?>

                </tr>

                <tr>
                  <th style="color:black;text-align: center"> Sun</th>


                  <?php if ($class_per == 7) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '7') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } elseif ($class_per == 6) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } elseif ($class_per == 4) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'sunday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } ?>

                </tr>

                <tr>
                  <th style="color:black;text-align: center"> Mon</th>

                  <?php if ($class_per == 7) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '7') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } elseif ($class_per == 6) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>



                  <?php } elseif ($class_per == 4) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'monday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } ?>

                </tr>

                <tr>
                  <th style="color:black;text-align: center"> Tue</th>

                  <?php if ($class_per == 7) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '7') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } elseif ($class_per == 6) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>



                  <?php } elseif ($class_per == 4) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'tuesday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>



                  <?php } ?>



                </tr>

                <tr>
                  <th style="color:black;text-align: center"> Wed</th>

                  <?php if ($class_per == 7) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '7') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } elseif ($class_per == 6) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>



                  <?php } elseif ($class_per == 4) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'wednesday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>



                  <?php } ?>



                </tr>

                <tr>
                  <th style="color:black;text-align: center"> Thu</th>

                  <?php if ($class_per == 7) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '7') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } elseif ($class_per == 6) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '5') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '6') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>



                  <?php } elseif ($class_per == 4) { ?>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '1') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '2') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '3') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                    <th style="color:black;text-align: center">
                      <?php
                      foreach ($all_asigned_teachers as $ttc) {
                        if ($ttc[10] == 'thursday' && $ttc[9] == '4') {
                          echo $ttc[4] . '<br>';
                          echo $ttc[6];
                        }
                      } ?>
                    </th>

                  <?php } ?>

                </tr>

              </table>
              
            </div>
          </div>
        </div>
      </div>

    </div>



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
            <span aria-hidden="true">×</span>
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