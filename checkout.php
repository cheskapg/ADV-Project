<?php
include './includes/config.php';

$user_id  = $_GET['user_id'];
$amount_paid = $_GET['amount_paid'];
$lower= substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 10);
$upper = strtoupper(str_shuffle($lower));
$rand = substr(uniqid('', true), -20);

$receipt_id = $upper."_".$lower."-".$rand;



$sql = "SELECT * FROM cart WHERE user_id = $user_id;";
$res = mysqli_query($conn,$sql);
if($res -> num_rows > 0 ){

    $sql = "INSERT INTO sales (user_id,receipt_id,amount_paid) VALUES ($user_id,'$receipt_id',$amount_paid);";
    if(mysqli_query($conn,$sql)){
        // $sql = "SELECT * FROM sales WHERE user_id = $user_id;";
        // $res = mysqli_query($conn,$sql);
        // if($res -> num_rows > 0 ){
        //     $result = mysqli_fetch_all($res);
        //     echo $result[0];
        // }

       $insertedID = mysqli_insert_id($conn); // current inserted id 
       $sql = "SELECT * FROM cart WHERE user_id = $user_id;";
       $res = mysqli_query($conn,$sql);
       if($res -> num_rows > 0 ){
        $result = mysqli_fetch_all($res);
        foreach($result as $row){
                // $ids[] = $row[2];  
                
                // insert ang sulod sa cart to transacthistory 
            $sql = "INSERT INTO transacthistory (sales_id,product_id,quantity) VALUES ($insertedID,$row[2],$row[3]);";
            if(mysqli_query($conn,$sql)){
                // iupdate ang stock sa products kung gi pila kabouk ang gipalit sa kadto na product
               $sql = "UPDATE products SET stock = stock - $row[3] WHERE id = $row[2];";
               if(mysqli_query($conn,$sql)){
                //    Tapos balik tag fetch sa cart dayun idelete ang items sa cart
                $sql = "SELECT * FROM cart WHERE user_id = $user_id;";
                $res = mysqli_query($conn,$sql);
                if($res -> num_rows > 0 ){
                    $result = mysqli_fetch_all($res);
                    foreach($result as $row){
                        $sql = "DELETE FROM cart WHERE user_id = $user_id;";
                        if(mysqli_query($conn,$sql)){
                            $msg = 'success';
                        }
                        else{
                            $msg = 'Oh nooooooooooooooooooooooooooo!';
                        }
                    }
                }
                else{
                    // $msg = 'Oh noooooooo!'; //
                }
               }
               else{
                $msg = 'Oh noooooo!';
            }
                

            }
            else{
                $msg = 'Oh nooo!';
            }
        }
       }
       else{
        $msg = 'You dont have items in your cart, try agin!';
    }

    }
    

}
else{
    $msg = 'You dont have items in your cart, try agin!';
}

echo $msg;