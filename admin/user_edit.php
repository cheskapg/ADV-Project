<?php
include '../includes/config.php';

$user_id = $_GET['user_id'];

$edit_fname  = $_POST['edit_fname'];
$edit_lname  = $_POST['edit_lname'];
$edit_gender  = $_POST['edit_gender'];
$edit_address  = $_POST['edit_address'];
$edit_age     = $_POST['edit_age']; 
$edit_birth  = $_POST['edit_birth'];
$edit_contno = $_POST['edit_contno'];
$edit_email = $_POST['edit_email'];

$sql = "UPDATE users SET fname ='$edit_fname',lname='$edit_lname',gender='$edit_gender',address='$edit_address',age='$edit_age',birth='$edit_birth',contno='$edit_contno',email='$edit_email' WHERE id=$user_id;";

if(mysqli_query($conn,$sql)){
  echo 'success';
}
else{
  echo 'Something went wrong in the connection!';
}



?>
