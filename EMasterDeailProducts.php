<?php
	require 'db.php';
	$p_id = $_GET['p_id'];
	$query = mysqli_query($conn, "SELECT * FROM tbl_products WHERE 
		p_id ='$p_id';");
	$imagesQuery = mysqli_query($conn, "SELECT * FROM tbl_pimages WHERE p_id = '$p_id'");
	$imagesResponce = array();
	
	$response = array();
	if (mysqli_num_rows($query)>0 || mysqli_num_rows($imagesQuery) >0  ) {
		while($row =mysqli_fetch_array($query))
		{
			array_push($response, array("p_id"=>$row[0],"p_title"=>$row[1],"p_description"=>$row[2],"subcategory_id"=>$row[3],"p_price"=>$row[4],"p_image"=>$row[5],"p_sale"=>$row[6],"p_quantity"=>$row[7]));
		}
		while($img_row =mysqli_fetch_array($imagesQuery))
		{
			array_push($imagesResponce, array("image_id"=>$img_row[0],"image1"=>$img_row[1],"image2"=>$img_row[2],"image3"=>$img_row[3],"image4"=>$img_row[4],"p_id"=>$img_row[5]));
		}
		
		echo json_encode(array("status"=>"true","data"=>$response,"images"=>$imagesResponce));
	}	
	else{
		echo json_encode(array("status"=>"false"));
	}

	
	
	mysqli_close($conn);
?>