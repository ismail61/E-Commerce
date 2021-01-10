<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">View Boxes</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> ViewBoxes
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-money"></i> Boxes
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Boxes Title</th>
                                <th>Boxes Url</th>
                                <th>Boxes Description</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $select = "select * from boxes";
                                $run = mysqli_query($db,$select);
                                while($row = mysqli_fetch_array($run)){
                                $boxes_title = $row['box_title'];
                                $boxes_url = $row['box_url'];
                                $boxes_id = $row['box_id'];
                                $boxes_description= $row['box_description'];
                            ?>
                                <tr>
                                    <th><?php echo $boxes_title ?></th>
                                    <th><?php echo $boxes_url ?></th>
                                    <th><?php echo $boxes_description ?></th>
                                    <form method="post">
                                        <th><button type="submit"class="btn btn-danger" 
                                        value="<?php echo $boxes_id ?>" name="del_boxes"><i class="fa fa-trash-o"></i> Delete</button></th>
                                    </form>
                                    <td class="text-center"><a href="index.php?edit_boxes=<?php echo $boxes_id ?>" style="color:white;">
                                    <button class="btn btn-primary" name="edit_boxes"><i class="fa fa-edit"></i> Edit</button></a></td>
                                </tr>


                                <?php }?>

                                <?php 
                                    if(isset($_POST['del_boxes'])){
                                        $select_  = "DELETE from boxes where box_id = '$boxes_id'";
                                        $run_cus = mysqli_query($db,$select_);
                                        if($run_cus){
                                            //echo "<script>alert('One Categories has been deleted')</script>";
                                            echo "<script>window.open('index.php?view_boxes','_self')</script>";
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