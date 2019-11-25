
<?php require('element/header.php'); ?>

		<section class="inner-banner">		
		<div class="inner-content">
			<div class="container">
				<h2>About Us</h2>
				<ul class="breadcrumb-list">
					<li><a href="index.php">Home</a></li>
					<li>About</li>
				</ul>
			</div>
		</div>			
	</section>

	
	<?php

            $query = 'SELECT * FROM static_page where `type` = "aboutus" ';
            $exeQuery = mysqli_query($con,$query);
            $resS=mysqli_fetch_assoc($exeQuery);
			echo $resS['descriptions'];
    ?>
    
    <?php require('element/footer.php'); ?>