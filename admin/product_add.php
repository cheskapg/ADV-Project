<?php
include '../includes/config.php';

$prdctimage = $_FILES['prdctimg'];
$prdctname = $_POST['add_prdctname'];
$prdctcat= $_POST['add_prdct_cat'];
$prdctdes = $_POST['add_prdctdes'];
$prdctprice = $_POST['add_price'];
$prdctstock = $_POST['add_stock'];


if(!empty($prdctimage)){
    // Image Variables
  $filename = $_FILES['prdctimg']['name'];
  $fileExt = explode('.',$filename);
  $fileActualExt = strtolower(end($fileExt));
  $now = date('Y-m-d');  
  $newFilename ='product-'.uniqid().'_'.$now.'.'.$fileActualExt;
  
  $allowed = array('jpg','jpeg','png');

  if(in_array($fileActualExt,$allowed)){
    if(!empty($newFilename)){
      move_uploaded_file($_FILES['prdctimg']['tmp_name'], '../dist/img/productimg/'.$newFilename);	
    }
    else{
      $notif = '<div class="alert alert-danger w-100" role="alert">Error moving image file!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
    $sql = "INSERT INTO products (category_id,name,description,price,stock,photo) VALUES ($prdctcat,'$prdctname','$prdctdes',$prdctprice,$prdctstock,'$newFilename');";  
    if(mysqli_query($conn,$sql)){
        $notif = 'success';
    }
    else{
        $notif = '<div class="alert alert-danger w-100" role="alert">Something went wrong! Please check your internet connection.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
   
  
}

}
else{
    $notif = '<div class="alert alert-danger w-100" role="alert">Something went wrong! Please check your internet connection.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}

echo $notif;
// echo $prdctcat.$NEWprdctname.$prdctprice.$prdctdes.$prdctstock;

?>