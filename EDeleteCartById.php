<?php
require 'db.php';
$user_id = $_GET['user_id'];
$query="DELETE FROM tbl_cart WHERE user_id=$user_id";
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
