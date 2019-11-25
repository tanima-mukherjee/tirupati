<?php 
	session_start();

	if(!empty($_SESSION['step3']))
	{
		$price = $_SESSION['step3']['ticket'];
		
	}
	else
	{
		$price = '';
	}

?>
<div class="booking-box animated slideInRight">
<form id="step3_form">
<div class="booking-inner">
	<div class="form-group">
		<label class="label-field">How fast would you like to get your tickets?: <b class="required">*</b></label>
		<select class="form-control" name="ticket">

		<optgroup label="TATKAL">
			<option <?php if($price == '100'){echo 'selected="selected"';} ?> value="100">With in 2 hours for Rs. 100 only</option>
		</optgroup>
		<optgroup label="REGULAR">
			<option <?php if($price == '50'){echo 'selected="selected"';} ?> value="50">With in 24 hours for Rs. 50 only</option>
		</optgroup>
		<optgroup label="SLOW">
			<option <?php if($price == '0'){echo 'selected="selected"';} ?> value="0">With in 72 hours for Rs. 0 only</option>
		</optgroup>
	</select>
	</div>	
<div class="clearfix"></div>	
</div>
<div class="buttton-row">
	<button type="submit" class="step-btn">Next Step <i class="fa fa-angle-double-right"></i></button>
	<a href="javascript:void(0)" onclick="load_step2()" class="back-btn pull-right"><i class="fa fa-angle-double-left"></i> Back</a>
</div>	
</form>
	
		<div class="clearfix"></div>	
</div>
	<script type="text/javascript">
				
			$("#step3_form").validate({
					addClass:'error',
					rules: {
						ticket: "required"
					},
					messages: {
						ticket: "Please select package"
					},
					submitHandler: function(form) 
					{
						$.ajax({
						   	url: 'function/step3.php',
						   	method: 'POST',
						   	data:$('#step3_form').serializeArray(),
						   	success: function(res)
						   	{
						   		if(res == '1')
						   		{
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