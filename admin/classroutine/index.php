
<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}



require_once('../../lib/functions.php');

$db	=	new login_function();
$message =	"";
debug_to_console("abc1");

$user_name="";
$user1="";
 $email="";
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if(isset($_SESSION['user_email'])){
    $user=$_SESSION['user_email'];
        $user_name=$_SESSION['user_name'];
         $email=$_SESSION['user_email'];
    $user1=$user;
   

}else{


     debug_to_console("error1");

     header("Location: ../../login");
     exit();

}











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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>


     <style>
     table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding:5px;
  color:black;
}
     </style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user_name?></span>
                                <img class="img-profile rounded-circle"
                                     src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
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
                    <div class="row">

                    <div class="col-sm">
                    <h1 class="h3 mb-2 text-gray-800">Class Routine (This Week)</h1>
                    </div>

                    
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3  d-flex justify-content-end">


                         <div class="row">
                         

                              
                              <button type="submit" id="submit_excel" onclick="ExportToExcel();" class="btn btn-primary btn-block mb-4">Print</button>
                            
                           </div>


                       
                             
                        </div>




                        <table class="m-2" >


                          <tr>
                            <th rowspan="2" style="color:black">Sl No.</th>
                            <th rowspan="2" style="color:black">Name</th>
                            <th rowspan="2" style="color:black">Subject</th>



                            <th colspan="7" style="color:black">Saturday</th>
                            <th colspan="7" style="color:black">Sunday</th>
                            <th colspan="7" style="color:black">Monday</th>
                            <th  colspan="7" style="color:black">Tuesday</th>
                            <th colspan="7" style="color:black">Wednesday</th>
                            <th  colspan="4" style="color:black">Thursday</th>
                            <th rowspan="2" style="color:black">Total</th>
                          </tr>



                          <tr>
                            <td style="color:red">1</td>
                            <td style="color:red"> 2</td>
                            <td style="color:red">3</td>
                            <td style="color:red">4</td>
                            <td style="color:red">5</td>
                            <td style="color:red">6</td>
                            <td style="color:red">7</td>


                             <td style="color:red">1</td>
                            <td style="color:red">2</td>
                            <td style="color:red">3</td>
                            <td style="color:red">4</td>
                            <td style="color:red">5</td>
                            <td style="color:red">6</td>
                            <td style="color:red">7</td>


                              <td style="color:red">1</td>
                            <td style="color:red">2</td>
                            <td style="color:red">3</td>
                            <td style="color:red">4</td>
                            <td style="color:red">5</td>
                            <td style="color:red">6</td>
                            <td style="color:red">7</td>

                              <td style="color:red">1</td>
                            <td style="color:red">2</td>
                            <td style="color:red">3</td>
                            <td  style="color:red">4</td>
                            <td style="color:red">5</td>
                            <td style="color:red">6</td>
                            <td style="color:red">7</td>


                              <td style="color:red">1</td>
                            <td style="color:red">2</td>
                            <td style="color:red">3</td>
                            <td style="color:red">4</td>
                            <td style="color:red">5</td>
                            <td style="color:red">6</td>
                            <td style="color:red">7</td>


                              <td style="color:red">1</td>
                            <td style="color:red">2</td>
                            <td style="color:red">3</td>
                            <td style="color:red">4</td>
                           



                            
                         

                          </tr>




                             <?php
					            $data	=	array();
					            $data	=	$db->get_teacher1();

					            if(!empty($data))
					            {
						            $counter=0;
                                  //  $dcounter2=0;
						            $counter1=$counter+1;
                                
						            foreach($data as $record)
						            {

							            $e1				         =         	$record[0];
							            $e2		                 =	          $record[1];
							            $e3		                 =	          $record[2];
							            $e4		                 =	          $record[3];
													

					            ?>

                            <tr>
                                <td>	<?php echo $counter+1; ?></td>
                                <td>	<?php echo $e2; ?></td>




                              <?php

                              if($e4==99)
                              {

                              }
                              else {

                               ?>
	                              <td 
                                  <?php

                                  if($e4==0)
                                  {

                                  }
                                  else {
                                        ?>
	                                rowspan=<?php echo $e4; ?>
                                     <?php
                                   }

                                ?>
                                >
                                
                                
                                
                                <?php
                               
                                 
                                
                                if($e3=="Hybrid")
                                {
                                 echo ""; 
                                }
                                else {


                             	echo $e3; 



                                 }


                                
                                
                                
                                
                                
                                ?>
                                
                                
                                
                                </td>


                                <?php


                                  }

                                ?>






                                
                             <?php




                                  $dcounter2=0;
                                 
                                for($i=0;$i<=5;$i++)
                                {

                                 $count=7;
                                if($i==5)
                                {
                                    $count=4;
                                }


                                for($j=1;$j<=$count;$j++)
                                {

                                $days="";

                                if($i==0)
                                {
                                   $days="Saturday";
                                }else if($i==1)
                                {
                                    $days="Sunday";

                                }else if($i==2)
                                {
                                    $days="Monday";

                                }else if($i==3)
                                {
                                    $days="Tuesday";

                                }else if($i==4)
                                {
                                    $days="Wednesday";

                                }else if($i==5)
                                {
                                    $days="Thursday";

                                }


                                $temp=$j;

                               

                                $data2	=	$db->get_class_name($e1,$days,$temp);
                               

                                if($data2=="")
                                {

                                }
                                else {
	                                $dcounter2++;
                                  }

                                   ?>
                                <td><?php 
                                
                                  
                                    echo $data2; 
                                

                                ?></td>

                                <?php 

                                }


                                }


                                  ?>
                                <td><?php 
                                
                                  
                                    echo $dcounter2; 
                                

                                ?></td>

                               
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
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

 function ExportToExcel()
 {
   TableToExcel.convert(document.getElementById("dataTable"),{ name: "routine.xlsx"});
 }


 function AddStudent()
 {
     window.location.href = "../addclass";
 }


 </script>

</body>

</html>