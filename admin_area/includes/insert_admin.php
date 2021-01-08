<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Insert Admin</h2><br>
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard >> Insert Admin
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 style="margin: 0;" class="text-center">
                    Insert New Admin
                </h4>
            </div>
            <div class="panel-body">
                <form enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label class="control-label">Admin Name :</label>
                        <input type="text" name="admin_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Admin Email :</label>
                        <input type="email" name="admin_email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Admin password :</label>
                        <input type="password" name="admin_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Admin Phone :</label>
                        <input type="number" name="admin_phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Admin Image :</label>
                        <input type="file" name="admin_image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Admin Job :</label>
                        <input type="text" name="admin_job" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Admin About :</label>
                        <input type="text" name="admin_about" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Admin Address :</label>
                        <input type="text" name="admin_address" class="form-control" required>
                    </div>
                    <center>
                        <button type="submit" name="insert_admin" class="btn btn-success btn-lg text-center">Insert</button>
                    </center> 
                </form>
            </div>
        </div>        
        <?php 
            if(isset($_POST['insert_admin'])){
                $admin_name = $_POST['admin_name'];
                $admin_email = $_POST['admin_email'];
                $admin_password = $_POST['admin_password'];
                $admin_phone = $_POST['admin_phone'];
                $admin_image = $_FILES['admin_image']['name'];
                $admin_job = $_POST['admin_job'];
                $admin_about = $_POST['admin_about'];
                $admin_address = $_POST['admin_address'];
                $allowed = array(   "jpg" => "image/jpg",
                                    "jpeg" => "image/jpeg", 
                                    "gif" => "image/gif",
                                    "png" => "image/png"
                                );
                $ext1 = pathinfo($admin_image,PATHINFO_EXTENSION);
                
                if(!array_key_exists($ext1,$allowed)){
                    echo "<script>alert('This file is not valid')</script>";
                }
                else{
                    $admin_image_tmp_name = $_FILES['admin_image']['tmp_name'];
                    move_uploaded_file($admin_image_tmp_name,"admin_images/$admin_image");
                    $insert = "INSERT INTO admins(admin_name,admin_email,admin_password,admin_phone,
                    admin_image,admin_job,admin_about,admin_address) 
                    Values('$admin_name','$admin_email','$admin_password','$admin_phone',
                    '$admin_image','$admin_job','$admin_about','$admin_address');";
                    if(mysqli_query($db,$insert)){
                        //echo "<script>alert('One new admin has been inserted')</script>";
                        echo "<script>window.open('index.php?view_admins','_self')</script>";
                    }
                    else{
                        echo "<script>alert('email is already exists')</script>";
                    }
                }
            }
        ?>
        <br>
       
    </div>
</div>



    <?php }?>