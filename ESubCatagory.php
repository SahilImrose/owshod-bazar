<?php
	require 'db.php';
	//$cid = $_GET['cid'];
	$query = mysqli_query($conn, "SELECT * FROM tbl_subcatagory ");//WHERE subcat_id = '$cid'
	$response = array();
	if (mysqli_num_rows($query)>0) {
		while($row =mysqli_fetch_array($query))
		{
			array_push($response, array("subcat_id"=>$row[0],"image"=>$row[1],"subcat_title"=>$row[2],"subcat_desc"=>$row[3],"category_id"=>$row[4],"p_id"=>$row[5]));
		}
        echo json_encode(array("status"=>"true","data"=>$response));
	}	
	else{
         echo json_encode(array("status"=>"true"));
	    }
	mysqli_close($conn);
?>


