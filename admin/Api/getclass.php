<?php
    require_once('../../lib/functions.php');
	$db = new login_function();
	
		$response = array();
		
		if(isset($_POST['email']))
	{


		$e1       =     $_POST['email'];
		$e2       =     $_POST['days'];
		$e3       =     $_POST['pe'];
	
		$category_data	=	"";
		$category_data	=	$db->get_class_name($e1,$e2,$e3);
		if(!empty($category_data))
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
   
   