<?php
include '../includes/config.php';

$user_id = $_GET['user_id'];

$up_currentpsw = $_POST['up_currentpsw'];
	$up_newpsw = $_POST['up_newpsw'];
	$up_repeatpsw = $_POST['up_repeatpsw'];
    
    if($up_newpsw === $up_repeatpsw){
        $sql = "SELECT password FROM users WHERE id = '$user_id';";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $pass = mysqli_fetch_assoc($result);
            if($pass['password'] == $up_currentpsw){
                $sql = "UPDATE users SET password = '$up_newpsw' WHERE id=$user_id;";
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
