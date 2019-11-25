<?php

	session_start();

	if(!empty($_REQUEST))
	{
		

			$num = $_REQUEST['num'];
			$_SESSION['num_of_devotees'] = $num;
			$_SESSION['devotees'] = array();

			for($i=0;$i<$num;$i++)
			{
				$_SESSION['devotees'][$i]['id'] = $_REQUEST['id_num_'.$i];
				$_SESSION['devotees'][$i]['name'] = $_REQUEST['name_'.$i];
				$_SESSION['devotees'][$i]['age'] = $_REQUEST['age_'.$i];
				$_SESSION['devotees'][$i]['gender'] = $_REQUEST['gender_'.$i];
				$_SESSION['devotees'][$i]['id_type'] = $_REQUEST['id_type_'.$i];
				$_SESSION['devotees'][$i]['id_num'] = $_REQUEST['id_num_'.$i];				
				
			}

			//print_r($_SESSION['devotees']);exit();
			
				echo '1';
				exit;
			
	}
	else
	{
		echo 'error';
		exit;
	}	
 ?>