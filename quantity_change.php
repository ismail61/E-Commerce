<?php 

    session_start();
    include("includes/db.php");

    $id = $_POST['cart_id'];
    $product_quantity = $_POST['product_quantity'];
    mysqli_query($db,"UPDATE cart SET product_quantity='$product_quantity' where id='$id'")
?>