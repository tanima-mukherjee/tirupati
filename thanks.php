<!DOCTYPE html>

<html lang="en">

<head>

   <meta charset="UTF-8">

    <meta content="IE=edge" http-equiv="X-UA-Compatible">

    <meta content="width=device-width, initial-scale=1" name="viewport">

    <title>Tirupati Finance</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

	<!-- Bootstrap -->

    <link rel="stylesheet" href="css/bootstrap.min.css">	

	 <!-- Bootstrap -->

	 	 <!-- custom css -->

	<link rel="stylesheet" href="css/main.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

	

</head>

<body>



<?php 



error_reporting(1);

use PHPMailer\PHPMailer\PHPMailer;

//$_REQUEST['order_id'] = 8;

$status_flag = 0;



if(isset($_REQUEST['order_id']) && isset($_REQUEST['xec'])){

	

$payment_id = $_REQUEST['payment_id'];

$is_test = 0; //demo url thanks.php?order_id=3704&xec=YWxhbkBvZ21hY29uY2VwdGlvbnMuY29t&code=153574385765487
//$xENcode = base64_encode('alan@ogmaconceptions.com');
if($is_test ==  0)
{


$ch = curl_init();



curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payments/'.$payment_id.'/');

curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER,

            array("X-Api-Key:87521e5c34584bcd2613fdd660ec03d6",

                  "X-Auth-Token:d37351aeddf730cc5dfc280765679e34"));



$response = curl_exec($ch);

curl_close($ch); 



$jsonarr = json_decode($response ,true);


}
else
{
	$jsonarr['success'] =1;
}

if($jsonarr['success'] != 1)

{

	$status_flag = 3;

	

}

