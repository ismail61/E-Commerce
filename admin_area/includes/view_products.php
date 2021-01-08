<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('../login.php','_self')</script>";
    }
    else{
?>

<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">View Products</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> View Products
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Color1</th>
                            <th>Product Color2</th>
                            <th>Product Count</th>
                            <th>Product Date</th>
                            <th>Product Delete</th>
                            <th>Product Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $select_pro = "select * from products";
                            $run_pro = mysqli_query($db,$select_pro);
                            while($row = mysqli_fetch_array($run_pro)){
                                $product_id = $row['p_id'];
                                $product_title = $row['p_title'];
                                $product_image = $row['p_img1'];
                                $product_price = $row['p_price'];
                                $product_color1 = $row['p_color1'];
                                $product_color2 = $row['p_color2'];
                                $product_count = $row['p_total_count'];
                                $product_date = $row['date'];
                            
                        ?>
                        <tr>
                            <td><?php echo $product_id ?> </td>
                            <td><?php echo $product_title ?> </td>
                            <td><img class="img-rounded" width="70px" height="70px" src="product_images/upload_image/<?php echo $product_image ?>" class="img-responsive"></td>
                            <td><?php echo $product_price ?> </td>
                            <td><?php echo $product_color1 ?> </td>
                            <td><?php echo $product_color2 ?> </td>
                            <td><?php echo $product_count ?> </td>
                            <td><?php echo $product_date ?> </td>
                            <form method="post">                               
                                <td class="text-center"><button class="btn btn-danger" type="submit" id="checkBtn" 
                                value="<?php echo $product_id?>" name="del_p"><i class="fa fa-trash-o">    
                                </i> Delete</button></td>
                            </form>    
                            <td class="text-center"><a href="index.php?edit_product=<?php echo $product_id ?>" style="color:white;">
                            <button class="btn btn-primary" name="edit_p"><i class="fa fa-edit"></i> Edit</button></a></td>
                            
                        </tr>
                            <?php } ?>
                    </tbody>
                    <?php 
                        if(isset($_POST['del_p'])){
                            $p_id = $_POST['del_p'];
                            $select = "DELETE from products where p_id = $p_id";
                            $run = mysqli_query($db,$select);
                            if($run){
                                echo "<script>alert('This product has been deleted')</script>";
                                echo "<script>window.open('index.php?view_product','_self')</script>";
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>



<?php }?>