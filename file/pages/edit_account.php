<?php 
include 'layout/header.php';
include '../includes/functions.php';
$account_details=get("customers","customer_id",$_SESSION['account_id']);
?>

<?php 
    foreach($account_details as $account):
?>
<h4 class="">Update Account Info</h4>

<form action="../includes/update_account.php" method="POST">
    <input type="hidden" name="customer_id" value ="<?php echo $account["customer_id"];?>">

    <label>First Name</label>
    <input type="text" value ="<?php echo $account["first_name"];?>" name="first_name" required><br>

    <label>Last Name</label>
    <input type="text" value ="<?php echo $account["last_name"];?>" name="last_name" required><br>

    <label>Address</label>
    <input type="text" value ="<?php echo $account["address"];?>" name="address" required><br>

    <label>City</label>
    <input type="text" value ="<?php echo $account["city"];?>" name="city" required><br>

    <label>Postcode</label>
    <input type="text" value ="<?php echo $account["postcode"];?>" name="postcode" required><br>

    <label>Phone</label>
    <input type="text" value ="<?php echo $account["phone"];?>" name="phone" required><br>

    <label>Email</label>
    <input type="text" value ="<?php echo $account["email"];?>" name="email" required><br><br>

    <input type="submit" value="Update">
</form>
<?php 
    endforeach;
?>
<hr>