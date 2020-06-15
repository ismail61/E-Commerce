<?php 
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


                <a href="#" class="btn btn-success btn-sm">Welcome</a>
                <a href="checkout.php">4 Items In Your Cart | Total Price: $300 </a>

            </div><!-- col-md-6 offer Finish -->
            <!-- col-md-6 Begin -->
            <div class="col-md-6">

                <!-- menu Begin -->
                <ul class="menu">


                    <li>
                        <a href="customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="checkout.php">My Account</a>
                    </li>
                    <li>
                        <a href="cart.php">Go To Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php">Login</a>
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


                        <li >
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            <a href="shop.php">Shop</a>
                        </li>
                        <li>
                            <a href="checkout.php">My Account</a>
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

                    <span>4 Items In Your Cart</span>

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
                    <li>Shop</li>
                </ul>
            </div><!--col-md-12 breadcrumb end-->
            <div class="col-md-3">
                <?php 
                    include("includes/sidebar.php")
                ?>
            </div>
            <div class="col-md-9"><!--col-md-9 start-->
                <div class="box"><!--box start-->
                    <h1>Shop</h1>
                    <p>This theme is created by Md Ismail Hosen Raj..And Shreshtajit Das.We are studying in Sust</p>
                </div><!--box end-->
                <div class="row"><!--row start-->
                    <div class="col-md-4 col-sm-6 center-responsive"><!--col-md-4 col-sm-6 center responsive start-->
                        <div class="product">
                            <a href="details.php">
                            <img src="admin_area/product_images/images.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="details.php">Mens Short Sleeve t-shirt</a></h3>
                            </div>
                            <p class="price">Tk 300</p>
                            <p class="buttons">
                                <a href="details.php" class="btn btn-default">View Details</a>
                                <a href="details.php" class="btn btn-primary">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add to Cart
                                </a>
                            </p>
                        </div>
                    </div><!--col-md-4 col-sm-6 center responsive end-->
                    <div class="col-md-4 col-sm-6 center-responsive"><!--col-md-4 col-sm-6 center responsive start-->
                        <div class="product">
                            <a href="details.php">
                            <img src="admin_area/product_images/images.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="details.php">Mens Short Sleeve t-shirt</a></h3>
                            </div>
                            <p class="price">Tk 300</p>
                            <p class="buttons">
                                <a href="details.php" class="btn btn-default">View Details</a>
                                <a href="details.php" class="btn btn-primary">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add to Cart
                                </a>
                            </p>
                        </div>
                    </div><!--col-md-4 col-sm-6 center responsive end-->
                    <div class="col-md-4 col-sm-6 center-responsive"><!--col-md-4 col-sm-6 center responsive start-->
                        <div class="product">
                            <a href="details.php">
                            <img src="admin_area/product_images/images.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="details.php">Mens Short Sleeve t-shirt</a></h3>
                            </div>
                            <p class="price">Tk 300</p>
                            <p class="buttons">
                                <a href="details.php" class="btn btn-default">View Details</a>
                                <a href="details.php" class="btn btn-primary">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add to Cart
                                </a>
                            </p>
                        </div>
                    </div><!--col-md-4 col-sm-6 center responsive end-->
                    <div class="col-md-4 col-sm-6 center-responsive"><!--col-md-4 col-sm-6 center responsive start-->
                        <div class="product">
                            <a href="details.php">
                            <img src="admin_area/product_images/images.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="details.php">Mens Short Sleeve t-shirt</a></h3>
                            </div>
                            <p class="price">Tk 300</p>
                            <p class="buttons">
                                <a href="details.php" class="btn btn-default">View Details</a>
                                <a href="details.php" class="btn btn-primary">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add to Cart
                                </a>
                            </p>
                        </div>
                    </div><!--col-md-4 col-sm-6 center responsive end-->
                    <div class="col-md-4 col-sm-6 center-responsive"><!--col-md-4 col-sm-6 center responsive start-->
                        <div class="product">
                            <a href="details.php">
                            <img src="admin_area/product_images/images.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="details.php">Mens Short Sleeve t-shirt</a></h3>
                            </div>
                            <p class="price">Tk 300</p>
                            <p class="buttons">
                                <a href="details.php" class="btn btn-default">View Details</a>
                                <a href="details.php" class="btn btn-primary">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add to Cart
                                </a>
                            </p>
                        </div>
                    </div><!--col-md-4 col-sm-6 center responsive end-->
                    <div class="col-md-4 col-sm-6 center-responsive"><!--col-md-4 col-sm-6 center responsive start-->
                        <div class="product">
                            <a href="details.php">
                            <img src="admin_area/product_images/images.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="details.php">Mens Short Sleeve t-shirt</a></h3>
                            </div>
                            <p class="price">Tk 300</p>
                            <p class="buttons">
                                <a href="details.php" class="btn btn-default">View Details</a>
                                <a href="details.php" class="btn btn-primary">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add to Cart
                                </a>
                            </p>
                        </div>
                    </div><!--col-md-4 col-sm-6 center responsive end-->
                </div><!--row end-->
                <center>
                    <ul class="pagination">
                        <li><a href="shop.php" class="active">First Page</a></li>
                        <li>
                            <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li><a href="shop.php">1</a></li>
                        <li><a href="shop.php">2</a></li>
                        <li><a href="shop.php">3</a></li>
                        <li><a href="shop.php">4</a></li>
                        <li><a href="shop.php">Last Page</a></li>
                    </ul>
                </center>
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