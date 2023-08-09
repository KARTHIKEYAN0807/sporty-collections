<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$mobile = $_POST['mobile'];
	$product = $_POST['product'];
	$quantity = $_POST['quantity'];
	$address = $_POST['address'];
	$code = $_POST['code'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','order');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, mobile, product, quantity, address, code, number) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $mobile, $product, $quantity, $address,$code,$number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Ordered successfully(We'll Mail you Soon)";
		$stmt->close();
		$conn->close();
	}
?>