<?php
    include('../config/db.php');
    
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $query ="DELETE FROM date_time WHERE id='$id'";
        
        if(mysqli_query($con,$query))
      {
        $msg = "Date Time Deleted Successfully";
        header('location:dateTimeManagement.php?success=1&msg='.$msg);
      }
      else
      {
         $msg = "Date Time Deleted Failed";
        header('location:dateTimeManagement.php?success=0');
      }
    }

?>

