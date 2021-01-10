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
    <title>Mobile Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <!-- Top Begin -->
    <div id="top"  style="position: fixed; width:100%; z-index:5; top:0; ">

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
                <a href="checkout.php"><?php count_item(); ?> Item(s) In Your Cart | Total Price : Tk <?php total_price(); ?> </a>
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
    <div id="navbar" class="navbar navbar-default ">

        <!-- container Begin -->
        <div class="container" style="margin-top: 80px;" >
            <!-- navbar-header Begin -->

            <div class="navbar-header">

                <!-- navbar-brand home Begin -->

                <a href="index.php" class="navbar-brand home" style="padding: 4px 15px;">

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

                <div class="padding-nav" style="padding-top: 0px;">

                    <!-- nav navbar-nav left Begin -->
                    <ul class="nav navbar-nav left">


                        <li class="active">
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

                    <span><?php count_item(); ?> Items(s) In Your Cart</span>

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
    <!--carousel container begin-->
    <div class="container" id="slider">

        <div class="col-md-12">
            <!-- carousel slide Begin -->
            <div class="carousel slide" id="myCarousel" data-ride="carousel">
                <!-- carousel-indicators Begin -->
                <ol class="carousel-indicators">

                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>

                </ol>
                <!-- carousel-indicators Finish -->

                <!-- carousel-inner Begin -->
                <div class="carousel-inner">

                    <?php 
                        $get_slider = "select * from slider LIMIT 0,1";
                        $run_slider = mysqli_query($con,$get_slider);
                        while($row = mysqli_fetch_array($run_slider)){
                            $slider_name = $row['slider_name'];
                            $slider_url = $row['slider_url'];
                            $slider_image = $row['slider_image'];
                            echo "
                                <div class='item active'><a href='$slider_url'>
                                    <img src='admin_area/slides_images/$slider_image' class='img-responsive'>
                                </a></div>
                            ";
                        }
                    ?>
                    <?php 
                        $get_slider = "select * from slider LIMIT 1,3";
                        $run_slider = mysqli_query($con,$get_slider);
                        while ($row = mysqli_fetch_array($run_slider)) {
                            $slider_name = $row['slider_name'];
                            $slider_url = $row['slider_url'];
                            $slider_image = $row['slider_image'];
                            echo "
                                <div class='item'><a href='$slider_url'>
                                    <img src='admin_area/slides_images/$slider_image' class='img-responsive'>
                                </a></div>
                            ";
                        }
                    ?>

                </div><!-- carousel-inner Finish -->
                <!-- left carousel-control Begin -->
                <a href="#myCarousel" class="left carousel-control" data-slide="prev">


                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>

                </a><!-- left carousel-control Finish -->
                <!-- right carousel-control Begin -->
                <a href="#myCarousel" class="right carousel-control" data-slide="next">


                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>

                </a><!-- right carousel-control Finish -->

            </div><!-- carousel slide Finish -->

        </div><!-- col-md-12 Finish -->

    </div><!-- container Finish -->
    <!--carousel container end-->

    <div id="advantage"><!-- advantage start-->
        <div class="container"><!--container start-->
            <div class="same-height-row"><!--same-height-row start-->
            <?php 
                $run = mysqli_query($con,"select * from boxes LIMIT 0,3");
                while($row = mysqli_fetch_array ($run)){
                $boxes_title = $row['box_title'];
                $boxes_url = $row['box_url'];
                $boxes_description = $row['box_description'];
                
            ?>
                <div class="col-sm-4">
                    <div class="box same-height " style="height: 180px;"><!--box same-height start-->
                        <div class="icon">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </div>
                        <h3><a href="<?php echo $boxes_url ?>"><?php echo $boxes_title ?></a></h3>
                        <p><?php echo $boxes_description ?></p>
                    </div><!--box same-height end-->
                </div>
                <?php } ?>
                
            </div><!--same-height-row end-->
        </div><!--container end-->
    </div><!-- advantage end-->
    <div id="hotbox"><!-- hotbox start-->
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2 class="text-center text-uppercase" style="color:#A52003;">Latest this week</h2>
                </div>
            </div>
        </div>
    </div><!-- hotbox end-->
    
    <div class="container" id="content"><!--content start-->
        <center>
            <div class="row">
                <?php 
                    getproducts();
                    
                ?>         
            </div>
        </center>
        <center>
            <a href="shop.php" style="margin-bottom: 10px;" class="btn btn-success btn-outline-danger"> More Products</a>
        </center>  
    </div><!--content end-->
    <!--footer start-->
    <?php
        include("includes/footer.php");
    ?>
    <!--footer end--> 

    <?php 
        if(isset($_SESSION['customer_username'])){
            $res = mysqli_fetch_assoc(mysqli_query($con,"SELECT status_ from customer where customer_username='$name'"));
            if($res['status_']==0){
                echo "<script>window.open('logout.php','_self')</script>";
            }
        }
    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
   


</body>

</html>

