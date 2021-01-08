<?php 
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
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


                <a href="#" class="btn btn-success btn-sm">
                    <?php 
                        if(isset($_SESSION['customer_username'])){
                            echo "WELCOME ".$_SESSION['customer_username'];
                        }
                        else{
                            echo "WELCOME GUEST";
                        }
                    ?>
                </a>
                <a href="checkout.php"><?php count_item(); ?> Item(s) In Your Cart | Total Price : Tk <?php total_price(); ?></a>

            </div><!-- col-md-6 offer Finish -->
            <!-- col-md-6 Begin -->
            <div class="col-md-6">

                <!-- menu Begin -->
                <ul class="menu">


                    <li>
                        <a href="customer_register.php">Register</a>
                    </li>
                    <li>
                        <?php 
                            if(!isset($_SESSION['customer_username'])){
                                echo "<a href='checkout.php'>My Account</a>";
                            }
                            else{
                                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                            }
                        ?>
                    </li>
                    <li>
                        <a href="cart.php">Go To Cart</a>
                    </li>
                    <li>
                        <?php 
                            if(!isset($_SESSION['customer_username'])){
                                echo " <a href='checkout.php'>Login</a> ";
                            }
                            else{
                                echo " <a href='logout.php'>LogOut</a> ";
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

                <a href="index.php" class="navbar-brand home">

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


                        <li   class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="shop.php">Shop</a>
                        </li>
                        <li>
                            <?php 
                                if(!isset($_SESSION['customer_username'])){
                                    echo "<a href='checkout.php'>My Account</a>";
                                }
                                else{
                                    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                                }
                            ?>
                        </li>
                        <li>
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact Us</a>
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
                    <li><a href="index.php">Home</a></li>
                    <li>Registration</li>
                </ul>
            </div>
            <div class="row"><!--form-group row start-->
                <div class="col-md-12 ">
                    <div class="box" >
                        <div class="box-header" style="margin-bottom: 4px;"><!--box header start-->
                            <center>
                                <h2>Register A New Account</h2>
                                <p>
                                    Already a&nbsp; Account.Please <a href="checkout.php"><b>Login</b></a>
                                </p>
                            </center>
                        </div><!--box header end-->
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-top: 30px;">
                            <div class="form-group">
                                <label class="control-label col-sm-2"><h4 style="margin:0;" >Name :</h4></label>
                                <div class="col-sm-10">
                                    <input type="text" name="c_name" class="form-control" required>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2"><h4 style="margin:0;"> Email :</h4></label>
                                <div class="col-sm-10">
                                    <input type="email" name="c_email" class="form-control" required>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2"><h4 style="margin:0;">Phone :</h4></label>
                                <div class="col-sm-10" style="margin-top: 3px;">
                                    <input type="number" name="c_phone" class="form-control" required="required" minlength="11" maxlength="11">
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2"><h4 style="margin:0;"> UserName :</h4></label>
                                <div class="col-sm-10">
                                    <input type="text" name="c_username" class="form-control" required>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2"><h4 style="margin:0;">Password :</h4></label>
                                <div class="col-sm-10">
                                    <input type="password" name="c_password" class="form-control" required>
                                </div>   
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2"><h4 style="margin:0;">Division :</h4></label>
                                <div class="col-sm-10">
                                    <input type="text" name="c_division" class="form-control" required>
                                </div>   
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2"><h4 style="margin:0;">District :</h4></label>
                                <div class="col-sm-10">
                                    <input type="text" name="c_district" class="form-control" required>
                                </div>   
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2"><h4 style="margin:0;">Thana :</h4></label>
                                <div class="col-sm-10">
                                    <input type="text" name="c_thana" class="form-control" required>
                                </div>   
                            </div>                          
                            <div class="form-group">
                                <label class="control-label col-sm-2"><h4 style="margin:0;">Address :</h4></label>
                                <div class="col-sm-10">
                                    <input type="text" name="c_address" class="form-control" required>
                                </div>   
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2"><h4 style="margin:0;">Image :</h4></label>
                                <div class="col-sm-10">
                                    <input type="file" name="c_image" class="form-control" required>
                                </div>   
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="fa fa-sign-in"></i>&nbsp;Register
                                </button>
                            </div>
                            <div class="text-right">
                                By clicking "Register" I agree to <a href="privacy_policy.php" target="_blank"><b>Return & Privacy Policy</b></a> 
                            </div>
                        </form>
                    </div>
                </div>
            </div><!--form-group row end-->
        </div>
    </div>
        <!--footer start-->
    <div style="margin-top: 40px;">
    <?php
        include("includes/footer.php");
    ?>
    </div>
    <!--footer end--> 

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>

</html>
<?php 
    insert_customer();
?>