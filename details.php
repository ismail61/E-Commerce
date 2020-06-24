
<?php 
    include("includes/db.php");
    include("functions/functions.php");
?>
<?php 
    if(isset($_GET['p_id'])){
        $p_id = $_GET['p_id'];
        $get_pro = "select * from products where p_id=$p_id";
        $run_pro = mysqli_query($db,$get_pro);
        $row_pro = mysqli_fetch_array($run_pro);
        $pro_cat_id = $row_pro['p_cat_id'];
        $pro_title = $row_pro['p_title'];
        $pro_price = $row_pro['p_price'];
        $pro_img1 = $row_pro['p_img1'];
        $pro_img2 = $row_pro['p_img2'];
        $pro_img3 = $row_pro['p_img3'];
        $pro_color1 = $row_pro['p_color1'];
        $pro_color2 = $row_pro['p_color2'];
        $pro_color3 = $row_pro['p_color3'];
        $pro_total_item = $row_pro['p_total_count'];

        $get_p_cat = "select * from product_categories where p_cat_id = $pro_cat_id";
        $run_p_cat = mysqli_query($db,$get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_id = $row_p_cat['p_cat_id'];
        $p_cat_title = $row_p_cat['p_cat_title'];
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/44f64a1e4a.js" crossorigin="anonymous"></script>
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
                    <li><a href="shop.php"> Shop</a></li>
                    <li>
                        <a href="shop.php?p_cat_id=<?php echo $p_cat_id ?>">
                            <?php 
                                echo $p_cat_title;
                            ?>
                        </a>
                    </li>
                    <li>
                        <?php 
                            echo $pro_title;
                        ?>
                    </li>
                </ul>
            </div><!--col-md-12 breadcrumb end-->
            
            <div class="col-md-12"><!--col-md-9 start-->
                <div class="row responsive" id="productmain">
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
                                        <img src="admin_area/product_images/upload_image/<?php echo $pro_img1 ?>"  class="img-responsive" height="800px"; width="530px";>
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                        <img src="admin_area/product_images/upload_image/<?php echo $pro_img2 ?>" class="img-responsive" height="800px"; width="530px";>
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                        <img src="admin_area/product_images/upload_image/<?php echo $pro_img3 ?>" class="img-responsive" height="800px"; width="530px";>
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
                                <h1 class="text-center"><?php echo $pro_title?></h1><br>
                                <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label  class="col-md-5 control-label">Product Quantity :</label>
                                        <div class="col-md-7">
                                            <select name="product_qty"class="form-control" style="width: 200px;">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-md-5 control-label">Color : </label>
                                        <div class="col-md-7" style="margin-top: 5px;">
                                            <?php 
                                                if($pro_color1!=NULL && $pro_color2!=NULL && $pro_color3!=NULL){
                                                    echo "<input type='radio' name='product_color'> <b>$pro_color1</b>";
                                                    echo "<input type='radio' name='product_color' style='margin-left:10px;'> <b>$pro_color2</b>";
                                                    echo "<br>";
                                                    echo "<input type='radio' name='product_color'> <b>$pro_color3</b>";
                                                }
                                                else if($pro_color1!=NULL && $pro_color2!=NULL && $pro_color3==NULL){
                                                    echo "<input type='radio' name='product_color'> <b>$pro_color1</b>";
                                                    echo "<input type='radio' name='product_color' style='margin-left:10px;'> <b>$pro_color2</b>";
                                                } 
                                                else{
                                                    echo "<input type='radio' name='product_color'> <b>$pro_color1</b>";
                                                }
                                            ?>                                                                                            
                                        </div>
                                    </div>
                                    <p class="price text-center" style="font-size:28px;">Product Price : Tk <?php echo $pro_price ?></p>
                                    
                                    <p class="text-center buttons">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-shopping-cart"></i>&nbsp;Add to Cart
                                        </button>
                                        <button class="btn btn-primary">
                                            <i class="fa fa-heart" style="color: #ff0000;"></i>&nbsp;Add to wishlist
                                        </button>
                                    </p>
                                </form>
                            </div><!--box end-->
                            <div class="col-xs-4">
                                <a href="javascript:void(0);" class="thumb">
                                    <img class="img-thumbnail" src="admin_area/product_images/upload_image/<?php echo $pro_img1 ?>" height="200px" width="200px" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="javascript:void(0);" class="thumb">
                                    <img class="img-thumbnail" src="admin_area/product_images/upload_image/<?php echo $pro_img2 ?>"  height="200px" width="200px" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="javascript:void(0);"  class="thumb">
                                    <img class="img-thumbnail" src="admin_area/product_images/upload_image/<?php echo $pro_img3 ?>"  height="200px" width="200px"  class="img-responsive">
                                </a>
                                
                            </div>
                        </div><!--col-md-6 end-->
                    </div>
                </div>
                <br> 
                
                <div class="box responsive" id="details"><!-- products details start-->
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#/" style="text-decoration: none;"><h3>Product Details</h3></a>
                        </div>
                        <div class="col-md-6">
                            <a href="#/" style="text-decoration: none;" data-toggle="modal" data-target="#review_modal"><h3>Review/Comments</h3></a>
                        </div>
                        <div class="modal fade" id="review_modal" role="dialog"><!-- review modal start-->
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title">
                                            <h3 class="text-center"><b><?php echo $pro_title ?></b> - Review/Comment</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="false"><span>&times;</span></button>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-text">
                                                <h6><b style="margin-left: 80px;">ADD A REVIEW </b><br>Please post a user review only if you have / had this product<sup style="color: red;">*</sup></h6>
                                            </div>
                                            <!--<center>
                                                <span class="fa fa-star fa-2x"></span>
                                                <span class="fa fa-star fa-2x"></span>
                                                <span class="fa fa-star fa-2x"></span>
                                                <span class="fa fa-star fa-2x"></span>
                                                <span class="fa fa-star fa-2x"></span>
                                            </center>-->
                                            <div class="card-body" style="margin-top: 30px;">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label class="control-label">Rating <sup style="color: red;">***</sup></label>
                                                        <select name="rating" class="form-control" required>
                                                            <option> 5 </option>
                                                            <option> 4 </option>
                                                            <option> 3 </option>
                                                            <option> 2 </option>
                                                            <option> 1 </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Your Name <sup style="color: red;">*</sup></label>
                                                        <input type="text" class="form-control" name="review_user_name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Your Email <sup style="color: red;">*</sup></label>
                                                        <input type="text" class="form-control" name="review_user_email" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Review Title <sup style="color: red;">*</sup></label>
                                                        <input type="text" class="form-control" name="review_title" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Review Message </label>
                                                        <textarea type="text" class="form-control" name="review_message" style="resize: vertical;"></textarea>
                                                    </div>
                                                    <center>
                                                        <button  class="btn btn-success btn-lg" type="submit" name="review_submit">Add Review</button>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- review modal end-->

                    </div>
                    <div class="table-respons">

                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left"><h4 style="margin: 0;"><b> Launch</b></h4></th>
                                    <th class="text-right"><i class=" fa fa-calendar" style="font-size: 17px;"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1"  width="15%">Announced</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Status</th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th  class="text-left"><h4 style="margin: 0;"><b>Network</b></h4></th>
                                    <th class="text-right"><i class="fa fa-signal" aria-hidden="true" style="font-size: 17px;"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1" width="15%">Technology</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">2G Bands</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">3G Bands</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1"  width="15%">4G Bands</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">5G Bands</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1"  width="15%">Speed</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1"  width="15%">GPRS</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%"><b>EDGE</b></th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left"><h4 style="margin: 0;"><b>Body</b></h4></th>
                                    <th class="text-right"><i class=" fa fa-mobile" style="font-size: 22px;"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1"  width="15%">Dimensions</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Weight</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Build</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">SIM</th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left"><h4 style="margin: 0;"><b>Display</b></h4></th>
                                    <th class="text-right"><i class=" fa fa-desktop" style="font-size: 17px;"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1"  width="15%">Type</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Size</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Resolution</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Multitouch</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Protection</th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left"><h4 style="margin: 0;"><b>PlatForm</b></h4></th>
                                    <th class="text-right"><i class="fa fa-microchip" style="font-size: 17px;" aria-hidden="true"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1"  width="15%">OS</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Chipset</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">CPU</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">GPU</th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left"><h4 style="margin: 0;"><b>Memory</b></h4></th>
                                    <th class="text-right"><i class="fas fa-sd-card" style="font-size: 17px;"></i></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1"  width="15%">Card Slot</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Internal</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">RAM</th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left"><h4 style="margin: 0;"><b>Camera</b></h4></th>
                                    <th class="text-right"><i class="fa fa-camera" style="font-size: 17px;"></i></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1"  width="15%">Primary camera</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Secondary camera</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Features</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Video</th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left"><h4 style="margin: 0;"><b>Sound</b></h4></th>
                                    <th class="text-right"><i class="fa fa-music" style="font-size: 17px;"></i></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1"  width="15%">Alert Type</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Loudspeaker</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">3.5mm Jack</th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left"><h4 style="margin: 0;"><b>Connectivity</b></h4></th>
                                    <th class="text-right"><i class="fa fa-bluetooth" style="font-size: 17px;"></i></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1"  width="15%">WLAN</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Bluetooth</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">GPS</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">NFC</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">FM Radio</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">USB</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Infrared port</th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left"><h4 style="margin: 0;"><b>Features</b></h4></th>
                                    <th class="text-right"><i class="fa fa-envelope-open" style="font-size: 17px;"></i></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1"  width="15%">Sensors</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Messaging</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Browser</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Java</th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left"><h4 style="margin: 0;"><b>Battery</b></h4></th>
                                    <th class="text-right"><i class="fa fa-battery-three-quarters" style="font-size: 17px;"></i></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1"  width="15%">Battery Type</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Battery Capacity</th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left"><h4 style="margin: 0;"><b>More</b></h4></th>
                                    <th class="text-right"><i class="fa fa-info-circle" style="font-size: 17px;"></i></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="1"  width="15%">Made By</th>
                                    <td colspan="4">2019, November2019, November</td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Color</th>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Other Features</th>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div> 
                    
                </div><!-- products details end-->
                <div class="row same-height-row"><!--row same-height-row-->
                    <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6-->
                        <div class="box same-height headline" style="height: 410px;"><!--box same-height headline-->
                            <h3 class="text-center" style="margin-top: 140px;"><a href="shop.php?p_cat_id=<?php echo $p_cat_id;?>"><b><?php echo $p_cat_title ?></b>
                            </a><br> <div style="margin-top: 7px;">Related Phone</div></h3>
                            <center>
                                <i class="fa fa-arrow-right fa-3x"></i>
                            </center>
                        </div><!--box same-height headline-->
                    </div><!--col-md-3 col-sm-6-->
                    <?php 
                        related_products();
                    ?>
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