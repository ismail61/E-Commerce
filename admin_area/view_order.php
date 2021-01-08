<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">View Orders</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> View Orders
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money"></i> All Orders
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Order Id</th>
                                <th>Product Id</th>
                                <th>Customer Id</th>
                                <th>Customer Email</th>
                                <th>Invoice No</th>
                                <th>Quantity</th>
                                <th>Tk</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=0;
                                $order = "SELECT * from customer_order order by 1";
                                $run = mysqli_query($db,$order);
                                while($row_order = mysqli_fetch_array($run)){
                                    $order_id = $row_order['order_id'];
                                    $customer_id = $row_order['customer_id'];
                                    $select_c_email = "select customer_email from customer where customer_id = '$customer_id'";
                                    $run_c_email = mysqli_query($db,$select_c_email);
                                    $row_c_email = mysqli_fetch_array($run_c_email);
                                    $customer_email = $row_c_email['customer_email'];
                                    $p_id = $row_order['p_id'];
                                    $invoice_number = $row_order['invoice_number'];
                                    $amount = $row_order['due_amount'];
                                    $quantity = $row_order['product_quantity'];
                                    $color = $row_order['product_color'];
                                    $date = $row_order['order_date'];
                                    $status = $row_order['order_status'];
                                    $i++;
                            ?>
                            <tr>
                                <th><?php echo $i ?></th>
                                <th><?php echo $order_id ?></th>
                                <th><?php echo $p_id ?></th>
                                <th><?php echo $customer_id ?></th>
                                <th><?php echo $customer_email ?></th>
                                <th><?php echo $invoice_number ?></th>
                                <th><?php echo $quantity ?></th>
                                <th><?php echo $amount ?></th>
                                <th><?php echo $date ?></th>
                                <th><?php echo $status ?></th>
                                <form method="post">
                                    <th><button type="submit" class="btn btn-danger" name="del_order" value="<?php echo $order_id ?>"><i class="fa fa-trash-o"></i> Delete</button></th>
                                </form>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <?php 
                            if(isset($_POST['del_order'])){
                                $order_i = $_POST['del_order'];
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