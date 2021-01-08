<?php 
    session_start();
    if(!isset($_SESSION['customer_username'])){
        echo "<script>window.open('../checkout.php','_self')</script>";
    }
    else{
    include("includes/db.php");
    include("../functions/functions.php");
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <!-- Top Begin -->
    <div id="top">

        <!-- container Begin -->
        <div class="container">

            <!-- col-md-6 offer Begin -->
            <div class="col-md-6 offer">


                <a href="" class="btn btn-success btn-sm">
                    <?php 
                        if(isset($_SESSION['customer_username'])){
                            echo "WELCOME ".$_SESSION['customer_username'];
                        }
                        else{
                            echo "WELCOME GUEST";
                        }
                    ?>
                </a>
                <a href="../checkout.php"><?php count_item(); ?> Item(s) In Your Cart | Total Price : Tk <?php total_price(); ?> </a>

            </div><!-- col-md-6 offer Finish -->
            <!-- col-md-6 Begin -->
            <div class="col-md-6">

                <!-- menu Begin -->
                <ul class="menu">


                    <li>
                        <a href="../customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="my_account.php?my_order">My Account</a>
                    </li>
                    <li>
                        <a href="../cart.php">Go To Cart</a>
                    </li>
                    <li>
                        <?php 
                            if(!isset($_SESSION['customer_username'])){
                                echo " <a href='../checkout.php'>Login</a> ";
                            }
                            else{
                                echo " <a href='../logout.php'>LogOut</a> ";
                            }
                        ?>
                    </li>

                </ul><!-- menu Finish -->

            </div><!-- col-md-6 Finish -->

        </div><!-- container Finish -->

    </div><!-- Top Finish -->
    <!-- navbar navbar-default Begin -->
    <div id="navbar" class="navbar navbar-default">

        <!-- container Begin -->
        <div class="container">
            <!-- navbar-header Begin -->

            <div class="navbar-header">

                <!-- navbar-brand home Begin -->

                <a href="../index.php" class="navbar-brand home">

                    <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                    <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">

                </a><!-- navbar-brand home Finish -->

                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                    <span class="sr-only">Toggle Navigation</span>

                    <i class="fa fa-align-justify"></i>

                </button>

                <button class="navbar-toggle" data-toggle="collapse" data-target="#nav_search">

                    <span class="sr-only">Toggle Search</span>

                    <i class="fa fa-search"></i>

                </button>
                <!-- collapse Begin -->
                <div class="collapse hidden-md hidden-lg" id="nav_search">
                    <!-- navbar-form Begin -->

                    <form method="get" action="results.php" class="navbar-form">

                        <!-- input-group Begin -->
                        <div class="input-group input-group-lg">


                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                            <!-- input-group-btn Begin -->
                            <span class="input-group-btn">
                                <!-- btn btn-primary Begin -->

                                <button type="submit" name="search" value="Search" class="btn btn-primary">


                                    <i class="fa fa-search"></i>

                                </button><!-- btn btn-primary Finish -->

                            </span><!-- input-group-btn Finish -->

                        </div><!-- input-group Finish -->

                    </form><!-- navbar-form Finish -->

                </div><!-- collapse clearfix Finish -->


            </div><!-- navbar-header Finish -->
            <!-- navbar-collapse collapse Begin -->
            <div class="navbar-collapse collapse" id="navigation">
                <!-- padding-nav Begin -->

                <div class="padding-nav">

                    <!-- nav navbar-nav left Begin -->
                    <ul class="nav navbar-nav left">


                        <li >
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="../shop.php">Shop</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php?my_order">My Account</a>
                        </li>
                        <li>
                            <a href="../cart.php">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="../contact.php">Contact Us</a>
                        </li>

                    </ul><!-- nav navbar-nav left Finish -->

                </div><!-- padding-nav Finish -->
                <!-- btn navbar-btn btn-primary Begin -->
                <a href="cart.php" class="btn navbar-btn btn-primary right">


                    <i class="fa fa-shopping-cart"></i>

                    <span><?php count_item(); ?> Item(s) In Your Cart</span>

                </a><!-- btn navbar-btn btn-primary Finish -->
                <!-- navbar-collapse collapse right Begin -->
                <div class="navbar-collapse collapse right">


                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                        <!-- btn btn-primary navbar-btn Begin -->

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button><!-- btn btn-primary navbar-btn Finish -->

                </div><!-- navbar-collapse collapse right Finish -->

                <div class="collapse clearfix" id="search">
                    <!-- collapse clearfix Begin -->
                    <!-- navbar-form Begin -->
                    <form method="get" action="results.php" class="navbar-form">

                        <!-- input-group Begin -->
                        <div class="input-group input-group-lg">


                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                            <!-- input-group-btn Begin -->
                            <span class="input-group-btn">

                                <!-- btn btn-primary Begin -->
                                <button type="submit" name="search" value="Search" class="btn btn-primary">


                                    <i class="fa fa-search"></i>

                                </button><!-- btn btn-primary Finish -->

                            </span><!-- input-group-btn Finish -->

                        </div><!-- input-group Finish -->

                    </form><!-- navbar-form Finish -->

                </div><!-- collapse clearfix Finish -->

            </div><!-- navbar-collapse collapse Finish -->

        </div><!-- container Finish -->

    </div><!-- navbar navbar-default Finish -->
    <div id="content">
        <div class="container">
            <div class="col-md-12"><!--col-md-12 breadcrumb start-->
                <ul class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li>My Account</li>
                </ul>
            </div><!--col-md-12 breadcrumb end-->
            <div class="col-md-3">
                <?php 
                    include("includes/sidebar.php")
                ?>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <h1 class="text-center">Please Confirm your payment</h1>
                    <form action="confirm.php?order_id=<?php echo $order_id ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Invoice Number :</label>
                            <input type="number" class="form-control" name="invoice_number" required>
                        </div>
                        <div class="form-group">
                            <label>Amount(Tk) :</label>
                            <input type="number" class="form-control" name="amount" required>
                        </div>
                        <div class="form-group">
                            <label>Select Payment Method :</label>
                            <select class="form-control" name="payment_mode" required>
                                <option>Bkash</option>
                                <option>Rocket</option>
                                <option>Nogod</option>
                                <option>Bank Transfer</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Transaction ID/Number :</label>
                            <input type="text" class="form-control" name="transaction_id" required>
                        </div>
                        <div class="form-group">
                            <label>Payment Date :</label>
                            <input type="date" class="form-control" name="payment_date" required>
                        </div>
                        <div align="center">
                            <button type="submit" name="payment" class="btn btn-success btn-lg">Confirm Payment</button>
                        </div>
                    </form>
                    <?php 
                        $customer_username = $_SESSION['customer_username'];
                        if(isset($_POST['payment'])){
                            
                            $invoice_number = $_POST['invoice_number'];
                            $amount = $_POST['amount'];
                            $payment_mode = $_POST['payment_mode'];
                            $transaction_id = $_POST['transaction_id'];
                            $payment_date = substr($_POST['payment_date'],0,11);
                            $get = "select customer_id from customer where customer_username='$customer_username'";
                            $run = mysqli_query($db,$get);
                            $row = mysqli_fetch_array($run);
                            $customer_id = $row['customer_id'];
                            $complete = "complete";

                            $insert_payment = "INSERT INTO payment(invoice_number,amount,payment_mode,
                                                transaction_id,payment_date,customer_id)
                                                Values('$invoice_number','$amount','$payment_mode','$transaction_id',
                                                '$payment_date','$customer_id');";
                            
                            $run_insert_payment = mysqli_query($db,$insert_payment);
                            $update_order = "UPDATE customer_order set order_status = '$complete' where
                             order_id = '$order_id' AND invoice_number='$invoice_number' AND customer_id = '$customer_id'";
                            $run_update = mysqli_query($db,$update_order);
                            if($run_update){
                            $pending_order = "DELETE from pending_order where invoice_number = '$invoice_number' AND customer_id = '$customer_id'";
                            $run_pending = mysqli_query($db,$pending_order);
                            echo "<script>window.open('my_account.php?my_order','_self')</script>";
                            }
                            else{
                                echo "<script>alert('Invoice Number doesn't match')</script>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--footer start-->
    <?php
        include("includes/footer.php");
    ?>
    <!--footer end--> 

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>

</html>
<?php } ?>