
<div class="box">
    <div class="box-header" style="margin-bottom: 10px;">
        <center>
            <h2>Log In </h2>
            <p class="lead">Already Our Customer</p>
        </center>
    </div>
    <form action="checkout.php" method="POST">
        <div class="form-group">
            <label class="control-label">UserName : </label>
            <input type="text" placeholder="Enter Your Username" name="customer_username" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="control-label">Password : </label>
            <input type="password" placeholder="Enter Your Password" name="customer_password" class="form-control" required>
        </div>
        <div class="text-center">
            <button name="login" value="login" class="btn btn-primary btn-lg"><i class="fa fa-sign-in"></i> &nbsp; Log In</button>
        </div>
    </form>
    <center>
        <h3>No Account .Please <a href="customer_register.php">Register</a></h3>
    </center>
</div>

<?php 
    if(isset($_POST['login'])){
        $customer_username = $_POST['customer_username'];
        $customer_password = $_POST['customer_password'];
        $check_user = "select * from customer where customer_username='$customer_username'
         AND customer_password= '$customer_password'";
        $run_check_user = mysqli_query($db,$check_user);
        $valid_user_check = mysqli_num_rows($run_check_user);

        if($valid_user_check==0){
            echo "<script>alert('Email/Password Wrong')</script>";
            exit();
        }
        else{
            $client_ip = get_client_ip();
            $check_cart = "select * from cart where ip_address='$client_ip'";
            $run_check_cart = mysqli_query($db,$check_cart);
            $row_cart = mysqli_num_rows($run_check_cart);
            if($row_cart>0){
                $_SESSION['customer_username'] = $customer_username;
                //echo "<script>alert('You are Logged in')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }
            else{
                $_SESSION['customer_username'] = $customer_username;
                //echo "<script>alert('You are Logged in')</script>";
                echo "<script>window.open('customer/my_account.php?my_order','_self')</script>";
            }   
        }
    }

?>
