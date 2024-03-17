



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
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if(isset($_SESSION['user_email'])){
    $user=$_SESSION['user_email'];


    $user1=$user;
   

}else{


  

     header("Location: ../../login");
     exit();

}




     $email =	$user1;

    $name 		 =	                      "";
	$mobile		                 =	        "";
	$password			                     =  "";
	$work	                     =	 "";
	$role			                     =	 "";
	$active			                     =	 "";
	$who_create			                     =	 "";
	$date			                     =	 "";
	$time		                     =	 "";
	


if(isset($_GET['edit_id']))
{
	$var_edit_id					=	$_GET['edit_id'];
	$_SESSION['session_edit_id']	=	$var_edit_id;
	$invoice_id=	$var_edit_id;

   // getvalue($invoice_id);


}
else if(isset($_SESSION['session_edit_id']))
{
	$var_edit_id	=	$_SESSION['session_edit_id'];
	$invoice_id=	$var_edit_id;
}




    
$data	=	array();
$data	=	$db->get_teacher_id($invoice_id);

if(!empty($data))
{


	   
	    
		$email1 		 =	                      $data[0];
		$name		                 =	          $data[1];
		$mobile			                     =  $data[2];
		$password	                     =	$data[3];
		$work				                     =	$data[4];
		$role			                     =	$data[5];
		$active				                     =	$data[6];
		$who_create				                     =	$data[7];
		$date			                     =	$data[8];
		$time			                     =	$data[9];


		$aadhar			                     =	$data[15];
		$father			                     =	$data[16];
		$classes			                     =	$data[17];
		$admission			                     =	$data[18];
		$last_name			                     =	$data[19];
		$subject			                     =	$data[20];
		$expernece			                     =	$data[21];
		$serial			                     =	$data[22];
		$count			                     =	$data[23];
		



	

		   										

}





















