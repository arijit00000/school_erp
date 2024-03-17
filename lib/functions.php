<?php

if (!isset($_SESSION)) {
	session_start();
}



set_time_limit(1000);

date_default_timezone_set('Asia/Kolkata');
$project_title  =   "HASSC";



class login_function
{

	private $con;


	function __construct()
	{


		//	$this->con = new mysqli("localhost","root","","school");

	$this->con = new mysqli("localhost","u320163771_school2","Abcde123@","u320163771_school2");
		// $this->con = new mysqli("localhost", "root", "", "u320163771_school2");
	}


	function add_user($email, $name, $mobile, $password, $work)
	{



		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");
		$role	=	1;
		$active	=	1;
		$who_create	=	0;


		if ($stmt = $this->con->prepare("INSERT INTO `user`(`email`, `name`, 
                      `mobile`, `password`, `work`, `role`, `active`, `who_create`, `date`, `time`) VALUES (
							?,?,?,?,?,
							?,?,?,?,?

							)")) {






			$stmt->bind_param(
				"ssssssssss",
				$email,
				$name,
				$mobile,
				$password,
				$work,
				$role,
				$active,
				$who_create,
				$date,
				$time
			);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}






	function add_user_s(
		$e1_name,
		$e1_email,
		$e1_mobile,
		$e1_aadhar,
		$e1_f_name,
		$e1_class_id,
		$e1_admission,
		$e1_work,
		$e1_password,
		$e1_last_name
	) {



		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");
		$role	=	2;
		$active	=	0;
		$who_create	=	0;
		$blank	=	'';


		if ($stmt = $this->con->prepare("INSERT INTO `user`(`email`, `name`, `mobile`, 
				`password`, `work`, `role`, `active`, `who_create`, `date`,
				`time`, `active_by_name`, `login_time`, `active_by_email`,
				`remark`, `logout_time`, `aadhar_no`, `father_name`, `class`, `admission_date`, `last_name`) VALUES (
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?

							)")) {



			$stmt->bind_param(
				"ssssssssssssssssssss",
				$e1_email,
				$e1_name,
				$e1_mobile,
				$e1_password,
				$e1_work,
				$role,
				$active,
				$who_create,
				$date,
				$time,
				$blank,
				$blank,
				$blank,
				$blank,
				$blank,
				$e1_aadhar,
				$e1_f_name,
				$e1_class_id,
				$e1_admission,
				$e1_last_name
			);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}









	function add_user_t(
		$e1_name,
		$e1_email,
		$e1_mobile,
		// $e1_aadhar,
		// $e1_f_name,
		// $e1_class_id,
		// $e1_admission,
		$e1_work,
		$e1_password,
		$e1_last_name,
		// $e1_subject_id,
		// $e1_experinece,
		$e1_serial,
		$e1_routine
	) {



		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");
		$role	=	1;
		$active	=	0;
		$who_create	=	0;
		$blank	=	'';


		if ($stmt = $this->con->prepare("INSERT INTO `user`(`email`, `name`, `mobile`, 
				`password`, `work`, `role`, `active`, `who_create`, `date`,
				`time`, `active_by_name`, `login_time`, `active_by_email`,
				`remark`, `logout_time`, `aadhar_no`, `father_name`, `class`, `admission_date`, `last_name`, `subject`, `experience`, `serail`, `count`) VALUES (
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,?,?,?,?

							)")) {



			$stmt->bind_param(
				"ssssssssssssssssssssssss",
				$e1_email,
				$e1_name,
				$e1_mobile,
				$e1_password,
				$e1_work,
				$role,
				$active,
				$who_create,
				$date,
				$time,
				$blank,
				$blank,
				$blank,
				$blank,
				$blank,
				$blank,
				$blank,
				$blank,
				$blank,
				$e1_last_name,
				$blank,
				$blank,
				$e1_serial,
				$e1_routine
			);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}













	function student_delete($delete_id, $phone)
	{
		if ($stmt = $this->con->prepare("DELETE FROM `user`  WHERE BINARY `email`=? AND `mobile`=?")) {
			$stmt->bind_param("ss", $delete_id, $phone);
			if ($stmt->execute()) {
				return true;
			}
		} else {
			return false;
		}
	}






	function class_delete($delete_id)
	{
		if ($stmt = $this->con->prepare("DELETE FROM `class_r`
					   WHERE BINARY `id`=?")) {
			$stmt->bind_param("i", $delete_id);
			if ($stmt->execute()) {
				return true;
			}
		} else {
			return false;
		}
	}



	function get_teacher1()
	{



		$url = "SELECT `email`, `name`, `subject`,`count` FROM `user` WHERE  `role`='1' ORDER BY `serail`";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]			=	$e3;
					$data[$row][3]			=	$e4;


					$row++;
				}



				return $data;
			}
			return false;
		}
	}








