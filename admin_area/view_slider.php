<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">View Sliders</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> View Sliders
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3 class="panel-title">
                    <i class="fa fa-money"></i> Sliders
                </h3>
            </div>
            <div class="panel-body">
                <?php 
                    $select = "SELECT * from slider";
                    $run = mysqli_query($db,$select);
                    while($row = mysqli_fetch_array($run)){
                    $slider_id = $row['id'];
                    $slider_name = $row['slider_name'];
                    $slider_image = $row['slider_image'];
                ?>
                <div class="col-md-6 col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:0;" class="text-center">
                                <?php  echo $slider_name ?>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <img src="slides_images/<?php echo $slider_image ?>" class="img-responsive img-rounded">
                        </div>
                        <div class="panel-footer" style="height: 45px;">
                            <form method="post">
                                <button name="del_slider" style="margin-bottom: 6px; " type="submit" class=" btn btn-danger btn-sm pull-left">
                                    <i class="fa fa-trash-o"></i> Delete
                                </button>
                            </form>
                            
                            <div class="pull-right">
                                <a href="index.php?edit_slider=<?php echo $slider_id ?>" style="color:white;">
                                <button class="btn btn-primary" style="margin-bottom: 6px; " name="edit_cat"><i class="fa fa-edit"></i> Edit</button></a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php 
                if(isset($_POST['del_slider'])){
                    
                    $delete = "DELETE from slider where id = '$slider_id'";
                    $run_ = mysqli_query($db,$delete);
                    if($run_){
                        echo "<script>alert('One Slider has been deleted $slider_id')</script>";
                        echo "<script>window.open('index.php?view_slider','_self')</script>";
                    }
                    else{
                        echo "<script>alert('One Slider has not been deleted $slider_id')</script>";
                    }
                }
            ?>
        </div>
    </div>
</div>


    <?php }?>