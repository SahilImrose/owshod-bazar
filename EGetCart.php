<?php
require 'db.php';
$user_id=$_GET['user_id'];
$query = mysqli_query($conn, "SELECT tbl_cart.cart_id, tbl_products.p_title, tbl_products.p_price, tbl_products.p_image, tbl_products.p_sale, tbl_cart.p_quantity,tbl_cart.total_price FROM tbl_products, tbl_cart WHERE tbl_cart.p_id = tbl_products.p_id AND tbl_cart.user_id =$user_id");
$response=array();
if(mysqli_num_rows($query)>0){
	while($row =mysqli_fetch_array($query)){
		array_push($response,array("cart_id"=>$row[0],"p_title"=>$row[1],"p_price"=>$row[2],"p_image"=>$row[3],"p_sale"=>$row[4],"p_quantity"=>$row[5],"total_price"=>$row[6]));
	}
	echo json_encode(array("status"=>"true","data"=>$response));

}
else{
	echo json_encode(array("status"=>"false"));
}
?>