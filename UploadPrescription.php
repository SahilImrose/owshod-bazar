<?php
require 'db.php';
$json = json_decode(file_get_contents("php://input"),true);
$user_id = $json['user_id'];
$order_id = $json['order_id'];
$imageName = $json['imageName'];
$image    = $json['image'];
$img      ="$imageName.jpg";
$imagePath="images/prescription/$imageName.jpg"; 

$sql="INSERT INTO tbl_description(user_id,image,order_id) VALUES('$user_id','$img','$order_id')";

if(mysqli_query($conn,$sql))
{
	file_put_contents($imagePath, base64_decode($image));
	echo json_encode(array("data"=>"true"));
}
else
{
	echo json_encode(array("data"=>"false"));
}

mysqli_close($conn);
?>