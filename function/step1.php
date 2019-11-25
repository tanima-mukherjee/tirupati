<?php

	session_start();

	if(!empty($_REQUEST))
	{
		$error = 0;
	
		if(!isset($_REQUEST['date'])|| (isset($_REQUEST['date']) && empty($_REQUEST['date'])))
		{
			$error = 1;
			$err_msg = "Please select date";	
		}
		if(!isset($_REQUEST['time']) || (isset($_REQUEST['time']) && empty($_REQUEST['time'])))
		{
			$error = 1;
			$err_msg = "Please select time";	
		}
		
		
		if($error == 0)
		{
			if($_SESSION['step1'] = $_REQUEST)
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