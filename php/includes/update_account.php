<?php
    session_start();
    include '../config/database.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_id=$_POST["customer_id"];
        $first_name=$_POST["first_name"];
        $last_name=$_POST["last_name"];
        $address=$_POST["address"];
        $city=$_POST["city"];
        $postcode=$_POST["postcode"];
        $phone=$_POST["phone"];
        $email=$_POST["email"];

        $sql = "UPDATE customers 
        SET first_name='$first_name', last_name='$last_name', address='$address', city='$city', postcode='$postcode', phone='$phone', email='$email' 
        WHERE customer_id=$customer_id";

        mysqli_query($conn, $sql);
        mysqli_close($conn);
        $_SESSION['message'] = 'Your Information was updated.';
        header("Location: ../pages/account.php");
    };