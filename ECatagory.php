<?php
	require 'db.php';
	$query = mysqli_query($conn, "SELECT * FROM tbl_catagories;");
	$response = array();
	if (mysqli_num_rows($query)>0) {
		while($row =mysqli_fetch_array($query))
		{
			array_push($response, array("category_id"=>$row[0],"cat_description"=>$row[1],"cat_title"=>$row[2],"cat_image"=>$row[3]));
		}
	echo json_encode(array("status"=>"true","data"=>$response));
	}	
	else{
		echo json_encode(array("status"=>"false"));
	}
	mysqli_close($conn);
?>