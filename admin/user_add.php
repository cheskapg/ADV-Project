<?php

include '../includes/config.php';

$add_fname = $_POST['add_fname'];
$add_lname = $_POST['add_lname'];
$add_gender = $_POST['add_gender'];
$add_address = $_POST['add_address'];
$add_age  = $_POST['add_age'];  
$add_birth = $_POST['add_birth'];
$add_contno= $_POST['add_contno'];
$add_email  = $_POST['add_email'];
$add_username = $_POST['add_username']; 
$add_psw = $_POST['add_psw'];
$add_repeatpsw  = $_POST['add_repeatpsw'];

$sql = "SELECT * FROM users WHERE username = '$add_username';";
$result = mysqli_query($conn,$sql);
if($result -> num_rows > 0){
    echo '<div class="alert alert-danger w-100" role="alert">'.$add_username.' is already exist!</div>';
}
else{
    if($add_psw == $add_repeatpsw){
        $sql = "INSERT INTO users(fname,lname,gender,address,age,birth,contno,email,username,password,usertype,photo)
      VALUES ('$add_fname','$add_lname','$add_gender','$add_address',$add_age,'$add_birth',$add_contno,'$add_email','$add_username','$add_psw',0,'userplaceholder.png');";
      if(mysqli_query($conn,$sql)){
          echo 'success';
      }
      else{
        echo '<div class="alert alert-danger w-100" role="alert">Something went wrong! '. mysqli_error($conn).'</div>';
      }
    }
    else{
        echo '<div class="alert alert-danger w-100" role="alert"> Password does not match!</div>';
    }
}

?>
