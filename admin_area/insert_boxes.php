<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Insert BoXes</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> Insert Boxes
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Boxes Title</label>
                <input type="text" name="boxes_title" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Boxes Url</label>
                <input type="url" name="boxes_url" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Boxes Description</label>
                <textarea name="boxes_description" rows="6" cols="6" style="resize: vertical;" class="form-control"></textarea>
            </div>
            <center>
                <button class="btn btn-success btn-lg" name="boxes_insert" type="submit">Insert Now</button>
            </center>
        </form>
        <br>
        <?php 
            if(isset($_POST['boxes_insert'])){
                $boxes_title = $_POST['boxes_title'];
                $boxes_url = $_POST['boxes_url'];
                $boxes_description = $_POST['boxes_description'];
                $run = mysqli_query($db,"INSERT INTO boxes(box_title,box_description,box_url)
                 Values('$boxes_title','$boxes_description','$boxes_url');");
                if($run){
                    //echo "<script>alert('New Product categories has been inserted')</script>";
                    echo "<script>window.open('index.php?view_boxes','_self')</script>";
                }
            }
        ?>
    </div>
</div>


    <?php }?>