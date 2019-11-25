<?php 
	session_start();

	if(!empty($_SESSION['rooms0']))
	{
		$f_name = $_SESSION['rooms0']['f_name'];
		$email = $_SESSION['rooms0']['email'];
		$phone = $_SESSION['rooms0']['phone'];
	}
	else
	{
		$f_name = '';
		$email = '';
		$phone = '';
	}


?>
<div class="booking-box animated slideInRight">
<form id="room0_form">
	<div class="booking-inner">
		<div class="form-group">
			<label class="label-field">Full Name: <b class="required">*</b></label>
			<input type="text" class="form-control" value="<?php echo $f_name; ?>" name="f_name">
		</div>	
		<div class="form-group">
			<label class="label-field">Email Id: <b class="required">*</b></label>
			<input type="text" class="form-control" value="<?php echo $email; ?>" name="email">
		</div>
		<div class="form-group">
			<label class="label-field">Mobile Number: <b class="required">*</b></label>
			<input type="text" class="form-control" value="<?php echo $phone; ?>" name="phone">
		</div>
	<div class="clearfix"></div>	
	</div>
	<div class="buttton-row">
		<button type="submit" class="step-btn">Next Step <i class="fa fa-angle-double-right"></i></button>
	</div>	
</form>
	
		<div class="clearfix"></div>	
	</div>
<script type="text/javascript">
				
			$("#room0_form").validate({
					addClass:'error',
					rules: {
						f_name: "required",
						email: {
							required:true,
							email:true
						},
						phone: {
							required:true,
							number:true,
							minlength:10,
        					maxlength:10
						}
					},
					messages: {
						f_name: "Please enter name",
						email: {
							required:"Please enter email",
							email:"Enter a valid email"
						},
						phone: "Please enter phone number"
					},
					submitHandler: function(form) 
					{
						

						$.ajax({
						   	url: 'function/rooms0.php',
						   	method: 'POST',
						   	data:$('#room0_form').serializeArray(),
						   	success: function(res)
						   	{
						   		if(res == '1')
						   		{
									load_rooms();
						   		}
						   		
						   	}
						});
					}
			});
			
			
			


</script>