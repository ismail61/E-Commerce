<div class="box">
    <center>
        <h1>Change Your Password</h1><br>
    </center><hr>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="margin-top: 40px;">
            <label> Enter Your Old Password :</label>
            <input type="password" class="form-control" name="old_password" required>
        </div>
        <div class="form-group">
            <label> Enter New Password :</label>
            <input type="password" class="form-control" name="new_password" required>
        </div>
        <div class="form-group">
            <label> Confirm New Password :</label>
            <input type="password" class="form-control" name="confirm_new_password" required>
        </div>
        <div class="text-center">
            <button type="submit" name="change_password" class="btn btn-success btn-lg"><i class="fa fa-refresh"></i>&nbsp; Update</button>
        </div>
    </form>
</div>

<?php 
    if(isset($_POST['change_password'])){

        $customer_username = $_SESSION['customer_username'];
        $select = "SELECT customer_password from customer where customer_username = '$customer_username'";
        $run = mysqli_query($db,$select);
        $row = mysqli_fetch_array($run);
        $customer_password = $row['customer_password'];

        $customer_old_password = $_POST['old_password'];
        $customer_new_password = $_POST['new_password'];
        $customer_confirm_password = $_POST['confirm_new_password'];
        if($customer_password!=$customer_old_password){
            echo "<script>alert('Old Password does not match')</script>";
        }
        else if($customer_new_password!=$customer_confirm_password){
            echo "<script>alert('New and Old password does not match')</script>";
        }
        else{
            $insert_password = "UPDATE customer SET customer_password = '$customer_new_password' 
            where customer_username = '$customer_username' AND customer_password='$customer_password'";
            $run_password = mysqli_query($db,$insert_password);
            if($run_password){
                echo "<script>alert('Password Changed')</script>";
                echo "<script>window.open('../logout.php','_self')</script>";
            }
        }
    }
?>