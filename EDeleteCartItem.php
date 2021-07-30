<?php
require 'db.php';
$cart_id=$_GET['cart_id'];
$sql="DELETE FROM tbl_cart WHERE cart_id=$cart_id";
if(mysqli_query($conn,$sql))
	{

		echo json_encode(array("data"=>"true"));
	}
	else
	{
		echo json_encode(array("data"=>"false"));
	}
?>