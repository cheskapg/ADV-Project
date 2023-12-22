<?php
include '../includes/config.php';

if(isset($_POST['id'])){
$id = $_POST['id'];

$sql = "SELECT * FROM category WHERE id =$id;";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
}
echo json_encode($row);