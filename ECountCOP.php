<?php
require 'db.php';
$user_id=$_GET['user_id'];

$prescriptionQuery = mysqli_query($conn, "SELECT COUNT(id) AS pre_id FROM tbl_prescription_order WHERE user_id=$user_id;");
$presResponse=array();

$labtestQuery = mysqli_query($conn, "SELECT COUNT(id) AS l_id FROM tbl_labtest_order WHERE user_id=$user_id;");
$labtestResponse=array();

$productQuery = mysqli_query($conn, "SELECT COUNT(id) AS p_id FROM tbl_product_order WHERE user_id=$user_id;");
$productResponse=array();

if(mysqli_num_rows($prescriptionQuery)>0 || mysqli_num_rows($labtestQuery)>0 || mysqli_num_rows($productQuery)>0)
{
	while($presrow =mysqli_fetch_array($prescriptionQuery)){

		array_push($presResponse, array("pre_id"=>$presrow[0]));
	}
	while($labrow =mysqli_fetch_array($labtestQuery)){

		array_push($labtestResponse, array("l_id"=>$labrow[0]));
	}
	while($productrow =mysqli_fetch_array($productQuery)){

		array_push($productResponse, array("p_id"=>$productrow[0]));
	}
	echo json_encode(array("status"=>"true","pre"=>$presResponse,"pro"=>$productResponse,"lab"=>$labtestResponse));
}
else{
	echo json_encode(array("status"=>"false"));
}
?>