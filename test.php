<?php /*?><script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/jquery.yacal1.js" type="text/javascript"></script><?php */?>

    
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
<script src="http://eduludi.github.io/jquery-yacal/dist/jquery.yacal.min.js" type="text/javascript"></script>

    
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="css/jquery.yacal.css">
<script src="js/jquery.validate.js" type="text/javascript"></script>
<?php
	require("config/db.php");
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

	if(!empty($_SESSION['final']))
	{
		$date = $_SESSION['final']['date'];
		$time = $_SESSION['final']['time'];
		$d_arr = explode("-",$date);
		
		$month = $d_arr[1] ;
		
		$date = $d_arr[2]."-".$month."-".$d_arr[0];
		
		$sql = "select * from date_time where `date`='".$date."' "; 
		$res = mysqli_query($con,$sql);
		
		$str="";
		$i=0;
		
		while($data=mysqli_fetch_assoc($res))
		{
			if($i==0)
			$str.= "'".$data['time']."'";	
			else
			$str.= ",'".$data['time']."'";
			
			$i++;	
		}
		//echo $str;exit();
		
		if($str!="")
		  $sql2 = "select `time` from timetable where `time` NOT IN (".$str.")"; 
		 else
		  $sql2 = "select `time` from timetable "; 
		 	
		$query = mysqli_query($con,$sql2);
	}
	else
	{
		$date = '';
		$time = '';
		$sql = "SELECT * FROM timetable";
        $query = mysqli_query($con,$sql) or die('sql error');
	}
	
      
	?>
<?php 
	session_start();

	//print_r($_SESSION['final']);
	if(!empty($_SESSION['final']))
	{

		$date = $_SESSION['final']['date'];
		$time = $_SESSION['final']['time'];
		$devotees = $_SESSION['final']['devotees'];
		$ladoos = $_SESSION['final']['ladoos'];
		$f_name = $_SESSION['final']['f_name'];
		$email = $_SESSION['final']['email'];
		$phone = $_SESSION['final']['phone'];
		$ticket = $_SESSION['final']['ticket'];
	}
	else
	{
		$date = '';
		$time = '';
		$devotees = '';
		$ladoos ='';
		$f_name ='';
		$email = '';
		$phone = '';
		$ticket = '';
	}

	//echo($phone);exit();

