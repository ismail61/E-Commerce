<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Edit Boxes</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> Edit Boxes
            </li>
        </div>
    </div>
</div>
<?php 
    if(isset($_GET['edit_boxes'])){
        $boxes_id = $_GET['edit_boxes'];
        $row = mysqli_fetch_array (mysqli_query($db,"select * from boxes where box_id = '$boxes_id'"));
        $boxes_title = $row['box_title'];
        $boxes_url = $row['box_url'];
        $boxes_description = $row['box_description'];
    }
?>
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Boxes Title</label>
                <input type="text" value="<?php echo $boxes_title ?>" name="boxes_title" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Boxes Url</label>
                <input type="url" value="<?php echo $boxes_url ?>" name="boxes_url" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Boxes Description</label>
                <textarea name="boxes_description" rows="6" cols="6" style="resize: vertical;" class="form-control"><?php echo $boxes_description ?></textarea>
            </div>
            <center>
                <button class="btn btn-success btn-lg" name="boxes_edit" type="submit">Edit Now</button>
            </center>
        </form>
        <br>
        <?php 
            if(isset($_POST['boxes_edit'])){
                $boxes_title = $_POST['boxes_title'];
                $boxes_url = $_POST['boxes_url'];
                $boxes_description = $_POST['boxes_description'];
                $run = mysqli_query($db,"UPDATE boxes SET 
                box_title = '$boxes_title',box_url='$boxes_url', box_description = '$boxes_description' where box_id = '$boxes_id' ;");
                if($run){
                    //echo "<script>alert('Categories has been Edited')</script>";
                    echo "<script>window.open('index.php?view_boxes','_self')</script>";
                }
                else{
                    echo "<script>alert('Boxes has Not been Edited')</script>";
                }
            }
        ?>
    </div>
</div>


    <?php }?>