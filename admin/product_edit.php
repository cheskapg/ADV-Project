<?php
include '../includes/config.php';

$id = $_GET['product_id'];
$prdctname = $_POST['edit_prdctname'];
$prdctcat= $_POST['edit_prdct_cat'];
$prdctdes = $_POST['edit_prdctdes'];
$prdctprice = $_POST['edit_price'];
$prdctstock = $_POST['edit_stock'];

if(!empty($prdctname)&&!empty($prdctcat)&&!empty($prdctdes)&&!empty($prdctprice)&&!empty($prdctstock)){
    $sql = "UPDATE products SET category_id = $prdctcat, name = '$prdctname', description ='$prdctdes',price = $prdctprice, stock = $prdctstock WHERE id =$id";

    if(mysqli_query($conn,$sql)){
        $notif = 'success';
    }
    else{
        $notif = '<div class="alert alert-danger w-100" role="alert">Something went wrong! Please check your internet connection.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
}

echo $notif;
