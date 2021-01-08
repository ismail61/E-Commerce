<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Edit Categories</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> Edit Categories
            </li>
        </div>
    </div>
</div>
<?php 
    if(isset($_GET['edit_cat'])){
        $cat_id = $_GET['edit_cat'];
        $row = mysqli_fetch_array (mysqli_query($db,"select * from categories where cat_id = '$cat_id'"));
        $cat_title = $row['cat_title'];
        $cat_description = $row['cat_description'];
    }
?>
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Categories Title</label>
                <input type="text" value="<?php echo $cat_title ?>" name="cat_title" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Categories Description</label>
                <textarea name="cat_description" rows="6" cols="6" style="resize: vertical;" class="form-control"><?php echo $cat_description ?></textarea>
            </div>
            <center>
                <button class="btn btn-success btn-lg" name="cat_edit" type="submit">Edit Now</button>
            </center>
        </form>
        <br>
        <?php 
            if(isset($_POST['cat_edit'])){
                $cat_title = $_POST['cat_title'];
                $cat_description = $_POST['cat_description'];
                $run = mysqli_query($db,"UPDATE categories SET 
                cat_title = '$cat_title', cat_description = '$cat_description' where cat_id = '$cat_id' ;");
                if($run){
                    //echo "<script>alert('Categories has been Edited')</script>";
                    echo "<script>window.open('index.php?view_cat','_self')</script>";
                }
                else{
                    echo "<script>alert('Categories has Not been Edited')</script>";
                }
            }
        ?>
    </div>
</div>


    <?php }?>