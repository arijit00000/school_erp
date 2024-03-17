<?php
    require_once('../../lib/functions.php');
	$db = new login_function();
	
		$response = array();
		
		if(isset($_POST['email']))
	{


		$e1       =     $_POST['email'];
	
		$category_data	=	array();
		$category_data	=	$db->get_class_routine($e1);
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
   
   