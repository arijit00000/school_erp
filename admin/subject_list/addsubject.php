
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
















//Delete
if(isset($_GET['delete_id'])){
  
  debug_to_console("abc111");
  debug_to_console($_GET['delete_id']);

if($db->subject_delete2($_GET['delete_id']))
{
    $message =	2;
}
else {
	$message =	-2;
}



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
                   <?php
									if($message==1)
									{
								?>
										<div  class="alert alert-success">
											 Succesfully Active!!!
										</div>
								<?php
									}
								?>


                                
                             <?php
									if($message==-1)
									{
								?>
										<div  class="alert alert-success">
											 Failed To Active try Again!!!
										</div>
								<?php
									}
								?>








                                   <?php
									if($message==2)
									{
								?>
										<div  class="alert alert-success">
											 Succesfully Delete!!!
										</div>
								<?php
									}
								?>


                                
                             <?php
									if($message==-2)
									{
								?>
										<div  class="alert alert-success">
											 Failed To Delete try Again!!!
										</div>
								<?php
									}
								?>















                                   <?php
									if($message==3)
									{
								?>
										<div  class="alert alert-success">
											 Succesfully Suspend!!!
										</div>
								<?php
									}
								?>


                                
                             <?php
									if($message==-3)
									{
								?>
										<div  class="alert alert-success">
											 Failed To Suspend try Again!!!
										</div>
								<?php
									}
								?>






                                   <?php
									if($message==4)
									{
								?>
										<div  class="alert alert-success">
											 Succesfully UnActive!!!
										</div>
								<?php
									}
								?>


                                
                             <?php
									if($message==-4)
									{
								?>
										<div  class="alert alert-success">
											 Failed To UnActive try Again!!!
										</div>
								<?php
									}
								?>


                    <!-- Page Heading -->
                    <div class="row">

                    <div class="col-sm">
                    <h1 class="h3 mb-2 text-gray-800">Subject list</h1>
                    </div>

                     <div class="col-sm-2">
                    <button  onclick="AddStudent();" 
                    class="btn btn-primary btn-block mb-4">Add Subject</button>
                            
                  </div>

                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3  d-flex justify-content-end">


                         <div class="row">
                         

                              
                              <button type="submit" id="submit_excel" onclick="ExportToExcel();" class="btn btn-primary btn-block mb-4">Export</button>
                            
                           </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                   
                                     <thead>
                                        <tr>
                                            <th>Id</th>
                                    
                                            <th>Subject Name</th>
                                        
                                          
                                            <th data-exclude="true">Delete</th>
                                           
                                        </tr>
                                    </thead>
                                  




                                    <tbody>

                                    <?php
											$data	=	array();
											$data	=	$db->get_subject_new2();

											if(!empty($data))
											{
												$counter=0;
												foreach($data as $record)
												{

													$e1				                         =	$record[0];
													$e2		                 =	          $record[1];
													
													

											?>

                                        <tr>
                                            <td>	<?php echo $e1; ?></td>
                                            <td>	<?php echo $e2; ?></td>
                                            
                                         

                                    
                                            <td>
                                                <a href="addsubject.php?delete_id=<?php echo $e1; ?> ?>" onclick="return confirm('Are you Sure to Delete This record?');">
                                                    <i class="fas fa-trash" style="color:red;margin-left:20px;"></i>






                                            </td>

                                        </tr>
                                        <?php
													$counter++;
												}
											}
                                            ?>
                                     
                                    </tbody>
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
   TableToExcel.convert(document.getElementById("dataTable"),{ name: "subject.xlsx"});
 }


 function AddStudent()
 {
     window.location.href = "../subject/add.php";
 }


 </script>

</body>

</html>