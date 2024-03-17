<?php
 header("Access-Control-Allow-Origin: *");
    require_once('../../lib/functions.php');
	$db = new login_function();
	
		$response = array();
		
		if(isset($_POST['email']))
	{


		$e1       =     $_POST['email'];
		$e2       =     $_POST['password'];
		$e3       =     $_POST['status'];
	
		
		$category_data	=	$db->login($e1,$e2,$e3);
		
		if($category_data!="")
		{ 
			$response['status'] 	= 1;
			$response['message'] 	= $category_data;
		}
		else
		{
			$response['status'] 	= 0;
			$response['message'] 	= "Not Found";
		}
	

		}
   echo json_encode($response);
   ?>
   
   