<?php
    session_start();
    include '../config/database.php';

    $order_id = $_POST['order_id'];
    $cost=$_POST['cost'];

    $sql="UPDATE orders SET cost=$cost, date=CURRENT_TIMESTAMP(), status='Complete' WHERE order_id=$order_id";

    mysqli_query($conn,$sql);

    unset($_SESSION["basket"]);
    unset($_SESSION["last_order_id"]);
    $_SESSION["count"]=0;
    $_SESSION['message'] = 'Your order has been placed.';
    header("Location: ../pages/account.php");
