<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Insert Slider</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> Insert Slider
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <h3><i class="fa fa-money"></i> Insert Slider</h3>
                </div>
            </div>
        
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label">Slider Name</label>
                        <input type="text" name="slider_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slider URL</label>
                        <input type="url" name="slider_url" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slider Image</label>
                        <input type="file" name="slider_image" class="form-control" required>
                    </div>
                    <center>
                        <button class="btn btn-success btn-lg" name="slider_insert" type="submit">Insert Now</button>
                    </center>
                </form>
            </div>
        </div>
        
        <br>
        <?php 
            if(isset($_POST['slider_insert'])){

                $slider_name = $_POST['slider_name'];
                $slider_url = $_POST['slider_url'];
                $slider_image = $_FILES['slider_image']['name'];
                $slider_image_size = $_FILES['slider_image']['size'];
                $allowed = array(   "jpg" => "image/jpg",
                                    "jpeg" => "image/jpeg", 
                                    "gif" => "image/gif",
                                    "png" => "image/png"
                                );
                $ext1 = pathinfo($slider_image,PATHINFO_EXTENSION);
                $max_size = 5 * 1024 * 1024;
                if(!array_key_exists($ext1,$allowed)){
                    echo "<script>alert('This file is not valid')</script>";
                }
                else if($slider_image_size>$max_size){
                    echo "<script>alert('This file is greater than 5 MB')</script>";
                }
                else{
                    $check = "select * from slider";
                    $run = mysqli_num_rows(mysqli_query($db,$check));
                    if($run<4){
                        $slider_image_tmp_name = $_FILES['slider_image']['tmp_name'];
                        move_uploaded_file($slider_image_tmp_name,"slides_images/$slider_image");
                        $run = mysqli_query($db,"INSERT INTO slider(slider_name,slider_url,slider_image)
                         Values('$slider_name','$slider_url','$slider_image');");
                        if($run){
                            //echo "<script>alert('New Slider has been inserted')</script>";
                            echo "<script>window.open('index.php?view_slider','_self')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('You have already 4 slider in your database')</script>";
                    }
                }
            }
        ?>
    </div>
</div>


    <?php }?>