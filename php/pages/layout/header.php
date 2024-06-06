<?php
    session_start();
?>
<!DOCTYPE html>
    <html lang="en" class="">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Engineering Company</title>
        </head>
        <nav>
            <h3>Navigation</h3>
            <a href="account.php">Account</a> |
            <a href="products.php">Products</a> |
            <a href="basket.php">Basket (<?php echo $_SESSION["count"]?>)
            </a> |
            <a href="../includes/destroy_session.php">Logout</a> 
        </nav>
        <hr>
        <body>