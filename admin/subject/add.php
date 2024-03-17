



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
      
    





		
	   $e1_subject		=$_POST['subject'];




    

              
		    if($db->add_subject2($e1_subject))
			    {


				$message	=	1;
            

			}
			else
			{

				$message	=	2;
               
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
                        <h1 class="h3 mb-0 text-gray-800">Add Subject</h1>
                       
                    </div>


                <form action="add.php" method="post" name="myForm" 
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
                            

                

           
          
                  
                   
                  


                  <div class="row mb-4">
                  

                    <div class="col">
                      <div class="form-outline">
                        <input type="text" name="subject" class="form-control"    required/>
                        <label class="form-label" for="form6Example2">Subject Name</label>
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