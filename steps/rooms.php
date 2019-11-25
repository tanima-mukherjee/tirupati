

			<div class="row hotel-wrap">
				<div class="col-md-12">					
					<div class="check-in-out">
						<div class="table-responsive">
							<div class="col-md-6">
								<label>Check In</label>
								<input type="text" class="form-control valid" name="check_in_date" id="check_in_date">
							</div>
							<div class="col-md-6">
								<label>Check Out</label>
								<input type="text" class="form-control valid" name="check_out_date" id="check_out_date">
							</div>
						</div>
					</div>
				</div>



				<div class="col-md-12">					

					<div class="book-table">

						<h4>Room Types</h4>

						<div class="table-responsive">

							<table class="table table-bordered">

								<thead>

									<tr>

										<th class="align-left">Rooms</th>

										<th>Persons</th>

										<th>Tarrif</th>

										<?php /*?>

										<th>Non A/c</th><?php */?>

										<th>Rooms Qty</th>

									</tr>

								</thead>

								<tbody>

									 <tr>

										<td>Double Room Ordinary</td>

										<td align="center">1</td>

										

										<td align="center">600</td>

										<td align="center"><input type="number" value="0" class="form-control" min="0" onchange="calculate()" id="room1" /> </td>

									  </tr>

									  <tr>

										<td>Double Room Deluxe (Non A.C.)</td>

										<td align="center">2</td>

										

										<td align="center">800</td>

										<td align="center"><input type="number" value="0" class="form-control" min="0" onchange="calculate()" id="room2" /> </td>

									  </tr>

									  

									  <tr>

										<td>Double Room Deluxe (A.C.)</td>

										<td align="center">2</td>

										<td align="center">1200</td>

										

										<td align="center"><input type="number" value="0" class="form-control" min="0" onchange="calculate()" id="room3" /> </td>

									  </tr>

									  

									  

									  <tr>

										<td>Triple Room Deluxe (Non A.C.)</td>

										<td align="center">3</td>

										

										<td align="center">1100</td>

										<td align="center"><input type="number" value="0" class="form-control" min="0" onchange="calculate()" id="room4" /> </td>

									  </tr>

									  

									  <tr>

										<td>Triple Room Deluxe (A.C.)</td>

										<td align="center">3</td>

										

										<td align="center">1500</td>

										<td align="center"><input type="number" value="0" class="form-control" min="0" onchange="calculate()" id="room5" /> </td>

									  </tr>

									  

									  

									  <tr>

										<td>Suit Room Deluxe(Non A.C.)</td>

										<td align="center">4</td>

										

										<td align="center">1600</td>

										<td align="center"><input type="number" value="0" class="form-control" min="0" onchange="calculate()" id="room6" /> </td>

									  </tr>

									  

									  <tr>

										<td>Suit Room Deluxe (A.C.)</td>

										<td align="center">4</td>

										<td align="center">2000</td>

										

										<td align="center"><input type="number" value="0" class="form-control" min="0" onchange="calculate()" id="room7" /> </td>

									  </tr>

									  

									  

									  <tr>

										<td>Extra Person (Non A.C.)</td>

										<td align="center">1</td>

										

										<td align="center">150</td>

										<td align="center"><input type="number" value="0" class="form-control" min="0" onchange="calculate()" id="extra_person_nonac" /></td>

									  </tr>	

									  

									  <tr>

										<td>Extra Person (A.C.)</td>

										<td align="center">1</td>

										<td align="center">250</td>

										

										<td align="center"><input type="number" value="0" class="form-control" min="0" onchange="calculate()" id="extra_person_ac" /></td>

									  </tr>	

									  

									  

									  <tr>

									    <td class="align-right" colspan="6">

										<b>Service Tax @ 14.5%</b> <span class="amount-info" id="service_id">0</span> 

										</td>

									  </tr>	

									  <tr>

									    <td class="align-right" colspan="6">

										<b>Swach Bharat @ 0.5%</b> <span class="amount-info" id="swach_id">0</span>

										</td>

									  </tr>

									  <tr>

									    <td class="align-right" colspan="6">

											<b>Luxury Tax @ 5%</b> <span class="amount-info" id="luxury_id">0</span>

										</td>

									  </tr>

									  <tr>

									    <td class="align-right" colspan="6">

										<b class="total">Total</b> <span class="amount-info" id="total_id"><b>0</b></span>

										</td>

									  </tr>

								</tbody>

							</table>

							

							<input type="hidden" name="json_val" id="json_val" value="" />

							

							<input type="hidden" name="total" id="total" value="" />
							<input type="hidden" name="check_select_room" id="check_select_room" value="" />

							

							<span id="output"></span>

							

							

							<div class="buttton-row">

		<a href="javascript:void(0)" class="back-btn" onclick="load_rooms0()"><i class="fa fa-angle-double-left"></i> Back</a>

		<button type="button" class="step-btn pull-right proceed" id="proceed">Proceed to Payment</button>

	<div class="clearfix"></div>	

	</div>	

