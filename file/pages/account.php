<?php 
include 'layout/header.php';
include '../includes/functions.php';

$account_details=get("customers","customer_id",$_SESSION['account_id']);
$orders=get("orders","customer_id",$_SESSION['account_id']);

?>
<?php if(isset($_SESSION['message'])){ ?>
<h5><?php echo $_SESSION['message'];?></h5>
<?php unset($_SESSION['message']); } ?>

<h2>Dashboard</h2>

<h4>Order History</h4>
<table>
    <tr>
        <th>Order ID</th>
        <th>Date</th>
        <th>Cost</th>
        <th>Status</th>
        <th></th>
    </tr>
<?php foreach($orders as $order): ?>
    <tr>
        <td><?php echo $order["order_id"];?></td>
        <td><?php echo $order["date"];?></td>
        <td><?php echo $order["cost"];?></td>
        <td><?php echo $order["status"];?></td>
        <td>
            <form action="view_order.php" method="POST" style="">
            <input type="hidden" name="status" value ="<?php echo $order["status"];?>">
                <input type="hidden" name="order_id" value ="<?php echo $order["order_id"];?>">
                <input type="submit" value="View Order">
            </form>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<hr>

<h4>Account Details</h4>
<table>
    <tr>
        <th>Account ID</th>
        <th>First</th>
        <th>Last</th>
        <th>Address</th>
        <th>City</th>
        <th>Postcode</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
<?php foreach($account_details as $account): ?>
    <tr>
        <td><?php echo $account["customer_id"];?></td>
        <td><?php echo $account["first_name"];?></td>
        <td><?php echo $account["last_name"];?></td>
        <td><?php echo $account["address"];?></td>
        <td><?php echo $account["city"];?></td>
        <td><?php echo $account["postcode"];?></td>
        <td><?php echo $account["phone"];?></td>
        <td><?php echo $account["email"];?></td>
    </tr>
<?php endforeach; ?>
</table>
<br>

<a href="edit_account.php">Edit Account Info</a>
