<?php 
if(isset($_GET['email'])){
    session_start();
    include("includes/db.php");
    $admin_email = $_GET['email'];
    $msg = "";
    if(isset($_POST['verify_otp'])){
        $otp = $_POST['otp'];
        $select = "select otp from admins where admin_email = '$admin_email'";
        $run = mysqli_query($db,$select);
        $row = mysqli_fetch_array($run);
        $db_otp = $row['otp'];
        if($otp==$db_otp){
            $_SESSION['admin_email'] = $admin_email;
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }
        else{
            $msg = "Invalid OTP";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin login</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/login.css">
</head>
<body>   
    <div class="container">
        <form action="" class="login-form text-center" method="post">
            <h2>OTP VerificaTion</h2>
            <input type="number" name="otp" class="form-control" placeholder="OTP" required>
            <span style="color: red;"><?php echo $msg ?></span>
            <button style="margin-top: 5px;" type="submit" class="btn btn-primary btn-lg" 
            Name="verify_otp">Log In</button>
        </form>
    </div>
</body>

</html>

<?php 

    
}
else{
    echo "<script>window.open('login.php','_self')</script>";
}
    
?>

