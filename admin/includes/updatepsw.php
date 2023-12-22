<!-- This script is only for the Update/Change Password Modal from folder of Modal/changepsw.php -->
<?php
include '../../includes/config.php';
session_start();

error_reporting(0);

$id = $_SESSION['admin']['id'];
$currentpsw = $_POST['currentpsw'];
	$newpsw = $_POST['newpsw'];
	$repeatpsw = $_POST['repeatpsw'];
    
    if($newpsw === $repeatpsw){
        $sql = "SELECT password FROM users WHERE id = $id;";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $pass = mysqli_fetch_assoc($result);
            if($pass['password'] == $currentpsw){
                $sql = "UPDATE users SET password = '$newpsw' WHERE id=$id;";
                if (mysqli_query($conn, $sql)){    
                echo 'success';
                }
                else{
                echo '<div class="alert alert-danger" role="alert">Something went wrong!</div>';
                }
                
            }
            else{
                echo '<div class="alert alert-danger" role="alert">Wrong current password, please try again!</div>';
            }
            
            
        }
       
    }
    else{
        echo '<div class="alert alert-danger" role="alert">Your new password and repeat password does not match!</div>';
    }    
    
?>