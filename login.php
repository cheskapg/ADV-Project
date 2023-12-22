<?php

include './includes/config.php';

include './includes/session.php';

$error="";
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username='$username'  AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$num  = $row['usertype'];			
		// Condition if usertype is 0 it means user else or 1 admin
		if($num > 0)
		{
			// $error = '<div class="alert alert-danger" role="alert">Check</div>';
			$_SESSION['admin'] = $row;							
			header('Location: ./admin/index.php');
		}
		else{
			$_SESSION['user'] = $row;							
			header('location: index.html');	
		}
				
			
		
	} 
	else 
	{
        $error = '<div class="alert alert-danger" role="alert">Wrong Username or Password! Please try again.</div>';      
	
	}
}


include './includes/header.php';
?>

<body style="background: url('./res/gradient-bg.jpg'); background-size:cover;">
<div class="container">
    <div class="row justify-content-center p-2">
        <div class="col-sm-6 bg-navy text-center p-3 mt-5 rounded" style="border: 1px darkcyan solid;">
        <form action="" method="POST" class="my-5" >
		
			<?php echo $error; ?>
			<h1 class="font-weight-bold mb-5">Login</h1>
			<div class="form-row mb-2">
				<div class="col">
					<label for="username">Username</label>					
					<input type="text"  class="form-control" name="username" id="username" value="<?php echo $_POST['username']; ?>" placeholder="Username" required >
				</div>
			</div>
			<div class="form-row mb-2">
				<div class="col">
					<label for="password">Password</label>					
					<input type="password" class="form-control" name="password" id="password" value="<?php echo $_POST['password']; ?>" placeholder="Password" required >
				</div>
			</div>
			<button name="submit"  class="btn btn-success btn-md w-100 mt-3" >Login</button>
			<p class="mt-2">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>	
        </div>
        </div>
</div>
    

<?php
include './includes/script.php';
?>
</body>
</html>