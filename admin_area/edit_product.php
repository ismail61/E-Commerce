<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
    
    if(isset($_GET['edit_product'])){
        $p_id = $_GET['edit_product'];
        $select = "SELECT * from products where p_id = $p_id";
        $run =mysqli_query($db,$select);
        $row = mysqli_fetch_array($run);
        $p_cat_id= $row['p_cat_id'];
        $cat_id = $row['cat_id'];
        $p_title = $row['p_title'];
        $p_img1 = $row['p_img1'];
        $p_img2 = $row['p_img2'];
        $p_img3 = $row['p_img3'];
        $p_price = $row['p_price'];
        $p_keyword = $row['p_keyword'];
        $p_color1 = $row['p_color1'];
        $p_color2 = $row['p_color2'];
        $p_color3 = $row['p_color3'];
        $p_total_count = $row['p_total_count'];
        $description_id = $row['description_id'];
        $cat = "SELECT p_cat_title from product_categories where p_cat_id = $p_cat_id";
        $run_cat = mysqli_query($db,$cat);
        $p_cat_title = mysqli_fetch_array($run_cat)['p_cat_title'];

        $c = "SELECT cat_title from categories where cat_id = $cat_id";
        $run_c = mysqli_query($db,$c);
        $cat_title = mysqli_fetch_array($run_c)['cat_title'];
    }
?>

<div class="row"><!-- breadcrumb row start-->
    <div class="col-lg-12" style="margin-top: 5px;">
        <h2 class="text-center">Edit Product </h2><hr>
        <div class="breadcrumb">
            <i class="fa fa-dashboard"></i> DashBoard >> Edit Product >> <?php echo $p_id ?>
        </div>
    </div>
</div><!-- breadcrumb row end-->
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <!--box start-->               
            <div class=" box col-lg-12">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data" style="margin-top: 30px;">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"><h4 style="margin:0;">Product Title : </h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>                             
                            <input type="text" name="product_title" class="form-control" value="<?php echo $p_title ?>" required>                               
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"><h4 style="margin:0;"> Product Category :</h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>
                            <select class="form-control" name="product_category" value="<?php echo $p_cat_id ?>" required>
                                <option value="<?php echo $p_cat_id ?>"><?php echo $p_cat_title ?></option>
                                <?php 
                                    $get_p_cat = "select * from product_categories";
                                    $run_p_cat = mysqli_query($db,$get_p_cat);
                                    while ($row = mysqli_fetch_array($run_p_cat)) {
                                        $p_cat_id = $row['p_cat_id'];
                                        $p_cat_title = $row['p_cat_title'];
                                        
                                        echo "
                                            <option value='$p_cat_id'>$p_cat_title</option>
                                        ";
                                    }
                                ?>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"><h4 style="margin:0;"> Categories :</h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>
                            <select name="categories" class=" form-control" required>
                                <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
                                <?php 
                                    $get_cat = "select * from categories";
                                    $run_cat = mysqli_query($db,$get_cat);
                                    while ($row = mysqli_fetch_array($run_cat)) {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        echo "
                                            <option value='$cat_id'>$cat_title</option>
                                        ";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"><h4 style="margin:0;">Product Image 1 :<span style="color: red; font-size:14px;"><b>(Max 5 MB)</b></span></h4></label><span style="color: red; font-size: 17=8px;"><sup><b> *</b></sup></span>                               
                            <input type="file"  value="<?php echo $p_img1 ?>" name="product_img1" class="form-control"> 
                        </div>
                        <img style="margin-left: 30px; margin-top: 5px;" src="product_images/upload_image/<?php echo $p_img1 ?>" class="img-thumbnail" width="100px" height="120px">                               
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"><h4 style="margin:0;">Product Image 2 :<span style="color: red; font-size:14px;"><b>(Max 5 MB)</b></span></h4></label><span style="color: red; font-size: 19px;"><sup><b> *</b></sup></span>                               
                            <input type="file"  value="<?php echo $p_img2 ?>" name="product_img2" class="form-control">  
                        </div>
                        <img style="margin-left: 30px; margin-top: 5px;" src="product_images/upload_image/<?php echo $p_img2 ?>" class="img-thumbnail" width="100px" height="120px"> 
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"><h4 style="margin:0;">Product Image 3 :<span style="color: red; font-size:14px;"><b>(Max 5 MB)</b></span></h4></label><span style="color: red; font-size: 19px;"><sup><b> *</b></sup></span>                               
                            <input type="file"  value="<?php echo $p_img3 ?>" name="product_img3" class="form-control" >
                        </div>
                        <img style="margin-left: 30px; margin-top: 5px;" src="product_images/upload_image/<?php echo $p_img3 ?>" class="img-thumbnail" width="100px" height="120px"> 
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><h4 style="margin:0;">Product Price :</h4></label>   <span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>                            
                            <input type="number" name="product_price" value="<?php echo $p_price ?>" class="form-control" required>  
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><h4 style="margin:0;">Product Keyword:</h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>                               
                            <input type="text" value="<?php echo $p_keyword ?>" name="product_keyword" class="form-control" required>
                        </div>                             
                    </div>  
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><h4 style="margin:0;">Exists Item:</h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>                               
                            <input type="number" name="exists_item" value="<?php echo $p_total_count ?>" class="form-control" required> 
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><h4 style="margin:0;">Description Id:</h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>                              
                            <select name="product_description_id" class="form-control" required>
                                <option><?php echo $description_id ?></option>
                                <?php 
                                    $get_description = "SELECT description_id from phone_description";
                                    $run_description = mysqli_query($db,$get_description);
                                    while($row_description = mysqli_fetch_array($run_description)){
                                        $description_id = $row_description['description_id'];
                                        echo "<option value='$description_id'>$description_id</option>";
                                    }
                                ?>
                            </select>  
                        </div>                              
                    </div>  
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label"><h4 style="margin:0;">Product Color1 :</h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>                            
                            <input type="text" value="<?php echo $p_color1 ?>" name="product_color1" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><h4 style="margin:0;">Product Color2 :</h4></label>                               
                            <input type="text" value="<?php echo $p_color2 ?>" name="product_color2" class="form-control">
                        </div> 
                        <div class="col-md-4">
                            <label class="control-label"><h4 style="margin:0;">Product Color3 :</h4></label>                               
                            <input type="text" value="<?php echo $p_color3 ?>" name="product_color3" class="form-control"> 
                        </div>                              
                    </div>
                    <center>
                        <div class="form-group">
                            <input type="submit" name="edit_pro" value="Edit Product" class="btn btn-success btn-lg" >
                        </div>  
                    </center>       
                </form>  
                
            </div>
            <!--box end-->
        </div>
    </div>
</div>

<?php 
    edit_product($p_id);
?>


<?php } ?>