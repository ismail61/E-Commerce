<?php 
    if(!$_SESSION['customer_username']){
        echo "<script>window.open('../logout.php','_self')</script>";
    }
    else{
?>

<?php 
    $customer_username = $_SESSION['customer_username'];
    $select = "select * from customer where customer_username = '$customer_username'";
    $row = mysqli_fetch_array( mysqli_query($db,$select));
    $customer_address = $row['customer_address'];
    $customer_shipping_address = $row['customer_shipping_address'];
?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <div class=" panel panel-default">
                <div class="panel-heading">
                    <h4 style="margin: 0;" class="text-center">Shipping Address</h4> 
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="panel-body">
                        <textarea name="shipping_address" class="form-control" cols="45" rows="15"><?php echo $customer_shipping_address ?></textarea>
                    </div>
                    <div class="panel-footer">
                        <center>
                        <button name="update_ship" type="submit" class="btn btn-success">Update</button></center>
                    </div>
                </form>
            </div>
            <?php 
                if(isset($_POST['update_ship'])){
                    $shipping_address = $_POST['shipping_address'];
                    $update = "UPDATE customer SET  customer_shipping_address = '$shipping_address' where customer_username = '$customer_username'";
                    $run = mysqli_query($db,$update);
                    if($run){
                        echo "<script>window.open('my_account.php?my_address','_self')</script>";
                    }
                }
            ?>
        </div>
        <div class="col-md-6">
            <div class=" panel panel-default">
                <div class="panel-heading">
                    <h4 style="margin: 0;" class="text-center">My Address</h4> 
                </div>
                <form method="post" enctype="multipart/form-data">               
                    <div class="panel-body">
                        <textarea name="address" cols="45" rows="15" class="form-control"><?php echo $customer_address ?></textarea>
                    </div>
                    <div class="panel-footer ">
                        <center>
                        <button name="update_add" type="submit" class="btn btn-success">Update</button></center>
                    </div>
                </form>
            </div>
            <?php 
                if(isset($_POST['update_add'])){
                    $address = $_POST['address'];
                    $update = "UPDATE customer SET  customer_address = '$address' where customer_username = '$customer_username'";
                    $run = mysqli_query($db,$update);
                    if($run){
                        echo "<script>window.open('my_account.php?my_address','_self')</script>";
                    }
                }
            ?>
        </div>
    </div>
</div>

<?php } ?>