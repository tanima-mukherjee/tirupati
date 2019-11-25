<?php 
	require('config/db.php');
	require('instamojo/src/Instamojo.php');

	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);

	session_start();


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
		if(!array_key_exists('ticket',$finalArray) || $finalArray['ticket'] == '')
		{
			$error = 1;
			$err_msg = "Ticket should not empty";	
		}		
		if(!array_key_exists('total',$finalArray) || empty($finalArray['total']))
		{
			$error = 1;
			$err_msg = "Price should not empty";	
		}
		
		if(!array_key_exists('order_id',$finalArray) || empty($finalArray['order_id']))
		{
			$error = 1;
			$err_msg = "Order id does not exists";	
		}
		if(!array_key_exists('unique_order_id',$finalArray) || empty($finalArray['unique_order_id']))
		{
			$error = 1;
			$err_msg = "Unique Order id does not exists";	
		}
			
		return array('error'=>$error,'err_msg'=>$err_msg);
		
	}
	
	if(isset($_SESSION['final']) )
	{
		$finalArray = $_SESSION['final'];
		$param_response = checkParam($finalArray);	
		if($param_response['error'] == 1)
		{
			header("Location:index.php");	
			exit;
		}
	}
	else
	{
		header("Location:index.php");	
		exit;	
	}
	
	$email = $_SESSION['final']['email'];

	$name = $_SESSION['final']['f_name'];

	$phone = $_SESSION['final']['phone'];

	$total = $_SESSION['final']['total'];

	$order_id = $_SESSION['final']['order_id'];

	$unique_order_id = $_SESSION['final']['unique_order_id'];

	$xENcode = base64_encode($email);

	$purpose = "Ticket booking";

	$api = new Instamojo\Instamojo("87521e5c34584bcd2613fdd660ec03d6", "d37351aeddf730cc5dfc280765679e34");
	try {

    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $total,
        "send_email" => true,
        "email" => $email,
		"phone" => $phone,
        "redirect_url" => "https://tirupatitourismseva.com/thanks.php?order_id=".$order_id."&xec=".$xENcode."&code=".$unique_order_id

        ));
	
		

			
	unset($_SESSION['step1']);
unset($_SESSION['step2']);
unset($_SESSION['step3']);
unset($_SESSION['final']);
	
	header("Location:".$response['longurl']);
	exit;
}

catch (Exception $e) {

		echo "<pre/>";
		print_r($e);
    	print('Error: ' . $e->getMessage());
		
	echo "Something went wrong. Please try again";
	exit;
}
?>