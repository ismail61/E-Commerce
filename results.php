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


                        <li  class="active">
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
                    <li>
                        <?php 
                            if(isset($_GET['user_query'])){

                                $user_query = $_GET['user_query'];
                                echo "$user_query";
                            }
                        ?>
                    </li>
                </ul>
            </div><!--col-md-12 breadcrumb end-->
            <div class="col-md-3">
                <?php 
                    include("includes/sidebar.php")
                ?>
            </div>
            <div class="col-md-9"><!--col-md-9 start-->
                <?php 
                    if(!isset($_GET['p_cat_id'])){
                        if(!isset($_GET['cat_id'])){
                            
                        }
                    }
                ?>
                
                <div class="row"><!--row start-->
                    <?php 
                        if(!isset($_GET['p_cat_id']) OR isset($_GET['search'])){
                            if(!isset($_GET['cat_id']) OR isset($_GET['search'])){
                                $user_query = mysqli_escape_string($db, $_GET['user_query']);
                                $get_products = "SELECT * from products where p_title like '%$user_query%' OR p_id like '%$user_query%' 
                                OR p_keyword like '%$user_query%' order by rand() LIMIT 0,9";
                                $run_products = mysqli_query($con,$get_products);
                                $count = mysqli_num_rows($run_products);
                                if($count>0){
                                    while($row_products = mysqli_fetch_array($run_products)){
                                        $products_id = $row_products['p_id'];
                                        $products_title = $row_products['p_title'];
                                        $products_price = $row_products['p_price'];
                                        $products_img = $row_products['p_img1'];    
                                        echo "
                                            <div class='col-md-4 col-sm-6 responsive' >
                                                <div class='product' style='height:440px;'>
                                                    <a href='details.php?p_id=$products_id'>
                                                        <img height='100px' width='100px' src='admin_area/product_images/upload_image/$products_img' class='img-responsive'>
                                                    </a>
                                                    <div class='text'>
                                                        <h3 style='margin:0;'><a href='details.php?p_id=$products_id'>$products_title</a></h3>
                                                    </div>
                                                    <br>
                                                    <p class='price'>Tk $products_price</p>
                                                    <br>
                                                    <p class='buttons'>
                                                        <a href='details.php?p_id=$products_id' class='btn btn-default'>View Details</a>
                                                        <a href='details.php?p_id=$products_id' class='btn btn-primary'>
                                                            <i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;&nbsp;&nbsp;Add to Cart
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        ";
                                    }
                                }
                                else{
                                    echo "<div class='box'>
                                        <H3 class='text-center'>No Products Found</H3>
                                    </div>";
                                }
                            }
                        }
                       
                    ?>
                </div><!--row end-->
                
                <?php 
                    pro_cat_base_products();
                    cat_base_products();
                ?>
            </div><!--col-md-9 end-->
            
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