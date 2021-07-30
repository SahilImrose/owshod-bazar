<?php
	require 'db.php';

/*SELECT tbl_cart.cart_id, tbl_cart.p_id,tbl_cart.user_id, tbl_products.p_quantity,tbl_products.p_image,tbl_products.p_price,tbl_products.p_title
FROM tbl_cart,tbl_products 
WHERE tbl_cart.user_id = 1;*/

	
	$query = mysqli_query($conn, "SELECT * FROM tbl_cart");
	$response = array();
	if (mysqli_num_rows($query)>0) {
		while($row =mysqli_fetch_array($query))
		{
			array_push($response, array("cart_id"=>$row[0],"p_id"=>$row[1],"user_id"=>$row[2],"p_quantity"=>$row[3],"p_status"=>$row[4]));
		}
		echo json_encode(array("status"=>"true","data"=>$response));
	}	
	else{
		echo json_encode(array("status"=>"false"));
	}
	mysqli_close($conn);
?>
