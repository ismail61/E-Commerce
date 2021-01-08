<div class="box">
    <center>
        <h1>My Order</h1>
        <p>If you have any questions , Please feel free to <a  style="font-size: 18px;" href="../contact.php">contact us</a>.Our customer 
                                    service center is working for you 24/7.
        </p>
    </center>
    <br><hr>
    <div class="table-responsive order-table">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Due Amount</th>
                    <th>Invoice Number</th>
                    <th>Quantity</th> 
                    <th>Color</th>
                    <th>Order Date</th>
                    <th>Paid/Unpaid</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $customer_username = $_SESSION['customer_username'];
                    $get_customer = "select customer_id from customer where customer_username = '$customer_username'";
                    $run_get_customer = mysqli_query($db,$get_customer);
                    $row_customer = mysqli_fetch_array($run_get_customer);
                    $customer_id = $row_customer['customer_id'];
                    $get_customer_product = "select * from customer_order where customer_id = '$customer_id'";
                    $run_get_customer_product = mysqli_query($db,$get_customer_product);
                    $sl=0;
                    while($row_customer_order = mysqli_fetch_array($run_get_customer_product)){
                        $order_id = $row_customer_order['order_id'];
                        $due_amount = $row_customer_order['due_amount'];
                        $invoice_number = $row_customer_order['invoice_number'];
                        $product_quantity = $row_customer_order['product_quantity'];
                        $product_color = $row_customer_order['product_color'];
                        $order_date  = $row_customer_order['order_date'];
                        $order_status = substr($row_customer_order['order_status'],0,11);
                        $sl++;
                        if($order_status == 'pending'){
                            $order_status = "Unpaid";
                        }
                        else{
                            $order_status = "Paid";
                        }
                
                    
                ?>
                <tr>
                    <td class="text-center"><?php echo $sl ?></td>
                    <td class="text-center"><?php echo $due_amount ?></td>
                    <td class="text-center"><?php echo $invoice_number ?></td>
                    <td class="text-center"><?php echo $product_quantity ?></td>
                    <td class="text-center"><?php echo $product_color ?></td>
                    <td class="text-center"><?php echo $order_date ?></td>
                    <td class="text-center"><?php echo $order_status ?></td>
                    <?php 
                        if($order_status=='Paid'){
                            echo "<td>
                            <a class='btn btn-primary' onclick='return false;' target='_blank' href='confirm.php?order_id=$order_id'>Confirm If Paid</a>
                            </td>";
                        }
                        else{
                            echo "<td>
                            <a class='btn btn-primary' target='_blank' href='confirm.php?order_id=$order_id'>Confirm If Paid</a>
                            </td>";
                        }
                    ?>
                    
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>