<?php 
  require('../config/db.php');
  session_start();

  if(isset($_SESSION['loginDate']))
  {
    header("location:dashboard.php");
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

  <title>Tirupati Admins</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">

  <script src="js/jquery.min.js"></script>
  <script src="../js/jquery.validate.js" type="text/javascript"></script>
</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form method="post" action="">
            <h1>Login Form</h1>
            <p style="color: red;">
            <?php
  
              if(isset($_POST['username']))
              {
                  $username = $_POST['username'];
                  $password = $_POST['password'];

                  $query = "SELECT * FROM admins WHERE email = '".$username."' AND password = '".$password."'";
                  
                  $exeQ = mysqli_query($con,$query);
                 
                  $count = mysqli_num_rows($exeQ);
                  
                  if($count == 1)
                  {
                      if($_SESSION['loginDate'] = mysqli_fetch_assoc($exeQ))
                      {
                        header("location:dashboard.php");
                      }
                      
                  }
                  else 
                  {
                     echo "Login incorrect !";
                  }

              }

             ?>
           </p>

            <div>
              <input type="text" class="form-control" placeholder="Username" name="username" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" name="password" />
            </div>
            <div>
              <button type="submit" class="btn btn-default submit">Log in</button>
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Tirupati!</h1>

                <p>©2018 All Rights Reserved.</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>

    </div>
  </div>

</body>

</html>


