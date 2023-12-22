<?php
include '../includes/config.php';

$prod_id=$_GET['product_id'];

if(!empty($_FILES['edit_prdctimg']))
{
    $filename = $_FILES['edit_prdctimg']['name'];
  $fileExt = explode('.',$filename);
  $fileActualExt = strtolower(end($fileExt));
  $now = date('Y-m-d');  
  $newFilename ='product-'.uniqid().'_'.$now.'.'.$fileActualExt;
  
  $allowed = array('jpg','jpeg','png');

  if(in_array($fileActualExt,$allowed)){
    if(!empty($newFilename)){
      move_uploaded_file($_FILES['edit_prdctimg']['tmp_name'], '../dist/img/productimg/'.$newFilename);	
    }
    else{
      $notif = '<div class="alert alert-danger w-100" role="alert">Error moving image file.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
    $sql = "UPDATE products SET photo = '$newFilename' WHERE id=$prod_id;";  
    if(mysqli_query($conn,$sql)){
        $notif = 'success';
    }
    else{
        $notif = '<div class="alert alert-danger w-100" role="alert">Something went wrong! Please check your internet connection.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
   
  
}


}
echo $notif;