<?php  
	require '../connect.php';

	$sql = "SELECT userID, ProductName, ProductQty, productPrice, ProductAmount FROM userCart";
	$result = $conn->query($sql);

if ($result->rowCount() > 0){
  	// output data of each row
  	    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "id: " . $row["userID"] . "-----Product Name: " . $row["ProductName"]. "------Qty:" . $row["ProductQty"]. "-----Price:" . $row["productPrice"]. "------Amount: ". $row["ProductAmount"] . "<br>";
 	 }
	} else {
  	echo "0 results";
	}


?>