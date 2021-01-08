<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">View Payments</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> View Payments
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money"></i> All Payments
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Payments No</th>
                                <th>Customer Id</th>
                                <th>Invoice No</th>
                                <th>Amount</th>
                                <th>Payment Mode</th>
                                <th>Transaction Number</th>
                                <th>Payment Date</th>
                                <th>Payment Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=0;
                                $order = "SELECT * from payment";
                                $run = mysqli_query($db,$order);
                                while($row_ = mysqli_fetch_array($run)){
                                    $payment_id = $row_['payment_id'];
                                    $customer_id = $row_['customer_id'];
                                    $invoice_number = $row_['invoice_number'];
                                    $amount = $row_['amount'];
                                    $payment_mode = $row_['payment_mode'];
                                    $transaction_number = $row_['transaction_id'];
                                    $payment_date = $row_['payment_date'];
                                    $i++;
                            ?>
                            <tr>
                                <th class="text-center"><?php echo $i ?></th>
                                <th class="text-center"><?php echo $customer_id ?></th>
                                <th class="text-center"><?php echo $invoice_number ?></th>
                                <th class="text-center"><?php echo $amount ?></th>
                                <th class="text-center"><?php echo $payment_mode ?></th>
                                <th class="text-center"><?php echo $transaction_number ?></th>
                                <th class="text-center"><?php echo $payment_date ?></th>
                                <form method="post">
                                    <th class="text-center"><button type="submit" class="btn btn-danger" name="del_payment" value="<?php echo $payment_id ?>"><i class="fa fa-trash-o"></i> Delete</button></th>
                                </form>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <?php 
                            if(isset($_POST['del_payment'])){
                                $order_i = $_POST['del_payment'];
                                $select_  = "DELETE from customer_order where order_id = '$order_i'";
                                $run_cus = mysqli_query($db,$select_);
                                if($run_cus){
                                    echo "<script>alert('One Order has been deleted')</script>";
                                    echo "<script>window.open('index.php?view_order','_self')</script>";
                                }
                            }
                        ?>

                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <div class="text-right">
                    <a href="index.php?view_orders" style="color: green;">
                        View All Orders <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="col-md-3">
        <div class="panel">
            <div class="panel-body">
                <div class="thumb-info mb-md">
                    <img src="admin_images/khihh.jpg" class="rounded img-responsive">
                    <div class="thumb-info-title">
                        <div class="thumb-info-inner">Admin Name</div>
                        <div class="thumb-info-type">Admin Job</div>
                    </div>
                </div>
                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i><span>Email</span> Admin email <br>
                        <i class="fa fa-user"></i><span>Contact</span> Admin contactNo
                    </div>
                    <hr class="dotted short">
                    <h5 class="text-muted">About</h5>
                    <p>Admin about</p>
                </div>
            </div>
        </div>
    </div>
                                -->
</div>


    <?php }?>