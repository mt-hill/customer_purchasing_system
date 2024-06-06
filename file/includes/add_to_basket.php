<?php 
    session_start();
    include '../config/database.php';
	include 'functions.php';

	$customer_id=$_SESSION['account_id'];
	
	if(!isset($_SESSION["basket"])) {
		$order_sql = "INSERT INTO orders(customer_id, date, cost) 
		VALUES ($customer_id, CURRENT_TIMESTAMP(), 0.00)";
		$_SESSION["basket"]=true;

		if(mysqli_query($conn,$order_sql)) {
			$_SESSION["last_order_id"]=mysqli_insert_id($conn);
		};
	};

	$order_id=$_SESSION["last_order_id"];
	$product_id=$_POST["product_id"];
	$price=$_POST["price"];

	$orderline_sql="INSERT INTO orderline(order_id, product_id, price) VALUES ($order_id, $product_id, $price)";

	if(mysqli_query($conn,$orderline_sql)){
		update_stock_level($product_id, -1);
		$_SESSION["count"] = $_SESSION["count"] + 1;
		$_SESSION['message'] = 'Item added to your basket.';
		header("Location: ../pages/products.php");

	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	};

	mysqli_close($conn);

