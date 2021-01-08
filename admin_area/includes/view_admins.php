<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">View Admins</h2><br>
        <div class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard >> View Admins
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-money"></i> Admins
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Admin Sr</th>
                                <th>Admin Name</th>
                                <th>Admin Email</th>
                                <th>Admin Phone</th>
                                <th>Admin Job</th>
                                <th>Admin About</th>
                                <th>Admin Address</th>
                                <th>Admin Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i =0;
                                $select = "select * from admins";
                                $run = mysqli_query($db,$select);
                                while($row = mysqli_fetch_array($run)){
                                    $admin_name = $row['admin_name'];
                                    $admin_email = $row['admin_email'];
                                    $admin_id = $row['admin_id'];
                                    $admin_phone = $row['admin_phone'];
                                    $admin_image = $row['admin_image'];
                                    $admin_job = $row['admin_job'];
                                    $admin_about = $row['admin_about'];
                                    $admin_address = $row['admin_address'];
                                    $i++;
                            ?>
                                <tr>
                                    <th><?php echo $i ?></th>
                                    <th><?php echo $admin_name ?></th>
                                    <th><?php echo $admin_email ?></th>
                                    <th><?php echo $admin_phone ?></th>
                                    
                                    <th><?php echo $admin_job ?></th>
                                    <th><?php echo $admin_about ?></th>
                                    <th><?php echo $admin_address ?></th>
                                    
                                    <th><img src="admin_images/<?php echo $admin_image ?>" width="70px" height="120px" class="img-responsive img-thumbnail"></th>
                                    
                                    <form method="post">
                                        <th><button type="submit"class="btn btn-danger" 
                                        value="<?php echo $admin_id ?>" name="del_admin">Delete</button></th>
                                    </form>
                                </tr>


                                <?php }?>

                                <?php 
                                    if(isset($_POST['del_admin'])){
                                        $select_admin  = "DELETE from admins where admin_id = '$admin_id'";
                                        $run_admin = mysqli_query($db,$select_admin);
                                        if($run_admin){
                                            echo "<script>alert('One Admin has been deleted')</script>";
                                            echo "<script>window.open('index.php?view_admins','_self')</script>";
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