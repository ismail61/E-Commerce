<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">View product Categories</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> view product Categories
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-money"></i> Product Categories
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Product Categories Title</th>
                                <th class="text-center">Product Categories Description</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $select = "select * from product_categories";
                                $run = mysqli_query($db,$select);
                                while($row = mysqli_fetch_array($run)){
                                $p_cat_title = $row['p_cat_title'];
                                $p_cat_id = $row['p_cat_id'];
                                $p_cat_description= $row['p_cat_description'];
                            ?>
                                <tr>
                                    <th><?php echo $p_cat_title ?></th>
                                    <th><?php echo $p_cat_description ?></th>
                                    <form method="post">
                                        <th><button type="submit"class="btn btn-danger" 
                                        value="<?php echo $p_cat_id ?>" name="del_p_cat"><i class="fa fa-trash-o"></i> Delete</button></th>
                                    </form>
                                    <td class="text-center"><a href="index.php?edit_product_cat=<?php echo $p_cat_id ?>" style="color:white;">
                                    <button class="btn btn-primary" name="edit_p_cat"><i class="fa fa-edit"></i> Edit</button></a></td>
                                </tr>


                                <?php }?>

                                <?php 
                                    if(isset($_POST['del_p_cat'])){
                                        $select_  = "DELETE from product_categories where p_cat_id = '$p_cat_id'";
                                        $run_cus = mysqli_query($db,$select_);
                                        if($run_cus){
                                            echo "<script>alert('One product Categories has been deleted')</script>";
                                            echo "<script>window.open('index.php?view_product_cat','_self')</script>";
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

    <?php }?>