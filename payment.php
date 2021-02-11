<div class="box">
    <?php 
        $session_username = $_SESSION['customer_username'];
        $select_customer = "select * from customer where customer_username = '$session_username'";
        $run_customer = mysqli_query($db,$select_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_id = $row_customer['customer_id'];

    ?>
    <div class="text-center">
        <h2>Payment Options</h2><br><hr>
        <div class="lead"><a href="order.php?c_id=<?php echo $customer_id ?>">Pay offline</a></div><br>
        <div class="lead"><a href="online_pay.php?price=<?php total_price(); ?>">Pay Online</a></div><br>
        <div class="lead"><a href="on_delivery.php?c_id=<?php echo $customer_id ?>">Cash On Delivery</a></div><br>
    </div>
</div>