<?php
	require('../config/db.php');
	session_start();
	
	
	$date = $_REQUEST['cdate'];
	
	$d_arr = explode("/",$date);
	
	$month = $d_arr[1] < 10 ? '0'.$d_arr[1] : $d_arr[1];
	
	$date = $d_arr[2]."-".$month."-".$d_arr[0];
	
	$sql = "select * from date_time where `date`='".$date."' "; 
	$res = mysqli_query($con,$sql);
	
	$str="";
	$i=0;
	
	while($data=mysqli_fetch_assoc($res))
	{
		if($i==0)
		$str.= "'".$data['time']."'";	
		else
		$str.= ",'".$data['time']."'";
		
		$i++;	
	}
	//echo $str;exit();
	
	if($str!="")
	  $sql2 = "select `time` from timetable where `time` NOT IN (".$str.")"; 
	 else
	  $sql2 = "select `time` from timetable "; 
	 	
	$res2 = mysqli_query($con,$sql2);
	
	$option = "";
	
	while($data=mysqli_fetch_assoc($res2))
	{
		$option .=	"<option>".$data['time']."</option>";
	}
	
	echo $option;

 ?>