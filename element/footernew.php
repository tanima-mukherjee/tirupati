	<footer>

		<div class="upper-footer">
		
			<div class="container">
				<ul>
				<li>
					<img src="images/happy-customers.png" alt="Happy Customers"/>
					<span>2 Lac+ Happy Customers</span>
				</li>
				<li>
					<img src="images/clicks-icon.png" alt="Book Tickets in 3 Clicks"/>
					<span>Book Tickets in 3 Clicks</span>
					</li>
				<li>
					<img src="images/booking-site.png" alt="Booking Site"/>
					<span>India's No.1 Super Fast </br>TTD Booking Site</span>
				</li>
				<li>
					<img src="images/ratings.png" alt="Reliability Ratings"/>
					<span>98% Reliability Ratings</span>
				</li>
			</ul>
			</div>
		
		
	</div>

	

		<div class="lower-footer">

			<div class="container">

				<div class="footer-logo">

					<a href="index.html"><img class="img-responsive" src="images/footer-logo.png" alt="logo"></a>

				</div>

			

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

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/jquery.yacal.js" type="text/javascript"></script>
	<!-- <script>
	$( function() {
		$( "#calendarTemplate" ).datepicker({
			numberOfMonths: 3,
			showButtonPanel: true
		});
	} );
	</script> -->
<script src="js/main.js" type="text/javascript"></script>

<script type="text/javascript">

	var step1complete = '<?php echo $_SESSION['step1complete'];?>';
	var step2complete = '<?php echo $_SESSION['step2complete'];?>';
	var step3complete = '<?php echo $_SESSION['step3complete'];?>';


	$(document).ready(function()
	{
		//alert('dsfsd');

		load_stepnew();	
		$(document).on('DOMNodeInserted', function(e) 
			{
				var selectedsessiondate = $("#datepicker").val();
				if(selectedsessiondate != '' && selectedsessiondate != undefined)
				{
					var myDate = selectedsessiondate;
					myDate=myDate.split("-");
					var newDate = myDate[1]+"/"+myDate[0]+"/"+myDate[2];
					var finalSelectedDate = new Date(newDate).getTime();

					$('a.day.active[data-time="'+finalSelectedDate+'"]').addClass('selected_new');
					
					
				}

	        	
	    	});	


		/*if((step1complete != '')||(step2complete !='')||(step3complete !=''))
		{
				$(document).on('DOMNodeInserted', function(e) 
			{
				var selectedsessiondate = $("#datepicker").val();
				if(selectedsessiondate != '' && selectedsessiondate != undefined)
				{
					var myDate = selectedsessiondate;
					myDate=myDate.split("-");
					var newDate = myDate[1]+"/"+myDate[0]+"/"+myDate[2];
					var finalSelectedDate = new Date(newDate).getTime();

					$('a.day.active[data-time="'+finalSelectedDate+'"]').addClass('selected_new');
					
					
				}

	        	
	    	});	

		}
		else
		{
		   load_stepnew();	
		}		
*/
		
		
		
	});


		function load_stepnew()

		{

			$.ajax({

			   	url: 'steps/stepnew.php',

			   	method: 'GET',

			   	success: function(res)

			   	{

			   		$('.booking-row').html(' ');

			   		$('#main-box').html(res);


			   	}

			});

		}


function load_stepcustomer()
{

//alert('dsfds');
	$.ajax({

	   	url: 'steps/stepcustomerform.php',

	   	method: 'GET',

	   	success: function(res)
	   	{
	   		//alert(res);
	   		$('#main-box').html(' ');

	   		$('.booking-row').html(res);

	   	}

	});

}


function load_step4()
{

//alert('dsfds');
	$.ajax({

	   	url: 'steps/step4.php',

	   	method: 'GET',

	   	success: function(res)
	   	{
	   		//alert(res);
	   		$('#main-box').html(' ');

	   		$('.booking-row').html(res);

	   	}

	});

}


		
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