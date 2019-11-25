<?php
	session_start();

	if(!empty($_REQUEST))
	{
		if($_SESSION['step3'] = $_REQUEST)
		{
			$error = 0;
			
			$finalArray = array_merge($_SESSION['step1'], $_SESSION['step2'], $_SESSION['step3']);
							
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
			if($error == 0)
			{
				$_SESSION['final'] = $finalArray;	
				echo '1';
				exit;
			}
			else
			{
				echo $err_msg;	
				exit;
			}
			
						
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