<?php 
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
?>

<?php 
    if(isset($_GET['c_id'])){
        $c_id = $_GET['c_id'];
    }
    $client_ip= get_client_ip();
    $status = "pending";
    
    $select_cart = "select * from cart where ip_address = '$client_ip'";
    $run_select_cart = mysqli_query($db,$select_cart);
    while($row_cart = mysqli_fetch_array($run_select_cart)){
        $p_id = $row_cart['p_id'];
        $product_quantity = $row_cart['product_quantity'];
        $product_color = $row_cart['product_color'];
        $invoice_number = mt_rand();
        $get_product = "select * from products where p_id = '$p_id'";
        $run_get_product = mysqli_query($db,$get_product);
        while($row_product = mysqli_fetch_array($run_get_product)){
            $sub_total = $row_product['p_price'] * $product_quantity;
            $insert_customer_order = "INSERT INTO customer_order(customer_id,due_amount,invoice_number,
                                        product_quantity,product_color,order_date,order_status,p_id) 
                                        values('$c_id','$sub_total','$invoice_number','$product_quantity','$product_color',
                                        NOW(),'$status','$p_id');";
            $run_insert_customer_order = mysqli_query($db,$insert_customer_order);

            /*
            //fetch order id
            $get_order = "select order_id from customer_order where customer_id = '$c_id' ";
            $run_get_order = mysqli_query($db,$get_order);
            $row = mysqli_fetch_array($run_get_order);
            $order_id = $row['order_id'];
            */

            $insert_pending_order = "INSERT INTO pending_order(customer_id,invoice_number,p_id,
                                        product_quantity,product_color,order_status)
                                        VALUES ('$c_id','$invoice_number','$p_id','$product_quantity',
                                        '$product_color','$status');";
            $run_insert_pending_order = mysqli_query($db,$insert_pending_order);

            $delete_cart = "delete from cart where ip_address='$client_ip'";
            $run_delete_cart = mysqli_query($db,$delete_cart);

            echo "<script>alert('Your Order has been submitted,Thanks for your order')</script>";
            echo "<script>window.open('customer/my_account.php?pay_offline','_self')</script>";
        }
    }
?>