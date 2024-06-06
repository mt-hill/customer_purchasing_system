<?php
    include '../config/database.php';

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = mysqli_real_escape_string($conn,$_POST['password']); 


		$sql = "SELECT * FROM customers WHERE email = '$email'";

		
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);

		if($count == 1 && password_verify($password, $row['password'])) {
			session_start();
			$_SESSION["account_id"]=$row["customer_id"];   
			$_SESSION["count"]=0;
			header("Location: ../pages/products.php");
			exit;
		}
		else {
			session_start();
			$_SESSION["incorrect_pass"]=true;
			header("Location: ../index.php");
			exit;
		};
	};
?>