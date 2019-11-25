<?php 
	require('config/db.php');
	require('instamojo/src/Instamojo.php');
	
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);
	
	session_start();
	
	$email = $_SESSION['final']['email'];
	$name = $_SESSION['final']['f_name'];
	$phone = $_SESSION['final']['phone'];
	//$purpose = $_SESSION['final']['purpose'];
	$total = $_SESSION['final']['total'];
	$order_id = $_SESSION['final']['order_id'];
	$unique_order_id = $_SESSION['final']['unique_order_id'];
	$xENcode = base64_encode($email);
	
	$purpose = "Room booking";
	$api = new Instamojo\Instamojo("87521e5c34584bcd2613fdd660ec03d6", "d37351aeddf730cc5dfc280765679e34");


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $total,
        "send_email" => true,
        "email" => $email,
        "redirect_url" => "https://tirupatitourismseva.com/success.php?order_id=".$order_id."&xec=".$xENcode."&code=".$unique_order_id
        ));
    //print_r($response);
	
	header("Location:".$response['longurl']);
}
catch (Exception $e) {

echo "<pre/>";
		print_r($e);
    print('Error: ' . $e->getMessage());
}


?>