if(isset($_POST['submit']))
	{
      
    

		
      $e1_name		=$_POST['name'];
	   $e1_l_name		=$_POST['l_name'];

	    $e1_email		=	$_POST['email'];
	    $e1_mobile	=	$_POST['mobile'];
	    $e1_aadhar	=	$_POST['aadhar'];
	    $e1_f_name	=	$_POST['f_name'];
	    $e1_class_id	=	$_POST['class_id'];
	    $e1_admission	=	$_POST['admission'];
	    $e1_work		=	$_POST['work'];
	    $e1_password		=	$_POST['password'];

		
        
	    $e1_subject_id		=	$_POST['subject_id'];
	    $e1_experinece		=	$_POST['experinece'];

         $e1_serial		=	$_POST['serial'];
	    $e1_routine		=	$_POST['routine'];



        if(strlen($e1_password)>5)
        {



        	
		if($db->edit_profile_t($e1_name,$e1_email,
            $e1_mobile,$e1_aadhar,$e1_f_name,$e1_class_id,$e1_admission,$e1_work,
            $e1_password,$e1_l_name,$e1_subject_id,$e1_experinece,$e1_serial,$e1_routine))
			{


				$message	=	1;

                
                header("Location: ../teacher");
                exit();


            

			}
			else
			{
				$message	=	2;
                
              

			}


        }
        else {
              $message	=	3;
	
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name?></span>
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Teacher Profile</h1>
                       
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
											 Successfully Update!!!
										</div>
								<?php
									}
								?>


                                  <?php
									if($message==3)
									{
								?>
										<div  class="alert alert-success">
											You have to enter at least 6 digit!
										</div>
								<?php
									}
								?>
                            


                               <div class="row mb-4">
                 <div class="col">
                      <div class="form-outline">
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required/>
                    <label class="form-label" for="form6Example3">First Name</label>
                  </div>
                  </div>

                    <div class="col">
                      <div class="form-outline">
                        <input type="text" name="l_name" class="form-control" value="<?php echo $last_name; ?>" title="Error Message"  required/>
                        <label class="form-label" for="form6Example2">Last Name</label>
                      </div>
                    </div>
                  </div>


                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <input type="email" name="email" class="form-control" value="<?php echo $email1; ?>" readonly required/>
                        <label class="form-label" for="form6Example1"> Email</label>
                      </div>
                    </div>


                    <div class="col">
                      <div class="form-outline">
                        <input type="tel" name="mobile" class="form-control" value="<?php echo $mobile; ?>" title="Error Message" pattern="[1-9]{1}[0-9]{10}" maxlength="11" required/>
                        <label class="form-label" for="form6Example2">Mobile</label>
                      </div>
                    </div>
                  </div>



                  
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <input type="text" name="aadhar" class="form-control" value="<?php echo $aadhar; ?>"  required/>
                        <label class="form-label" for="form6Example1"> Aadhar Number</label>
                      </div>
                    </div>


                    <div class="col">
                      <div class="form-outline">
                        <input type="text" name="f_name" class="form-control" value="<?php echo $father; ?>" title="Error Message"   required/>
                        <label class="form-label" for="form6Example2">Father Name</label>
                      </div>
                    </div>
                  </div>



                       
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">



                      
                                  
                                  <select name="class_id" id="s2" value="<?php echo $classes; ?>" class="form-control">

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
                                      <option value="11">Class 11</option>
                                      <option value="12">Class 12</option>
                                  


                                  </select>
                            
                                  <label  class="form-label" for="username" >Class</label>

                       
                      </div>
                    </div>


                    <div class="col">
                      <div class="form-outline">
                        <input type="date" name="admission" value="<?php echo $admission; ?>" class="form-control" title="Error Message"   required/>
                        <label class="form-label" for="form6Example2">Admission date</label>
                      </div>
                    </div>
                  </div>

                  
                        
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">



                      
                                  
                                  <select name="subject_id" id="s3" value="<?php echo $subject; ?>" class="form-control">

                                      <option value="Math">Math</option>
                                      <option value="Science">Science</option>
                                      <option value="Biology">Biology</option>
                                      <option value="SSC">SSC</option>
                                      <option value="Hindi">Hindi</option>
                                      <option value="English">English</option>
                                      <option value="Sports">Sports</option>
                                      <option value="Physics">Physics</option>
                                      <option value="Chemistry">Chemistry</option>
                                      <option value="History">History</option>
                                     


                                  </select>
                            
                                  <label  class="form-label" for="username" >Subject</label>

                       
                      </div>
                    </div>


                    <div class="col">
                      <div class="form-outline">
                        <input type="text" name="experinece" class="form-control" value="<?php echo $expernece; ?>" title="Error Message"   required/>
                        <label class="form-label" for="form6Example2">Experience</label>
                      </div>
                    </div>
                  </div>







                    <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <input type="text" name="work" value="<?php echo $work; ?>" class="form-control"  required/>
                        <label class="form-label" for="form6Example1">Address</label>
                      </div>
                    </div>



                    <div class="col">
                      <div class="form-outline">
                        <input type="password" name="password" value="<?php echo $password; ?>" onkeyup="checkPass(); return false;" id="pass1" class="form-control"  required/>
                        <label class="form-label" for="form6Example2">Password</label>
                      </div>
                       <div id="error-nwl"></div>
                    </div>
                  </div>


                  
                      <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <input type="number" name="serial" class="form-control" value="<?php echo $serial; ?>"  required/>
                        <label class="form-label" for="form6Example1">serial number(For Class Routine eg:-1,2)</label>
                      </div>
                    </div>



                    <div class="col">
                      <div class="form-outline">
                        <input type="number" name="routine"  value="<?php echo $count; ?>"  class="form-control"  required/>
                        <label class="form-label" for="form6Example2">Count(For Class Routine eg:-1,2 & 99  After)</label>
                      </div>
                       <div id="error-nwl"></div>
                    </div>
                  </div>

                  <!-- Checkbox -->


                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Update</button>
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