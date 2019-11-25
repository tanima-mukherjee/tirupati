	<footer>

		<div class="upper-footer">

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



				<?php

					if((isset($settings[5]['options']) && $settings[5]['options'] == 'site_address')){

				?>

						<li>

						<img src="images/footer-icon3.png" alt="address">

						<?php echo $settings[5]['value']; ?>

						</li>



				<?php

					}

				?>

			

			</ul>

		

		

		</div>

	

		<div class="lower-footer">

			<div class="container">

				<div class="footer-logo">

					<a href="index.html"><img class="img-responsive" src="images/footer-logo.png" alt="logo"></a>

				</div>

				<!--<div class="subscribe-part">

					<label>Subscribe to Newsletters</label>

					

					<div class="subscribe-inputpart">

						<span>

							<i><img src="images/footer-envelopicon.png"/></i>

							<input type="text" placeholder="Your Email"/>

						</span>

						<input type="button" value="GO"/>

					</div>

				</div>-->

				

				<!--

				<div class="footer-socialpart">

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

				-->



			</div>

		

		</div>

		

		<div class="footer-call-part">
			<ul>
				<li>
					<a href="tel:7687000433">
						<i class="fa fa-phone-square"></i><div class="clearfix"></div>
						Call us Now
					</a>
				</li>
				<li>
					<a href="https://api.whatsapp.com/send?phone=+917687000433&text=Hello,">
						<img class="img-responsive" src="images/footer-callicon.png" alt="call-icon">
					</a>
				</li>
				<li>
					<a href="step.php">
						<i class="fa fa-calendar"></i><div class="clearfix"></div>
						Book Ticket
					</a>
				</li>
			</ul>
		</div>

		

	</footer>

	



 <!-- JS Plugins --> 

<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>

<script src="js/jquery.validate.js" type="text/javascript"></script>



<script src="js/bootstrap.min.js"></script>

<script src="js/bootstrap.offcanvas.js"></script>

<script src="js/jquery.magnific-popup.min.js"></script>



 <script src="js/bootstrap-datepicker.js"></script>   

	<!-- timepicker js  -->

    <script src="js/jquery.timepicker.js"></script>   

	





<script src="js/main.js" type="text/javascript"></script>



	

<script type="text/javascript">

		

		function load_step1()

		{

			$.ajax({

			   	url: 'steps/step1.php',

			   	method: 'GET',

			   	success: function(res)

			   	{

			   		$('.booking-row').html(' ');

			   		$('#main-box').html(res);

			   	}

			});

		}



		function load_step2()

		{

			$.ajax({

			   	url: 'steps/step2.php',

			   	method: 'GET',

			   	success: function(res)

			   	{

			   		$('.booking-row').html(' ');

			   		$('#main-box').html(res);

			   	}

			});

		}



		function load_step3()

		{

			$.ajax({

			   	url: 'steps/step3.php',

			   	method: 'GET',

			   	success: function(res)

			   	{

			   		$('.booking-row').html(' ');

			   		$('#main-box').html(res);

			   	}

			});

		}



		function load_step4()

		{

			$.ajax({

			   	url: 'steps/step4.php',

			   	method: 'GET',

			   	success: function(res)

			   	{

			   		$('.booking-box').html(' ');

			   		$('.booking-row').html(res);

			   	}

			});

		}

		

		function load_step5()

		{

		//alert("test");

			$.ajax({

			   	url: 'steps/rooms.php',

			   	method: 'GET',

			   	success: function(res)

			   	{

					//alert(res);

			   		$('.booking-box').html(' ');

			   		$('.booking-row').html(res);

			   	}

			});

		}



		function load_rooms0()

		{

			$.ajax({

			   	url: 'steps/rooms0.php',

			   	method: 'GET',

			   	success: function(res)

			   	{

			   		$('.room-box').html(' ');

			   		$('.room-row').html(res);

			   	}

			});

		}

		

		function load_rooms()

		{

			$.ajax({

			   	url: 'steps/rooms.php',

			   	method: 'GET',

			   	success: function(res)

			   	{

			   		$('.room-box').html(' ');

			   		$('.room-row').html(res);

			   	}

			});

			

		}

	

	

		$(document).ready(function(){

			load_step1();

			load_rooms0();

			

		});



	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121077768-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121077768-1');
</script>

</body>

</html>