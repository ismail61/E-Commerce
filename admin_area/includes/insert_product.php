<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

<div class="row"><!-- breadcrumb row start-->
    <div class="col-lg-12" style="margin-top: 5px;">
        <h2 class="text-center">Insert Product</h2><hr>
        <div class="breadcrumb">
            <i class="fa fa-dashboard"></i> DashBoard >> Insert Product 
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
                        <label class="control-label"><h4 style="margin:0;">Product Title : </h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>                             
                        <input type="text" name="product_title" class="form-control" required>                               
                    </div>
                    <div class="form-group">
                        <label class="control-label"><h4 style="margin:0;"> Product Category :</h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>
                        <select class="form-control" name="product_category" required>
                            <option>Select a product category</option>
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
                    <div class="form-group">
                    <label class="control-label"><h4 style="margin:0;"> Categories :</h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>
                    <select name="categories" class=" form-control" required>
                        <option>Select a categories</option>
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
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label"><h4 style="margin:0;">Product Image 1 :<span style="color: red; font-size:14px;"><b>(Max 5 MB)</b></span></h4></label><span style="color: red; font-size: 17=8px;"><sup><b> *</b></sup></span>                               
                            <input type="file" name="product_img1" class="form-control" required> 
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><h4 style="margin:0;">Product Image 2 :<span style="color: red; font-size:14px;"><b>(Max 5 MB)</b></span></h4></label><span style="color: red; font-size: 19px;"><sup><b> *</b></sup></span>                               
                            <input type="file" name="product_img2" class="form-control" required>  
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><h4 style="margin:0;">Product Image 3 :<span style="color: red; font-size:14px;"><b>(Max 5 MB)</b></span></h4></label><span style="color: red; font-size: 19px;"><sup><b> *</b></sup></span>                               
                            <input type="file" name="product_img3" class="form-control" required>
                        </div>
                                                      
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><h4 style="margin:0;">Product Price :</h4></label>   <span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>                            
                            <input type="number" name="product_price" class="form-control" required>  
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><h4 style="margin:0;">Product Keyword:</h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>                               
                            <input type="text" name="product_keyword" class="form-control" required>
                        </div>                             
                    </div>  
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><h4 style="margin:0;">Exists Item:</h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>                               
                            <input type="number" name="exists_item" class="form-control" required> 
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><h4 style="margin:0;">Description Id:</h4></label><span style="color: red; font-size: 17px;"><sup><b> *</b></sup></span>                              
                            <select name="product_description_id" class="form-control" required>
                                <option>Select a description</option>
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
                            <input type="text" name="product_color1" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><h4 style="margin:0;">Product Color2 :</h4></label>                               
                            <input type="text" name="product_color2" class="form-control">
                        </div> 
                        <div class="col-md-4">
                            <label class="control-label"><h4 style="margin:0;">Product Color3 :</h4></label>                               
                            <input type="text" name="product_color3" class="form-control"> 
                        </div>                              
                    </div>
                    <center>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Insert Product" class="btn btn-success btn-lg" >
                        </div>  
                    </center>       
                </form>  
                
            </div>
            <!--box end-->
        </div>
    </div>
</div>

<?php 
    upload_products();
?>


<?php } ?>