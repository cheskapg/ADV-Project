<?php 
	require '../../config/connect.php';

	if (isset($_POST['AddToCart']	)) {
	
	$UserId = $_POST['userID'];
	$ProductName= $_POST['productName'];
	$ProductQty = $_POST['productQty'];
	$ProductPrice = $_POST['productPrice'];
	$ProductAmount = $_POST['productAmount'];


	$statement = $conn->prepare("CALL insertCart(?,?,?,?,?)");
	$statement->bind_param("isidd", $UserId, $ProductName, $ProductQty, $ProductPrice, $ProductAmount);
if(($statement->execute()) == 1)
{

	echo 'Added to User Cart ';
}
else{
	echo 'ERROR';
}

	
	}
	
?>