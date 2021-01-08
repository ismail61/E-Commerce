<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">View Categories</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> View Categories
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-money"></i> Categories
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Categories Title</th>
                                <th class="text-center">Categories Description</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $select = "select * from categories";
                                $run = mysqli_query($db,$select);
                                while($row = mysqli_fetch_array($run)){
                                $cat_title = $row['cat_title'];
                                $cat_id = $row['cat_id'];
                                $cat_description= $row['cat_description'];
                            ?>
                                <tr>
                                    <th><?php echo $cat_title ?></th>
                                    <th><?php echo $cat_description ?></th>
                                    <form method="post">
                                        <th><button type="submit"class="btn btn-danger" 
                                        value="<?php echo $cat_id ?>" name="del_cat"><i class="fa fa-trash-o"></i> Delete</button></th>
                                    </form>
                                    <td class="text-center"><a href="index.php?edit_cat=<?php echo $cat_id ?>" style="color:white;">
                                    <button class="btn btn-primary" name="edit_cat"><i class="fa fa-edit"></i> Edit</button></a></td>
                                </tr>


                                <?php }?>

                                <?php 
                                    if(isset($_POST['del_cat'])){
                                        $select_  = "DELETE from categories where cat_id = '$cat_id'";
                                        $run_cus = mysqli_query($db,$select_);
                                        if($run_cus){
                                            echo "<script>alert('One Categories has been deleted')</script>";
                                            echo "<script>window.open('index.php?view_cat','_self')</script>";
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