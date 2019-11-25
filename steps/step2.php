<?php 
	session_start();
	
	//echo "<pre/>";print_r($_SESSION['step2']);

	if(!empty($_SESSION['step2']))
	{
		$devotees = $_SESSION['step2']['devotees'];
		$f_name = $_SESSION['step2']['f_name'];
		$email = $_SESSION['step2']['email'];
		$phone = $_SESSION['step2']['phone'];
		$ladoos = $_SESSION['step2']['ladoos'];

		
	}
	else
	{
		$devotees = '';
		$f_name = '';
		$email = '';
		$phone = '';
		$ladoos = '';

	}

?>
<div class="booking-box animated slideInRight">
<form id="step2_form">
	<div class="booking-inner">
		<div class="form-group">
			<label class="label-field">Number of Devotees: <b class="required">*</b></label>
			<select class="form-control" name="devotees" onchange="generate(this.value)">
				<option <?php if($devotees == '1'){ echo 'selected="selected"'; } ?>>1</option>
				<option <?php if($devotees == '2'){ echo 'selected="selected"'; } ?>>2</option>
				<option <?php if($devotees == '3'){ echo 'selected="selected"'; } ?>>3</option>
				<option <?php if($devotees == '4'){ echo 'selected="selected"'; } ?>>4</option>
				<option <?php if($devotees == '5'){ echo 'selected="selected"'; } ?>>5</option>
				<option <?php if($devotees == '6'){ echo 'selected="selected"'; } ?>>6</option>
				<option <?php if($devotees == '7'){ echo 'selected="selected"'; } ?>>7</option>
				<option <?php if($devotees == '8'){ echo 'selected="selected"'; } ?>>8</option>
				<option <?php if($devotees == '9'){ echo 'selected="selected"'; } ?>>9</option>
				<option <?php if($devotees == '10'){ echo 'selected="selected"'; } ?>>10</option>
				<option <?php if($devotees == '11'){ echo 'selected="selected"'; } ?>>11</option>
				<option <?php if($devotees == '12'){ echo 'selected="selected"'; } ?>>12</option>
				<option <?php if($devotees == '13'){ echo 'selected="selected"'; } ?>>13</option>
				<option <?php if($devotees == '14'){ echo 'selected="selected"'; } ?>>14</option>
				<option <?php if($devotees == '15'){ echo 'selected="selected"'; } ?>>15</option>
				<option <?php if($devotees == '16'){ echo 'selected="selected"'; } ?>>16</option>
				<option <?php if($devotees == '17'){ echo 'selected="selected"'; } ?>>17</option>
				<option <?php if($devotees == '18'){ echo 'selected="selected"'; } ?>>18</option>
				<option <?php if($devotees == '19'){ echo 'selected="selected"'; } ?>>19</option>
				<option <?php if($devotees == '20'){ echo 'selected="selected"'; } ?>>20</option>
			</select>
		</div>	
		<div class="form-group">
			<label class="label-field">Number of Extra Ladoos: <b class="required">*</b></label>
			<select class="form-control" name="ladoos" id="ladoo">
				<option <?php if($ladoos == '0'){ echo 'selected="selected"'; } ?>>0</option>
				<option <?php if($ladoos == '1'){ echo 'selected="selected"'; } ?>>1</option>
				<option <?php if($ladoos == '2'){ echo 'selected="selected"'; } ?>>2</option>
				<option <?php if($ladoos == '3'){ echo 'selected="selected"'; } ?>>3</option>
				<option <?php if($ladoos == '4'){ echo 'selected="selected"'; } ?>>4</option>
				<option <?php if($ladoos == '5'){ echo 'selected="selected"'; } ?>>5</option>
				<option <?php if($ladoos == '6'){ echo 'selected="selected"'; } ?>>6</option>
				<option <?php if($ladoos == '7'){ echo 'selected="selected"'; } ?>>7</option>
				<option <?php if($ladoos == '8'){ echo 'selected="selected"'; } ?>>8</option>
				<option <?php if($ladoos == '9'){ echo 'selected="selected"'; } ?>>9</option>
				<option <?php if($ladoos == '10'){ echo 'selected="selected"'; } ?>>10</option>
				<option <?php if($ladoos == '11'){ echo 'selected="selected"'; } ?>>11</option>
				<option <?php if($ladoos == '12'){ echo 'selected="selected"'; } ?>>12</option>
				<option <?php if($ladoos == '13'){ echo 'selected="selected"'; } ?>>13</option>
				<option <?php if($ladoos == '14'){ echo 'selected="selected"'; } ?>>14</option>
				<option <?php if($ladoos == '15'){ echo 'selected="selected"'; } ?>>15</option>
				<option <?php if($ladoos == '16'){ echo 'selected="selected"'; } ?>>16</option>
				<option <?php if($ladoos == '17'){ echo 'selected="selected"'; } ?>>17</option>
				<option <?php if($ladoos == '18'){ echo 'selected="selected"'; } ?>>18</option>
				<option <?php if($ladoos == '19'){ echo 'selected="selected"'; } ?>>19</option>
				<option <?php if($ladoos == '20'){ echo 'selected="selected"'; } ?>>20</option>
			</select>
		</div>	
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
		<a href="javascript:void(0)" onclick="load_step1()" class="back-btn pull-right"><i class="fa fa-angle-double-left"></i> Back</a>
	</div>	
</form>
	
		<div class="clearfix"></div>	
	</div>
<script type="text/javascript">
				
			$("#step2_form").validate({
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
						   	url: 'function/step2.php',
						   	method: 'POST',
						   	data:$('#step2_form').serializeArray(),
						   	success: function(res)
						   	{
						   		if(res == '1')
						   		{
						   			load_step3();
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
			
			
			function generate(d)
			{
				//alert(d);
				var max_ladoo = parseInt(d)*2;
				//alert(max_ladoo);
				
				html = "";
				var i;
				
				for(i=0;i<=max_ladoo;i++)
				{				
					 html += "<option >"+i+"</option>";
				}
				
				$("#ladoo").html(html);
				
			}


</script>