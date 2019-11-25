<?php
	require('../config/db.php');
	session_start();

	if(isset($_SESSION['step1']) && isset($_SESSION['step2']) && isset($_SESSION['step3']) && isset($_SESSION['final']) )
	{
		$finalArray = array();
		$finalArray = array_merge($_SESSION['step1'], $_SESSION['step2'], $_SESSION['step3']);
		
		$room_total = $_REQUEST['total'];
		
		//echo $finalArray['date'];
		
		$date_arr = explode("/",$finalArray['date']);
		
		$date = $date_arr[2]."-".$date_arr[1]."-".$date_arr[0];
		
		//$date = date("Y-m-d", strtotime($finalArray['date']));
		$time = date("h:i:s", strtotime($finalArray['time']));
		$num_of_devotees = $finalArray['devotees'];
		$num_of_ladoos = $finalArray['ladoos'];
		$f_name = $finalArray['f_name'];
		$email = $finalArray['email'];
		$phone = $finalArray['phone'];
		$ticket = $finalArray['ticket'];
		$total = $_SESSION['final']['total'] + $room_total;
		$json = $_REQUEST['json'];
		$charge = $_SESSION['final']['charges'];
		$gst = $_SESSION['final']['gst'];
		$service_charge = $_SESSION['final']['service_charge'];
		$add_on_charge = $_SESSION['final']['add_on'];
		
		$order_id = rand(10000000000000,99999999999999);
		
		$_SESSION['final']['total'] = $total;

		if($json!="" &&  $room_total!="")
	{
		$query = 'INSERT INTO booking (order_id,`date`,`time`,`num_of_devotees`,`num_of_ladoos`,`full_name`,`email`,`phone`,`ticket_type`,total,room_info,charge,gst,service_charge,add_on_charge,room_charge) VALUES("'.$order_id.'","'.$date.'","'.$time.'","'.$num_of_devotees.'","'.$num_of_ladoos.'","'.$f_name.'","'.$email.'",'.$phone.','.$ticket.','.$total.',"'.$json.'",'.$charge.','.$gst.','.$service_charge.','.$add_on_charge.','.$room_total.')';
		
		}
		else
		{
		
		$query = 'INSERT INTO booking (order_id,`date`,`time`,`num_of_devotees`,`num_of_ladoos`,`full_name`,`email`,`phone`,`ticket_type`,total,charge,gst,service_charge,add_on_charge) VALUES("'.$order_id.'","'.$date.'","'.$time.'","'.$num_of_devotees.'","'.$num_of_ladoos.'","'.$f_name.'","'.$email.'",'.$phone.','.$ticket.','.$total.','.$charge.','.$gst.','.$service_charge.','.$add_on_charge.')';
		
		}
		
		

		if(mysqli_query($con,$query))
		{
			echo '1';
			unset($_SESSION['step1']);
			unset($_SESSION['step2']);
			unset($_SESSION['step3']);
			
			$id = mysqli_insert_id($con); 
			$_SESSION['final']['order_id'] = $id;
			//unset($_SESSION['final']);
			$num_of_devotees = count($_SESSION['devotees']);
			for($i=0;$i<$num_of_devotees;$i++)
						{
							if(!empty($_SESSION['devotees']))
								{
									$name = $_SESSION['devotees'][$i]['name'];
									$age = $_SESSION['devotees'][$i]['age'];
									$gender = $_SESSION['devotees'][$i]['gender'];
									$id_type = $_SESSION['devotees'][$i]['id_type'];
									$id_num = $_SESSION['devotees'][$i]['id_num'];
									$add_date = date('Y-m-d');
								}
								$sql_save = "insert into devoee_detail (order_id,name,age,gender,id_num,id_type,created) values ('$id','$name','$age','$gender','$id_num','$id_type','$add_date')";						
								mysqli_query($con,$sql_save);
								$sql_update = "update booking set form_status='1' where id=".$id;
								mysqli_query($con,$sql_update);
													
								
						}
			unset($_SESSION['devotees']);
			unset($_SESSION['final']);
			/*unset($_SESSION['step1complete']);
			unset($_SESSION['step2complete']);
			unset($_SESSION['step3complete']);*/
		}
		else
		{
			echo 'error';
		}

	}
 ?>