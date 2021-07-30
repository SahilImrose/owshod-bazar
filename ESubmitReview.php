<?php
require 'db.php';
$review =$json['review'];
$rating =$json['rating'];
$u_name =$json['u_name'];
$p_id =$json['p_id'];
$query="INSERT INTO tbl_review (review,rating,u_name,p_id) VALUES ('$review','$rating','$u_name','p_id')";
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