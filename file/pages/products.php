<?php 
    include 'layout/header.php';
    include '../includes/functions.php';
?>
<?php if(isset($_SESSION['message'])){ ?><h5><?php echo $_SESSION['message'];?></h5><?php unset($_SESSION['message']); } ?>
<h2>Products</h2>
<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Stock</th>
        <th></th>
    </tr>

<?php 
    $products=get_products(); 
    foreach($products as $product): 
?>

    <tr>
        <td><?php echo $product["group_name"]?> <?php echo $product["name"]?></td>
        <td>£<?php echo $product["price"];?></td>
        <td><?php echo $product["stock"];?></td>

        <td>
            <form method="post" action="../includes/add_to_basket.php">
                <input type="hidden" name="customer_id" value=<?php $_SESSION['account_id']?> >
                <input type="hidden" name="product_id" value=<?php echo $product["product_id"]?> >
                <input type="hidden" name="price" value=<?php echo $product["price"]?> >
                <?php if($product["stock"] > 0) {?><input type="submit" value="Add To Basket"> <?php } else { ?> <input type="submit" value="Out of Stock" disabled> <?php }; ?>
            </form>
        </td>
    </tr>
<?php 
    endforeach;
?>
</table>