<div class="clearfix"></div>

						</div>

					</div>

					

					

				</div>

				<div class="col-md-12 pull-right">

					<h4>Room Gallery</h4>

					<div class="gallery-list">

						<ul>

							<li>							

								<div class="gallery-box">

									<img src="images/hotel/hotel-img01.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img01.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>

									</div>

								</div>

							</li>							

							<li>

								<div class="gallery-box">

									<img src="images/hotel/hotel-img03.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img03.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>



									</div>

								</div>

							</li>

							<li>

								<div class="gallery-box">

									<img src="images/hotel/hotel-img04.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img04.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>

									</div>

								</div>

							</li>

							<li>

								<div class="gallery-box">

									<img src="images/hotel/hotel-img05.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img05.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>

									</div>

								</div>

							</li>

							<li>

								<div class="gallery-box">

									<img src="images/hotel/hotel-img06.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img06.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>

									</div>

								</div>

							</li>

							<li>

								<div class="gallery-box">

									<img src="images/hotel/hotel-img07.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img07.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>

									</div>

								</div>

							</li>

							<li>

								<div class="gallery-box">

									<img src="images/hotel/hotel-img08.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img08.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>

									</div>

								</div>

							</li>

							<li>

								<div class="gallery-box">

									<img src="images/hotel/hotel-img09.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img09.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>

									</div>

								</div>

							</li>

							<li>

								<div class="gallery-box">

									<img src="images/hotel/hotel-img10.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img10.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>

									</div>

								</div>

							</li>

							<li>

								<div class="gallery-box">

									<img src="images/hotel/hotel-img11.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img11.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>

									</div>

								</div>

							</li>

							<li>

								<div class="gallery-box">

									<img src="images/hotel/hotel-img12.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img12.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>

									</div>

								</div>

							</li>

							<li>

								<div class="gallery-box">

									<img src="images/hotel/hotel-img13.jpg" alt="" />

									<div class="overlay-bg">

										<div class="inner-overlay">

											<a href="images/hotel/hotel-img13.jpg" class="zoom-gallery"> 

												<img src="images/zoom-icon.png" />

											</a>

										</div>

									</div>

								</div>

							</li>

							

						</ul>

					</div>

				</div>

				

			</div>

			

			<div class="clearfix"></div>

	

	<script type="text/javascript">

	function checkdate(check_in_date,check_out_date,type)
	{
		var set_room = 0;
		var value_return = 1;
		
		if(check_in_date == '')
		{
			alert("Please select check in date");
			$("#room1").val(set_room);
			$("#room2").val(set_room);
			$("#room3").val(set_room);
			$("#room4").val(set_room);
			$("#room5").val(set_room);
			$("#room6").val(set_room);
			$("#room7").val(set_room);
			$("#extra_person_ac").val(set_room);
			$("#extra_person_nonac").val(set_room);
			
			value_return = 0;
			if(type == 1)
			{
				value_return = false;
			}

			return value_return;
		}

		if(check_out_date == '')
		{
			alert("Please select check out date");
			$("#room1").val(set_room);
			$("#room2").val(set_room);
			$("#room3").val(set_room);
			$("#room4").val(set_room);
			$("#room5").val(set_room);
			$("#room6").val(set_room);
			$("#room7").val(set_room);
			$("#extra_person_ac").val(set_room);
			$("#extra_person_nonac").val(set_room);
			value_return = 0;
			if(type == 1)
			{
				value_return = false;
			}

			return value_return;
		}

		if(check_in_date == check_out_date)
		{
			alert("Check in and check out date cannot be same");
			$("#room1").val(set_room);
			$("#room2").val(set_room);
			$("#room3").val(set_room);
			$("#room4").val(set_room);
			$("#room5").val(set_room);
			$("#room6").val(set_room);
			$("#room7").val(set_room);
			$("#extra_person_ac").val(set_room);
			$("#extra_person_nonac").val(set_room);
			value_return = 0;
			if(type == 1)
			{
				value_return = false;
			}

			return value_return;
		}

		if(check_in_date > check_out_date)
		{
			alert("Check in date cannot be greater than check out date");
			$("#room1").val(set_room);
			$("#room2").val(set_room);
			$("#room3").val(set_room);
			$("#room4").val(set_room);
			$("#room5").val(set_room);
			$("#room6").val(set_room);
			$("#room7").val(set_room);
			$("#extra_person_ac").val(set_room);
			$("#extra_person_nonac").val(set_room);
			value_return = 0;
			if(type == 1)
			{
				value_return = false;
			}

			return value_return;
		}

		
	}

	


	$('#proceed').click(function()
	{

		var json = $("#json_val").val();
		var total = $("#total").val();
		var check_select_room = $("#check_select_room").val();

		var check_in_date = $("#check_in_date").val();
		var check_out_date = $("#check_out_date").val();

		var ret_val = checkdate(check_in_date,check_out_date,2);

		if(ret_val == 0)
		{
			return false;
		}
		else
		{
			//alert(check_select_room);
			if(check_select_room == 1 || check_select_room == '1')
			{
				$.ajax({

			   	url: 'function/rooms.php',

			   	method: 'POST',

			   	data:{'json':json,'total':total,'check_in_date':check_in_date,'check_out_date':check_out_date},

			   	success: function(res)

			   	{

			   		if(res== '1')
					{
						window.location = "paymentAccommodation.php";
					}
				}
				});
			}
			else
			{
				alert("Please select any room");
				return false;
			}
		}
		
		

		
	});

	
	function calculate(type=0)
	{
		var check_in_date = $("#check_in_date").val();
		var check_out_date = $("#check_out_date").val();

		var set_room = 0;
		var totalDays = 0;

		var check_select_room = 0; 
		
		if(type == 0)
		{
			checkdate(check_in_date,check_out_date,1);
		}

		

		if(check_in_date !='' && check_out_date != '')
		{
			var startDate = Date.parse(check_in_date);
            var endDate = Date.parse(check_out_date);
            var timeDiff = endDate - startDate;
            var totalDays = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
		}


		var selected_rooms = "";
		var room1 = parseInt($("#room1").val());
		var room1_cost = room1*600*totalDays;

		if(room1!=0)
		{
			check_select_room = 1;
			selected_rooms += "{'type':'Double Room Ordinary','qty':'"+room1+"','price':'600','total':'"+room1_cost+"'},"
		}

		var room2 = parseInt($("#room2").val());
		var room2_cost = room2*800*totalDays;
		
		if(room2!=0)
		{
			check_select_room = 1;
			selected_rooms += "{'type':'Double Room Deluxe Non AC','qty':'"+room2+"','price':'800','total':'"+room2_cost+"'},"
		}

		var room3 = parseInt($("#room3").val());
		var room3_cost = room3*1200*totalDays;
		if(room3!=0)
		{
			check_select_room = 1;
			selected_rooms += "{'type':'Double Room Deluxe AC','qty':'"+room3+"','price':'1200','total':'"+room3_cost+"'},"
		}
		
		var room4 = parseInt($("#room4").val());
		var room4_cost = room4*1100*totalDays;
		
		if(room4!=0)
		{

			check_select_room = 1;
			selected_rooms += "{'type':'Triple Room Deluxe (Non A.C.)','qty':'"+room4+"','price':'1100','total':'"+room4_cost+"'},"

		}
		
		var room5 = parseInt($("#room5").val());
		var room5_cost = room5*1500*totalDays;
		if(room5!=0)
		{

			check_select_room = 1;
			selected_rooms += "{'type':'Triple Room Deluxe (A.C.)','qty':'"+room5+"','price':'1500','total':'"+room5_cost+"'},"

		}
		
		var room6 = parseInt($("#room6").val());
		var room6_cost = room6*1600*totalDays;

		
		if(room6!=0)
		{
			check_select_room = 1;
			selected_rooms += "{'type':'Suit Room Deluxe(Non A.C.)','qty':'"+room6+"','price':'1600','total':'"+room6_cost+"'},"

		}

		var room7 = parseInt($("#room7").val());
		var room7_cost = room7*2000*totalDays;

		if(room7!=0)
		{
			check_select_room = 1;
			selected_rooms += "{'type':'Suit Room Deluxe(A.C.)','qty':'"+room7+"','price':'2000','total':'"+room7_cost+"'},"
		}

		var extra_person_nonac = parseInt($("#extra_person_nonac").val());
		var extra_person_nonac_cost = extra_person_nonac*150*totalDays;

		if(extra_person_nonac!=0)
		{
			selected_rooms += "{'type':'Extra Person (Non A.C.)','qty':'"+extra_person_nonac+"','price':'150','total':'"+extra_person_nonac_cost+"'},"
		}

		var extra_person_ac = parseInt($("#extra_person_ac").val());
		var extra_person_ac_cost = extra_person_ac*250*totalDays;

		if(extra_person_ac!=0)
		{
			selected_rooms += "{'type':'Extra Person (A.C.)','qty':'"+extra_person_ac+"','price':'250','total':'"+extra_person_ac_cost+"'},"
		}
		
		var sum = room1_cost+room2_cost+room3_cost+room4_cost+room5_cost+room6_cost+room7_cost+extra_person_nonac_cost+extra_person_ac_cost;
		var service_tax = Math.round(sum*(14.5/100));

		$("#service_id").html(service_tax);

		var swatch_tax = Math.round(sum*(.5/100));

		$("#swach_id").html(swatch_tax);

		var luxury_tax = Math.round(sum*(5/100));
		
		$("#luxury_id").html(luxury_tax);

		var total = sum+service_tax+swatch_tax+luxury_tax;

		$("#total_id").html(total);

		var sillyString = selected_rooms.slice(0, -1);
		var json = "{'room_detail':{'service_tax':'"+service_tax+"','swatch_tax':'"+swatch_tax+"','luxury_tax':'"+luxury_tax+"','total':'"+total+"','selected_room':["+sillyString+"]}}";

		$("#json_val").val(json);

		$("#total").val(total);
		$("#check_select_room").val(check_select_room);

	}



	$('.gallery-box').magnificPopup({

			delegate: 'a',

			type: 'image',

			closeOnContentClick: false,

			closeBtnInside: false,	

			mainClass: 'mfp-with-zoom mfp-img-mobile',

			gallery: {

				enabled: true

			},

			zoom: {

				enabled: true,

				duration: 300, // don't foget to change the duration also in CSS

				opener: function(element) {

					return element.find('img');

				}

			}

			

		});

</script>
<script >
	$('#check_in_date').datepicker({

				'format': 'yyyy-mm-dd',

				startDate: new Date(),

				'autoclose': true

			}).on("changeDate", function (e) 
			{
				calculate(1);
			});

	$('#check_out_date').datepicker({

				'format': 'yyyy-mm-dd',

				startDate: new Date(),

				'autoclose': true

			}).on("changeDate", function (e) 
			{
				calculate(1);
			});
</script>

        

    

  