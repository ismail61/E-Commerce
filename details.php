
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
            <div class="col-md-3"><!--col-md-3 start-->
                <?php 
                    include("includes/sidebar.php")
                ?>
            </div><!--col-md-3 end-->
            <div class="col-md-9"><!--col-md-9 start-->
                <div class="row" id="productmain">
                    <div class="mainimage">
                        <div class="col-sm-6"><!--col-md-6 start-->
                            <div id="my_carousel" class="carousel slide " style="height: 530px;" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#mycarousel" data-slide-to="1"></li>
                                    <li data-target="#mycarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner"><!--carousel inner start-->
                                    <div class="item active">
                                        <center>
                                        <img src="admin_area/product_images/images.jpg"  class="img-responsive">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                        <img src="admin_area/product_images/images_1.jpg" class="img-responsive">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                        <img src="admin_area/product_images/images_2.jpg" class="img-responsive">
                                        </center>
                                    </div>
                                </div><!--carousel inner end-->
                                <a href="#my_carousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left">
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a href="#my_carousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div><!--col-md-6 end-->
                        <div class="col-sm-6"><!--col-md-6-->
                            <div class="box">
                                <h1 class="text-center">Mens Short Sleeve t-shirt</h1>
                                <form action="post" class="form-horizontal" action="details.php">
                                    <div class="form-group">
                                        <label  class="col-md-5 control-label">Product Quality</label>
                                        <div class="col-md-7">
                                            <select name="product_qty"class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-md-5 control-label">Product Size</label>
                                        <div class="col-md-7">
                                            <select name="product_size"class="form-control">
                                                <option>Select a size</option>
                                                <option>Small</option>
                                                <option>Medium</option>
                                                <option>Large</option>
                                                <option>Extra Large</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p class="price text-center" style="font-size:28px;">Product Price : Tk 300</p>
                                    <p class="text-center" style="font-size: 20px; color:green;">2 items in stock</p>
                                    <p class="text-center buttons">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-shopping-cart"></i>&nbsp;Add to Cart
                                        </button>
                                        <button class="btn btn-primary">
                                            <i class="fa fa-heart"></i>&nbsp;Add to wishlist
                                        </button>
                                    </p>
                                </form>
                            </div><!--box end-->
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img class="img-thumbnail" src="admin_area/product_images/images.jpg"  class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img class="img-thumbnail" src="admin_area/product_images/images_1.jpg"  class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img class="img-thumbnail" src="admin_area/product_images/images_2.jpg"  class="img-responsive">
                                </a>
                                
                            </div>
                        </div><!--col-md-6 end-->
                    </div>
                </div>
                <div class="box" id="details">
                    <h4>Product Details</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia animi eos error, architecto aspernatur, ut beatae voluptas nobis aliquam nostrum laboriosam, vero eius est voluptatem cumque ex fugiat vel dolore quos officia. Adipisci tempore dicta molestiae dolore obcaecati beatae corporis. Quam consequuntur quos eligendi! Possimus cupiditate, ipsam corrupti dicta dolores deleniti totam aliquam enim odio officia aspernatur reprehenderit nisi quidem!

                    </p>
                    <div class="box"><h4 class="text-center"><u>Size</u></h4>
                    <ul>
                        <li>Small</li>
                        <li>Medium</li>
                        <li>Large</li>
                        <li>Extra Large</li>
                    </ul></div>
                </div>
                <div class="row same-height-row"><!--row same-height-row-->
                    <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6-->
                        <div class="box same-height headline" style="height: 310px;"><!--box same-height headline-->
                            <h3 class="text-center">You also like these product</h3>
                        </div><!--box same-height headline-->
                    </div><!--col-md-3 col-sm-6-->
                    <div class="col-md-3 center-responsive">
                        <div class="product same-height">
                            <a href="details.php">
                                <img src="admin_area/product_images/images.jpg" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="details.php">Mens Short Sleeve t-shirt</a></h3>
                                </div>
                                <p class="price">Tk 300</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 center-responsive">
                        <div class="product same-height">
                            <a href="details.php">
                                <img src="admin_area/product_images/images.jpg" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="details.php">Mens Short Sleeve t-shirt</a></h3>
                                </div>
                                <p class="price">Tk 300</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 center-responsive">
                        <div class="product same-height">
                            <a href="details.php">
                                <img src="admin_area/product_images/images.jpg" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="details.php">Mens Short Sleeve t-shirt</a></h3>
                                </div>
                                <p class="price">Tk 300</p>
                            </a>
                        </div>
                    </div>
                </div><!--row same-height-row-->
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