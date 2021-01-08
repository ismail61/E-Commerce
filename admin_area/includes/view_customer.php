<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">View Customers</h2><br>
        <div class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard >> View Customers
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-money"></i> Customers
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Phone</th>
                                <th>Customer UserName</th>
                                <th>Customer Password</th>
                                <th>Customer Division</th>
                                <th>Customer District</th>
                                <th>Customer Address</th>
                                <th>Customer Image</th>
                                <th>Customer IP</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $select = "select * from customer";
                                $run = mysqli_query($db,$select);
                                while($row = mysqli_fetch_array($run)){
                                $customer_id = $row['customer_id'];
                                $customer_name= $row['customer_name'];
                                $customer_email = $row['customer_email'];
                                $customer_phone = $row['customer_phone'];
                                $customer_userName = $row['customer_username'];
                                $customer_password = $row['customer_password'];
                                $customer_division = $row['customer_division'];
                                $customer_district = $row['customer_district'];
                                $customer_address = $row['customer_address'];
                                $customer_image = $row['customer_image'];
                                $customer_ip_address = $row['customer_ip_address'];
                            ?>
                                <tr>
                                    <th><?php echo $customer_id ?></th>
                                    <th><?php echo $customer_name ?></th>
                                    <th><?php echo $customer_email ?></th>
                                    <th><?php echo $customer_phone ?></th>
                                    <th><?php echo $customer_userName ?></th>
                                    <th><?php echo $customer_password ?></th>
                                    <th><?php echo $customer_division ?></th>
                                    <th><?php echo $customer_district ?></th>
                                    <th><?php echo $customer_address ?></th>
                                    <th><img src="../customer/customer_images/upload/<?php echo $customer_image ?>" width="70px" height="120px" class="img-responsive img-thumbnail"></th>
                                    <th><?php echo $customer_ip_address ?></th>
                                    <form method="post">
                                        <th><button type="submit"class="btn btn-danger" 
                                        value="<?php echo $customer_id ?>" name="del_customer">Delete</button></th>
                                    </form>
                                </tr>


                                <?php }?>

                                <?php 
                                    if(isset($_POST['del_customer'])){
                                        $select_cus  = "DELETE from customer where customer_id = '$customer_id'";
                                        $run_cus = mysqli_query($db,$select_cus);
                                        $del_pending = mysqli_query($db,"DELETE from pending_order where customer_id = '$customer_id'");
                                        if($run_cus){
                                            echo "<script>alert('One Customer has been deleted')</script>";
                                            echo "<script>window.open('index.php?view_customer','_self')</script>";
                                        }
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


                                    <?php } ?>