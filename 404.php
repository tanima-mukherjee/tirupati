<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Page Not Found</title>
    <link rel="stylesheet" href="css/404.css">
</head>
<body>
<div class="scene">
    <div class="f1">404- Not Found</div>
  <div class="f2"><?php echo $_SERVER['REQUEST_URI']; ?> does not exist, sorry.</div>
  <br><br>
  <div class="f3">Return to <a href="index.php">Home Page</a>.</div>
</div>
</body>
</html>
