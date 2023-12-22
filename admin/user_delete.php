<?php
include '../includes/config.php';
$user_id = $_GET['user_id'];

$sql = "DELETE FROM users WHERE id=$user_id";
if(mysqli_query($conn,$sql)){
    echo 'success';
}
else{
    echo 'Something went wrong! Check your connection!';
}

?>