<?php
function get_all($table){
    include '../config/database.php';

    $sql = "SELECT * FROM $table";
    $result = mysqli_query($conn, $sql);
    $users=array();

    while($row=mysqli_fetch_array($result)) {
        $users[]=$row;
    };
    mysqli_close($conn);
    return $users;
}
function get($table, $column, $param){
    include '../config/database.php';

    $sql = "SELECT * FROM $table WHERE $column = $param";
    $result = mysqli_query($conn, $sql);
    $user=array();

    while($row=mysqli_fetch_array($result)) {
        $user[]=$row;
    };
    mysqli_close($conn);
    return $user;
}
function update_stock_level($product_id, $x){
    include '../config/database.php';
    $sql1="SELECT stock FROM products WHERE product_id = $product_id";
    
    $product = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($product);
    $stock = $row['stock'];

    $sql2="UPDATE products SET stock=($stock+$x) WHERE product_id=$product_id";
    mysqli_query($conn, $sql2);

}

function get_customer_visits($customer_id){
    include '../config/database.php';

    $sql = "SELECT visits.date, visits.reason, visits.staff_id, visits.duration, staff.first_name, staff.email FROM visits 
    INNER JOIN staff ON visits.staff_id = staff.staff_id WHERE customer_id = $customer_id 
    ORDER BY visits.date DESC;";
    
    $results = mysqli_query($conn, $sql);
    $visits=array();

    while($row=mysqli_fetch_array($results)) {
        $visits[]=$row;
    };

    mysqli_close($conn);
    return $visits;
}
function get_products(){
    include '../config/database.php';

    $sql = "SELECT products.product_id, products.price, products.stock, product_group.group_name, sub_product.name FROM products
    INNER JOIN product_group ON products.group_id = product_group.group_id
    INNER JOIN sub_product ON products.sub_product_id = sub_product.sub_product_id";

    $result = mysqli_query($conn, $sql);
    $products=array();

    while($row=mysqli_fetch_array($result)) {
        $products[]=$row;
    };

    mysqli_close($conn);
    return $products;
}