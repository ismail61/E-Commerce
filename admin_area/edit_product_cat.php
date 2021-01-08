<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Edit product Categories</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> Edit product Categories
            </li>
        </div>
    </div>
</div>
<?php 
    if(isset($_GET['edit_product_cat'])){
        $p_cat_id = $_GET['edit_product_cat'];
        $row = mysqli_fetch_array (mysqli_query($db,"select * from product_categories where p_cat_id = '$p_cat_id'"));
        $p_cat_title = $row['p_cat_title'];
        $p_cat_description = $row['p_cat_description'];
    }
?>
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Product Categories Title</label>
                <input type="text" value="<?php echo $p_cat_title ?>" name="p_cat_title" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Product Categories Description</label>
                <textarea name="p_cat_description" rows="6" cols="6" style="resize: vertical;" class="form-control"><?php echo $p_cat_description ?></textarea>
            </div>
            <center>
                <button class="btn btn-success btn-lg" name="p_cat_edit" type="submit">Edit Now</button>
            </center>
        </form>
        <br>
        <?php 
            if(isset($_POST['p_cat_edit'])){
                $p_cat_title = $_POST['p_cat_title'];
                $p_cat_description = $_POST['p_cat_description'];
                $run = mysqli_query($db,"UPDATE product_categories SET 
                p_cat_title = '$p_cat_title', p_cat_description = '$p_cat_description' where p_cat_id = '$p_cat_id' ;");
                if($run){
                    echo "<script>alert('Product categories has been Edited')</script>";
                    echo "<script>window.open('index.php?view_product_cat','_self')</script>";
                }
            }
        ?>
    </div>
</div>


    <?php }?>