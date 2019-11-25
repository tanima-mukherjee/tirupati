<?php
    include('../config/db.php');
    
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $query ="DELETE FROM room_booking WHERE id='$id'";
        
        if(mysqli_query($con,$query))
      {
        $msg = "room booking Deleted";
        header('location:accommodationManagement.php?success=1&msg='.$msg);
      }
      else
      {
         $msg = "room booking Cannot be Deleted";
        header('location:accommodationManagement.php?success=0');
      }
    }

?>
