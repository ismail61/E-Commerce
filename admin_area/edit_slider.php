<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Edit Slider</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> Edit Slider
            </li>
        </div>
    </div>
</div>
<?php 
    if(isset($_GET['edit_slider'])){
        $slider_id = $_GET['edit_slider'];
        $row = mysqli_fetch_array(mysqli_query($db,"SELECT * from slider where id = '$slider_id'"));
        $slider_name = $row['slider_name'];
        $slider_url = $row['slider_url'];
        $slider_image = $row['slider_image'];
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <h3><i class="fa fa-money"></i> Edit Slider</h3>
                </div>
            </div>
        
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label">Slider Name</label>
                        <input type="text" value="<?php echo $slider_name ?>" name="slider_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slider URL</label>
                        <input type="url" value="<?php echo $slider_url ?>" name="slider_url" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slider Image</label>
                        <input type="file" name="slider_image" class="form-control">
                    </div>
                    <img src="slides_images/<?php echo $slider_image ?>" width="200px" height="180px"  class="img-responsive img-thumbnail img-rounded">
                    <center>
                        <button class="btn btn-success btn-lg" name="slider_edit" type="submit">Edit Now</button>
                    </center>
                </form>
                <?php 
                    if(isset($_POST['slider_edit'])){

                        $slider_name = $_POST['slider_name'];
                        $slider_url = $_POST['slider_url'];
                        $slider_image = $_FILES['slider_image']['name'];
                        if($slider_image!=NULL){

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
                                $slider_image_tmp_name = $_FILES['slider_image']['tmp_name'];
                                move_uploaded_file($slider_image_tmp_name,"slides_images/$slider_image");
                                $run = mysqli_query($db,"UPDATE slider SET 
                                slider_name='$slider_name',slider_url='$slider_url',slider_image='$slider_image' where id='$slider_id'");
                                if($run){
                                    //echo "<script>alert('This Slider has been Edited')</script>";
                                    echo "<script>window.open('index.php?view_slider','_self')</script>";
                                }
                            }
                        }
                        else{
                            $run = mysqli_query($db,"UPDATE slider SET slider_name='$slider_name',slider_url='$slider_url' where id='$slider_id'");
                            if($run){
                                //echo "<script>alert('This Slider has been Edited')</script>";
                                echo "<script>window.open('index.php?view_slider','_self')</script>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
        
        <br>
       
    </div>
</div>



    <?php }?>