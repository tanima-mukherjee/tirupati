<?php

	require('../config/db.php');

	session_start();

	

	

	function uniquenumber($length)

	{

		$random= "";

		$data = "";

		srand((double)microtime()*1000000);

		

		$data = "9876549876542156012";

		$data .= "0123456789";

		

		for($i = 0; $i < $length; $i++)

		{

			if($i>9)

			{

				break;

			}

			else

			{

				$random .= substr($data, (rand()%(strlen($data))), 1);

			}

		}

		return $random;

	}



	if(isset($_SESSION['rooms0']))

	{

        

        $f_name = $_SESSION['rooms0']['f_name'];

		$email = $_SESSION['rooms0']['email'];

        $phone = $_SESSION['rooms0']['phone'];

        $room_total = $_REQUEST['total'];

		$json = $_REQUEST['json'];
		
		$check_in_date = $_REQUEST['check_in_date'];
		$check_out_date = $_REQUEST['check_out_date'];

		$order_id = time().uniquenumber(5);

		

		$booking_date = date('Y-m-d H:i:s');



		$query = 'INSERT INTO `room_booking`( `full_name`, `email`, `phone`, `room_info`, `room_charge`, `order_id`,booking_date,check_in_date,check_out_date) VALUES ("'.$f_name.'","'.$email.'","'.$phone.'","'.$json.'","'.$room_total.'","'.$order_id.'","'.$booking_date.'","'.$check_in_date.'","'.$check_out_date.'")';

		



		if(mysqli_query($con,$query))

		{

			echo '1';

			unset($_SESSION['rooms0']);

			

			$id = mysqli_insert_id($con);

			$_SESSION['final']['email'] = $email;

			$_SESSION['final']['f_name'] = $f_name;

			$_SESSION['final']['phone'] = $phone;

			$_SESSION['final']['purpose'] = 'Hotel booking for Tirupati Darsan';

			$_SESSION['final']['total'] =  $room_total;

			$_SESSION['final']['order_id'] = $id;

			$_SESSION['final']['unique_order_id'] = $order_id;

			//unset($_SESSION['final']);

		}

		else

		{

			echo 'error';

		}

        

		



	}

 ?>