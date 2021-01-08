<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

<div class="row">    
    <h1 class="page-header text-center" style="padding-left:10px">Dashboard</h1>
    <div class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-primary">
            <div class="panel-heading" style="height: 110px;"> 
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h4><b>&nbsp;&nbsp; <?php echo $products ?></b></h4>
                        <h4><b>Products</b></h4>
                    </div>
                </div>
            </div>
            <a href="index.php?view_product">
                <div class="panel-footer" style="height: 50px;">
                    <span class="pull-left">
                        <span style="font-size:20px;">View Details</span>
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right fa-2x" ></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-success">
            <div class="panel-heading"  style="height: 110px;">  
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h4><b>&nbsp;&nbsp; <?php echo $customers ?></b></h4>
                        <h4><b>Customers</b></h4>
                    </div>
                </div>
            </div>
            <a href="index.php?view_customer">
                <div class="panel-footer"  style="height: 50px;">
                    <span class="pull-left">
                        <span style="font-size:20px;">View Details</span>
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right fa-2x" ></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-danger">
            <div class="panel-heading"  style="height: 110px;">  
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h4><b><?php echo $product_categories ?></b></h4>
                        <h4 class="d-block"><b>Products Categories</b></h4>
                    </div>
                </div>
            </div>
            <a href="index.php?view_product_cat">
                <div class="panel-footer" >
                    <span class="pull-left d-block">
                        <span style="font-size:20px;">Product Categories</span>
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right fa-2x" ></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-warning">
            <div class="panel-heading"  style="height: 110px;">  
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h4><b><?php echo $orders ?></b></h4>
                        <h4><b>Orders</b></h4>
                    </div>
                </div>
            </div>
            <a href="index.php?view_order">
                <div class="panel-footer"  style="height: 50px;">
                    <span class="pull-left">
                        <span style="font-size:20px;">View Details</span>
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right fa-2x" ></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money"></i> New Orders
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Product Id</th>
                                <th>Customer Id</th>
                                <th>Customer Email</th>
                                <th>Invoice No</th>
                                <th>Quantity</th>
                                <th>Tk</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=0;
                                $order = "SELECT * from customer_order order by 1 DESC LIMIT 0,4";
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
                                <th><?php echo $p_id ?></th>
                                <th><?php echo $customer_id ?></th>
                                <th><?php echo $customer_email ?></th>
                                <th><?php echo $invoice_number ?></th>
                                <th><?php echo $quantity ?></th>
                                <th><?php echo $amount ?></th>
                                <th><?php echo $date ?></th>
                                <th><?php echo $status ?></th>
                            </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <div class="text-right">
                    <a href="index.php?view_order" style="color: green;">
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