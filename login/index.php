

<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}



require_once('../lib/functions.php');

$db	=	new login_function();
$message =	"";
 debug_to_console("abc1");



  if (isset($_GET['logout'])) {
   
  if($_GET['logout']==1)
  {
       $db->edit_logout_time($_SESSION['user_email']);
       unset($_SESSION['user_type']);
       unset($_SESSION['user_email']);
  }
  }


 

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


$r_user_name="";
$r_user_pass="";
$r_user_status="";


 if(isset($_SESSION['user_email'])){
    $user=$_SESSION['user_email'];
    $user_type=$_SESSION['user_type'];
   

   if($user_type==1)
        {
        header("Location: ../operator");
        exit();
        }
        else {
	
        header("Location: ../admin");
        exit();
        }

}else{

 if(isset($_SESSION['r_active'])){

      $r_active=$_SESSION['r_active'];

      if($r_active=="yes")
      {


            $r_user_name=$_SESSION['r_user_email'];
            $r_user_pass=$_SESSION['r_user_pass'];
            $r_user_status=$_SESSION['r_user_type'];
         


      }

 }



}









if(isset($_POST['submit']))
	{
      
    

		
		$e2_email		=	$_POST['email'];
	
		$e5_password		=	$_POST['password'];
		$e5_status		=	$_POST['status'];
        $remember="";
         if(isset($_POST['remember']))
         {
		$remember		=	$_POST['remember'];
        }


         debug_to_console("abc111");
         debug_to_console($remember);




     



        if(strlen($e5_password)>5)
        {

       $db_vale=$db->login($e2_email,$e5_password,$e5_status);
		
		if($db_vale!="")
			{


            if($db_vale=="0")
            {
	         $message	=	1;

             	session_start();
             	$_SESSION['user_type'] = $e5_status; 
             	$_SESSION['user_email'] = $e2_email; 
             	




                     if(isset($_POST['remember']))
                      {
                             if($_POST['remember']=="on")
                             {
                                  debug_to_console("yes");

                                  $_SESSION['r_user_type']=$e5_status;
                                  $_SESSION['r_user_email']=$e2_email;
                                  $_SESSION['r_user_pass']=$e5_password;
                                  $_SESSION['r_active']="yes";



                             }
             

                       }
        








                 if($e5_status==1)
                 {


                 $db->edit_login_time($e2_email);



                    header("Location: ../operator");
                   exit();
                 }
                 else {
	
                   header("Location: ../admin");
                   exit();
                    }


                 


            }

			
            if($db_vale=="1")
            {
	         $message	=	11;
            }

			if($db_vale=="2")
            {
	         $message	=	12;
            }


			if($db_vale=="3")
            {
	         $message	=	13;
            }




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









<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">

    <title>Login</title>
  </head>
  <body>


      <div class="d-lg-flex half">
          <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
          <div class="contents order-2 order-md-1">

              <div class="container ">
              <br>
              <br>
                  <div class="row mt-2 justify-content-center">
                      <div class="col-md-7">
                          <h3>Login to <strong>Hazi Abdus Sattar School & College</strong></h3>
                          <!--<p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>-->
                       <form action="index.php" method="post" name="myForm" 
							enctype="multipart/form-data" autocomplete="off">


                             <?php
									if($message==2)
									{
								?>
										<div  class="alert alert-success">
											Check Your Email Or Password!!!
										</div>
								<?php
									}
								?>
                            
                                 <?php
									if($message==1)
									{
								?>
										<div  class="alert alert-success">
											 Successfully Login!!!
										</div>
								<?php
									}
								?>




                                 <?php
									if($message==11)
									{
								?>
										<div  class="alert alert-success">
											 Your Account is not active!!!
										</div>
								<?php
									}
								?>




                                   <?php
									if($message==12)
									{
								?>
										<div  class="alert alert-success">
											 Your Account is deleted !!!
										</div>
								<?php
									}
								?>



                                
                                   <?php
									if($message==13)
									{
								?>
										<div  class="alert alert-success">
											 your account is suspend!!!
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

                              <div class="form-group first">
                                  <label for="username">Email</label>
                                  <input type="email" class="form-control" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"  value="<?php echo $r_user_name; ?>" placeholder="your-email@gmail.com" name="email" required>
                              </div>




                              <div class="form-group last mb-3">
                                  <label for="password">Password</label>
                                  <input type="password" class="form-control" id="pass1" value="<?php echo $r_user_pass; ?>" onkeyup="checkPass(); return false;" placeholder="Your Password" name="password" required>
                              </div>
                              <div id="error-nwl"></div>
                              <div class="form-group first mb-5">
                                  <label for="username" class="mb-2">User Type</label>
                                  <select name="status" id="s2" class="form-control">

                                      <option value="0">Admin</option>
                                      <option value="1">Operator</option>
                                      <option value="2">Student</option>


                                  </select>
                              </div>


                              <div class="d-flex mb-5 align-items-center">
                                  <label class="control control--checkbox mb-0">
                                      <span class="caption">Remember me</span>
                                      <input type="checkbox" name='remember' checked="checked" />
                                      <div class="control__indicator"></div>
                                  </label>
                                  <span class="ml-auto"><a href="../forgetpassword/" class="forgot-pass">Forgot Password</a></span>
                              </div>

                              <input type="submit" name="submit" value="Log In" class="btn btn-block btn-primary ">
                              <div class="m-4" style="text-align: center;">
                                  <span class="caption" align="center">Don't have access an operator?</span><span style="color:red;cursor: pointer;" onclick="signup();"> Sign Up</span>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>


      </div>

      <script>

          function signup() {
              window.location.href = "../signup/";

          }


      </script>
      
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
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
  </body>
</html>