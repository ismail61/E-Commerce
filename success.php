<?php 

    session_start();
    include("includes/db.php");
    include("functions/functions.php");
    include("logout_redirect.php");
    $_SESSION['time_active'] = time();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once __DIR__ . '/pdf/vendor/autoload.php';

    
    // Load Composer's autoloader
    require 'admin_area/vendor/autoload.php';
    //$mpdf->WriteHTML('<h1>Hello world!</h1>');
    //$mpdf->Output();

    if((isset($_GET['price'])) && (isset($_GET['cd']))){
        //$pay = require('./pay.php');
        //echo $pay;
        $client_ip= get_client_ip();
        $tk = $_GET['price'];
        $c_id = $_GET['cd'];
        $get_customer = "select * from customer where customer_id = '$c_id';";
        $run_customer = mysqli_query($db,$get_customer);
        $row = mysqli_fetch_array($run_customer);
        $customer_name = $row['customer_name'];
        $customer_email = $row['customer_email'];
        $customer_phone = $row['customer_phone'];
        $customer_address = $row['customer_address'];
        $get_cart = mysqli_query($db,"SELECT * from cart where ip_address='$client_ip'");
        //$p_id = $row['p_id'];
        $out1 = '<link rel="stylesheet" href="css/bootstrap.min.css">';
        $out1 .= '<link rel="stylesheet" href="success.css" media = "screen"/>';
        $out1 .= '<link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">';
        $out1 .= '<div class="container my-5">
                    <div class="card card-body">
                        Hi '.$customer_name.' <br><br/> Thank you for ordering from Scroll Through <br/>
                        <div class="shopname">Scroll Through</div> <br/>
                        Heres a confirmation of what you bought in your order.Heres a confirmation of what you bought in your order.
                        
                        <div class="jumbotron">
                            <div class="delivery" >
                                DELIVERY DETAILS :
                            </div>
                            <table class="table table-dark table-responsive" border="1">
                                <tbody>
                                    <tr>
                                        <td class="text">Name</td>
                                        <td class="text-center">Email</td>
                                        <td class="text-center">Phone</td>
                                        <td class="text-center">Address</td>
                                    </tr>
                                    <tr>
                                        <td>'.$customer_name.' </td>
                                        <td>'.$customer_email.' </td>
                                        <td>'.$customer_phone .'</td>
                                        <td>'.$customer_address.'</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h2>&nbsp;Order Details :</h2>
                            <table class="table table-dark" border ="1">
                                <tbody>
                                    <tr>
                                        <td>Product Title</td>
                                        <td>Quantity</td>
                                        <td>Color</td>
                                        <td>Price</td>
                                        <td>Delivery fee</td>
                                        <td>Total</td>
                                        <td>Status</td>
                                    </tr>';
                                    
                                        while($row_cart = mysqli_fetch_assoc($get_cart)){
                                            $p_id = $row_cart['p_id'];
                                            $product_quantity = $row_cart['product_quantity'];
                                            $product_color = $row_cart['product_color'];                                
                                            $get_product = "select * from products where p_id = '$p_id'"; 
                                            $run_get_product = mysqli_query($db,$get_product);
                                            $row_product = mysqli_fetch_array($run_get_product);
                                            $product_title = $row_product['p_title'];

                                            $customer_division = $row['customer_division'];
                                            $c_div = $customer_division;
                                            $dhaka = "Dhaka";
                                            $price = $row_product['p_price'];
                                            $sub_total = 0;
                                            $delivery_fee = 0;
                                            
                                            $status = "Paid";
                                            if($c_div==$dhaka){
                                                $sub_total = ($price * $product_quantity)+60; 
                                                $delivery_fee = 60;                                  
                                            }
                                            else{
                                                $sub_total = ($price * $product_quantity)+80;  
                                                $delivery_fee = 80;     
                                            }
                                            
                                        
                                            $out1 .= '<tr>
                                                <td><a href="details.php?p_id='.$p_id.'" target="_blank" style="color:green;text-decoration:none">'.$product_title.'</a></td>
                                                <td class="text-center">'.$product_quantity.'</td>
                                                <td>'.$product_color.'</td>
                                                <td>'.$price.'</td>
                                                <td class="text-center">'.$delivery_fee.'</td>
                                                <td>'.$sub_total.'</td>
                                                <td>'.$status.'</td>
                                                
                                            </tr>';
                                        
                                        }
            
                                    
                                $out1 .= '</tbody>
                            </table>
                        </div>
            
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-center"><a href="http://localhost/Ecom/contact.php" target="_blank">Contact Us</a></div>
                        <div class="col-md-9">
                            <small>
                                This is an automatically generated e-mail from our subscription list. Please do not reply to this e-mail
                            </small>
                        </div>
                    </div>
                    
                </div>
                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            </body>';

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($out1);
        $file_name = md5(rand()).'.pdf';
        $file = $mpdf->output($file_name,'S');
        //$mpdf->output();

        //send mail
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();                       
            //$mail->SMTPDebug = 2;                     
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'mobile3free@gmail.com';                     
            $mail->Password   = 'ismail61';                               
            $mail->SMTPSecure = 'tls';         
            $mail->Port       = 587;                                    
            $mail->setFrom('mobile3free@gmail.com', 'Scroll-Through.com');
            $mail->addAddress($customer_email);
            $mail->addReplyTo('mobile3free@gmail.com', 'Reply');
            $mail->isHTML(true);                                 
            $mail->Subject = 'Order Details';
            $mail->Body    = 'Please check the pdf file';
            $mail->AltBody = 'Please check the pdf file';
            $mail->AddStringAttachment($file, $file_name,
                                        $encoding = 'base64',
                                        $type = 'application/pdf');
        
            if($mail->send()){
                $invoice_number = mt_rand();
                $insert_customer_order = "INSERT INTO customer_order(customer_id,due_amount,invoice_number,
                product_quantity,product_color,order_date,order_status,p_id) 
                values('$c_id','$sub_total','$invoice_number','$product_quantity','$product_color',
                NOW(),'$status','$p_id');";
                $run_insert_customer_order = mysqli_query($db,$insert_customer_order);


                $insert_pending_order = "INSERT INTO pending_order(customer_id,invoice_number,p_id,
                                            product_quantity,product_color,order_status)
                                            VALUES ('$c_id','$invoice_number','$p_id','$product_quantity',
                                            '$product_color','$status');";
                $run_insert_pending_order = mysqli_query($db,$insert_pending_order);

                $delete_cart = "delete from cart where ip_address='$client_ip'";
                $run_delete_cart = mysqli_query($db,$delete_cart);
                
            }
            //unlink($file_name);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

       
        //$delete_cart = "delete from cart where ip_address='$client_ip'";
        //$run_delete_cart = mysqli_query($db,$delete_cart);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <title>Success</title>
</head>

<body>
    <h2 class="text-center text-success">Congratulations! Your Transaction is Successful.</h2>
    <br>
    <table border="1" class="table table-striped">
                    <tbody>
                        <tr>
                        <tr>
                            <th colspan="2">Payment Details</th>
                        </tr>
                        <td class="text-right">Amount</td>
                        <td><?= $tk . ' ' . "BDT" ?></td>
                        </tr>
                    </tbody>

                </table>'
    <a href="index.php" class="link-button">Go to Home Page</a>
    <?php $customer_email ?>


</body>


</html>


<?php } ?>