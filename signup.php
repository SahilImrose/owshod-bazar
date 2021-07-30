<?php
 require 'db.php';
$json =json_decode(file_get_contents("php://input"), true);
$name =$json['name'];
$email =$json['email'];
$password =$json['password'];
$address =$json['address'];
$phone_no =$json['phone_no'];
$image =$json['image'];
$imagename = $json['email'];
$imagepath = "images/user/$imagename.jpg";
$img = "$imagename.jpg";

$query ="INSERT INTO tbl_user(name,email,password,address,phone_no,image)
          VALUES ('$name','$email','$password','$address','$phone_no','$img')";
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