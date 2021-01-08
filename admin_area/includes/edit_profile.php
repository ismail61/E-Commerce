<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">My Account</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> My Account
            </li>
        </div>
    </div>
</div>
<?php 
    $admin_email = $_SESSION['admin_email'];
    $select = "SELECT * from admins where admin_email = '$admin_email'";
    $row = mysqli_fetch_array(mysqli_query($db,$select));
    $admin_phone = $row['admin_phone'];
    $admin_image = $row['admin_image'];
    $admin_name = $row['admin_name'];
    $admin_about = $row['admin_about'];
    $admin_job = $row['admin_job'];
?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12 col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h2 class="text-center">Change Information</h2>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label  class="control-label">Email : </label>
                            <input type="email" value="<?php echo $admin_email ?>" name="admin_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label  class="control-label">Phone :</label>
                            <input type="number" value="<?php echo $admin_phone ?>" name="admin_phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label  class="control-label">Name :</label>
                            <input type="text" value="<?php echo $admin_name ?>" name="admin_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label  class="control-label">Job :</label>
                            <input type="text" value="<?php echo $admin_job ?>" name="admin_job" class="form-control">
                        </div>
                        <div class="form-group">
                            <label  class="control-label">About :</label>
                            <input type="text" value="<?php echo $admin_about ?>" name="admin_about" class="form-control">
                        </div>
                        <center>
                            <button class="btn btn-success btn-lg" name="change_info" type="submit">Change</button>
                        </center>
                    </form>
                    <?php 
                        if(isset($_POST['change_info'])){
                            $admin_email = $_POST['admin_email'];
                            $admin_phone = $row['admin_phone'];
                            $admin_name = $_POST['admin_name'];
                            $admin_job = $_POST['admin_job'];
                            $admin_about = $_POST['admin_about'];
                            $change = "UPDATE admins SET admin_email = '$admin_email',admin_phone = '$admin_phone',
                            admin_name = '$admin_name', admin_job = '$admin_job' , admin_about = '$admin_about'
                             where 
                            admin_email= '$admin_email'";
                            $run = mysqli_query($db,$change);
                            if($run){
                                echo "<script>window.open('profile.php','_self')</script>";
                            }                            
                            else{
                                echo "<script>alert('Password Wrong')</script>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h2 class="text-center">My Profile</h2>
                    </div>               
                </div>
                <div class="panel-body">
                    <div class="col-md-8">
                        <h4 style="margin: 0 ;"><b>Email : </b> <?php echo $admin_email ?></h4><br>
                        <h4 style="margin: 0 ;"><b>Phone : </b> <?php echo $admin_phone ?></h4><br>
                        <h4 style="margin: 0 ;"><b>Name : </b> <?php echo $admin_name ?></h4><br>
                        <h4 style="margin: 0 ;"><b>Job : </b> <?php echo $admin_job ?></h4><br>
                        <h4 style="margin: 0 ;"><b>About : </b> <?php echo $admin_about ?></h4><br>
                    </div>
                    <div class="col-md-4">
                        <img src="admin_images/<?php echo $admin_image ?>" class= "img-rounded img-responsive">
                    </div>
                    
                </div>
            </div>
            <a href="index.php?profile"><h3 class="text-right">Change Password</h3></a>
        </div>
    </div>
</div>


<?php }?>