?>

			<form id="step1_form">		
			<div class="step-booking-box">
				<div class="step-booking-top">
					<label class="radio-inline">
						<input type="radio" name="ticket" id="ticket" value="100"  required data-val="true"  data-val-required="* Darshan Type is required." <?php if($ticket == '100'){echo 'checked="checked"';} ?> >&emsp;<strong class="label-color">Tatkal Ticket
						</strong>
					</label>
					<label class="radio-inline">
						<input type="radio" name="ticket" id="ticket" value="50"  required data-val="true"  data-val-required="* Darshan Type is required." <?php if($ticket == '50'){echo 'checked="checked"';} ?> />&emsp;<strong class="label-color">Regular Ticket </strong>
					</label>
					<label class="radio-inline">
						<input type="radio" name="ticket" id="ticket" value="0"  required data-val="true"  data-val-required="* Darshan Type is required." <?php if($ticket == '0'){echo 'checked="checked"';} ?> />&emsp;<strong class="label-color">Slow Ticket </strong>
					</label>
					<div class="clearfix"></div>
					<label id="ticket-error" class="error" for="ticket" style="display: none; font-weight: 400;"></label>
				</div>	
				<div class="step-booking-top-middle">
					<div class="booking-datepicker">
						<div id="calendarTemplate">
							
						</div>
						<input type="hidden" id="datepicker" name="date" value="<?php echo $date ?>" readonly>
						<input type="hidden" id="booking_type" name="booking_type" value="" readonly>

					</div>						
					<div class="row">
						
						<div class="col-sm-4">
							<label class="label-field">Select Darshan Time: <b class="required">*</b></label>
							<select class="form-control" id="time" name="time">	
							 <?php
							 if(!empty($_SESSION['final']))
								{
				               while($row = mysqli_fetch_assoc($query))
				               {
				               	?>
				               	<option value="<?php echo $row['time']; ?>"  <?php if($row['time'] == $time){ ?> selected="selected"  <?php } ?> > <?php echo $row['time'] ; ?></option>
				               	<?php
				               }
				               }
				               ?>       							
							</select>
						</div>
						<div class="col-sm-4">
							<label class="label-field">Number of Devotees: <b class="required">*</b></label>
							<select class="form-control" name="devotees" >									
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
						<div class="col-sm-4">
							<label class="label-field">Number of Extra Ladoos: <b class="required">*</b></label>
							<select class="form-control" name="ladoos" id="ladoo">	
								<option <?php if($ladoos == '0'){ echo 'selected="selected"'; } ?>>0</option>		
								<option <?php if($ladoos == '2'){ echo 'selected="selected"'; } ?>>2</option>		
								<option <?php if($ladoos == '4'){ echo 'selected="selected"'; } ?>>4</option>		
								<option <?php if($ladoos == '6'){ echo 'selected="selected"'; } ?>>6</option>		
								<option <?php if($ladoos == '8'){ echo 'selected="selected"'; } ?>>8</option>		
								<option <?php if($ladoos == '10'){ echo 'selected="selected"'; } ?>>10</option>		
								<option <?php if($ladoos == '12'){ echo 'selected="selected"'; } ?>>12</option>		
								<option <?php if($ladoos == '14'){ echo 'selected="selected"'; } ?>>14</option>		
								<option <?php if($ladoos == '16'){ echo 'selected="selected"'; } ?>>16</option>		
								<option <?php if($ladoos == '18'){ echo 'selected="selected"'; } ?>>18</option>		
								<option <?php if($ladoos == '20'){ echo 'selected="selected"'; } ?>>20</option>		
								<option <?php if($ladoos == '22'){ echo 'selected="selected"'; } ?>>22</option>		
								<option <?php if($ladoos == '24'){ echo 'selected="selected"'; } ?>>24</option>		
								<option <?php if($ladoos == '26'){ echo 'selected="selected"'; } ?>>26</option>		
								<option <?php if($ladoos == '28'){ echo 'selected="selected"'; } ?>>28</option>		
								<option <?php if($ladoos == '30'){ echo 'selected="selected"'; } ?>>30</option>		
								<option <?php if($ladoos == '32'){ echo 'selected="selected"'; } ?>>32</option>		
								<option <?php if($ladoos == '34'){ echo 'selected="selected"'; } ?>>34</option>		
								<option <?php if($ladoos == '36'){ echo 'selected="selected"'; } ?>>36</option>		
								<option <?php if($ladoos == '38'){ echo 'selected="selected"'; } ?>>38</option>		
								<option <?php if($ladoos == '40'){ echo 'selected="selected"'; } ?>>40</option>
		
							</select>
						</div>
					</div>
				</div>		
				
				<div class="step-booking-bottom">
					<div class="row">
						<div class="col-sm-12">
							<label class="label-field">Contact Name: <b class="required">*</b></label>
							<input type="text" name="f_name" class="form-control" id="f_name" value="<?php echo $f_name; ?>" placeholder="Contact Name">
						</div>
						<div class="col-sm-6">
							<label class="label-field">Contact Email: <b class="required">*</b></label>
							<input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>" placeholder="Contact Email">
						</div>
						<div class="col-sm-6">
							<label class="label-field">Contact Phone: <b class="required">*</b></label>
							<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone; ?>" maxlength="11" placeholder="Contact Number">
						</div>
					</div>
				</div>
				
				<div class="buttton-row" style="text-align: center;">
					<button type="submit" class="step-btn">Next Step <i class="fa fa-angle-double-right"></i></button>
				</div>
			

			</div>


		
	</form>
		

<script type="text/javascript">
	//$('.day.active[data-time="1550773800000"]').addClass('selected_new');
