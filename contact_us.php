<?php
include("db.php");
$input= file_get_contents('php://input');
$data= json_decode($input,true);
$name=$data['name'];
   $email=$data['email'];
   $phone=$data['number'];
   $message=$data['msg'];
   $q="INSERT INTO contact_us(name,email,phone_no,message) VALUES('$name','$email',$phone,'$message') ";
   $ans=mysqli_query($conn,$q);
   if($ans){
       echo 1;
   }
   else{
       echo 0;
   }


?>