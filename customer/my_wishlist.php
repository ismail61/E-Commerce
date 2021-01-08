<div class="panel panel-primary">
    <div class="panel-heading text-center">
        <i class="fa fa-money"></i> My WishList
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Product Id</th>
                        <th>Product Title</th>
                        <th>Product Image</th>
                    </tr>
                </thead>
                <?php 
                    $i = 0;
                    $select ="SELECT * from wishlist";
                    $run_wish = mysqli_query($db,$select);
                    while($row = mysqli_fetch_array($run_wish)){
                        $i++;
                        $product_id = $row['p_id'];
                        $select_pro = "SELECT p_title,p_img1 from products where p_id = '$product_id'";
                        $row_pro = mysqli_fetch_array(mysqli_query($db,$select_pro));
                        $product_title = $row_pro['p_title'];
                        $product_image = $row_pro['p_img1'];
                        
                ?>
                    <tbody>
                        <tr>
                            <th><?php echo $i ?></th>
                            <th><a href="../details.php?p_id=<?php echo $product_id ?>">
                            <?php echo $product_id ?></a></th>
                            <th><a href="../details.php?p_id=<?php echo $product_id ?>"><?php echo $product_title ?></a></th>
                            <th><a href="../details.php?p_id=<?php echo $product_id ?>">
                            <img height="100px" width="80px" src="../admin_area/product_images/upload_image/<?php echo $product_image ?>"></a></th>
                        </tr>
                    </tbody>

                <?php } ?>
            </table>
        </div>
    </div>
</div>