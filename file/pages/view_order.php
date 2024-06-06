<?php 
include 'layout/header.php';
include '../includes/functions.php';

$order_id=$_POST['order_id'];
$status=$_POST['status'];
$order=get("orderline", "order_id", $order_id);
$order_cost=0;
?>

<h3>Order ID: <?php echo $order_id?> (<?php echo $status?>)</h3>
<br>
<table>
    <tr>
        <th>Item ID</th>
        <th>Name</th>
        <th>Price</th>
    </tr>

<?php foreach($order as $item): ?>

    <tr>
        <td><?php echo $item["product_id"];?></td>
        <td> Name of part</td>
        <td>£<?php echo $item["price"];?></td>
    </tr>

<?php $order_cost=$order_cost+$item["price"]; ?>
<?php endforeach; ?>
</table>
<hr>
<h4>Order Total: £<?php echo $order_cost?></h4>