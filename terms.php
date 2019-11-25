<?php require('element/header.php'); ?>
	
	<section class="inner-banner">		
		<div class="inner-content">
			<div class="container">
				<h2> Terms & Condition</h2>
				<ul class="breadcrumb-list">
					<li><a href="#">Home</a></li>
					<li>Terms</li>
				</ul>
			</div>
		</div>			
	</section>

	
	<?php

            $query = 'SELECT * FROM static_page where `type` = "terms" ';
            $exeQuery = mysqli_query($con,$query);
            $resS=mysqli_fetch_assoc($exeQuery);
			echo $resS['descriptions'];
    ?>
        
   	
   	
    <?php require('element/footer.php'); ?>
	

	

 <!-- JS Plugins --> 
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.offcanvas.js"></script>

 <script src="js/bootstrap-datepicker.js"></script>   
	<!-- timepicker js  -->
    <script src="js/jquery.timepicker.js"></script>   
	<script>
		$(function() {
			$('#basicExample').timepicker();
		});
	</script>
	<script>
		$('.date').datepicker({
				'format': 'm/d/yyyy',
				'autoclose': true
			});
	</script>


<script src="js/main.js" type="text/javascript"></script>

	


</body>
</html>