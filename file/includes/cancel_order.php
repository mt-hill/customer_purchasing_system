<?php
    session_start();
    include 'functions.php';
    include '../config/database.php';

    $order_id = $_POST['order_id'];
    $cost=$_POST['cost'];

    $sql="UPDATE orders SET cost=$cost, date=CURRENT_TIMESTAMP(), status='Cancelled' WHERE order_id=$order_id";

    mysqli_query($conn,$sql);

    unset($_SESSION["basket"]);
    unset($_SESSION["last_order_id"]);
    $_SESSION["count"]=0;

    $prods = get("orderline", "order_id", $order_id);
    foreach($prods as $prod):
        update_stock_level($prod["product_id"], +1);
    endforeach;



    $_SESSION['message'] = 'Your order has been cancelled.';
    header("Location: ../pages/account.php");
