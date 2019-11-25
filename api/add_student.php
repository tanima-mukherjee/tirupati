<?php 

$con = mysqli_connect('localhost','tirupuns_main','main@123','tirupuns_main') or die('connection error');

$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];

echo $sql = "insert into students (name,email,phone) values ('$name','$email','$phone')";

mysqli_query($con,$sql);
exit;

?>