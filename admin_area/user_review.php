<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">User Review</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> User Review
            </li>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4 style="margin: 0;" class="text-center"><i class="fa fa-star"></i> User Review</h4>
                </div>                    
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No </th>
                                <th>Product Id </th>
                                <th>Customer username </th>
                                <th>Review Date </th>
                                <th>Review Title </th>
                                <th>Review Message </th>
                                <th>Review Point </th>
                                <th>Replied Message By Admin</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 0;
                                $select ="SELECT * from user_review";
                                $run = mysqli_query($db,$select);
                                while($row = mysqli_fetch_assoc($run)){
                                    $i++;
                                    $product_id = $row['p_id'];
                                    $review_id = $row['review_id'];
                                    $customer_username = $row['review_user_name'];
                                    $date = $row['review_user_date'];
                                    $review_title = $row['review_title'];                                  
                                    $review_message = $row['review_message'];                                  
                                    $review_point = $row['rating_point'];                                  
                                    $replied_message = $row['replied'];                                  
                            ?>
                            <tr>
                                <th class="text-center"><?php echo $i ?></th>
                                <th class="text-center"><?php echo $product_id ?></th>
                                <th><?php echo $customer_username ?></th>
                                <th><?php echo $date ?></th>
                                <th><?php echo $review_title ?></th>
                                <th><?php echo $review_message ?></th>
                                <th class="text-center"><?php echo $review_point ?></th>
                                <form method="post" enctype="multipart/form-data">
                                    <?php 
                                        if($replied_message==NULL OR strlen($replied_message)==0){
                                            
                                            ?>
                                            <th class='text-center'>
                                            <textarea placeholder="Reply Here.Then Click The Reply Button" style='resize:vertical;' name='replied' class='form-control'></textarea></th>
                                        <?php 
                                        }
                                        else{
                                            ?>
                                            <th class='text-center'>
                                            <textarea style='resize:vertical;' name='replied' class='form-control'><?php echo $replied_message ?></textarea></th>
                                        <?php } ?>
                                    
                                
                                    <th class="text-center">
                                        
                                        <button value="<?php echo $review_id ?>" class="btn btn-primary" name="replied_message" type="submit">Reply</button>
                                        
                                    </th> 
                                </form>                               
                            </tr>
                                <?php } ?>
                        </tbody>
                        <?php 
                            if(isset($_POST['replied_message'])){
                                $review_id = $_POST['replied_message'];
                                $replied_message = $_POST['replied'];
                                $update = "UPDATE user_review SET review_user_date = '$date', replied ='$replied_message',replied_date = NOW() where review_id = '$review_id' ";
                                $run_update = mysqli_query($db,$update);
                                if($run_update){
                                    echo "<script>window.open('index.php?user_review','_self')</script>";
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>


<?php }?>