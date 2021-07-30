<?php
	require 'db.php';
	$labtest_id=$_GET['labtest_id'];
	$query = mysqli_query($conn, "SELECT * FROM tbl_labtest where id='$labtest_id';");
	$response = array();
	if (mysqli_num_rows($query)>0) {
		while($row =mysqli_fetch_array($query))
		{
			array_push($response, array("id"=>$row[0],"image"=>$row[1],"price"=>$row[2],"title"=>$row[3]));
		}
	echo json_encode(array("status"=>"true","data"=>$response));
	}	
	else{
		echo json_encode(array("status"=>"false"));
	}
	mysqli_close($conn);
?>