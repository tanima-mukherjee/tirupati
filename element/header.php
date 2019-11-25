<?php

include_once('config/db.php');



function active($currect_page){

  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;

  $url = end($url_array);  

  if($currect_page == $url){

      echo 'active'; //class name in css 

  } 

}



$querySiteSettings 		 = 'SELECT * FROM site_settings';

$exeSiteSettingsQuery 	 = mysqli_query($con,$querySiteSettings);

//$rowSiteSetting			 = mysqli_fetch_assoc($exeSiteSettingsQuery);



while($rowSiteSetting = mysqli_fetch_assoc($exeSiteSettingsQuery))

{

	$settings[] = $rowSiteSetting;

}



//print_r($settings);

?>

<!DOCTYPE html>

<html lang="en">

<head>

   <meta charset="UTF-8">

    <meta content="IE=edge" http-equiv="X-UA-Compatible">

    <meta content="width=device-width, initial-scale=1" name="viewport">

    <title>Tirupati Darshan Seva</title>

	<link rel="icon" href="images/favicon.ico" type="image/x-icon">

	

	 <!-- font css -->

	

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

	

	

	<!-- Bootstrap -->

    <link rel="stylesheet" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="css/bootstrap.offcanvas.css"/>

	<link rel="stylesheet" href="css/bootstrap-datepicker.css" />

	 <!-- Bootstrap -->

	  <!-- magnific-popup -->

	<link rel="stylesheet" href="css/magnific-popup.css">

	

	<link rel="stylesheet" href="css/jquery.timepicker.css" />

	<link rel="stylesheet" href="css/animate.css" />

	

 	 <!-- custom css -->

	<link rel="stylesheet" href="css/main.css">

	<link rel="stylesheet" href="css/responsive.css">

	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

	<!--Start of Zendesk Chat Script-->

<!--<script type="text/javascript">

window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=

d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.

_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");

$.src="https://v2.zopim.com/?5oAWdouGisO2e9S3FEhwY1NFNb9HwtFG";z.t=+new Date;$.

type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

</script>-->


<!--End of Zendesk Chat Script-->	

</head>

<body>





<header class="header navbar" role="header">			

	<?php /*?><div class="upper-headerpart">				

		<div class="container">

			<div class="header-cont">

				<ul>

				<?php

					if(isset($settings[3]['options']) && $settings[3]['options'] == 'site_ph_no'){

				?>

						<li>

							<img src="images/phone-icon.png" alt="phone"/>

						 <?php echo $settings[3]['value']; ?>

						</li>



				<?php

					}

				?>



				<?php

					if((isset($settings[4]['options']) && $settings[4]['options'] == 'site_email')){

				?>

						<li>

						<img src="images/envelop.png" alt="mail"/>

						<?php echo $settings[4]['value']; ?>

						</li>



				<?php

					}

				?>



					<li>

						

					</li>				

				</ul>

			</div>

				

			<div class="header-social">

				<ul>

					<li>

						<a href="#">

							<i class="fa fa-facebook face"></i>

						</a>

					</li>

					<li>

						<a href="#">

							<i class="fa fa-twitter twit"></i>

						</a>

					</li>

					<li>

						<a href="#">

							<i class="fa fa-google-plus googleplus"></i>

						</a>

					</li>

					<li>

						<a href="#">

							<i class="fa fa-youtube-play youtube"></i>

						</a>

					</li>

				

				</ul>

			</div>

			

		</div>

	</div><?php */?>				

	<div class="lower-headerpart">

		<div class="container">

			<div class="nav-part">

				<div class="logo-part">

					<a href="index.php"><img class="img-responsive" src="images/logo.png" alt="logo"></a>

				</div>

				<button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas" style="float:left;">

						<span class="sr-only">Toggle navigation</span>

						<span>

						  <span class="icon-bar"></span>

						  <span class="icon-bar"></span>

						  <span class="icon-bar"></span>

						</span>

				</button>

				<div class="navbar-offcanvas navbar-offcanvas-touch nav-left" id="js-bootstrap-offcanvas">

					<ul class="nav navbar-nav menumidnav ">

						<li><a href="index.php" class="<?php active('index.php');?>">Home </a></li>

						<li><a href="about.php" class="<?php active('about.php');?>">About us</a></li> 

						<li><a href="terms.php" class="<?php active('terms.php');?>">terms conditions</a></li>

					</ul>

					<ul class="nav navbar-nav menumidnav1 ">	

						<li><a href="policy.php" class="<?php active('policy.php');?>">policy </a></li> 

						<li><a href="contact.php" class="<?php active('contact.php');?>">Contact us </a></li>

						<li><a href="stepfirst.php" class="book-btn">Book Ticket</a></li> 

					</ul>

				</div>

			</div>

		</div>

	</div>	

</header>	