<?php
	session_start();

	if(!empty($_REQUEST))
	{
		$error = 0;
	
		if(!isset($_REQUEST['ticket'])|| (isset($_REQUEST['ticket']) && empty($_REQUEST['ticket'])))
		{
			$error = 1;
			$err_msg = "Please select darshan type";	
		}
		if(!isset($_REQUEST['date'])|| (isset($_REQUEST['date']) && empty($_REQUEST['date'])))
		{
			$error = 1;
			$err_msg = "Please select date";	
		}
		if(!isset($_REQUEST['time'])|| (isset($_REQUEST['time']) && empty($_REQUEST['time'])))
		{
			$error = 1;
			$err_msg = "Please select time";	
		}
		if(!isset($_REQUEST['devotees'])|| (isset($_REQUEST['devotees']) && empty($_REQUEST['devotees'])))
		{
			$error = 1;
			$err_msg = "Please select devotees";	
		}

		if(!isset($_REQUEST['ladoos']) || (isset($_REQUEST['ladoos']) && empty($_REQUEST['ladoos'])))
		{
			$error = 1;
			$err_msg = "Please select number of ladoos";	
		}
		if(!isset($_REQUEST['f_name']) || (isset($_REQUEST['f_name']) && empty($_REQUEST['f_name'])))
		{
			$error = 1;
			$err_msg = "Please enter full name";	
		}
		if(!isset($_REQUEST['email']) || (isset($_REQUEST['email']) && empty($_REQUEST['email'])))
		{
			$error = 1;
			$err_msg = "Please enter email";	
		}
		if(!isset($_REQUEST['phone']) || (isset($_REQUEST['phone']) && empty($_REQUEST['phone'])))
		{
			$error = 1;
			$err_msg = "Please enter phone";	
		}
		
		
		if($error == 0)
		{
			if($_SESSION['final'] = $_REQUEST)
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