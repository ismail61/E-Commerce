<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Insert product Categories</h2>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> Insert product Categories
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Product Categories Title</label>
                <input type="text" name="p_cat_title" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Product Categories Description</label>
                <textarea name="p_cat_description" rows="6" cols="6" style="resize: vertical;" class="form-control"></textarea>
            </div>
            <center>
                <button class="btn btn-success btn-lg" name="p_cat_insert" type="submit">Insert Now</button>
            </center>
        </form><br>
        <?php 
            if(isset($_POST['p_cat_insert'])){
                $p_cat_title = $_POST['p_cat_title'];
                $p_cat_description = $_POST['p_cat_description'];
                $run = mysqli_query($db,"INSERT INTO product_categories(p_cat_title,p_cat_description) Values('$p_cat_title','$p_cat_description');");
                if($run){
                    //echo "<script>alert('New Product categories has been inserted')</script>";
                    echo "<script>window.open('index.php?view_product_cat','_self')</script>";
                }
            }
        ?>
    </div>
</div>


    <?php }?>