$(document).ready(function(){


	$.ajax({
        url: "disableddates.php",
        type: "post",
        data: {selectedType:1},
        success: function (response) {
           // you will get response from your php page (what you echo or print)  
          // alert(response);
           var disableddates = JSON.parse(response); 
           //var disableddates = ["29-03-2019"]; 
           //console.log('=========',disableddates) ;
           changeCalendar(disableddates);           

        },
        error: function(jqXHR, textStatus, errorThrown) {
           var disableddates = [];
        }


		});

	
	 if ($(window).width() < 1000){
	
		$('.month').css('width','195px');
		$('.mar-lef').css('padding-left','0px');
		$('.mar-lef').css('margin-left','0px');
		$('.day.d1, .wday.wd1').css('left','26px');
		$('.day.d2, .wday.wd2').css('left','52px');
		$('.day.d3, .wday.wd3').css('left','78px');
		$('.day.d4, .wday.wd4').css('left','104px');
		$('.day.d5, .wday.wd5').css('left','130px');
		$('.day.d6, .wday.wd6').css('left','156px');
		
		$(document).on('click','.next , .prev',function(){
			$('.month').css('width','194px');
			$('.mar-lef').css('padding-left','0px');
			$('.mar-lef').css('margin-left','0px');
			$('.day.d1, .wday.wd1').css('left','26px');
			$('.day.d2, .wday.wd2').css('left','52px');
			$('.day.d3, .wday.wd3').css('left','78px');
			$('.day.d4, .wday.wd4').css('left','104px');
			$('.day.d5, .wday.wd5').css('left','130px');
			$('.day.d6, .wday.wd6').css('left','156px');
		});
		
		$('.box-shadow-new').css('padding-bottom','10px');  
		$('.r-p-b').css('padding-bottom','20px');  
		$('.row').css('margin-top','300px');
		$('.row').css('transform','scale(1.5)');
		$('footer').css('margin-top','300px');
		$('.menu_top').css('margin-left','100px');

    }


});


