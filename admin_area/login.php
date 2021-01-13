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
            <!--<h4 style="margin-top: 15px; "><a href="admin_forgot_password.php">Forgot Password</a></h4>-->
        </form>
    </div>
</body>

</html>

<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    if(isset($_POST['admin_login'])){
        $otp = rand(11111,99999);
        $admin_email = mysqli_real_escape_string($db,$_POST['admin_email']);
        $admin_password = mysqli_real_escape_string($db,$_POST['admin_password']);
        $select = "SELECT admin_email,admin_password from admins where admin_email ='$admin_email'
         AND admin_password = '$admin_password'";
        $run = mysqli_query($db,$select);
        $count = mysqli_num_rows($run);
        if($count==1){
            $otp_run = mysqli_query($db,"UPDATE admins SET otp = $otp where admin_email='$admin_email'");
            $msg = "Your Otp code is <b>$otp</b>";
            $msg1 = "Your Otp code is $otp";
            if($otp_run){
                try {
                    $mail->isSMTP();                                            
                    $mail->Host       = 'smtp.gmail.com';                    
                    $mail->SMTPAuth   = true;                                   
                    $mail->Username   = 'your email';                     
                    $mail->Password   = 'password';                               
                    $mail->SMTPSecure = 'tls';         
                    $mail->Port       = 587;                                    
                    $mail->setFrom('your email', 'mobile-shop.com');
                    $mail->addAddress($admin_email);
                    $mail->addReplyTo('your email', 'Reply');
                    $mail->isHTML(true);                                 
                    $mail->Subject = 'OTP Verification';
                    $mail->Body    = $msg;
                    $mail->AltBody = $msg1;
                
                    $mail->send();
                    echo "<script>window.open('otp.php?email=$admin_email','_self')</script>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
            
        }
        else{
            echo "<script>alert('Email/Password Wrong')</script>";
        }

    }
?>
