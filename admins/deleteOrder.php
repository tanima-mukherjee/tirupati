<?php
    include('../config/db.php');
    
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $query ="DELETE FROM booking WHERE id='$id'";
        
        if(mysqli_query($con,$query))
      {
        $msg = "Order Deleted";
        header('location:orderManagement.php?success=1&msg='.$msg);
      }
      else
      {
         $msg = "Order Cannot be Deleted";
        header('location:orderManagement.php?success=0');
      }
    }

?>

