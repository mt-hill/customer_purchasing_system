<?php 
    include 'layout/header.php';
    include '../includes/functions.php';
?>
<?php if(isset($_SESSION['message'])){ ?>
<h5><?php echo $_SESSION['message'];?></h5>
<?php unset($_SESSION['message']); } ?>
<h2>Basket</h2>

<?php
    if(isset($_SESSION['last_order_id'])) {
        $basket=get("orderline", "order_id", $_SESSION['last_order_id']);
        $order_cost=0;
?>
<table>
    <tr>
        <th>Item ID</th>
        <th>Name</th>
        <th>Price</th>
        <th></th>
    </tr>
<?php 
    foreach($basket as $item):
?>
    <tr>
        <td> <?php echo $item["product_id"];?></td>
        <td> Name of part</td>
        <td>£<?php echo $item["price"];?></td>
        <td>
            <form method="post" action="../includes/remove_from_basket.php">
                <input type="hidden" name="function" value="remove"/>
                <input type="hidden" name="product_id" value="<?php echo $item["product_id"];?>"/>
                <input type="hidden" name="orderline_id" value="<?php echo $item["orderline_id"];?>"/>
                <input type="submit" value="Remove"/>
            </form>
        </td>
    </tr>

<?php 
    $order_cost=$order_cost+$item["price"];
    endforeach;
?>

</table>

<hr>
<h4><?php echo "Order Total: £$order_cost";?></h4>

<form method="post" action="../includes/complete_order.php"> 
    <input type="hidden" name="order_id" value="<?php echo $_SESSION["last_order_id"];?>"/>
    <input type="hidden" name="cost" value="<?php echo $order_cost;?>"/>		
    <input type="submit" value="Complete Order"/>
</form>

<form method="post" action="../includes/cancel_order.php"> 
    <input type="hidden" name="order_id" value="<?php echo $_SESSION["last_order_id"];?>"/>
    <input type="hidden" name="cost" value="<?php echo $order_cost;?>"/>		
    <input type="submit" value="Cancel Order"/>
</form>

<?php 
    } else {
?> 

<h5>Your basket is empty</h5>

<?php
    }
?>
