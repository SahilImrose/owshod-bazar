<?php
require 'db.php';
$user_id=$_GET['user_id'];
 $query=mysqli_query($conn,"SELECT * FROM tbl_prescription_order WHERE user_id='$user_id' ORDER BY (p_time) DESC ");
 $response =array();
  if (mysqli_num_rows($query)>0) {
		while($row =mysqli_fetch_array($query))
		{
		array_push($response,array("id"=>$row[0],"image"=>$row[1],"status"=>$row[2],"user_id"=>$row[3],"price"=>$row[4],"p_time"=>$row[5]));
	}
	echo json_encode(array("status"=>"true","data"=>$response));
    }
else{
	echo json_encode(array("status"=>"false"));
     } 
mysqli_close($conn);
?>