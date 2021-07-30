<?php
	require 'db.php';
	$cid = $_GET['cid'];
	$query = mysqli_query($conn, "SELECT * FROM tbl_products WHERE 	category_id='$cid'");
	$response = array();
	if (mysqli_num_rows($query)>0) {
		while($row =mysqli_fetch_array($query))
		{
			array_push($response, array("p_id"=>$row[0],"p_title"=>$row[1],"p_decription"=>$row[2],"category_id"=>$row[3],"p_price"=>$row[4],"p_image"=>$row[5],"p_sale"=>$row[6],"	p_quantity"=>$row[7]));
		}
		echo json_encode(array("status"=>"true","data"=>$response));
	}	
	else{
		echo json_encode(array("status"=>"false","data"=>$response));
	}
	mysqli_close($conn);
?>