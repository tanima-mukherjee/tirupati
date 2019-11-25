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
	
	function checkParam($finalArray)
	{
		$error = 0;
		$err_msg = '';
		
		if(!array_key_exists('date',$finalArray) || empty($finalArray['date']))
		{
			$error = 1;
			$err_msg = "Date should not empty";	
		}
		if(!array_key_exists('time',$finalArray) || empty($finalArray['time']))
		{
			$error = 1;
			$err_msg = "Time should not empty";	
		}
		if(!array_key_exists('devotees',$finalArray) || empty($finalArray['devotees']))
		{
			$error = 1;
			$err_msg = "Devotees should not empty";	
		}
		if(!array_key_exists('f_name',$finalArray) || empty($finalArray['f_name']))
		{
			$error = 1;
			$err_msg = "Name should not empty";	
		}
		if(!array_key_exists('email',$finalArray) || empty($finalArray['email']))
		{
			$error = 1;
			$err_msg = "Email should not empty";	
		}
		if(!array_key_exists('phone',$finalArray) || empty($finalArray['phone']))
		{
			$error = 1;
			$err_msg = "Phone should not empty";	
		}
		if(!array_key_exists('ticket',$finalArray) || empty($finalArray['ticket']))
		{
			$error = 1;
			$err_msg = "Ticket should not empty";	
		}		
		if(!array_key_exists('total',$finalArray) || empty($finalArray['total']))
		{
			$error = 1;
			$err_msg = "Price should not empty";	
		}
			
		return array('error'=>$error,'err_msg'=>$err_msg);
		
	}
	
	
	if(isset($_SESSION['final']) )
	{
		
		$finalArray = $_SESSION['final'];
		
		$param_response = checkParam($finalArray);	
		if($param_response['error'] == 1)
		{
			echo $param_response['err_msg'];
			exit;
		}
		
		$date_arr = explode("-",$finalArray['date']);
		
		$date = $date_arr[2]."-".$date_arr[1]."-".$date_arr[0];
		
		$time = date("h:i:s", strtotime($finalArray['time']));
		$num_of_devotees = $finalArray['devotees'];
		$num_of_ladoos = $finalArray['ladoos'];
		$f_name = $finalArray['f_name'];
		$email = $finalArray['email'];
		$phone = $finalArray['phone'];
		$ticket = $finalArray['ticket'];
		$total = $_SESSION['final']['total'];
		$charge = $_SESSION['final']['charges'];
		$gst = $_SESSION['final']['gst'];
		$service_charge = $_SESSION['final']['service_charge'];
		$add_on_charge = $_SESSION['final']['add_on'];
		
		$order_id = time().uniquenumber(5);
		
		$booking_date = date('Y-m-d H:i:s');
		
		$query = 'INSERT INTO booking (order_id,`date`,`time`,`num_of_devotees`,`num_of_ladoos`,`full_name`,`email`,`phone`,`ticket_type`,total,charge,gst,service_charge,add_on_charge,booking_date) VALUES("'.$order_id.'","'.$date.'","'.$time.'","'.$num_of_devotees.'","'.$num_of_ladoos.'","'.$f_name.'","'.$email.'",'.$phone.','.$ticket.','.$total.','.$charge.','.$gst.','.$service_charge.','.$add_on_charge.',"'.$booking_date.'")';

		if(mysqli_query($con,$query))
		{									
			$id = mysqli_insert_id($con); 
			$_SESSION['final']['order_id'] = $id;
			$_SESSION['final']['unique_order_id'] = $order_id;
			
			//unset($_SESSION['step1']);
			//unset($_SESSION['step2']);
			//unset($_SESSION['step3']);
			//unset($_SESSION['final']);
			
			echo '1';
			exit;
		}
		else
		{
			echo 'error';
			exit;
		}

	}
	else
	{
		echo 'error';
		exit;
	}
 ?>