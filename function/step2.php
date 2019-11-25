<?php

	session_start();

	if(!empty($_REQUEST))
	{
		$error = 0;
	
		if(!isset($_REQUEST['devotees']) || (isset($_REQUEST['devotees']) && $_REQUEST['devotees'] == 0))
		{
			$error = 1;
			$err_msg = "Please select Devotees";	
		}
		if(!isset($_REQUEST['f_name']) || (isset($_REQUEST['f_name']) && empty($_REQUEST['f_name'])))
		{
			$error = 1;
			$err_msg = "Please enter your name";	
		}
		if(!isset($_REQUEST['email']) || (isset($_REQUEST['email']) && empty($_REQUEST['email'])))
		{
			$error = 1;
			$err_msg = "Please enter your email";	
		}
		if(!isset($_REQUEST['phone']) || (isset($_REQUEST['phone']) && empty($_REQUEST['phone'])))
		{
			$error = 1;
			$err_msg = "Please enter your phone number";	
		}
		
		
			
		if($error == 0)
		{
			if($_SESSION['step2'] = $_REQUEST)
			{
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
			echo $err_msg;	
			exit;				
		}
		

	}
	else
	{
		echo 'error';
		exit;	
	}


 ?>