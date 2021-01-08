<?php 
    $customer_username = $_SESSION['customer_username'];
    $get_customer = "select * from customer where customer_username = '$customer_username';";
    $run_customer = mysqli_query($db,$get_customer);
    $row = mysqli_fetch_array($run_customer);
    $customer_name = $row['customer_name'];
    $customer_id = $row['customer_id'];
    $customer_email = $row['customer_email'];
    $customer_phone = $row['customer_phone'];
    $customer_division = $row['customer_division'];
    $customer_district = $row['customer_district'];
    $customer_thana = $row['customer_thana'];
    $customer_address = $row['customer_address'];
    $customer_image = $row['customer_image'];
?>

<div class="box" >
    <div class="box-header"><!--box header start-->
        <center>
            <h2>Edit Your Account</h2>
        </center>
    </div><!--box header end-->
    <form action="" method="post" enctype="multipart/form-data"
     class="form-horizontal" style="margin-top: 40px;">
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">Name:</h4></label>
            <div class="col-sm-10">
                <input type="text" name="c_name" value="<?php echo $customer_name ?>" class="form-control">
            </div>
            
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;"> Email :</h4></label>
            <div class="col-sm-10">
                <input type="email" name="c_email" value="<?php echo $customer_email ?>" class="form-control">
            </div>
            
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">Phone :</h4></label>
            <div class="col-sm-10">
                <input type="number" name="c_phone" value="<?php echo $customer_phone ?>" class="form-control">
            </div>
            
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;"> UserName:</h4></label>
            <div class="col-sm-10">
                <input type="text" name="c_username" value="<?php echo $customer_username ?>" class="form-control">
            </div>
            
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">Division :</h4></label>
            <div class="col-sm-10">
                <input type="text" name="c_division" value="<?php echo $customer_division ?>" class="form-control">
            </div>   
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">District :</h4></label>
            <div class="col-sm-10">
                <input type="text" name="c_district" value="<?php echo $customer_district ?>" class="form-control">
            </div>   
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">Thana :</h4></label>
            <div class="col-sm-10">
                <input type="text" name="c_thana" value="<?php echo $customer_thana ?>" class="form-control">
            </div>   
        </div>    
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">Address :</h4></label>
            <div class="col-sm-10">
                <input type="text" name="c_address" value="<?php echo $customer_address ?>" class="form-control">
            </div>   
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">Image :</h4></label>
            <div class="col-sm-10">
                <input type="file" name="c_image"  class="form-control">
            </div>   
        </div>
        <img class="img-thumbnail " style="margin-left:130px; " src="customer_images/upload/<?php echo $customer_image ?>" class="img-responsive" height="100px" width="100px">
        <div class="text-center">
            <button type="submit" name="update_profile" class="btn btn-success btn-lg">
                <i class="fa fa-refresh"></i>&nbsp;Update
            </button>
        </div>
    </form>
</div>

<?php 
    if(isset($_POST['update_profile'])){
        $customer_name = $_POST['c_name'];
        $customer_email = $_POST['c_email'];
        $customer_phone = $_POST['c_phone'];
        $customer_username = $_POST['c_username'];
        $customer_division = $_POST['c_division'];
        $customer_district = $_POST['c_district'];
        $customer_thana = $_POST['c_thana'];
        $customer_address = $_POST['c_address'];
        $customer_image = $_FILES['c_image']['name'];
        $customer_image_size = $_FILES['c_image']['size'];

        if($customer_image_size==0 && $_FILES['c_image']['error']){
            $client_ip = get_client_ip();
            $insert_customer = "UPDATE customer SET customer_name='$customer_name',customer_email='$customer_email',customer_phone='$customer_phone',customer_username='$customer_username',
            customer_division='$customer_division',
            customer_district='$customer_district',customer_thana='$customer_thana',customer_address='$customer_address',
            customer_ip_address='$client_ip' where customer_id = '$customer_id';";
            $run_insert_customer = mysqli_query($db,$insert_customer);
            if($run_insert_customer){
                echo "<script>alert('Updated Your Account')</script>";
                echo "<script>window.open('../logout.php','_self')</script>";
            }
            else{
                echo "<script>alert('Not Updated Your Account')</script>";
            }
        }
        else{
            $allowed = array(   "jpg" => "image/jpg",
            "jpeg" => "image/jpeg", 
            "gif" => "image/gif",
            "png" => "image/png"
            );
            $ext1 = pathinfo($customer_image,PATHINFO_EXTENSION);
            $max_size = 5 * 1024 * 1024;//// Verify file size - 5MB maximum

            
            // Verify file extension
            if(!array_key_exists($ext1, $allowed)) {

                echo "<script>alert('Error: Please select a valid file format.')</script>";
            }
            //// Verify file size
            else if(($customer_image_size > $max_size)) {

                echo "<script>alert('Error: File size is larger than the allowed limit.')</script>";
            }
            $customer_image_tmp_name = $_FILES['c_image']['tmp_name'];
            move_uploaded_file($customer_image_tmp_name,"customer_images/upload/$customer_image");
            $client_ip = get_client_ip();
            $insert_customer = "UPDATE customer SET customer_name=$customer_name',customer_email='$customer_email',customer_phone='$customer_phone',customer_username='$customer_username',
            customer_division='$customer_division',
            customer_district='$customer_district',customer_thana='$customer_thana',customer_address='$customer_address',customer_image='$customer_image',
            customer_ip_address='$client_ip' where customer_id = '$customer_id';";
            $run_insert_customer = mysqli_query($db,$insert_customer);
            if($run_insert_customer){
                echo "<script>alert('Updated Your Account')</script>";
                echo "<script>window.open('../logout.php','_self')</script>";
            }
        }    
    }
?>
