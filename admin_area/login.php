<?php 
    session_start();
    include("includes/db.php");
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
            <h2>Admin login</h2>
            <input type="email" name="admin_email" class="form-control" placeholder="Email" required>
            <input type="password" name="admin_password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn btn-primary btn-lg" Name="admin_login">Log In</button>
            <h4 style="margin-top: 15px; "><a href="admin_forgot_password.php">Forgot Password</a></h4>
        </form>
    </div>
</body>

</html>

<?php 
    if(isset($_POST['admin_login'])){
        $admin_email = mysqli_real_escape_string($db,$_POST['admin_email']);
        $admin_password = mysqli_real_escape_string($db,$_POST['admin_password']);
        $select = "SELECT admin_email,admin_password from admins where admin_email ='$admin_email'
         AND admin_password = '$admin_password'";
        $run = mysqli_query($db,$select);
        $count = mysqli_num_rows($run);
        if($count==1){
            $_SESSION['admin_email'] = $admin_email;
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }
        else{
            echo "<script>alert('Email/Password Wrong')</script>";
        }

    }
?>