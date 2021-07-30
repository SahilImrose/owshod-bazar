<?php
require 'db.php';
$user_id=$_GET['user_id'];
 $query=mysqli_query($conn,"SELECT * FROM tbl_labtest_order WHERE user_id='$user_id' ORDER BY (p_time) DESC ");
 $response =array();
  if (mysqli_num_rows($query)>0) {
		while($row =mysqli_fetch_array($query))
		{
		array_push($response,array("id"=>$row[0],"status"=>$row[1],"price"=>$row[2],"user_id"=>$row[3],"p_time"=>$row[4]));
	}
	echo json_encode(array("status"=>"true","data"=>$response));
    }
else{
	echo json_encode(array("status"=>"false","data"=>$response));
     } 
mysqli_close($conn);
?>