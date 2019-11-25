<?php 

$con = mysqli_connect('localhost','tirupuns_main','main@123','tirupuns_main') or die('connection error');


$sql = "select * from students ";

$res=mysqli_query($con,$sql);

$return_arr= array();

while ($row = mysqli_fetch_assoc($res)) 
{
    $row_array['id'] = $row['id'];
    $row_array['name'] = $row['name'];
    $row_array['phone'] = $row['phone'];
	$row_array['email'] = $row['email'];

    array_push($return_arr,$row_array);
}

	$data['data']= $return_arr;
header('Content-Type: application/json');
echo json_encode($data);
exit;

?>