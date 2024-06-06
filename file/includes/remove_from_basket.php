<?php
    session_start();
    include '../config/database.php';
	include 'functions.php';

    $orderline_id=$_POST["orderline_id"]; 
    $product_id=$_POST["product_id"];

    $sql = "DELETE FROM orderline WHERE orderline_id=$orderline_id";

    if (mysqli_query($conn, $sql)) {
        update_stock_level($product_id, 1);
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	};

    mysqli_close($conn);
    $_SESSION["count"] = $_SESSION["count"] - 1;
    $_SESSION['message'] = 'Item removed from basket.';
    header('location: ../pages/basket.php');