<?php
   require('db.php');
   session_start();
   $user_check = $_SESSION['username'];
   $ses_sql = mysqli_query($conn,"SELECT email FROM tbl_admin WHERE email = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['email'];
   
   if(!isset($_SESSION['username'])){
      header("location:index.php");
      die();
   }
?>