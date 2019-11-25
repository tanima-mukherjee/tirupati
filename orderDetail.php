<?php include('../config/db.php'); ?>
<?php
  session_start();
  if(!isset($_SESSION['loginDate']))
  {
    header('location:index.php');
  }
  
  
  
  
  $id = $_REQUEST['id'];
  
  if(isset($_REQUEST['refund']) && $_REQUEST['refund']==1)
  {
      $sql_update = "update booking set order_status='2' where id=".$id;
	   mysqli_query($con,$sql_update);
  }
  
  
  if(isset($_REQUEST['deliver']) && $_REQUEST['deliver']==1)
  {
       $sql_update = "update booking set order_status='1' where id=".$id; 
	   mysqli_query($con,$sql_update);
  }
  
  
  
  $sql = "select * from booking where id = '".$id."'";
  $res = mysqli_query($con,$sql);
  $data = mysqli_fetch_assoc($res);
  
  
  if(isset($_REQUEST['send']) && $_REQUEST['send']==1)
  {
       $to = $data['email'];
	   $enc_id = base64_encode($data['order_id']);

		$subject = 'Booking Detail Link from Tirupati Finance';
		
		$headers = "From: contact@ogmaconceptions.com\r\n";
		$headers .= "Reply-To: contact@ogmaconceptions.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$message = '<html><body style="padding: 0px; margin: 0px; font-family: "Times New Roman";">';
		$message .= '<table width="600" align="center" border="0" cellpadding="0" cellspacing="0">';
		$message .= "<tr style='background: #ffffff;'><td height='45' border='0'>&nbsp;</td></tr>";
		$message .= "<tr style='background: url(http://www.ogmaconceptions.com/demo/tirupati/images/email-banner.jpg)'><td align='left' valign='top' height='300'>";
		$message .= '<table width="100%" border="0" cellpadding="0">';
		$message .= '<tr><td align="center"><img src="http://www.ogmaconceptions.com/demo/tirupati/images/email-logo.png" style="margin-top: -48px;"></td></tr>';
		$message .= '<tr><td align="left" style="padding-left: 25px; padding-top: 15px;">
					<img src="http://www.ogmaconceptions.com/demo/tirupati/images/welcome-text.png" style="margin-top: 45px;"></td></tr>';
		$message .= '</table>';
		$message .= '</td></tr>';		
		$message .= "<tr style='background: #f8f8f8;'><td style='padding: 25px;' align='left'><h2 style='padding: 0px; margin: 0px; color: #333; font-weight: 600; font-size: 18px;'>Please upload user detail by clicking on given link below</h2> <p style='font-size: 14px; line-height: 22px; text-align: justify;'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
		<a style='background: #ff5733; display: inline-block; padding:10px 25px; color: #fff; border-radius: 25px; text-decoration: none;' href='http://www.ogmaconceptions.com/demo/tirupati/customer_form.php?order_id=".$enc_id."'>Click Here</a>
		</td></tr>";
		$message .= "<tr style='background: #ffa224;'><td height='3' border='0'></td></tr>";		
		$message .= "</table>";
		$message .= "</body></html>";
		
		//echo $message;
		//exit;
		
		if(mail($to, $subject, $message, $headers)){
    				$msg =  'Your mail has been sent successfully.';
					$flag = 1;
		} else{
    			$msg = 'Unable to send email. Please try again.';
				$flag = 0;
			}
  }

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Tirupati | </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

  <script src="js/jquery.min.js"></script>
  <script src="js/nprogress.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Tirupati!</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
             
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <?php include('element/sideMenu.php'); ?>

          </div>
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
     <?php include('element/topNav.php'); ?>
      <!-- /top navigation -->

      <style type="text/css">
        .box{
          width:100%;
          height:auto;
          background: #b2bec3;
        }
      </style>

      <!-- page content -->
      <div class="right_col" role="main">


        <div class="row">

         

              

             

         
         
          <div class="col-lg-12 dash-row" >
		  
		  <?php if($flag==0 && $msg!=""){?>
					
					<div class="alert alert-danger alert-dismissible" role="alert">

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Fail!</strong> <?php echo $msg; ?>
              </div>
			  
			  <?php  } else if($flag==1 && $msg!=""){?>
			  
			   <div class="alert alert-success alert-dismissible" role="alert">

              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <?php echo $msg; ?>
            </div>
			
			 <?php  } ?>
			 
			 
              
              <h2>Order Detail</h2>
              
              <hr>
              
			  <div class="details-row">
				<div class="col-md-6">
					<div class="table-responsive">
					
					
			
			
					
						<table class="table">
							<thead>
							<tr>
								<th colspan="2">Cusromer & Order Details</th>								
							 </tr>
						</thead>
						<tbody>
							<tr>
								<td><strong>Full Name</strong></td>
								<td><?php echo $data['full_name']?></td>
							</tr>
							<tr>
								<td><strong>Mobile</strong></td>
								<td><?php echo $data['phone']?></td>
							</tr>
							<tr>
								<td><strong>Email</strong></td>
								<td><?php echo $data['email']?></td>
							</tr>
							<tr>
								<td><strong>Darshan Date</strong></td>
								<td><?php echo date('d/m/Y',strtotime($data['date']));?></td>
							</tr>
							<tr>
								<td><strong>Darshan Time</strong></td>
								<td><?php echo $data['time']?></td>
							</tr>
							<tr>
								<td><strong>No. Of Ticket(s)</strong></td>
								<td><?php echo $data['num_of_devotees']?></td>
							</tr>
							
							<tr>
								<td><strong>No. Of Ladoo(s)</strong></td>
								<td><?php echo $data['num_of_ladoos']?></td>
							</tr>
							
							
							
						</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-6">
					<div class="table-responsive">
						<table class="table">
							<thead>
							<tr>
								<th colspan="2">Cusromer & Order Details</th>								
							 </tr>
						</thead>
						<tbody>
						
						<tr>
								<td><strong>Add On</strong></td>
								<td><?php if($data['ticket_type']==100){?>  With in 2 hours for Rs. 100 only <?php } ?></td>
							</tr>
							
							
							<tr>
								<td><strong>Total Charges</strong></td>
								<td><?php echo number_format($data['charge'],2) ?></td>
							</tr>
							<tr>
								<td><strong>Add-On Charges</strong></td>
								<td><?php echo number_format($data['add_on_charge'],2) ?></td>
							</tr>
							<tr>
								<td><strong>GST</strong></td>
								<td><?php echo number_format($data['gst'],2) ?></td>
							</tr>
							<tr>
								<td><strong>Room Charges</strong></td>
								<td><?php echo number_format($data['room_charge'],2) ?></td>
							</tr>
							
							<tr>
								<td><strong>Total Amount</strong></td>
								<td><?php echo number_format($data['total'],2) ?></td>
							</tr>
							<tr>
								<td><strong>Order Status</strong></td>
								<td>
								<?php switch($data['order_status'])
								{
								
									case 0: echo "New Order"; break;
									case 1: echo "Delivered"; break;
									case 2: echo "Refunded"; break;
								}
								?>
								
								</td>
							</tr>
							
							
						</tbody>
						</table>
					</div>
				</div>
				
				
				
				
		
		</div>
		<div class="clearfix"></div>
		
		<?php
		
		$cus_detail = "select * from devoee_detail where order_id = '".$id."'";
		$res_cus = mysqli_query($con,$cus_detail);
		
		
		 if(mysqli_num_rows($res_cus)>0){?>
		
		
		
			<div class="details-row">
			<div class="table-responsive">
				<table class="table">
					<thead>
					<tr>
						<th colspan="5">Devotee Details</th>								
					 </tr>
					 <tr>
						<td><strong>Name</strong></td>
						<td><strong>Age</strong></td>
						<td><strong>Gender</strong></td>
						<td><strong>ID Type</strong></td>
						<td><strong>ID Proof</strong></td>
					</tr>
				</thead>
				<tbody>	
				
					<?php while($dataarr = mysqli_fetch_assoc($res_cus)){?>				
					<tr>
						<td><?php echo $dataarr['name']?></td>
						<td><?php echo $dataarr['age']?></td>
						<td><?php if($dataarr['gender']=='m') echo "Male"; else echo "Female"?></td>
						<td><?php echo $dataarr['id_type']?></td>
						<td><?php echo $dataarr['id_num']?></td>
					</tr>
					<?php } ?>
					
					
				</tbody>
				</table>
			</div>				
		</div>	
					  
			<?php } ?>  
			<?php if($data['order_status']==0){?>
			
			<button type="button" class="btn btn-primary" onClick="window.location='orderManagement.php'">Back</button>
			<button type="button" class="btn btn-delivered" onClick="window.location='orderDetail.php?id=<?php echo $data['id']?>&refund=1'">Refund</button>
			<button type="button" class="btn btn-primary" onClick="window.location='orderDetail.php?id=<?php echo $data['id']?>&deliver=1'">Delivered</button>
			<button type="button" class="btn btn-primary" onClick="window.location='orderDetail.php?id=<?php echo $data['id']?>&send=1'">Send Link</button>
			<?php } else {?>
			
			<button type="button" class="btn btn-primary" onClick="window.location='orderManagement.php'">Back</button>
			
			<?php } ?>
			
          </div>
		  
		  

    
        <!-- footer content -->

        <footer>
          <div class="copyright-info">
          
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->

    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="js/chartjs/chart.min.js"></script>

  <script src="js/custom.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="js/flot/date.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script>
    $(function() {
      $('#world-map-gdp').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          regions: [{
            values: gdpData,
            scale: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionTipShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>
  <!-- skycons -->
  <script src="js/skycons/skycons.min.js"></script>
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>

  <!-- dashbord linegraph -->
  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [
        "Symbian",
        "Blackberry",
        "Other",
        "Android",
        "IOS"
      ],
      datasets: [{
        data: [15, 20, 30, 10, 30],
        backgroundColor: [
          "#BDC3C7",
          "#9B59B6",
          "#455C73",
          "#26B99A",
          "#3498DB"
        ],
        hoverBackgroundColor: [
          "#CFD4D8",
          "#B370CF",
          "#34495E",
          "#36CAAB",
          "#49A9EA"
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas1"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph -->
  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>
  <script>
    NProgress.done();
  </script>
  <!-- /datepicker -->
  <!-- /footer content -->
</body>

</html>
