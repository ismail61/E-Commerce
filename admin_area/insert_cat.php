<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Insert Categories</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> Insert Categories
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Categories Title</label>
                <input type="text" name="cat_title" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Categories Description</label>
                <textarea name="cat_description" rows="6" cols="6" style="resize: vertical;" class="form-control"></textarea>
            </div>
            <center>
                <button class="btn btn-success btn-lg" name="cat_insert" type="submit">Insert Now</button>
            </center>
        </form>
        <br>
        <?php 
            if(isset($_POST['cat_insert'])){
                $cat_title = $_POST['cat_title'];
                $cat_description = $_POST['cat_description'];
                $run = mysqli_query($db,"INSERT INTO categories(cat_title,cat_description) Values('$cat_title','$cat_description');");
                if($run){
                    //echo "<script>alert('New Product categories has been inserted')</script>";
                    echo "<script>window.open('index.php?view_cat','_self')</script>";
                }
            }
        ?>
    </div>
</div>


    <?php }?>