



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




 $user1="";
 $user_name="";
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if(isset($_SESSION['user_email'])){
    $user=$_SESSION['user_email'];
      $user_name=$_SESSION['user_name'];

    $user1=$user;
   

}else{


  

     header("Location: ../../login");
     exit();

}




     $email =	$user1;





if(isset($_POST['submit']))
	{
      
    





		
	   $e1_class_id		=$_POST['class_id'];
	   $e1_start_time		=$_POST['start_time'];

	    $e1_end_time		=	$_POST['end_time'];
	    $e1_date	=	$_POST['date'];
	    $e1_room_id	=	$_POST['room_id'];
	    $e1_teacher_id	=	$_POST['teacher_id'];
	    $e1_remark	=	$_POST['remark'];

	    $e1_period_id	=	$_POST['period_id'];
	    $e1_day_id	=	$_POST['day_id'];
	    $e1_subject_id	=	$_POST['subject_id'];



          $data2	=	$db->get_class_name($e1_teacher_id,$e1_day_id,$e1_period_id);
          $data3	=	$db->get_class_count($e1_class_id,$e1_day_id,$e1_period_id);


          if($data3==0)
          {
         if($data2=="")
          {
              
		    if($db->add_class($e1_class_id,$e1_start_time,
            $e1_end_time,$e1_date,$e1_room_id,$e1_teacher_id,$e1_remark
            ,$e1_period_id,$e1_day_id,$e1_subject_id
            
            ))
			    {


				$message	=	1;
            

			}
			else
			{

				$message	=	2;
               
			}
          }
          else {
			$message	=	3;
          }
          }
          else {
	        $message	=	4;
         }


        

	

      

        	



       


  }//end


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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
                <a class="nav-link" href="../index.php">
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
                <a class="nav-link" href="../teacher">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>All Teacher</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="../student">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>All Student </span>
                </a>

            </li>



           <li class="nav-item">
                <a class="nav-link" href="../classes">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Class Routine</span>
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
                <a class="nav-link" href="../profile">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Class Routine</h1>
                       
                    </div>


                <form action="index.php" method="post" name="myForm" 
				enctype="multipart/form-data" autocomplete="off">


                

                             <?php
									if($message==2)
									{
								?>
										<div  class="alert alert-success">
											 Failed try Again!!!
										</div>
								<?php
									}
								?>
                            
                            <?php
									if($message==1)
									{
								?>
										<div  class="alert alert-success">
											 Successfully Added!!!
										</div>
								<?php
									}
								?>


                                  <?php
									if($message==3)
									{
								?>
										<div  class="alert alert-success">
											Already Assign!
										</div>
								<?php
									}
								?>
                            
                                   <?php
									if($message==4)
									{
								?>
										<div  class="alert alert-success">
											Already Assign Class!
										</div>
								<?php
									}
								?>
                            

                

                <div class="form-outline mb-4">
                          
                                  <select name="class_id" id="s2" class="form-control">

                                      <option value="KG">KG</option>
                                      <option value="1">Class 1</option>
                                      <option value="2">Class 2</option>
                                      <option value="3">Class 3</option>
                                      <option value="4">Class 4</option>
                                      <option value="5">Class 5</option>
                                      <option value="6">Class 6</option>
                                      <option value="7">Class 7</option>
                                      <option value="8">Class 8</option>
                                      <option value="9">Class 9</option>
                                      <option value="10">Class 10</option>
                             
                                  


                                  </select>
                            
                                  <label  class="form-label" for="username" >Class</label>


                  </div>

             

                  


                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <input type="time" name="start_time" class="form-control"  value="12:10"  required/>
                        <label class="form-label" for="form6Example1"> Start Time</label>
                      </div>
                    </div>


                    <div class="col">
                      <div class="form-outline">
                        <input type="time" name="end_time" class="form-control" value="12:10" title="Error Message" pattern="[1-9]{1}[0-9]{9}"  required/>
                        <label class="form-label" for="form6Example2">End Time</label>
                      </div>
                    </div>
                  </div>



                  
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <input type="text" name="date" class="form-control" value="23-06-2022"  required/>
                        <label class="form-label" for="form6Example1"> Date</label>
                      </div>
                    </div>


                    <div class="col">
                      <div class="form-outline">
                        <select name="room_id" id="s2" class="form-control">

                                      <option value="Room 1">Room 1</option>
                                      <option value="Room 2">Room 2</option>
                                      <option value="Room 3">Room 3</option>
                                      <option value="Room 4">Room 4</option>
                                      <option value="Room 5">Room 5</option>
                                      <option value="Room 6">Room 6</option>
                                      <option value="Room 7">Room 7</option>
                                      <option value="Room 8">Room 8</option>
                                      <option value="Room 9">Room 9</option>
                                      <option value="Room 10">Room 10</option>
                                      <option value="Room 11">Room 11</option>
                                      <option value="Room 12">Room 12</option>
                                  


                                  </select>
                            
                                  <label  class="form-label" for="username" >Room No</label>

                      </div>
                    </div>
                  </div>




                     
                  <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                        <select name="period_id" id="s2" class="form-control">

                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                   

                                  </select>
                            
                                  <label  class="form-label" for="username" >Period</label>

                      </div>
                    </div>


                    <div class="col">
                      <div class="form-outline">
                        <select name="day_id" id="s2" class="form-control">

                                      <option value="Saturday">Saturday</option>
                                      <option value="Sunday">Sunday</option>
                                      <option value="Monday">Monday</option>
                                      <option value="Tuesday">Tuesday</option>
                                      <option value="Wednesday">Wednesday</option>
                                      <option value="Thursday">Thursday</option>
                                    


                                  </select>
                            
                                  <label  class="form-label" for="username" >Days</label>

                      </div>
                    </div>
                  </div>



                       
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">

                          <select name="teacher_id" id="s2" class="form-control">

                      
                                      
                                    <?php
											$data	=	array();
											$data	=	$db->get_teacher();

											if(!empty($data))
											{
												$counter=0;
												foreach($data as $record)
												{

													$e1				                         =	$record[0];
													$e2		                 =	          $record[1];
													$e3			                     =  $record[2];
													$e4				                     =	$record[3];
													$e5				                     =	$record[4];
													$e6				                     =	$record[5];
													$e7				                     =	$record[6];
													$e8				                     =	$record[7];
													$e9			                     =	$record[8];
													$e10			                     =	$record[9];
													$e11				                     =	$record[10];
													$e12				                     =	$record[11];
													$e13				                     =	$record[12];
													$e14				                     =	$record[13];
													$e15				                     =	$record[14];
													$e16				                     =	$record[15];
													$e17				                     =	$record[16];
													$e18				                     =	$record[17];
													$e19				                     =	$record[18];
													$e20				                     =	$record[19];
													$e21				                     =	$record[20];
													$e22				                     =	$record[21];
												
													
												

											?>
                                             <option value=<?php echo $e1; ?>><?php echo $e2; ?></option>

                                        <?php
													$counter++;
												}
											}
                                            ?>
                                     

                                  
                                 

                                    
                                  
                                  </select>
                            
                                  <label  class="form-label" for="username" >Teacher</label>

                       
                      </div>
                    </div>


                    <div class="col">


                      <div class="form-outline">
                        <input type="text" name="remark" class="form-control" title="Error Message" />
                        <label class="form-label" for="form6Example2">Remarks</label>
                      </div>



                    </div>



                  </div>



                   <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">



                      
                                  
                                  <select name="subject_id" id="s3" class="form-control">

                                       

                                      <option value="Bangla">Bangla</option>
                                      <option value="English">English</option>
                                      <option value="Math">Math</option>
                                      <option value="Religion">Religion</option>
                                      <option value="Sociology">Sociology</option>
                                      <option value="Hybrid">Hybrid</option>
                                      <option value="Type">Type</option>
                                  

                             


                                  </select>
                            
                                  <label  class="form-label" for="username" >Subject</label>

                       
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
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    
    <script>

      function checkPass()
{
    var pass1 = document.getElementById('pass1');
  
    var message = document.getElementById('error-nwl');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
 	
    if(pass1.value.length > 5)
    {
     //   pass1.style.backgroundColor = goodColor;
        message.style.color = goodColor;
       message.innerHTML = "character number ok!"
    }
    else
    {
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
            x1=msg;
            
            x.classname = "show";
            settimeout(function () { x.classname = x.classname.replace("show", ""); }, 2500);

        }

    </script>
</body>

</html>