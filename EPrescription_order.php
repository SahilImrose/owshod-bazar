<?php
 require 'db.php';
$json =json_decode(file_get_contents("php://input"), true);
$status =$json['status'];
$user_id =$json['user_id'];
$price =$json['price'];
$p_time =$json['p_time'];
$image =$json['image'];
$imagepath = "images/prescription/$p_time.jpg";
$img = "$p_time.jpg";

$query ="INSERT INTO tbl_prescription_order(image,status,user_id,price,p_time)
          VALUES ('$img','$status',$user_id,$price,'$p_time')";
          if(mysqli_query($conn,$query))
          {
          	file_put_contents($imagepath, base64_decode($image));
          	echo json_encode(array("data"=>"true"));
          }
          else
	     {
		    echo json_encode(array("data"=>"false"));
	     }
	     mysqli_close($conn);
?>