	function get_class_routine($id1)
	{

		if ($stmt = $this->con->prepare(


			"SELECT
user.name,class_r.id,class_r.class_id,class_r.period_id,
class_r.day_id,class_r.subject_id
           FROM class_r
        INNER JOIN user ON user.email=class_r.teacher_id  And  class_r.teacher_id=? "


		)) {


			$stmt->bind_param("s", $id1);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6




			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;


				//while loop for fetching multiple records
				while ($stmt->fetch()) {



					$data[$row]['name']			=	$e1;
					$data[$row]['id']			=	$e2;
					$data[$row]['class_id']	=	$e3;
					$data[$row]['period_id']	=	$e4;
					$data[$row]['day_id']			=	$e5;
					$data[$row]['subject_id']			=	$e6;


					$row++;
				}



				return $data;
			}
			return false;
		}
	}
















	function add_class(
		$e1_class_id,
		$e1_start_time,
		$e1_end_time,
		$e1_date,
		$e1_room_id,
		$e1_teacher_id,
		$e1_remark,
		$e1_period_id,
		$e1_day_id,
		$e1_subject_id
	) {



		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");

		$blank	=	'';


		if ($stmt = $this->con->prepare("INSERT INTO `class_r`(`class_id`, 
                           `start_time`, `end_time`, `date_s`,
                           `room_id`, `teacher_id`, `remark`, `date`, `time`, `period_id`, `day_id`, `subject_id`) VALUES (
					?,?,?,?,?,
					?,?,?,?,?,?,?
				

							)")) {



			$stmt->bind_param(
				"ssssssssssss",
				$e1_class_id,
				$e1_start_time,
				$e1_end_time,
				$e1_date,
				$e1_room_id,
				$e1_teacher_id,
				$e1_remark,
				$date,
				$time,
				$e1_period_id,
				$e1_day_id,
				$e1_subject_id
			);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}

















	function login($email, $password, $e5_status)
	{



		if ($stmt_select = $this->con->prepare("SELECT `active` FROM `user` where `email` = ? AND `password` = ? AND `role` = ? ")) {
			$stmt_select->bind_param("sss", $email, $password, $e5_status);

			$stmt_select->bind_result($active);

			if ($stmt_select->execute()) {
				if ($stmt_select->fetch()) {
					return $active . "";
				}
			}
			return "";
		}
	}





	function forget($email)
	{



		if ($stmt_select = $this->con->prepare("SELECT `active`, `name` FROM `user` where `email` = ?")) {
			$stmt_select->bind_param("s", $email);

			$stmt_select->bind_result($active, $name);

			if ($stmt_select->execute()) {

				$data	=	array();

				if ($stmt_select->fetch()) {


					$data['active'] = $active . "";
					$data['name'] = $name;


					return $data;
				}
			}


			$data	=	array();

			$data['active'] = "";
			$data['name'] = "";


			return $data;
		}
	}






	function update_password($email, $password)
	{


		if ($stmt = $this->con->prepare("UPDATE `user` SET
                `password`='" . $password . "'
               



                  where `email` =?")) {

			$stmt->bind_param("s", $email);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}








	function add_order(
		$date,
		$time,
		$loading_point,
		$unloading_point,
		$sup_dets,
		$q_o_m,
		$product_type,
		$address,
		$remark,
		$vech_no,
		$user
	) {



		$s_date	=	date("Y-m-d");
		$s_time	=	date("H:i:s");



		if ($stmt = $this->con->prepare("INSERT INTO `orderpkt`(`date`, `time`, 
                  `s_date`, `s_time`, `loading_point`, `unloading_point`,
                  `sup_dets`, `q_o_m`, `product_type`, `address`, `remark`, `vech_no`, `user`) VALUES  (
							?,?,?,?,?,
							?,?,?,?,?,?,?,?

							)")) {


			$stmt->bind_param(
				"sssssssssssss",
				$date,
				$time,
				$s_date,
				$s_time,
				$loading_point,
				$unloading_point,
				$sup_dets,
				$q_o_m,
				$product_type,
				$address,
				$remark,
				$vech_no,
				$user
			);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}






	function add_order1(
		$date,
		$time,
		$loading_point,
		$unloading_point,
		$sup_dets,
		$q_o_m,
		$product_type,
		$address,
		$remark,
		$vech_no,
		$user,
		$user_name
	) {



		$s_date	=	date("Y-m-d");
		$s_time	=	date("H:i:s");



		if ($stmt = $this->con->prepare("INSERT INTO `orderpkt`(`date`, `time`, 
                  `s_date`, `s_time`, `loading_point`, `unloading_point`,
                  `sup_dets`, `q_o_m`, `product_type`, `address`, `remark`, `vech_no`, `user`, `user_name`) VALUES  (
							?,?,?,?,?,
							?,?,?,?,?,?,?,?,?

							)")) {


			$stmt->bind_param(
				"ssssssssssssss",
				$date,
				$time,
				$s_date,
				$s_time,
				$loading_point,
				$unloading_point,
				$sup_dets,
				$q_o_m,
				$product_type,
				$address,
				$remark,
				$vech_no,
				$user,
				$user_name
			);

			if ($stmt->execute()) {

				return "" . mysqli_insert_id($this->con) . "";
			}


			return "";
		}
	}




	function get_order($user)
	{



		$url = "SELECT lpad(`invoice`,6,'0'), `date`, `time`, `s_date`, `s_time`,
`loading_point`, `unloading_point`, `sup_dets`, `q_o_m`, `product_type`, 
`address`, `remark`, `vech_no`, `user`, `invoice` FROM `orderpkt` where `user` = ?";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("s", $user);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13,
				$e14,
				$e15


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	"A" . $e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					$data[$row][11]	=	$e12;
					$data[$row][12]	=	$e13;
					$data[$row][13]	=	$e14;
					$data[$row][14]	=	$e15;



					$row++;
				}



				return $data;
			}
			return false;
		}
	}











	function get_all_order($start, $end)
	{


		$url = "";

		if ($start == "") {
			$url = "SELECT lpad(`invoice`,6,'0'), `date`, `time`, `s_date`, `s_time`,
`loading_point`, `unloading_point`, `sup_dets`, `q_o_m`, `product_type`, 
`address`, `remark`, `vech_no`, `user`, `invoice`, `user_name` FROM `orderpkt`";
		} else {
			$url = "SELECT lpad(`invoice`,6,'0'), `date`, `time`, `s_date`, `s_time`,
`loading_point`, `unloading_point`, `sup_dets`, `q_o_m`, `product_type`, 
`address`, `remark`, `vech_no`, `user`, `invoice`, `user_name` FROM `orderpkt` WHERE  `date`>=? AND  `date`<=?";
		}






		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {

			if ($start == "") {
			} else {
				$stmt->bind_param("ss", $start, $end);
			}


			//   $stmt->bind_param("s",$user);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13,
				$e14,
				$e15,
				$e16


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	"A" . $e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					$data[$row][11]	=	$e12;
					$data[$row][12]	=	$e13;
					$data[$row][13]	=	$e14;
					$data[$row][14]	=	$e15;
					$data[$row][15]	=	$e16;



					$row++;
				}



				return $data;
			}
			return false;
		}
	}






	function get_order_id($invoice)
	{



		$url = "SELECT lpad(`invoice`,6,'0'), `date`, `time`, `s_date`, `s_time`,
`loading_point`, `unloading_point`, `sup_dets`, `q_o_m`, `product_type`, 
`address`, `remark`, `vech_no`, `user`, `invoice` FROM `orderpkt` where `invoice` = ?";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("s", $invoice);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13,
				$e14,
				$e15


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[0]			=	"A" . $e1;
					$data[1]			=	$e2;
					$data[2]	=	$e3;
					$data[3]	=	$e4;
					$data[4]	=	$e5;
					$data[5]	=	$e6;
					$data[6]	=	$e7;
					$data[7]	=	$e8;
					$data[8]	=	$e9;
					$data[9]	=	$e10;
					$data[10]	=	$e11;
					$data[11]	=	$e12;
					$data[12]	=	$e13;
					$data[13]	=	$e14;
					$data[14]	=	$e15;



					$row++;
				}



				return $data;
			}
			return false;
		}
	}











	function edit_order(
		$invoice,
		$date,
		$time,
		$loading_point,
		$unloading_point,
		$sup_dets,
		$q_o_m,
		$product_type,
		$address,
		$remark,
		$vech_no,
		$user
	) {



		$s_date	=	date("Y-m-d");
		$s_time	=	date("H:i:s");



		if ($stmt = $this->con->prepare("UPDATE `orderpkt` SET
                `date`='" . $date . "',
                `time`='" . $time . "',
                `s_date`='" . $s_date . "',
                `s_time`='" . $s_time . "',
                `loading_point`='" . $loading_point . "',
                `unloading_point`='" . $unloading_point . "',
                `sup_dets`='" . $sup_dets . "',
                `q_o_m`='" . $q_o_m . "',
                `product_type`='" . $product_type . "',
                `address`='" . $address . "',
                `remark`='" . $remark . "',
                `vech_no`='" . $vech_no . "',
               
                `user`='" . $user . "'
               
                  where `invoice` =?")) {

			$stmt->bind_param("s", $invoice);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}



















	function get_user_id($email)
	{



		$url = "SELECT `email`, `name`, `mobile`,
`password`, `work`, `role`, `active`, `who_create`, `date`, `time` FROM `user` where `email` = ?";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("s", $email);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[0]			=	$e1;
					$data[1]			=	$e2;
					$data[2]	=	$e3;
					$data[3]	=	$e4;
					$data[4]	=	$e5;
					$data[5]	=	$e6;
					$data[6]	=	$e7;
					$data[7]	=	$e8;
					$data[8]	=	$e9;
					$data[9]	=	$e10;




					$row++;
				}



				return $data;
			}
			return false;
		}
	}







	function get_student_id($email)
	{



		$url = "SELECT `email`, `name`, `mobile`, `password`, `work`, 
                `role`, `active`, `who_create`, `date`, `time`, `active_by_name`,
             `login_time`, `active_by_email`, `remark`, `logout_time`, `aadhar_no`, 
            `father_name`, `class`, `admission_date`, `last_name` FROM `user` where `email` = ?";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("s", $email);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13,
				$e14,
				$e15,
				$e16,
				$e17,
				$e18,
				$e19,
				$e20


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[0]			=	$e1;
					$data[1]			=	$e2;
					$data[2]	=	$e3;
					$data[3]	=	$e4;
					$data[4]	=	$e5;
					$data[5]	=	$e6;
					$data[6]	=	$e7;
					$data[7]	=	$e8;
					$data[8]	=	$e9;
					$data[9]	=	$e10;
					$data[10]	=	$e11;
					$data[11]	=	$e12;
					$data[12]	=	$e13;
					$data[13]	=	$e14;
					$data[14]	=	$e15;
					$data[15]	=	$e16;
					$data[16]	=	$e17;
					$data[17]	=	$e18;
					$data[18]	=	$e19;
					$data[19]	=	$e20;


					$row++;
				}



				return $data;
			}
			return false;
		}
	}



	//get_class_name()


	function get_class_name($email, $days, $pe)
	{



		$url = "SELECT `class_id` FROM `class_r` where `teacher_id` = ? AND `day_id` = ? AND `period_id` = ?";



		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("sss", $email, $days, $pe);


			$stmt->bind_result($e1);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {
					return $e1;
				} else {

					return "";
				}
			}
			return "";
		}
	}









	function get_class_count($class, $days, $pe)
	{



		$url = "SELECT Count(*) FROM `class_r` where  `day_id` = ? AND `period_id` = ? AND `class_id` = ?";



		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("ssi", $days, $pe, $class);


			$stmt->bind_result($e1);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {
					return $e1;
				} else {

					return "0";
				}
			}
			return "0";
		}
	}








	function get_teacher_id($email)
	{



		$url = "SELECT `email`, `name`, `mobile`, `password`, `work`, 
                `role`, `active`, `who_create`, `date`, `time`, `active_by_name`,
             `login_time`, `active_by_email`, `remark`, `logout_time`, `aadhar_no`, 
            `father_name`, `class`, `admission_date`, `last_name`, `subject`, `experience`, `serail`, `count` FROM `user` where `email` = ?";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("s", $email);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13,
				$e14,
				$e15,
				$e16,
				$e17,
				$e18,
				$e19,
				$e20,
				$e21,
				$e22,
				$e23,
				$e24


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[0]			=	$e1;
					$data[1]			=	$e2;
					$data[2]	=	$e3;
					$data[3]	=	$e4;
					$data[4]	=	$e5;
					$data[5]	=	$e6;
					$data[6]	=	$e7;
					$data[7]	=	$e8;
					$data[8]	=	$e9;
					$data[9]	=	$e10;
					$data[10]	=	$e11;
					$data[11]	=	$e12;
					$data[12]	=	$e13;
					$data[13]	=	$e14;
					$data[14]	=	$e15;
					$data[15]	=	$e16;
					$data[16]	=	$e17;
					$data[17]	=	$e18;
					$data[18]	=	$e19;
					$data[19]	=	$e20;
					$data[20]	=	$e21;
					$data[21]	=	$e22;
					$data[22]	=	$e23;
					$data[23]	=	$e24;


					$row++;
				}



				return $data;
			}
			return false;
		}
	}








	function edit_class(
		$e1_class_id,
		$e1_start_time,
		$e1_end_time,
		$e1_date,
		$e1_room_id,
		$e1_teacher_id,
		$e1_remark,
		$invoice_id,
		$e1_period_id,
		$e1_day_id,
		$e1_subject_id
	) {


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		if ($stmt = $this->con->prepare("UPDATE `class_r` SET
                `class_id`='" . $e1_class_id . "',
                `start_time`='" . $e1_start_time . "',
                `end_time`='" . $e1_end_time . "',
                `date_s`='" . $e1_date . "',
                `room_id`='" . $e1_room_id . "',
                `teacher_id`='" . $e1_teacher_id . "',
                `remark`='" . $e1_remark . "',

                `period_id`='" . $e1_period_id . "',
                `day_id`='" . $e1_day_id . "',
                `subject_id`='" . $e1_subject_id . "',
             
               
                `date`='" . $date . "',
                `time`='" . $time . "'
              
               
                  where `id` =?")) {

			$stmt->bind_param("i", $invoice_id);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}


















	function edit_profile(
		$e1_name,
		$e1_email,
		$e1_mobile,
		$e1_aadhar,
		$e1_f_name,
		$e1_class_id,
		$e1_admission,
		$e1_work,
		$e1_password,
		$e1_last_name
	) {


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		if ($stmt = $this->con->prepare("UPDATE `user` SET
                `name`='" . $e1_name . "',
                `mobile`='" . $e1_mobile . "',
                `password`='" . $e1_password . "',
                `work`='" . $e1_work . "',
                `last_name`='" . $e1_last_name . "',
                `aadhar_no`='" . $e1_aadhar . "',
                `father_name`='" . $e1_f_name . "',
                `class`='" . $e1_class_id . "',
                `admission_date`='" . $e1_admission . "',
               
                `date`='" . $date . "',
                `time`='" . $time . "'
              
               
                  where `email` =?")) {

			$stmt->bind_param("s", $e1_email);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}




	function edit_profile_a($email, $name, $mobile, $password, $work)
	{


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		if ($stmt = $this->con->prepare("UPDATE `user` SET
                `name`='" . $name . "',
                `mobile`='" . $mobile . "',
                `password`='" . $password . "',
                `work`='" . $work . "',
               
                `date`='" . $date . "',
                `time`='" . $time . "'
              
               
                  where `email` =?")) {

			$stmt->bind_param("s", $email);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}







	function edit_profile_t(
		$e1_name,
		$e1_email,
		$e1_mobile,
		$e1_aadhar,
		$e1_f_name,
		$e1_class_id,
		$e1_admission,
		$e1_work,
		$e1_password,
		$e1_last_name,
		$e1_subject_id,
		$e1_experinece,
		$e1_serial,
		$e1_routine
	) {


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		if ($stmt = $this->con->prepare("UPDATE `user` SET
                `name`='" . $e1_name . "',
                `mobile`='" . $e1_mobile . "',
                `password`='" . $e1_password . "',
                `work`='" . $e1_work . "',
                `last_name`='" . $e1_last_name . "',
                `aadhar_no`='" . $e1_aadhar . "',
                `father_name`='" . $e1_f_name . "',
                `class`='" . $e1_class_id . "',
                `admission_date`='" . $e1_admission . "',
                `subject`='" . $e1_subject_id . "',
                `experience`='" . $e1_experinece . "',
                `serail`='" . $e1_serial . "',
                `count`='" . $e1_routine . "',
               
                `date`='" . $date . "',
                `time`='" . $time . "'
              
               
                  where `email` =?")) {

			$stmt->bind_param("s", $e1_email);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}






	function edit_login_time($email)
	{


		$date	=	date("Y-m-d H:i:s");
		$time	=	date("H:i:s");




		if ($stmt = $this->con->prepare("UPDATE `user` SET
                `login_time`='" . $date . "'
                
              
               
                  where `email` =?")) {

			$stmt->bind_param("s", $email);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}




	function edit_logout_time($email)
	{


		$date	=	date("Y-m-d H:i:s");
		$time	=	date("H:i:s");




		if ($stmt = $this->con->prepare("UPDATE `user` SET
                `logout_time`='" . $date . "'
                
              
               
                  where `email` =?")) {

			$stmt->bind_param("s", $email);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}





	function dashboard_today($email)
	{


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		$url = "SELECT COUNT(*) FROM `orderpkt` WHERE `user`=? AND `date`=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("ss", $email, $date);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}

			return false;
		}
	}



	function dashboard_month($email)
	{


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");
		$newDate = date('Y-m-d', strtotime('-1 month'));


		$url = "SELECT COUNT(*) FROM `orderpkt` WHERE `user`=? AND `date`>=? AND  `date`<=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("sss", $email, $newDate, $date);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}
			return false;
		}
	}









	function dashboard_year($email)
	{


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");
		$time1 = strtotime("-1 year", time());
		$newDate = date("Y-m-d", $time1);


		$url = "SELECT COUNT(*) FROM `orderpkt` WHERE `user`=? AND `date`>=? AND  `date`<=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("sss", $email, $newDate, $date);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}
			return false;
		}
	}








	function dashboard_all($email)
	{




		$url = "SELECT COUNT(*) FROM `orderpkt` WHERE `user`=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("s", $email);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}
			return false;
		}
	}









	function dashboard_student($email)
	{


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		$url = "SELECT COUNT(*) FROM `user` WHERE `role`='2'";

		if ($stmt = $this->con->prepare($url)) {


			//  $stmt->bind_param("s",$date);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}

			return false;
		}
	}





	function dashboard_teacher($email)
	{


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		$url = "SELECT COUNT(*) FROM `user` WHERE `role`='1'";

		if ($stmt = $this->con->prepare($url)) {


			//  $stmt->bind_param("s",$date);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}

			return false;
		}
	}




	function dashboard_admin($email)
	{


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		$url = "SELECT COUNT(*) FROM `user` WHERE `role`='0'";

		if ($stmt = $this->con->prepare($url)) {


			//  $stmt->bind_param("s",$date);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}

			return false;
		}
	}




	function dashboard_class($email)
	{


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		$url = "SELECT COUNT(*) FROM `class_r`";

		if ($stmt = $this->con->prepare($url)) {


			//  $stmt->bind_param("s",$date);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}

			return false;
		}
	}




	function dashboard_a_month($email)
	{


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");
		$newDate = date('Y-m-d', strtotime('-1 month'));


		$url = "SELECT COUNT(*) FROM `orderpkt` WHERE  `date`>=? AND  `date`<=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("ss", $newDate, $date);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}
			return false;
		}
	}









	function dashboard_a_year($email)
	{


		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");
		$time1 = strtotime("-1 year", time());
		$newDate = date("Y-m-d", $time1);


		$url = "SELECT COUNT(*) FROM `orderpkt` WHERE  `date`>=? AND  `date`<=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("ss", $newDate, $date);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}
			return false;
		}
	}








	function dashboard_a_all($email)
	{




		$url = "SELECT COUNT(*) FROM `orderpkt`";

		if ($stmt = $this->con->prepare($url)) {


			//  $stmt->bind_param("s",$email);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}
			return false;
		}
	}







	function dashboard_a_all_operator()
	{




		$url = "SELECT COUNT(*) FROM `user` WHERE `role`='1'";

		if ($stmt = $this->con->prepare($url)) {


			//  $stmt->bind_param("s",$email);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}
			return false;
		}
	}








	function dashboard_a_all_a_operator()
	{




		$url = "SELECT COUNT(*) FROM `user` WHERE `role`='1' AND `active`='0'";

		if ($stmt = $this->con->prepare($url)) {


			//  $stmt->bind_param("s",$email);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}
			return false;
		}
	}




	function dashboard_a_all_admin()
	{




		$url = "SELECT COUNT(*) FROM `user` WHERE `role`='0'";

		if ($stmt = $this->con->prepare($url)) {


			//  $stmt->bind_param("s",$email);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}
			return false;
		}
	}










	function get_p_operator()
	{



		$url = "SELECT `email`, `name`, `mobile`,
`password`, `work`, `role`, `active`, `who_create`, `date`,
`time`, `active_by_name`, `login_time`, `active_by_email`
FROM `user` WHERE `role`='1' AND `active`='1'";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					$data[$row][11]	=	$e12;
					$data[$row][12]	=	$e13;




					$row++;
				}



				return $data;
			}
			return false;
		}
	}






	function get_d_operator()
	{



		$url = "SELECT `email`, `name`, `mobile`,
`password`, `work`, `role`, `active`, `who_create`, `date`,
`time`, `active_by_name`, `login_time`, `active_by_email`
FROM `user` WHERE `role`='1' AND `active`='2'";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					$data[$row][11]	=	$e12;
					$data[$row][12]	=	$e13;




					$row++;
				}



				return $data;
			}
			return false;
		}
	}














	function get_s_operator()
	{



		$url = "SELECT `email`, `name`, `mobile`,
`password`, `work`, `role`, `active`, `who_create`, `date`,
`time`, `active_by_name`, `login_time`, `active_by_email`
FROM `user` WHERE `role`='1' AND `active`='3'";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					$data[$row][11]	=	$e12;
					$data[$row][12]	=	$e13;




					$row++;
				}



				return $data;
			}
			return false;
		}
	}















	function get_a_operator()
	{



		$url = "SELECT `email`, `name`, `mobile`,
`password`, `work`, `role`, `active`, `who_create`, `date`,
`time`, `active_by_name`, `login_time`, `active_by_email`, `logout_time`
FROM `user` WHERE  `role`='1' AND `active`='0'";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13,
				$e14


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					$data[$row][11]	=	$e12;
					$data[$row][12]	=	$e13;
					$data[$row][13]	=	$e14;




					$row++;
				}



				return $data;
			}
			return false;
		}
	}








	function get_aa_operator()
	{



		$url = "SELECT `email`, `name`, `mobile`,
`password`, `work`, `role`, `active`, `who_create`, `date`,
`time`, `active_by_name`, `login_time`, `active_by_email`, `logout_time`
FROM `user` WHERE  `role`='1'";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13,
				$e14


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					$data[$row][11]	=	$e12;
					$data[$row][12]	=	$e13;
					$data[$row][13]	=	$e14;




					$row++;
				}



				return $data;
			}
			return false;
		}
	}






	function get_student()
	{



		$url = "SELECT `email`, `name`, `mobile`, `password`, `work`,
`role`, `active`, `who_create`, `date`, `time`, `active_by_name`,
`login_time`, `active_by_email`, `remark`, `logout_time`,
`aadhar_no`, `father_name`, `class`, `admission_date`, `last_name` FROM `user` WHERE  `role`='2'";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13,
				$e14,
				$e15,
				$e16,
				$e17,
				$e18,
				$e19,
				$e20


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					$data[$row][11]	=	$e12;
					$data[$row][12]	=	$e13;
					$data[$row][13]	=	$e14;
					$data[$row][14]	=	$e15;
					$data[$row][15]	=	$e16;
					$data[$row][16]	=	$e17;
					$data[$row][17]	=	$e18;
					$data[$row][18]	=	$e19;
					$data[$row][19]	=	$e20;




					$row++;
				}



				return $data;
			}
			return false;
		}
	}






	function get_teacher()
	{



		$url = "SELECT `email`, `name`,`mobile`, `last_name`, `password`, `work`,
`role`, `active`, `who_create`, `date`, `time`, `active_by_name`,
`login_time`, `active_by_email`, `remark`, `logout_time`,
`aadhar_no`, `father_name`, `class`, `admission_date`, `last_name`, `subject`, `experience`, `serail`, `count` FROM `user` WHERE  `role`='1'";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(

				$e1,
				$e2,
				$emobile,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12,
				$e13,
				$e14,
				$e15,
				$e16,
				$e17,
				$e18,
				$e19,
				$e20,
				$e21,
				$e22,
				$e23,
				$e24


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records


				
				while ($stmt->fetch()) {
					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row]['mobile'] = $emobile;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					$data[$row][11]	=	$e12;
					$data[$row][12]	=	$e13;
					$data[$row][13]	=	$e14;
					$data[$row][14]	=	$e15;
					$data[$row][15]	=	$e16;
					$data[$row][16]	=	$e17;
					$data[$row][17]	=	$e18;
					$data[$row][18]	=	$e19;
					$data[$row][19]	=	$e20;
					$data[$row][20]	=	$e21;
					$data[$row][21]	=	$e22;
					$data[$row][22]	=	$e23;
					$data[$row][23]	=	$e24;




					$row++;
				}



				return $data;
			}
			return false;
		}
	}















	function get_class()
	{



		$url = "SELECT `id`, `class_id`, `start_time`, `end_time`,
               `date_s`, `room_id`, `teacher_id`, `remark`, `date`, `time`, `period_id`, `day_id` FROM `class_r`";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11,
				$e12


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					$data[$row][11]	=	$e12;





					$row++;
				}



				return $data;
			}
			return false;
		}
	}












	function get_class_id($edit)
	{



		$url = "SELECT `id`, `class_id`, `start_time`, `end_time`,
               `date_s`, `room_id`, `teacher_id`, `remark`, `date`, `time` FROM `class_r` where `id` = ?";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("i", $edit);


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[0]			=	$e1;
					$data[1]			=	$e2;
					$data[2]	=	$e3;
					$data[3]	=	$e4;
					$data[4]	=	$e5;
					$data[5]	=	$e6;
					$data[6]	=	$e7;
					$data[7]	=	$e8;
					$data[8]	=	$e9;
					$data[9]	=	$e10;





					$row++;
				}



				return $data;
			}
			return false;
		}
	}










	function account_active($email, $your_name, $your_email, $remark, $active)
	{


		if ($stmt = $this->con->prepare("UPDATE `user` SET
                `active`='" . $active . "',
                `active_by_name`='" . $your_name . "',
                `active_by_email`='" . $your_email . "',
                `remark`='" . $remark . "'
               



                  where `email` =?")) {

			$stmt->bind_param("s", $email);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}












	function add_class_new(
		$e1_class_name,
		$e1_no_of_p
	) {



		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		if ($stmt = $this->con->prepare("INSERT INTO `class`( `class_name`, `no_of_p`, `date`, `time`) VALUES  (
					?,?,?,?)")) {



			$stmt->bind_param(
				"ssss",
				$e1_class_name,
				$e1_no_of_p,
				$date,
				$time
			);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}













	function get_class_new()
	{



		$url = "SELECT `id`, `class_name`, `no_of_p`, `date`, `time` FROM `class`";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4,
				$e5


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;


					$row++;
				}



				return $data;
			}
			return false;
		}
	}



	function get_teacher_routine_new()
	{



		$url = "SELECT `id`, `techer_id`, `techer_name` FROM `add_techer`";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(

				$e1,
				$e2,
	            $e3,

			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					 $data[$row][2]	=	$e3;
					// $data[$row][3]	=	$e4;
					// $data[$row][4]	=	$e5;


					$row++;
				}



				return $data;
			}
			return false;
		}
	}


	function get_assigned_teacher_c($id)
	{

		$url = "SELECT * FROM `techer_assign` WHERE `class_id`=?";

		if ($stmt = $this->con->prepare($url)) {
			$stmt->bind_param("i", $id);

			$stmt->bind_result($e1,$e2,$e3,$e4,$e5,$e6,$e7,$e8,$e9,$e10,$e11);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;

				while ($stmt->fetch()) {

					$data[$row][0]	=	$e1;
					$data[$row][1]	=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					
					$row++;
				}
				return $data;
			}
			return "";
		}
	}

	function get_assigned_teacher_e($id)
	{
		$url = "SELECT * FROM `techer_assign` WHERE `techer_id`=?";

		if ($stmt = $this->con->prepare($url)) {
			$stmt->bind_param("s", $id);

			$stmt->bind_result($e1,$e2,$e3,$e4,$e5,$e6,$e7,$e8,$e9,$e10,$e11);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;

				while ($stmt->fetch()) {

					$data[$row][0]	=	$e1;
					$data[$row][1]	=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;
					
					$row++;
				}
				return $data;
			}
			return "";
		}
	}

	function get_class_name1($id)
	{

		$url = "SELECT `class_name` FROM `class`  WHERE `id`=?";

		if ($stmt = $this->con->prepare($url)) {
			$stmt->bind_param("i", $id);

			$stmt->bind_result($e1);

			if ($stmt->execute()) {
				if ($stmt->fetch()) {
					return $e1;
				}
			}
			return "";
		}
	}

	function get_class_period($id)
	{

		$url = "SELECT `no_of_p` FROM `class`  WHERE `id`=?";

		if ($stmt = $this->con->prepare($url)) {
			$stmt->bind_param("i", $id);

			$stmt->bind_result($e1);

			if ($stmt->execute()) {
				if ($stmt->fetch()) {
					return $e1;
				}
			}
			return "";
		}
	}


	function get_techer_name($id)
	{




		$url = "SELECT `name` FROM `user`  WHERE `email`=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("i", $id);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}









	function add_subject(
		$e1_timing,
		$e1_break,
		$e1_class_id,
		$e1_class_name,
		$e1_subject,
		$e1_c_p_w,
		$subject_id
	) {



		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		if ($stmt = $this->con->prepare("INSERT INTO `subject`(`timing`,`break`,`class_id`, `class_name`, 
                 `subject_name`, `date`, `time`, `c_p_w`, `s_id`) VALUES  (
					?,?,?,?,?,?,?,?,?)")) {



			$stmt->bind_param(
				"sssssssss",
				$e1_timing,
				$e1_break,
				$e1_class_id,
				$e1_class_name,
				$e1_subject,
				$date,
				$time,
				$e1_c_p_w,
				$subject_id
			);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}







	function get_subject_new()
	{



		$url = "SELECT `id`, `class_id`, `class_name`, `subject_name`, `date`, `time`, `c_p_w` FROM `subject`";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;

				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;


					$row++;
				}



				return $data;
			}
			return false;
		}
	}












	function add_add_techer_new(
		$class_id,
		$performance_type,
		$e1_teacher_id,
		$e1_priority_id,
		$e1_subject_id,
		$e1_teacher_name
	) {



		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		if ($stmt = $this->con->prepare("INSERT INTO `add_techer`(`class_id`, `performance_type`, `techer_id`, `priority`, `subject_prefearence`, `date`, `time`, `techer_name`) VALUES  (
					?,?,?,?,?,?,?,?)")) {



			$stmt->bind_param(
				"ssssssss",
				$class_id,
				$performance_type,
				$e1_teacher_id,
				$e1_priority_id,
				$e1_subject_id,
				$date,
				$time,
				$e1_teacher_name
			);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}






	function get_subject_name1($id)
	{




		$url = "SELECT `subject_name` FROM `subject_entry`  WHERE `id`=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("i", $id);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}





	function get_techer_name1($id)
	{




		$url = "SELECT `name`,`last_name` FROM `user`  WHERE `email`=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("s", $id);


			$stmt->bind_result(
				$e1,
				$e2


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1 . $e2;
				}
			}
			return "";
		}
	}


	function add_techer_assign(
		$e1_class_id,
		$e1_class_name,
		$e1_subject_id,
		$e1_subject_name,
		$e1_teacher_id,
		$e1_teacher_name,
		$count,
		$day
	) {

		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");

		if ($stmt = $this->con->prepare("INSERT INTO `techer_assign`(`class_id`, `class_name`, `subject_id`, `subject_name`, `techer_id`, `techer_name`, `date`, `time`,`count`,`day`) VALUES  (
					?,?,?,?,?,?,?,?,?,?)")) {

			$stmt->bind_param(
				"ssssssssss",
				$e1_class_id,
				$e1_class_name,
				$e1_subject_id,
				$e1_subject_name,
				$e1_teacher_id,
				$e1_teacher_name,
				$date,
				$time,
				$count,
				$day
			);

			if ($stmt->execute()) {
				return true;
			}
			return false;
		}
	}
	
	
		function check_techer_assign1(
		$e1_class_id,
		$e1_class_name,
		$e1_subject_id,
		$e1_subject_name,
		$e1_teacher_id,
		$e1_teacher_name,
		$count,
		$day
	) {

	
//      	if ($stmt = $this->con->prepare("SELECT `id` FROM `techer_assign` WHERE  `class_id`=? AND `subject_id`=? AND `techer_id`=? AND `count`=? AND `day`=? ")) {
// 			$stmt->bind_param("iiiii", $e1_class_id,$e1_subject_id,$e1_teacher_id,$count,$day);
// 			if ($stmt->execute()) {
// 				return true;
// 			}
// 		} else {
// 			return false;
// 		}
		$url="SELECT `id` FROM `techer_assign` WHERE  `class_id`=? AND `subject_id`=? AND `techer_id`=? AND `count`=? AND `day`=? ";
		
		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("iisis", $e1_class_id,$e1_subject_id,$e1_teacher_id,$count,$day);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {





					return $e1;
				}
			}
			return false;
		}
		
	}
	
	
	

	function get_techer_new($e1_subject_id)
	{



		$url = "SELECT `id`, `techer_id`, `priority`, `subject_prefearence`, `date`, `time`, `techer_name` FROM `add_techer` WHERE `subject_prefearence`=? ORDER BY `priority`";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("i", $e1_subject_id);


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;


					$row++;
				}



				return $data;
			}
			return false;
		}
	}





	function get_techer_new1()
	{



		$url = "SELECT `id`, `techer_id`, `priority`, `subject_prefearence`, `date`, `time`, `techer_name` FROM `add_techer`";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("i",$e1_subject_id);


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;


					$row++;
				}



				return $data;
			}
			return false;
		}
	}





	function class_delete1($delete_id)
	{
		if ($stmt = $this->con->prepare("DELETE FROM `class`  WHERE  `id`=? ")) {
			$stmt->bind_param("i", $delete_id);
			if ($stmt->execute()) {
				return true;
			}
		} else {
			return false;
		}
	}




	function subject_delete1($delete_id)
	{
		if ($stmt = $this->con->prepare("DELETE FROM `subject`  WHERE  `id`=? ")) {
			$stmt->bind_param("i", $delete_id);
			if ($stmt->execute()) {
				return true;
			}
		} else {
			return false;
		}
	}


	function tecaher_delete1($delete_id)
	{
		if ($stmt = $this->con->prepare("DELETE FROM `add_techer`  WHERE  `id`=? ")) {
			$stmt->bind_param("i", $delete_id);
			if ($stmt->execute()) {
				return true;
			}
		} else {
			return false;
		}
	}







	function check_techer($e1_teacher_id, $e1_subject_id)
	{




		$url = "SELECT `id` FROM `add_techer`  WHERE `techer_id`=? AND `subject_prefearence`=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("si", $e1_teacher_id, $e1_subject_id);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}

	function get_techer_assign()
	{



		$url = "SELECT `id`, `class_id`, `class_name`, `subject_id`, `subject_name`, `techer_id`, `techer_name`, `date`, `time`,`count`,`day` FROM `techer_assign`";

		if ($stmt = $this->con->prepare(
			$url

		)) {


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9,
				$e10,
				$e11

			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records

				while ($stmt->fetch()) {

					$data[$row][0]	=	$e1;
					$data[$row][1]	=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;
					$data[$row][9]	=	$e10;
					$data[$row][10]	=	$e11;

					$row++;
				}

				return $data;
			}
			return false;
		}
	}


	function tecaher_assign_delete1($delete_id)
	{
		if ($stmt = $this->con->prepare("DELETE FROM `techer_assign`  WHERE  `id`=? ")) {
			$stmt->bind_param("i", $delete_id);
			if ($stmt->execute()) {
				return true;
			}
		} else {
			return false;
		}
	}



	function check_techer_assign($e1_teacher_id, $e1_subject_id, $e1_class_id)
	{

		$url = "SELECT `id` FROM `techer_assign`  WHERE `techer_id`=? AND `subject_id`=? AND `class_id`=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("sii", $e1_teacher_id, $e1_subject_id, $e1_class_id);


			$stmt->bind_result(
				$e1
			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}




	function add_class_duration(
		$e1_class_start,
		$e1_break,
		$e1_con_class
	) {



		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		if ($stmt = $this->con->prepare("INSERT INTO `class_duration`(`class_start`, `break`, `consecutive`) VALUES (
					?,?,?)")) {



			$stmt->bind_param("sss", $e1_class_start, $e1_break, $e1_con_class);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}



	function update_class_duration($e1_class_start, $e1_break, $e1_con_class)
	{



		if ($stmt = $this->con->prepare("UPDATE `class_duration` SET
                `class_start`='" . $e1_class_start . "',
                `break`='" . $e1_break . "',
                `consecutive`='" . $e1_con_class . "'
               



                  where `id` =?")) {




			$id = 1;
			$stmt->bind_param("i", $id);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}







	function get_class_duration()
	{


		$url = "SELECT `id`, `class_start`, `break`, `consecutive` FROM `class_duration`  WHERE `id`=?";

		if ($stmt = $this->con->prepare($url)) {


			$id = 1;
			$stmt->bind_param("i", $id);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
			);

			if ($stmt->execute()) {

				$data	=	array();
				if ($stmt->fetch()) {


					$data["id"] =	$e1;
					$data["class_start"]	=	$e2;
					$data["break"]	=	$e3;
					$data["consecutive"]	=	$e4;


					return $data;
				}
			}
			return "";
		}
	}







	function get_class_duration1()
	{




		$url = "SELECT `id`, `class_start`, `break`, `consecutive` FROM `class_duration`";

		if ($stmt = $this->con->prepare($url)) {


			//  $stmt->bind_param("i",$id);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e2;
				}
			}
			return "";
		}
	}







	function get_subject_new1($id1)
	{



		$url = "SELECT `id`, `class_id`, `class_name`, `subject_name`, `date`, `time`, `c_p_w`, `s_id` FROM `subject`  WHERE `class_id`=?";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("i", $id1);


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;


					$row++;
				}



				return $data;
			}
			return false;
		}
	}








	function get_class_routine1($id1, $id2, $id3)
	{




		$url = "SELECT `id`, `row`, `col`, `teacher_id`, `subject_id`, `class_id`, `date`, `time` FROM `class_routine` WHERE `row`=? AND `col`=? AND `class_id`=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("iii", $id1, $id2, $id3);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8
			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					$data["id"] =	$e1;
					$data["row"]	=	$e2;
					$data["col"]	=	$e3;
					$data["teacher_id"]	=	$e4;
					$data["subject_id"]	=	$e5;
					$data["class_id"]	=	$e6;
					$data["date"]	=	$e7;
					$data["time"]	=	$e8;


					return $data;

					//return $e1;
				}
			}
			return "";
		}
	}





	function get_class_routine_techer($id1, $id2, $id3)
	{




		$url = "SELECT `id`, `row`, `col`, `teacher_id`, `subject_id`, `class_id`, `date`, `time` FROM `class_routine` WHERE `row`=? AND `col`=? AND `teacher_id`=?";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("iis", $id1, $id2, $id3);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8
			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					$data["id"] =	$e1;
					$data["row"]	=	$e2;
					$data["col"]	=	$e3;
					$data["teacher_id"]	=	$e4;
					$data["subject_id"]	=	$e5;
					$data["class_id"]	=	$e6;
					$data["date"]	=	$e7;
					$data["time"]	=	$e8;


					return $data;

					//return $e1;
				}
			}
			return "";
		}
	}















	function get_c_p_w($id1)
	{



		$url = "SELECT `id`, `class_id`, `class_name`, `subject_name`, `date`, `time`, `c_p_w` FROM `subject`  WHERE `class_id`=?";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("i", $id1);


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]	=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;


					$row++;
				}



				return $data;
			}
			return false;
		}
	}






	function get_allowacate_teacher($id1, $id2)
	{



		$url = "SELECT `id`, `class_id`, `class_name`, `subject_id`, `subject_name`, `techer_id`, `techer_name`, `date`, `time` FROM `techer_assign`  WHERE `class_id`=? AND `subject_id`=? ";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			$stmt->bind_param("ii", $id1, $id2);


			$stmt->bind_result(

				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8,
				$e9


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]	=	$e1;
					$data[$row][1]			=	$e2;
					$data[$row][2]	=	$e3;
					$data[$row][3]	=	$e4;
					$data[$row][4]	=	$e5;
					$data[$row][5]	=	$e6;
					$data[$row][6]	=	$e7;
					$data[$row][7]	=	$e8;
					$data[$row][8]	=	$e9;



					$row++;
				}



				return $data;
			}
			return false;
		}
	}








	function add_class_routine(
		$e1_row,
		$e1_col,
		$e1_teacher_id,
		$e1_subject_id,
		$e1_class_id
	) {



		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");




		if ($stmt = $this->con->prepare("INSERT INTO `class_routine`(`row`, `col`, `teacher_id`, `subject_id`, `class_id`, `date`, `time`) VALUES (
					?,?,?,?,?,?,?)")) {



			$stmt->bind_param(
				"sssssss",
				$e1_row,
				$e1_col,
				$e1_teacher_id,
				$e1_subject_id,
				$e1_class_id,
				$date,
				$time
			);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}









	function get_avalibale_left($techaer, $row, $col)
	{




		$url = "SELECT `id`, `row`, `col`, `teacher_id`, `subject_id`, `class_id`, `date`, `time` FROM `class_routine`  WHERE `teacher_id`=? AND `row`=? AND `col`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("sii", $techaer, $row, $col);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}







	function get_avalibale_1($class_id, $row, $col)
	{




		$url = "SELECT `id`, `row`, `col`, `teacher_id`, `subject_id`, `class_id`, `date`, `time` FROM `class_routine`  WHERE `class_id`=? AND `row`=? AND `col`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("iii", $class_id, $row, $col);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}








	function get_count_techer($class_id, $subject_id)
	{




		$url = "SELECT  Count(*) FROM `techer_assign`  WHERE `class_id`=? AND `subject_id`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("ii", $class_id, $subject_id);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return 1;
		}
	}




	function get_class_routine_value1($row, $col, $class_id)
	{




		$url = "SELECT `class_id`,`subject_id` FROM `class_routine` 
                  WHERE `row`=? AND `col`=? AND `teacher_id`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("iis", $row, $col, $class_id);


			$stmt->bind_result(
				$e1,
				$e2


			);

			if ($stmt->execute()) {

				$data	=	array();


				if ($stmt->fetch()) {




					$data["teacher"] = $e1;
					$data["subject"] = $e2;


					return $data;
				}
			}
			return "";
		}
	}



	function get_class_routine_value11($count, $day, $t_id)
	{




		$url = "SELECT `class_id`,`subject_id` FROM `techer_assign` 
                  WHERE `count`=? AND `day`=? AND `techer_id`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("iis", $count, $day, $t_id);


			$stmt->bind_result(
				$e1,
				$e2


			);

			if ($stmt->execute()) {

				$data	=	array();


				if ($stmt->fetch()) {




					$data["teacher"] = $e1;
					$data["subject"] = $e2;


					return $data;
				}
			}
			return "";
		}
	}




	function get_class_routine_value($row, $col, $class_id)
	{




		$url = "SELECT `teacher_id`,`subject_id` FROM `class_routine` 
                  WHERE `row`=? AND `col`=? AND `class_id`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("iis", $row, $col, $class_id);


			$stmt->bind_result(
				$e1,
				$e2


			);

			if ($stmt->execute()) {

				$data	=	array();


				if ($stmt->fetch()) {




					$data["teacher"] = $e1;
					$data["subject"] = $e2;


					return $data;
				}
			}
			return "";
		}
	}


















	function get_avalibale_row($techaer, $row, $class_id)
	{




		$url = "SELECT `id`, `row`, `col`, `teacher_id`, `subject_id`, `class_id`, `date`, `time` FROM `class_routine`  WHERE `teacher_id`=? AND `row`=? AND `class_id`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("sii", $techaer, $row, $class_id);


			$stmt->bind_result(
				$e1,
				$e2,
				$e3,
				$e4,
				$e5,
				$e6,
				$e7,
				$e8


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}







	function get_check_row($class_id, $row)
	{




		$url = "SELECT Count(*) FROM `class_routine`  WHERE   `class_id`=?  AND `row`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("ii", $class_id, $row);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}







	function check_total_count($class_id)
	{




		$url = "SELECT Count(*) FROM `class_routine`  WHERE   `class_id`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("i", $class_id);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}







	function get_avalibale_teacher($var_class_id, $c1, $c2)
	{



		$url = "SELECT `teacher_id` FROM `class_routine`  WHERE `class_id`=? AND `row`=? AND `col`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("iii", $var_class_id, $c1, $c2);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}



















	function add_class_routine1(
		$e1_row,
		$e1_col,
		$e1_teacher_id,
		$e1_subject_id,
		$e1_class_id,
		$id
	) {



		$s_date	=	date("Y-m-d");
		$s_time	=	date("H:i:s");



		if ($stmt = $this->con->prepare("UPDATE `class_routine` SET
                `row`='" . $e1_row . "',
                `col`='" . $e1_col . "',
                `teacher_id`='" . $e1_teacher_id . "',
                `subject_id`='" . $e1_subject_id . "',
                `class_id`='" . $e1_class_id . "'
               
               
                  where `id` =?")) {

			$stmt->bind_param("i", $id);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}










	function get_avalibale_teacher_id($var_class_id, $c1, $c2)
	{



		$url = "SELECT `id` FROM `class_routine`  WHERE `class_id`=? AND `row`=? AND `col`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("iii", $var_class_id, $c1, $c2);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}









	function get_avalibale_teacher_s_id($var_class_id, $c1, $c2)
	{



		$url = "SELECT `subject_id` FROM `class_routine`  WHERE `class_id`=? AND `row`=? AND `col`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("iii", $var_class_id, $c1, $c2);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}














	function get_subject_new2()
	{



		$url = "SELECT `id`, `subject_name` FROM `subject_entry`";



		//echo $url;
		//echo $search;
		if ($stmt = $this->con->prepare(


			$url

		)) {


			//  $stmt->bind_param("s",$user);


			$stmt->bind_result(

				$e1,
				$e2


			);

			if ($stmt->execute()) {
				$data	=	array();
				$row	=	0;
				//while loop for fetching multiple records



				while ($stmt->fetch()) {

					$data[$row][0]			=	$e1;
					$data[$row][1]			=	$e2;




					$row++;
				}



				return $data;
			}
			return false;
		}
	}

















	function add_subject2(
		$e1_subject
	) {







		if ($stmt = $this->con->prepare("INSERT INTO `subject_entry`(`subject_name`) VALUES  (
					?)")) {



			$stmt->bind_param(
				"s",
				$e1_subject
			);

			if ($stmt->execute()) {

				return true;
			}


			return false;
		}
	}











	function get_subject_name2($t_id)
	{



		$url = "SELECT `subject_name` FROM `subject_entry`  WHERE `id`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("i", $t_id);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1;
				}
			}
			return "";
		}
	}





	function get_admin_teacher($t_id)
	{



		$url = "SELECT `subject_prefearence`,Count(*) FROM `add_techer`  WHERE `techer_id`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("s", $t_id);


			$stmt->bind_result(
				$e1,
				$e2


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {
					if ($e2 != 1) {
						return "ANY";
					} else {

						//  return "ANY";
						return   $e1;
					}


					//return $e1;
				}
			}
			return "ANY";
		}
	}









	function subject_delete2($delete_id)
	{
		if ($stmt = $this->con->prepare("DELETE FROM `subject_entry`  WHERE  `id`=? ")) {
			$stmt->bind_param("i", $delete_id);
			if ($stmt->execute()) {
				return true;
			}
		} else {
			return false;
		}
	}



	function get_avalibale_v1($class_id, $t_id)
	{




		$url = "SELECT `count` FROM `techer_assign`  WHERE `class_id`=? AND `techer_id`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("is", $class_id, $t_id);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1 . "";
				}
			}
			return "";
		}
	}




	//check

	function get_avalibale_v2($class_id, $t_id)
	{




		$url = "SELECT COUNT(*) FROM `class_routine`  WHERE `class_id`=? AND `teacher_id`=? ";

		if ($stmt = $this->con->prepare($url)) {


			$stmt->bind_param("is", $class_id, $t_id);


			$stmt->bind_result(
				$e1


			);

			if ($stmt->execute()) {


				if ($stmt->fetch()) {

					return $e1 . "";
				}
			}
			return "";
		}
	}
}//END
