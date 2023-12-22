<?php
include '../includes/config.php';
$user_id = $_GET['user_id'];
$cart_id = $_GET['cart_id'];

$sql = "DELETE FROM cart WHERE id=$cart_id AND user_id=$user_id";
if(mysqli_query($conn,$sql)){
    echo 'success';
}
else{
    echo 'Something went wrong! Check your connection!';
}


?>