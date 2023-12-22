<?php
include './includes/config.php';
$user_id = $_GET['user_id'];
// Update Profile Image
if(!empty($_FILES['file']))
{
    // Fetch data from user
    $sql = "SELECT * FROM users WHERE id=$user_id";
    $result= mysqli_query($conn,$sql);
    if($result -> num_rows > 0 ){
        $row = mysqli_fetch_assoc($result);
    }
      
        // Image Variables
        $filename = $_FILES['file']['name'];
        $fileExt = explode('.',$filename);
        $fileActualExt = strtolower(end($fileExt));
        $nameToLower = strtolower($row['username']);
        $now = date('Y-m-d');
        $newFilename = uniqid().'_'.$nameToLower.'_'.$now.'.'.$fileActualExt;
        
        $allowed = array('jpg','jpeg','png');
        
        if(in_array($fileActualExt,$allowed)){
          if(!empty($newFilename)){
            move_uploaded_file($_FILES['file']['tmp_name'], './dist/img/userimg/'.$newFilename);	
          }
          else{
            echo " There's an error of moving the image file.";
          }   
         $sql = "UPDATE users SET photo='$newFilename' WHERE id=$user_id;";
         if (mysqli_query($conn, $sql)) 
         {
            
          echo "success";     
         }
         else{
          echo "Something went wrong! Please do check your connection.";
         }
        
        }
        else{
          echo "Invalid file type please try again.";
        }
    
}
else{
    echo "Empty field!";
}



?>