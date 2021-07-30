<?php
	require 'db.php';
	$json = json_decode(file_get_contents("php://input"),true);
	$email = $json['email'];
	$password = $json['password'];
	$result = mysqli_query($conn,"SELECT * FROM tbl_user WHERE email='$email' AND password='$password';");
	if(mysqli_num_rows($result)>0)
	{
	    $row=mysqli_fetch_assoc($result);
	    echo json_encode(array("status"=>"true","data"=>$row));
	}
	else
	{
	    echo json_encode(array("status"=>"false"));
	}
	mysqli_close($conn); 
?>