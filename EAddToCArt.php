<?php
require 'db.php';
$json = json_decode(file_get_contents("php://input"),true);

$p_id = $json['p_id'];
$user_id=$json['user_id'];
$p_quantity=$json['p_quantity'];
$total_price=$json['total_price'];

	$sql="INSERT INTO tbl_cart (p_id,user_id,p_quantity,total_price) VALUES($p_id,$user_id,$p_quantity,$total_price)";

	if(mysqli_query($conn,$sql))
	{

		echo json_encode(array("data"=>"insert"));
	}
	else
	{
		echo json_encode(array("data"=>"not inserted"));
	}


mysqli_close($conn);
?>