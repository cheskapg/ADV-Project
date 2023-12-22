<?php
include './includes/config.php';
$user_id = $_GET['user_id'];
$product_id = $_GET['product_id'];
$qty = $_GET['qty'];

if(!empty($user_id) && !empty($product_id) && !empty($qty) ){
    $sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id;";
    $res = mysqli_query($conn,$sql);
    if($res->num_rows > 0){
        echo 'The item is already in your cart! please select another product.';
    }
    else{

    $sql = "INSERT INTO cart (user_id,product_id,quantity) VALUES ($user_id,$product_id,$qty);";
    if(mysqli_query($conn,$sql)){
        echo 'success';
    }
    else{
        echo 'Something went wrong! Failed to add to cart.';
    }
    }


    // echo $user_id." ".$product_id." ".$qty; //TEST
}
else{
    echo 'Something went wrong!';

}
