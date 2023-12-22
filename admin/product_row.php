<?php 
include '../includes/config.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    
    $sql = "SELECT * FROM products,category WHERE products.id = $id;";
    $result= mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
}
echo json_encode($row);
?>