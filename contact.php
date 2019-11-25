<?php require('element/header.php'); ?>
	
	<section class="inner-banner">		
		<div class="inner-content">
			<div class="container">
				<h2>Contact Us</h2>
				<ul class="breadcrumb-list">
					<li><a href="index.php">Home</a></li>
					<li>Contact</li>
				</ul>
			</div>
		</div>			
	</section>

	
	
	<?php

            $query = 'SELECT * FROM static_page where `type` = "contact" ';
            $exeQuery = mysqli_query($con,$query);
            $resS=mysqli_fetch_assoc($exeQuery);
			echo $resS['descriptions'];
    ?>
        
   	
   	
	

 <?php require('element/footer.php'); ?>