else {



		require("config/db.php");

		$emailAddr = base64_decode($_REQUEST['xec']);



		$sql0 = "SELECT * FROM booking WHERE id=".$_REQUEST['order_id']." AND email='".$emailAddr."' AND order_id='".$_REQUEST['code']."'";

		$rx = mysqli_query($con, $sql0);

		$rowcount=mysqli_num_rows($rx);



		if($rowcount == 0){

			header("Location: 404.php");

			exit();

		}

		

		$sql = "UPDATE booking SET order_status='4',payment_id ='".$payment_id."'  WHERE id=".$_REQUEST['order_id'];

		mysqli_query($con,$sql);

		

		$sql2 = "SELECT full_name,email,phone,total,order_id FROM booking where id = '".$_REQUEST['order_id']."'";

		$res = mysqli_query($con,$sql2);

		$arr = mysqli_fetch_assoc($res);

		

		$to = $arr['email'];

		

		

		$apikey ="k3ek7dHbDUWFUSuU4IlKpQ";

	

		$sms_phone = '91'.trim($arr['phone']);

		$smsMessage = "Thanks for your booking at Tirupati. order no. ".$arr['order_id']." amounting to ".$arr['total']."/- was successful.";

		$sms_content = rawurlencode($smsMessage);

		//$apikey = $sms_getwayhub_key;

		$apisender = "TDEVAM";

		$url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$sms_phone.'&text='.$sms_content.'&route=1';

		

		$ch=curl_init($url);



		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);



		curl_setopt($ch,CURLOPT_POST,1);



		curl_setopt($ch,CURLOPT_POSTFIELDS,"");



		curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);



		$data = curl_exec($ch);



		curl_close($ch);

		

		

		//$arr = mysqli_fetch_assoc($res);

		//Need to do email

		

	 

	$subject = 'Payment Confirmation';

	$enc_id = base64_encode($arr['order_id']);

	/*$headers = "From: info@tirupatitourismseva.com/\r\n";

	$headers .= "Reply-To:info@tirupatitourismseva.com/\r\n".'X-Mailer: PHP/' . phpversion();

	$headers .= "MIME-Version: 1.0\r\n";

	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	*/

	$message = '<html><body style="padding: 0px; margin: 0px; font-family: "Times New Roman";">';

	$message .= '<table width="600" align="center" border="0" cellpadding="0" cellspacing="0">';

	$message .= "<tr style='background: #ffffff;'><td height='45' border='0'>&nbsp;</td></tr>";

	$message .= "<tr style='background: url(https://tirupatitourismseva.com/images/email-banner.jpg)'><td align='left' valign='top' height='300'>";

	$message .= '<table width="100%" border="0" cellpadding="0">';

	$message .= '<tr><td align="center"><img src="https://tirupatitourismseva.com/images/email-logo.png" style="margin-top: -48px;"></td></tr>';

	$message .= '<tr><td align="left" style="padding-left: 25px; padding-top: 15px;">

				<img src="https://tirupatitourismseva.com/images/welcome-text.png" style="margin-top: 45px;"></td></tr>';

	$message .= '</table>';

	$message .= '</td></tr>';		

	$message .= "<tr style='background: #f8f8f8;'><td style='padding: 25px;' align='left'><h2 style='padding: 0px; margin: 0px; color: #333; font-weight: 600; font-size: 18px;'>

	<p>Hello ".$arr['full_name'].",</p>

	<p>Your booking for Order No. ".$arr['order_id']." amounting to Rs. ".$arr['total']."/- was successful.</p>

	<p>Thank you for your payment. </p>

	

	</td></tr>";

	$message .= "<tr style='background: #f8f8f8;'><td style='padding: 25px;' align='left'><h2 style='padding: 0px; margin: 0px; color: #333; font-weight: 600; font-size: 18px;'>Please upload user detail by clicking on given link below</h2>

		<a style='background: #ff5733; display: inline-block; padding:10px 25px; color: #fff; border-radius: 25px; text-decoration: none;' href='https://tirupatitourismseva.com/customer_form.php?order_id=".$enc_id."'>Click Here</a>

		</td></tr>";

	$message .= "<tr style='background: #ffa224;'><td height='3' border='0'></td></tr>";		

	$message .= "</table>";

	$message .= "</body></html>";

		



	require 'lib/phpMailer/src/PHPMailer.php';

	require 'lib/phpMailer/src/SMTP.php';



	$mail = new PHPMailer();                              // Passing `true` enables exceptions



		//Server settings

		$mail->IsSMTP(); // enable SMTP

		$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only

		$mail->SMTPAuth = true; // authentication enabled

		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail

		$mail->Host = "cp-in-2.webhostbox.net";

		$mail->Port = 465; // or 587

		$mail->IsHTML(true);

		$mail->Username = "info@tirupatitourismseva.com";

		$mail->Password = "info@123";

		$mail->SetFrom("info@tirupatitourismseva.com");

		$mail->Subject = $subject;

		$mail->AddAddress($to);

		$mail->AddBCC('tirupatitourismseva@gmail.com');

		$mail->Body    = $message;

		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



		if(!$mail->send())

		{

			echo 'Message is not send'; 

		}

		

	

?>



<?php

}

if($status_flag == 0) {



?>

	

	<div class="thanks-wrap">

		<div class="thanks-container">

			<img src="images/thankyou-icon.png" alt="">

			<h1>Thank You</h1>

			<p>Your payment is done. We will confirm your order soon.</p>

		</div>

	</div>



<?php 	

	}else{



?>





	<div class="thanks-wrap">

		<div class="thanks-container">

			<img src="images/thankyou-icon.png" alt="">

			<h1>Thank You</h1>

			<p>Your submission is received and we will contact you soon.</p>

		</div>

	</div>







<?php 	

	}



?>

<?php 	

	}else{



?>





	<div class="thanks-wrap">

		<div class="thanks-container">

			<img src="images/thankyou-icon.png" alt="">

			<h1>Thank You</h1>

			<p>Your submission is received and we will contact you soon.</p>

		</div>

	</div>







<?php 	

	}


?>

	

</body>

</html>