<?php
	require("../config/db.php");
	error_reporting(1);
	
	$today = date('Y-m-d');
	$uptodate = date('Y-m-d', strtotime("+3 months", strtotime($today)));
	
	$sql_dates = "select `date`,`time` from date_time where `date` between CAST('$today' AS DATE) AND  CAST('$uptodate' AS DATE)";
	
	$query = mysqli_query($con,$sql_dates) ;
	
	$dates = '';
	$i=0;
	
	while($res = mysqli_fetch_assoc($query))
	{
	 	//$dates .=  '"'.$res['date'].'",';
		
		$sql_chk_time = "select `time` from date_time where `date`='".$res['date']."' ";
		$res_time = mysqli_query($con,$sql_chk_time) ;
		
		$num = mysqli_num_rows($res_time);
		
		if($num>=11)
		{
		
			$month = date('n', strtotime($res['date']));
			$day = date('j', strtotime($res['date']));
			$year = date('Y', strtotime($res['date']));
		
			if($i==0)	
			$dates .=  '"'.$month.'-'.$day.'-'.$year.'"';
		
			else
			$dates .=  ',"'.$month.'-'.$day.'-'.$year.'"';
		 
		
				$i++;
		}
		
			//["4-3-2018", "4-11-2018", "4-25-2018", "4-20-2018"]
	 
	 }
	 
	 
	 
	 //$dates .="]";
	 
	 //echo $dates;
	 
	session_start();

	if(!empty($_SESSION['step1']))
	{
		$date = $_SESSION['step1']['date'];
		$time = $_SESSION['step1']['time'];
	}
	else
	{
		$date = '';
		$time = '';
	}
	$sql = "SELECT * FROM timetable";
    $query = mysqli_query($con,$sql) or die('sql error');
      
	?>

<div class="booking-box animated slideInRight">
<form id="step1_form">
	<div class="booking-inner">
		<div class="form-group">
			<label class="label-field">Your Darshan Date: <b class="required">*</b></label>
			<input type="text" class="form-control" id="date" value="<?php echo $date; ?>" name="date" onblur="set_time(this.value);" readonly>
		</div>	
		<div class="form-group">
			<label class="label-field">Darshan Time: <b class="required">*</b></label>

			<select class="form-control" name="time" id="time"> 
               <?php
               while($row = mysqli_fetch_assoc($query))
               {
               	?>
               	<option value="<?php echo $row['time']; ?>"  <?php if($row['time'] == $time){ ?> selected="selected"  <?php } ?> > <?php echo $row['time'] ; ?></option>
               	<?php
               }
               ?>                

            </select>

			<p><small>If your selected slot is not available, we will book in +/- 2 hour range.</small></p>
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


			function set_time(val)
			{
					
				//alert(val);
			
			}
				
			$("#step1_form").validate({
					addClass:'error',
					rules: {
						date: "required",
						time: "required"
					},
					messages: {
						date: "Please select a date",
						time: "Please select a time"
					},
					submitHandler: function(form) 
					{
						//load_step2()

						$.ajax({
						   	url: 'function/step1.php',
						   	method: 'POST',
						   	data:$('#step1_form').serializeArray(),
						   	success: function(res)
						   	{
						   		if(res == '1')
						   		{
						   			load_step2()
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

<script>

$(document).ready(function(){
/*initialisation des composants*/
initComponent();
});

function DisableSpecificDates(date) {
 
 var disableddates = [<?php echo $dates?>];
 
 //var disableddates = ["12-3-2014", "12-11-2014", "12-25-2014", "12-20-2014"];
 
 
 
 //alert(disableddates);
 
 
 
 var m = date.getMonth();
 var d = date.getDate();
 var y = date.getFullYear();
 
 //alert(m);
 
 // First convert the date in to the mm-dd-yyyy format 
 // Take note that we will increment the month count by 1 
 var currentdate = (m + 1) + '-' + d + '-' + y ;
 
  // We will now check if the date belongs to disableddates array 
 for (var i = 0; i < disableddates.length; i++) {
 
 //alert("cur"+currentdate);
 
  //alert("dis"+disableddates);
 
 // Now check if the current date is in disabled dates array. 
 if ($.inArray(currentdate, disableddates) != -1 ) {
 return false;
 }
 }
 
}



		function initComponent()
		{
				
			var dateToday = new Date();
				
				$('#date').datepicker({
				'format': 'd/m/yyyy',
				beforeShowDay: DisableSpecificDates,
				startDate: new Date(),
				'autoclose': true
			}).on("changeDate", function (e) {
			
			
    				//alert(e.format());
					
					$.ajax({
						   	url: 'function/getTime.php',
						   	method: 'POST',
						   	 data : { cdate :e.format()},
						   	success: function(res)
						   	{
						   		//alert(res);	
								
								$("#time").html(res);		   			
						   	}
						});
			});
			
			
		}
		
		
		$(function() {
			$('#basicExample').timepicker();
		});
	
	
	
	
		
	</script>