<?php 
	require('../config/db.php');

	session_start();

	if(!empty($_SESSION['final']))
	{
		$date = $_SESSION['final']['date'];
		$time = $_SESSION['final']['time'];
		$num_of_devotees = $_SESSION['final']['devotees'];
		$num_of_ladoos = $_SESSION['final']['ladoos'];
		$f_name = $_SESSION['final']['f_name'];
		$email = $_SESSION['final']['email'];
		$phone = $_SESSION['final']['phone'];
		$ticket = $_SESSION['final']['ticket'];
	}

?>
<h4>Final Submission</h4>
<div class="final-submission">
	<div class="booking-inner">
		<div class="table-responsive">
			<table class="table table-bordered">
				<tbody>
					 <tr>
						<td>Tirupati Darshan Ticket of Rs.300 on <?php echo $date; ?> x Number of Tickets - <?php echo $num_of_devotees; ?>	</td>
						<td align="right">Rs. <?php

						 $sum = $num_of_devotees * 300;  
						 echo $sum;
						 ?></td>
					  </tr>
					  <tr>
					  	<?php
					  	if($ticket == '100')
					  	{
					  		?>
						<td>Service type - With in 2 hours for Rs. <?php echo $ticket; ?> only	</td>
					  		<?php
					  	}	

					  	if($ticket == '50')
					  	{
					  		?>
					  	<td>With in 24 hours for Rs. <?php echo $ticket; ?> only</td>
					  		<?php
					  	}	

					  	if($ticket == '0')
					  	{
					  		?>
					  	<td>With in 72 hours for Rs. <?php echo $ticket; ?> only</td>
					  		<?php
					  	}

					  	?>

						<td align="right">Rs. <?php echo $ticket; ?></td>
					  </tr>
					   <tr>
					   	<?php 
					   	$sql = "SELECT value FROM site_settings where options = 'extra_ladoo'";
   						$query = mysqli_query($con,$sql) or die('sql error');

   						$extra_ladoo_Array = mysqli_fetch_assoc($query);

   						 ?>
						<td>Extra Ladoos Rs.<?php echo $extra_ladoo_Array['value']; ?>/- each x Number of Ladoos - <?php echo $num_of_ladoos; ?>	</td>
						<td align="right">Rs. <?php

						 $ladoo = $num_of_ladoos * $extra_ladoo_Array['value'];  
						 echo $ladoo;
						 ?></td>
					  </tr>
					  <tr>
					  	<?php 
					   	$sql = "SELECT value FROM site_settings where options = 'service_charge'";
   						$query = mysqli_query($con,$sql) or die('sql error');

   						$service_charg_Array = mysqli_fetch_assoc($query);

   						 ?>
						<td>Service charges of Rs.<?php echo $service_charg_Array['value']; ?> per head x Number of Devotees - <?php echo $num_of_devotees; ?></td>
						<td align="right">Rs. <?php

						$devotees = $num_of_devotees * $service_charg_Array['value'];
						echo $devotees;
						
						?></td>
					  </tr>
					  <tr>
					  	<?php 
					   	$sql = "SELECT value FROM site_settings where options = 'gst'";
   						$query = mysqli_query($con,$sql) or die('sql error');

   						$gst_Array = mysqli_fetch_assoc($query);

   						 ?>
						<td>Included GST <?php echo $gst_Array['value']; ?>% (Taxable Amount <?php

						$all =  $sum + $ticket;
						
						$gst = ($gst_Array['value'] / 100) * $all;
						echo 'Rs. '.round($gst);

						  ?>)	</td>
						<td align="right">Rs. <?php
							echo round($gst);
						?></td>
					  </tr>
					  <tr>
						<td><strong>Total</strong></td>
						<td align="right"><strong>Rs. <?php

						$total = $sum + $ticket + $ladoo + $devotees +$gst;
						$_SESSION['final']['total'] = round($total);
						$_SESSION['final']['charges'] = $sum;
						$_SESSION['final']['service_charge'] = $devotees;
						$_SESSION['final']['add_on'] = $ticket + $ladoo;
						$_SESSION['final']['gst'] = $gst;
						
						echo round($total);
						
						 ?></strong></td>
					  </tr>
				</tbody>
			</table>
		</div>	
	<div class="clearfix"></div>	
	</div>
	<div class="buttton-row">
		<a href="javascript:void(0)" class="back-btn" onclick="load_stepcustomer()"><i class="fa fa-angle-double-left"></i> Back</a>
		<button type="button" id="proceed" class="step-btn pull-right">Proceed</button>
	<div class="clearfix"></div>	
	</div>	
<div class="clearfix"></div>	
</div>
<script type="text/javascript">
	
	$('#proceed').click(function(){

		$.ajax({
		   	url: 'function/step4.php',
		   	method: 'POST',
		   	data:{proceed:''},
		   	success: function(res)
		   	{
		   		/*alert(res);
		   		return false;*/
				if(res=="1")
				{
						//window.location = "rooms.php";
						//$_SESSION['step3complete'] = 1;

						window.location = "payment.php";
				}
				else
				{
					if(res == 'error')	
					{
						alert('something went wrong');
						return false;
					}
					else if(res != '')	
					{
						alert(res);
						return false;	
					}
				}
				
		   	}
		});

	});

</script>