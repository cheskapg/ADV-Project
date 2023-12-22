<?php
include '../includes/config.php';
$id = $_GET['product_id'];

$sql = "DELETE FROM products WHERE id= $id;";
if(mysqli_query($conn,$sql)){
    echo 'success';
}
else{
    echo 'Something went wrong! Check your connection!';
}