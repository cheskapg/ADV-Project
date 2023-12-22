<?php 

include './includes/config.php';
include './includes/session.php';


if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $age = $_POST['age'];
  $birth = $_POST['birth'];
  $contno = $_POST['contno'];
	$email = $_POST['email'];
  $username = $_POST['username'];
	$password = $_POST['psw'];
  $repeatpass = $_POST['repeatpsw'];
  
	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0)
  {
    $row = mysqli_fetch_assoc($result);   
    $error = '<div class="alert alert-danger" role="alert">'.$row['username'].' is already taken.</div>';
	} 
  else 
  {
    if($password === $repeatpass)
    {

      $sql = "INSERT INTO users(fname,lname,gender,address,age,birth,contno,email,username,password,usertype,photo)
      VALUES ('$fname','$lname','$gender','$address',$age,'$birth',$contno,'$email','$username','$password',0,'userplaceholder.png');";     

      if (mysqli_query($conn, $sql)) 
      {       
        unset($_POST['fname']);
        unset($_POST['lname']);
        unset($_POST['gender']);
        unset($_POST['age']);
        unset($_POST['birth']);
        unset($_POST['address']);
        unset($_POST['contno']);
        unset($_POST['email']);
        unset($_POST['username']);
        unset($_POST['psw']);
        unset($_POST['repeatpsw']);
        $gender = "";
        $error = '<div class="alert alert-success" role="alert">Registration Success!</div>';
      } 
      else         
      {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } 
    else
    {              
      $error = '<div class="alert alert-danger" role="alert">Password does not match!</div>';      
    }
  } 
}

include './includes/header.php';

?>

<body style="background: url('./res/gradient-bg.jpg'); background-size:cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 p-4 my-5 bg-navy rounded "style="border: 1px darkcyan solid;">
            <form action="" method="POST">
            <?php echo $error ?>
            <h1 class="font-weight-bold text-center mb-5">Registration</h1>                      
                      <div class="form-row mb-2">
                          <div class="col">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $_POST['fname']; ?>" required>
                          </div>
                          <div class="col">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $_POST['lname']; ?>" required>
                          </div>
                      </div>
                            
                      <label for="gender">Gender</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="radMale" value="Male" value="<?php echo $_POST['gender']; ?>" required>
                        <label class="form-check-label" for="radMale">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="radFemale" value="Female" value="<?php echo $_POST['gender']; ?>">
                        <label class="form-check-label" for="radFemale">
                          Female
                        </label>
                      </div>
      
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="address">Address</label>
                          <input type="text" class="form-control form-control-lg fs-5" name="address" id="address" value="<?php echo $_POST['address']; ?>" required >
                        </div>
                      </div>
      
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="age">Age</label>
                          <input type="number" class="form-control" name="age" id="age" value="<?php echo $_POST['age']; ?>" required >
                        </div>
                        <div class="col">
                          <label for="birth">Birth</label>
                          <input type="date" name="birth" id="birth" class="form-control" value="<?php echo $_POST['birth']; ?>" required>
                        </div>
                      </div>

                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="contno">Contact Number</label>
                          <input type="number" class="form-control" name="contno" id="contno" value="<?php echo $_POST['contno']; ?>" required >
                        </div>
                      </div>

                        <div class="form-row mb-2">
                        <div class="col">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" id="email" value="<?php echo $_POST['email']; ?>" required >
                        </div>
                        </div>

                        <div class="form-row mb-2">
                        <div class="col">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" name="username" id="username" value="<?php echo $_POST['username']; ?>" required >
                        </div>
                      </div>

                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="psw">Password</label>
                          <input type="password" class="form-control" name="psw" id="psw" value="<?php echo $_POST['psw']; ?>" required >
                        </div>
                      </div>
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="repeatpsw">Repeat Password</label>
                          <input type="password" class="form-control" name="repeatpsw" id="repeatpsw" value="<?php echo $_POST['repeatpsw']; ?>" required>
                        </div>
                      </div>                     
                  <button name="submit"  class="btn btn-success btn-md w-100 mt-3" >Register</button>
                  <p class="mt-2 text-center">Already have an account? <a href="login.php">Login Here</a>.</p>      
                  </form>
        </div>        
    </div>    
<?php
// Checked radio
if($gender === "Female")
      {
        echo '<script>
        document.getElementById("radFemale").checked = true;
      </script>';
      }
      else if($gender === "Male")
      {
        echo'<script>
        document.getElementById("radMale").checked = true;
      </script>';
      }
      else if($gender === ""){
        echo'<script>
        document.getElementById("radMale").checked = false;
        document.getElementById("radFemale").checked = false;
        </script>';   
      }     
           

include './includes/script.php';
?>
</body>
</head>