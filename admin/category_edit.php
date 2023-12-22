<?php
include '../includes/config.php';
$id = $_GET['cat_id'];
$catname = $_POST['edit_cat'];

$sql = "UPDATE category SET category = '$catname' WHERE id = $id;";
if(mysqli_query($conn,$sql)){
    echo 'success';
}    
else{
    echo '<div class="alert alert-danger w-100" role="alert">Something went wrong! Please check your internet connection.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}


?>