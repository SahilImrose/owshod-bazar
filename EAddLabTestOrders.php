<?php
 require 'db.php';
$json =json_decode(file_get_contents("php://input"), true);
$user_id =$json['user_id'];
$price =$json['price'];
$status =$json['status'];
$p_time =$json['p_time'];
$query="INSERT INTO tbl_labtest_order (status,price,user_id,p_time) VALUES ('$status','$price','$user_id','$p_time')";
 if(mysqli_query($conn,$query))
          {
          	echo json_encode(array("data"=>"true"));
          }
          else
	     {
		    echo json_encode(array("data"=>"false"));
	     }
	     mysqli_close($conn);

 ?>