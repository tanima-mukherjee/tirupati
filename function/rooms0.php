<?php

	session_start();

	if(!empty($_REQUEST))
	{
		if($_SESSION['rooms0'] = $_REQUEST)
		{
			echo '1';
		}
		else
		{
			echo 'error';
		}

	}



 ?>