function get_ticket_type()
{
	var selectedType = $( 'input[name=ticket]:checked' ).val();
	 $("#booking_type").val(selectedType);
}
function get_date()
{	
	$("#datepicker").val('');

	jQuery('#time').html(' ');
	var selectedType = $( 'input[name=ticket]:checked' ).val();

	//alert(selectedType);
	
	if(selectedType == "tatkal"){

		$.ajax({
        url: "disableddates.php",
        type: "post",
        data: {selectedType:1},
        success: function (response) {
           // you will get response from your php page (what you echo or print)  
          // alert(response);
           var disableddates = JSON.parse(response); 
            changeCalendar(disableddates);           
           //var disableddates = ["29-03-2019"]; 
           //console.log('=========',disableddates) ;
               

        },
        error: function(jqXHR, textStatus, errorThrown) {
           var disableddates = [];
        }


		});
	}else if(selectedType == "regular"){
		$.ajax({
        url: "disableddates.php",
        type: "post",
        data: {selectedType:1},
        success: function (response) {
           // you will get response from your php page (what you echo or print)  
          // alert(response);
           var disableddates = JSON.parse(response);
            changeCalendar(disableddates);            

           //var disableddates = ["29-03-2019"]; 
           //console.log('=========',disableddates) ;
                 

        },
        error: function(jqXHR, textStatus, errorThrown) {
           var disableddates = [];
        }


		});
	}else if(selectedType == "slow"){
		$.ajax({
        url: "disableddates.php",
        type: "post",
        data: {selectedType:1},
        success: function (response) {
           // you will get response from your php page (what you echo or print)  
          // alert(response);
           var disableddates = JSON.parse(response); 
           //var disableddates = ["29-03-2019"]; 
           //console.log('=========',disableddates) ;
           changeCalendar(disableddates);           

        },
        error: function(jqXHR, textStatus, errorThrown) {
           var disableddates = [];
        }


		});
	}
	
	 if ($(window).width() < 1000){
	
	$('.month').css('width','195px');
		$('.mar-lef').css('padding-left','0px');
		$('.mar-lef').css('margin-left','0px');
		$('.day.d1, .wday.wd1').css('left','26px');
		$('.day.d2, .wday.wd2').css('left','52px');
		$('.day.d3, .wday.wd3').css('left','78px');
		$('.day.d4, .wday.wd4').css('left','104px');
		$('.day.d5, .wday.wd5').css('left','130px');
		$('.day.d6, .wday.wd6').css('left','156px');
		
		$(document).on('click','.next , .prev',function(){
			$('.month').css('width','194px');
			$('.mar-lef').css('padding-left','0px');
			$('.mar-lef').css('margin-left','0px');
			$('.day.d1, .wday.wd1').css('left','26px');
			$('.day.d2, .wday.wd2').css('left','52px');
			$('.day.d3, .wday.wd3').css('left','78px');
			$('.day.d4, .wday.wd4').css('left','104px');
			$('.day.d5, .wday.wd5').css('left','130px');
			$('.day.d6, .wday.wd6').css('left','156px');
		});
		
		$('.box-shadow-new').css('padding-bottom','10px');  
		$('.r-p-b').css('padding-bottom','20px');  
		$('.row').css('margin-top','300px');
		$('.row').css('transform','scale(1.5)');
		$('footer').css('margin-top','300px');
		$('.menu_top').css('margin-left','100px');
	 }
}
function changeCalendar(disableddates){

	var date = new Date();
	var currentMonth = (date.getMonth());
	var nextMonth = (date.getMonth() + 1);
	var currentDate = date.getDate();
	var currentYear = date.getFullYear();

	

	$('#calendarTemplate').yacal({
		date: new Date(currentYear, nextMonth, currentDate),
		minDate: new Date(currentYear, currentMonth, currentDate),
		nearMonths: 1,
		isActive: DisableSpecificDates
	});
	//$('.day.active').on('click',function (event) {
		
		$('body').delegate(".day.active", "click", function() {
		//event.preventDefault();
		selDate = new Date($(this).data('time'));
		//alert(formatDate(selDate));
		$('.selected_new').removeClass('selected_new');
		$("#datepicker").val(formatDate(selDate));
		//console.log(this);
		$(this).addClass('selected_new');
		initComponent(formatDate(selDate));
	});

	function DisableSpecificDates(date){
		var string = formatDate(date);
		var isDisabled = (jQuery.inArray(string, disableddates) != -1);
		if(isDisabled){
			return false;
		}else{
			return true;
		}
		//return [!isDisabled];
	}
	
	function formatDate(date) {
	 var d = new Date(date),
		 month = '' + (d.getMonth() + 1),
		 day = '' + d.getDate(),
		 year = d.getFullYear();

	 if (month.length < 2) month = '0' + month;
	 if (day.length < 2) day = '0' + day;

	 return [day, month, year].join('-');
 }
}

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

	function initComponent(selDate)
		{
				
			var dateToday = new Date();
						
			
    			//	alert(selDate);
					
					$.ajax({
						   	url: 'function/getNewTime.php',
						   	method: 'POST',
						   	 data : { cdate :selDate},
						   	success: function(res)
						   	{
						   		//alert(res);	
								
								$("#time").html(res);		   			
						   	}
						});
			
			
			
		}

function change_persons(){
	var persons = $("#persons").val();
	$("#laddus").val(' ');
	var no_of_laddus = persons* 2;
	$("#laddus").empty();
	var select_data = '<option value="">Extra Laddus</option>';
	for(j=0;j<=no_of_laddus;){
		select_data += '<option value="'+j+'">'+j+'</option>';
		j=j+2;
	}
	$("#laddus").html(select_data);
}


 </script>


 <script type="text/javascript">
				
			$("#step1_form").validate({
					addClass:'error',
					rules: {
						date: "required",
						time: "required",
						f_name: "required",
						email: {
							required:true,
							email:true
						},
						phone: {
							required:true,
							number:true
						},
						ticket:{
							required:true
						}

					},
					messages: {
						date: "Please select a date",
						time: "Please select a time",
						f_name: "Please enter name",
						email: {
							required:"Please enter email",
							email:"Enter a valid email"
						},
						phone: "Please enter phone number",
						ticket: "Please select package"

					},
					submitHandler: function(form) 
					{
						$.ajax({
						   	url: 'function/stepnew.php',
						   	method: 'POST',
						   	data:$('#step1_form').serializeArray(),
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

	