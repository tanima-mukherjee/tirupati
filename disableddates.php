
<?php 
/*ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1); 
    error_reporting(E_ALL);*/
require("config/db.php");
	//error_reporting(1);
	
	$today = date('Y-m-d');

	$uptodate = date('Y-m-d', strtotime("+3 months", strtotime($today)));
	
	$sql_dates = "select `date`,`time` from date_time where `date` between CAST('$today' AS DATE) AND  CAST('$uptodate' AS DATE)";
	

	$query = mysqli_query($con,$sql_dates) ;
	

	$dates = '';
	$i=0;

	$dates = array();
	
	while($res = mysqli_fetch_assoc($query))
	{
	 	//$dates .=  '"'.$res['date'].'",';

	 	//echo "<pre>";print_r($dates);
		
		$sql_chk_time = "select `time` from date_time where `date`='".$res['date']."' ";
		$res_time = mysqli_query($con,$sql_chk_time) ;
		
		$num = mysqli_num_rows($res_time);

		$filled_dates = array();
		
		if($num >= 11)
		{
     		$month = date('m', strtotime($res['date']));
			$day = date('d', strtotime($res['date']));
			$year = date('Y', strtotime($res['date']));
		
			if($i==0)
			{
				$dates[$i] = $day.'-'.$month.'-'.$year;
				//$dates .='"'.$day.'-'.$month.'-'.$year.'"';
			}	
			else
			{
				$dates[$i] = $day.'-'.$month.'-'.$year;
				//$dates .=',"'.$day.'-'.$month.'-'.$year.'"';
			}
			$i++;				
				
		}
	 }

	 //echo "<pre>";print_r($dates);

		echo json_encode($dates);
		exit();

	 
	 ?>


	