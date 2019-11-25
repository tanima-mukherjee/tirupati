<?php
    include('../config/db.php');
    
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $query ="DELETE FROM site_settings WHERE id='$id'";
        
        if(mysqli_query($con,$query))
      {
        $msg = "Site Settings Deleted Successfully";
        header('location:siteSettingManagement.php?success=1&msg='.$msg);
      }
      else
      {
         $msg = "Site Settings Deleted Failed";
        header('location:siteSettingManagement.php?success=0');
      }
    }

?>

