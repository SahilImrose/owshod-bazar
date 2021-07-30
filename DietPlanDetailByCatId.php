<?php 
 require 'db.php';
 $dietCat_id=$_GET['dietCat_id'];
 $query=mysqli_query($conn,"SELECT * FROM tbl_dietplan_detail WHERE diet_cat_id ='$dietCat_id'");
 $response =array();
  if (mysqli_num_rows($query)>0) {
		while($row =mysqli_fetch_array($query))
		{
		array_push($response,array("id"=>$row[0],"breakfast_time"=>$row[1],
			"after_breakfast_time"=>$row[2],"lunch_time"=>$row[3],"dinner_time"=>$row[4],
			"afterdinner_time"=>$row[5],"diet_cat_id"=>$row[6]));
	}
	echo json_encode(array("status"=>"true","data"=>$response));
    }
else{
	echo json_encode(array("status"=>"false"));
     } 
mysqli_close($conn);
?>