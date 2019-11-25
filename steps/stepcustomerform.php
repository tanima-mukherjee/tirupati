
<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);


	require('../config/db.php');

	session_start();

	if(!empty($_SESSION['final']))
	{
		if(isset($_SESSION['num_of_devotees']))
		{
			if(!empty($_SESSION['num_of_devotees']))
			{
				if($_SESSION['num_of_devotees'] != $_SESSION['final']['devotees'])
				{
					$num_of_devotees = $_SESSION['final']['devotees'];
				}
				else
				{
					$num_of_devotees = count($_SESSION['devotees']);
				}
			}
			else
			{
				$num_of_devotees = $_SESSION['final']['devotees'];
			}
		}
		else
		{
			$num_of_devotees = $_SESSION['final']['devotees'];
		}


	}

?>

<style>
label{font-weight:normal;}
.required{color:#000;}
</style>
	
	
	
	
		<div class="container">			
			<div class="customer-wrap">
				<h2>Customer Booking Details</h2>				
				
				<div class="table-responsive">
				
				<form method="post" action="" name="frmCustomer" id="stepcustomer_form" class="stepcustomer_form">
              	<input type="hidden" name="num" value="<?php echo $num_of_devotees?>"  />
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>S.No.</th>
								<th>Name</th>
								<th>Age</th>
								<th>Gender</th>
								<th>ID Proof</th>
								<th>ID Number</th>
							 </tr>
						</thead>
						<tbody>	
							
						
						<?php 
						for($i=0;$i<$num_of_devotees;$i++)
						{
							if(isset($_SESSION['devotees']))
							{
								if(!empty($_SESSION['devotees']))
								{
									if(array_key_exists($i, $_SESSION['devotees']))
									{
										$name = $_SESSION['devotees'][$i]['name'];
										$age = $_SESSION['devotees'][$i]['age'];
										$gender = $_SESSION['devotees'][$i]['gender'];
										$id_type = $_SESSION['devotees'][$i]['id_type'];
										$id_num = $_SESSION['devotees'][$i]['id_num'];
									}
									else
									{
										$name = '';
										$age = '';
										$gender = '';
										$id_type = '';
										$id_num = '';

									}
								}
								else
								{
									    $name = '';
										$age = '';
										$gender = '';
										$id_type = '';
										$id_num = '';

								}
								
							}
							else
							{
								    $name = '';
									$age = '';
									$gender = '';
									$id_type = '';
									$id_num = '';
							}
						?>
												 
							  <tr>
							  	<td>
							  		<?php $serial_number = $i+1; ?>
									<label><?php echo $serial_number?></label>
								</td>
								<td>
									<input type="text" value="<?php echo $name;?>" class="form-control required" name="name_<?php echo $i?>">
								</td>
								<td width="150">
									<input type="number" min='1' max='80' class="form-control required"  value="<?php echo $age;?>" name="age_<?php echo $i?>">
								</td>
								<td>
									<select class="form-control " name="gender_<?php echo $i?>" required>   
									    <option <?php if($gender == ''){ echo 'selected="selected"'; } ?> value=''>Select One</option>
										<option <?php if($gender == 'Male'){ echo 'selected="selected"'; } ?>>Male</option>
										<option <?php if($gender == 'Female'){ echo 'selected="selected"'; } ?>>Female</option>
									</select>
								</td>
								<td>
									<select class="form-control " name="id_type_<?php echo $i?>" required>                                    
										 <option <?php if($id_type == ''){ echo 'selected="selected"'; } ?> value=''>Select One</option>
										<option <?php if($id_type == 'Adhar Card'){ echo 'selected="selected"'; } ?>>Adhar Card</option>
										<option <?php if($id_type == 'Voter Card'){ echo 'selected="selected"'; } ?>>Voter Card</option>
										<option <?php if($id_type == 'Driving License'){ echo 'selected="selected"'; } ?>>Driving License</option>
										<option <?php if($id_type == 'Ration Card'){ echo 'selected="selected"'; } ?>>Ration Card</option>
										<option <?php if($id_type == 'Passport'){ echo 'selected="selected"'; } ?>>Passport</option>
									</select>
								</td>
								<td>
									<input type="text" name="id_num_<?php echo $i?>" value="<?php echo $id_num;?>" class="form-control required">
								</td>
							  </tr>	
							 	
						<?php } 
						?>	
						
						<tr>
							<td colspan="6">
							<div class="buttton-row">
									<a href="javascript:void(0)" class="back-btn" onclick="load_stepnew()"><i class="fa fa-angle-double-left"></i> Back</a>
									<button type="button" id="proceed" class="step-btn pull-right">Proceed</button>
								<div class="clearfix"></div>	
								</div>	
								</td>
						</tr>  	
						</tbody>
					</table>
					</form>
				</div>	
			
			
			
			</div>
		
		
	</div>
	
	
<!-- <script type="text/javascript">
        
 
  $('#stepcustomer_form').validate();

    $('#proceed').click(function () {
        if ($("#form1").valid()) {
            alert('hello - valid form');
        }
    });

</script> 
 -->



 <script type="text/javascript">
		$('#proceed').on('click', function() {		
			if($("#stepcustomer_form").valid({}))
			{
					
				//alert('erwwr');
						$.ajax({
						   	url: 'function/stepcustomerform.php',
						   	method: 'POST',
						   data:$('#stepcustomer_form').serializeArray(),
						   	success: function(res)
						   	{
						   		//alert(res);
						   		
								if(res=="1")
								{
										//window.location = "rooms.php";
										load_step4();
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
						
				}

			});

	</script> 
	<!-- <script type="text/javascript">
		$('#proceed').on('click', function() {
		    $("#stepcustomer_form").valid();

		});
	</script> -->
	
<!--  
<script type="text/javascript">
	
	$('#proceed').click(function(){

		$.ajax({
		   	url: 'function/stepcustomerform.php',
		   	method: 'POST',
		   data:$('#stepcustomer_form').serializeArray(),
		   	success: function(res)
		   	{
		   		console.log(res);
		   		
				if(res=="1")
				{
						//window.location = "rooms.php";
						//$_SESSION['step2complete'] = 1;
						load_step4();
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

</script> -->