<?php 
require("config/db.php");
if(!isset($_REQUEST['order_id']))
{
	header("Location: 404.php");
	exit();
}


$order_id = base64_decode($_REQUEST['order_id']);
$order_id = "15299786";

$sql = "select * from booking where order_id = '".$order_id."'";

$res = mysqli_query($con,$sql);

$rowcount=mysqli_num_rows($res);
if($rowcount > 0) {
	$arr = mysqli_fetch_assoc($res);
	$devotee_num = $arr['num_of_devotees'];
	$form_status = $arr['form_status'];


			if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'post')
			{
			
					$num = $_REQUEST['num'];
					$order_id = $_REQUEST['id'];
					
					for($i=1;$i<=$num;$i++ )
					{
						$name = $_REQUEST['name_'.$i];
						$age = $_REQUEST['age_'.$i];
						$gender = $_REQUEST['gender_'.$i];
						$id_type = $_REQUEST['type_'.$i];
						$id_num = $_REQUEST['id_num_'.$i];
						$add_date = date('Y-m-d');
						
						
						
						$sql_save = "insert into devoee_detail (order_id,name,age,gender,id_num,id_type,created) values ('$order_id','$name','$age','$gender','$id_num','$id_type','$add_date')";						
						mysqli_query($con,$sql_save);
					
					}
					
					$sql_update = "update booking set form_status='1' where order_id=".$arr['id'];
					mysqli_query($con,$sql_update);
										
					header("Location:thanks.php");
					exit;

			}

}
else {
	header("Location: 404.php");
	exit();
}
require_once('element/header.php'); 
?>

<style>
label{font-weight:normal;}
.required{color:#000;}
</style>
		<section class="inner-banner">		
		<div class="inner-content">
			<div class="container">
				<h2>Customer Booking Details</h2>
				<ul class="breadcrumb-list">
					<li><a href="index.php">Home</a></li>
					<li>Booking Details</li>
				</ul>
			</div>
		</div>			
	</section>

	
	
	<section class="main-body">
		<div class="container">			
			<div class="customer-wrap">
				<h2>Customer Booking Details</h2>
				
				<?php if($form_status!=1){?>
				
				
				<div class="table-responsive">
				
				<form method="post" action="" name="frmCustomer" id="frmCustomer">
                <input type="hidden" name="action" value="post">
				<input type="hidden" name="id" value="<?php echo $arr['id']?>" />
				<input type="hidden" name="num" value="<?php echo $devotee_num?>"  />
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Name</th>
								<th>Age</th>
								<th>Gender</th>
								<th>verification Types</th>
								<th>verification Number</th>
							 </tr>
						</thead>
						<tbody>	
						
						<?php for($i=1;$i<=$devotee_num;$i++){?>
												 
							  <tr>
								<td>
									<input type="text" class="form-control required" name="name_<?php echo $i?>">
								</td>
								<td width="150">
									<input type="text" class="form-control required" name="age_<?php echo $i?>">
								</td>
								<td>
									<select class="form-control required" name="gender_<?php echo $i?>">                                    
										<option value="" selected>Select One</option>
										<option value="1">Male</option>
										<option value="2">Female</option>
									</select>
								</td>
								<td>
									<select class="form-control required" name="type_<?php echo $i?>">                                    
										<option value="" selected>Select One</option>
										<option value="Adhar Card">Adhar Card</option>
										<option value="Voter Card">Voter Card</option>
									</select>
								</td>
								<td>
									<input type="text" name="id_num_<?php echo $i?>" class="form-control required">
								</td>
							  </tr>	
							 	
						<?php } 
						?>	
						
						<tr>
								<td colspan="6"><input type="submit" value="Submit" /></td>
						</tr>  	
						</tbody>
					</table>
					</form>
				</div>	
			
			<?php } else{?>
			
					<div class="alert alert-danger alert-dismissible" role="alert">

                
                <strong>You have already submitted your details.</strong> 
			
			<?php } ?>
			
			</div>
		
		
	</div>
	
	
	</section>
    
    <?php require('element/footer.php'); ?>
	
    <script type="text/javascript">
        
  $("#frmCustomer").validate();

</script> 