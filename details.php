
<?php 
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
    
    if(!isset($_GET['p_id'])){
        echo "<script>window.open('shop.php','_self')</script>";
    }
    else{
        
?>

<?php 
    if(isset($_GET['p_id'])){
        $p_id = $_GET['p_id'];
        $get_total_item = "select * from customer_order where p_id='$p_id' AND order_status = 'complete'";
        $run_total_item = mysqli_query($db,$get_total_item);
        $i=0;
        while($row = mysqli_fetch_array($run_total_item)){
            $p_qty = $row['product_quantity'];
            $i+=$p_qty;
        }
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
        $pro_total_item = $row_pro['p_total_count']-$i;
        if($pro_total_item<0){
            $pro_total_item = 0;
        }
        $pro_description_id = $row_pro['description_id'];

        //products category title collect
        $get_p_cat = "select * from product_categories where p_cat_id = $pro_cat_id";
        $run_p_cat = mysqli_query($db,$get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_id = $row_p_cat['p_cat_id'];
        $p_cat_title = $row_p_cat['p_cat_title'];

        //products all description collect
        $get_description = "select * from phone_description where description_id= $pro_description_id";
        $run_description = mysqli_query($db,$get_description);
        $row_description = mysqli_fetch_array($run_description);
        $ph_l_announced = $row_description['ph_l_announced'];
        $ph_l_status = $row_description['ph_l_status'];
        $ph_n_technology = $row_description['ph_n_technology'];
        $ph_n_2g_bands = $row_description['ph_n_2g_bands'];
        $ph_n_3g_bands = $row_description['ph_n_3g_bands'];
        $ph_n_4g_bands = $row_description['ph_n_4g_bands'];
        $ph_n_5g_bands = $row_description['ph_n_5g_bands'];
        $ph_n_speed = $row_description['ph_n_speed'];
        $ph_n_gprs = $row_description['ph_n_gprs'];
        $ph_n_edge = $row_description['ph_n_edge'];
        $ph_b_dimensions = $row_description['ph_b_dimensions'];
        $ph_b_weight = $row_description['ph_b_weight'];
        $ph_b_build = $row_description['ph_b_build'];
        $ph_b_sim = $row_description['ph_b_sim'];
        $ph_d_type = $row_description['ph_d_type'];
        $ph_d_size = $row_description['ph_d_size'];
        $ph_d_resolution = $row_description['ph_d_resolution'];
        $ph_d_multitouch = $row_description['ph_d_multitouch'];
        $ph_d_protection = $row_description['ph_d_protection'];
        $ph_p_os = $row_description['ph_p_os'];
        $ph_p_chipset = $row_description['ph_p_chipset'];
        $ph_p_cpu = $row_description['ph_p_cpu'];
        $ph_p_gpu = $row_description['ph_p_gpu'];
        $ph_m_card_slot = $row_description['ph_m_card_slot'];
        $ph_m_internal = $row_description['ph_m_internal'];
        $ph_m_ram = $row_description['ph_m_ram'];
        $ph_c_primary_cam = $row_description['ph_c_primary_cam'];
        $ph_c_secondary_cam = $row_description['ph_c_secondary_cam'];
        $ph_c_features = $row_description['ph_c_features'];
        $ph_c_video = $row_description['ph_c_video'];
        $ph_s_alert_types = $row_description['ph_s_alert_types'];
        $ph_s_loudspeaker = $row_description['ph_s_loudspeaker'];
        $ph_s_35mm_jak = $row_description['ph_s_35mm_jak'];
        $ph_c_wlan = $row_description['ph_c_wlan'];
        $ph_c_bluetooth = $row_description['ph_c_bluetooth'];
        $ph_c_gps = $row_description['ph_c_gps'];
        $ph_c_nfc = $row_description['ph_c_nfc'];
        $ph_c_fm_radio = $row_description['ph_c_fm_radio'];
        $ph_c_usb = $row_description['ph_c_usb'];
        $ph_c_infrared_port = $row_description['ph_c_infrared_port'];
        $ph_f_sensors = $row_description['ph_f_sensors'];
        $ph_f_messaging = $row_description['ph_f_messaging'];
        $ph_f_browser = $row_description['ph_f_browser'];
        $ph_f_java = $row_description['ph_f_java'];
        $ph_b_type = $row_description['ph_b_type'];
        $ph_b_capacity = $row_description['ph_b_capacity'];
        $ph_m_made_by = $row_description['ph_m_made_by'];
        $ph_m_color = $row_description['ph_m_color'];
        $ph_m_others_features = $row_description['ph_m_others_features'];
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
    <script src="https://kit.fontawesome.com/44f64a1e4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>

<body>
    
<script type="text/javascript">
$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=radio]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});

</script>
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


                        <li >
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
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
            
            <div class="col-md-12"><!--col-md-12 start-->
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
                                <?php 
                                    $get_rating = "select total_rating_point,rating_number from rating where p_id=$p_id";
                                    $run_rating = mysqli_query($db,$get_rating);
                                    $row_rating = mysqli_fetch_array($run_rating);
                                    $total_rating = $row_rating['total_rating_point'];
                                    $rating_number = $row_rating['rating_number'];
                                    if($rating_number==0){
                                    }
                                    else{
                                        $avg_rating = number_format(($total_rating/$rating_number),1);
                                        if($avg_rating>=3){
                                            echo "   
                                                <div class='text-center' style='font-size: 20px;'>
                                                    <b>Rating</b> : <span style='color:blue;'><b>$avg_rating</b></span> out of 5 (Total $rating_number Review)
                                                </div>
                                            ";
                                        }
                                        else{
                                            echo "   
                                                <div class='text-center' style='font-size: 20px;'>
                                                    <b>Rating</b> : <span style='color:red;'><b>$avg_rating</b></span> out of 5 (Total $rating_number Review)
                                                </div>
                                            ";
                                        }
                                        
                                    }
                                ?><br>
                                <?php add_cart(); ?>
                                <?php 
                                    if(isset($_SESSION['customer_username'])){
                                        $customer_username = $_SESSION['customer_username'];
                                        $select = "SELECT customer_id from customer where customer_username = '$customer_username'";
                                        $row = mysqli_fetch_array(mysqli_query(
                                            $db,$select
                                        ));
                                        $customer_id = $row['customer_id'];
                                        if(isset($_POST['add_wishlist'])){
                                            add_wishlist($customer_id);
                                        }
                                    }
                                     
                                ?>
                                <form method="post" class="form-horizontal" action="details.php?p_id=<?php echo $p_id ?>" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label  class="col-md-5 control-label">Product Quantity :</label>
                                        <div class="col-md-7">
                                            <select name="product_qty" class="form-control" style="width: 200px;">
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
                                                    echo "<input type='radio' name='product_color' value='$pro_color1' checked> <b>$pro_color1</b>";
                                                    echo "<input type='radio' name='product_color' value='$pro_color2' style='margin-left:10px;' > <b>$pro_color2</b>";
                                                    echo "<br>";
                                                    echo "<input type='radio' name='product_color' value='$pro_color3' > <b>$pro_color3</b>";
                                                }
                                                else if($pro_color1!=NULL && $pro_color2!=NULL && $pro_color3==NULL){
                                                    echo "<input type='radio' name='product_color' value='$pro_color1'checked > <b>$pro_color1</b>";
                                                    echo "<input type='radio' name='product_color' value='$pro_color2' style='margin-left:10px;' > <b>$pro_color2</b>";
                                                } 
                                                else{
                                                    echo "<input type='radio' name='product_color' value='$pro_color1'checked > <b>$pro_color1</b>";
                                                }
                                            ?>                                                                                            
                                        </div>
                                    </div>
                                    <p class="price text-center" style="font-size:28px;">Product Price : Tk <?php echo $pro_price ?></p>
                                    <?php 
                                        if($pro_total_item!=0){
                                            echo "<p class='text-center' style='font-size:23px; color:green;'>$pro_total_item  item(s) is available</p>";
                                        }
                                        else{
                                            echo "<p class='text-center'  style='font-size:23px; color:red;'>Out of Stock</p>";
                                        }
                                    ?>
                                    <p class="text-center buttons">
                                        <?php 
                                            if($pro_total_item==0){
                                                echo "<button class='btn btn-primary' type='submit' name='cart_btn' id='checkBtn' disabled>
                                                        <i class='fa fa-shopping-cart'></i>&nbsp;Add to Cart
                                                    </button>";
                                            }
                                            else{
                                                echo "<button class='btn btn-primary' type='submit' name='cart_btn' id='checkBtn'>
                                                        <i class='fa fa-shopping-cart'></i>&nbsp;Add to Cart
                                                    </button>";
                                            }
                                        ?>
                                        <?php 
                                            if(isset($_SESSION['customer_username'])){
                                        ?>
                                            <button class="btn btn-primary" name="add_wishlist" type="submit" id="checkBtn">
                                                <i class="fa fa-heart" style="color: #ff0000;"></i>&nbsp;Add to wishlist
                                            </button>
                                        <?php } 
                                            else{
                                        ?>
                                            <button class="btn btn-primary">
                                                <a href="checkout.php" style="color:white; text-decoration: none;">
                                                <i class="fa fa-shopping-basket"></i>&nbsp;
                                                Buy Now</a> 
                                            </button>

                                        <?php }?>
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
                            <a href="#/" style="text-decoration: none;" data-toggle="modal" data-target="#review_modal"><h3>Review</h3></a>
                        </div>
                        <?php 
                            if(isset($_SESSION['customer_username'])){
                                $select_customer = "SELECT customer_email,customer_name from customer where 
                                customer_id = '$customer_id' AND customer_username = '$customer_username'";
                                $run = mysqli_query($db,$select_customer);
                                $row = mysqli_fetch_array($run);
                                $customer_email = $row['customer_email'];
                                $customer_name = $row['customer_name'];
                        ?>
                        <div class="modal fade" id="review_modal" role="dialog"><!-- review modal start-->
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title">
                                            <h3 class="text-center"><b><?php echo $pro_title ?></b> - Review</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="false"><span>&times;</span></button>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-text col-md-8 pull-left">
                                                    <h6><b style="margin-left: 80px;">ADD A REVIEW </b><br>Please post a user review only if you have / had this product<sup style="color: red;">*</sup></h6>
                                                </div>
                                                <h5 class=" col-md-4 text-right" style="margin-top: 17px;">
                                                        To see <a href="reviews.php?p_id=<?php echo $p_id ?>"><b>All Review</b>  </a> 
                                                </h5>
                                            </div>
                                            </div>
                                            <div class="card-body" style="margin-top: 30px;">
                                                <form method="post" enctype="multipart/form-data" id="form">
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
                                                        <input type="text" value="<?php echo $customer_username ?>" disabled class="form-control" name="review_user_name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Your Email <sup style="color: red;">*</sup></label>
                                                        <input type="email" value="<?php echo $customer_email ?>" class="form-control" name="review_user_email" disabled required>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Review Title <sup style="color: red;">*</sup></label>
                                                        <input type="text" class="form-control" name="review_title" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Review Message <sup style="color: red;">*</sup> </label>
                                                        <textarea type="text" class="form-control" name="review_message" style="resize: vertical;" required></textarea>
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
                        <?php
                            user_rating($customer_name,$customer_email,$customer_id);
                        ?>
                        <?php } 
                            else if(!isset($_SESSION['customer_username'])){                           
                        ?>
                        <div class="modal fade" id="review_modal" role="dialog"><!-- review modal start-->
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title">
                                            <h3 class="text-center"><b>Please <a href="checkout.php">login</a>  to review</b></h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="false"><span>&times;</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- review modal end-->
                        
                        <?php } ?>

                        

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
                                    <td colspan="4"><?php echo $ph_l_announced ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Status</th>
                                    <td colspan="4"><?php echo $ph_l_status ?></td>
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
                                    <td colspan="4"><?php echo $ph_n_technology ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">2G Bands</th>
                                    <td colspan="4"><?php echo $ph_n_2g_bands ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">3G Bands</th>
                                    <td colspan="4"><?php echo $ph_n_3g_bands ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1"  width="15%">4G Bands</th>
                                    <td colspan="4"><?php echo $ph_n_4g_bands ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">5G Bands</th>
                                    <td colspan="4"><?php echo $ph_n_5g_bands ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1"  width="15%">Speed</th>
                                    <td colspan="4"><?php echo $ph_n_speed ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1"  width="15%">GPRS</th>
                                    <?php 
                                        if($ph_n_gprs==1){
                                            echo "<td colspan='4' style='font-size:10px;'><i class='fa fa-check-square-o fa-2x' aria-hidden='true''></i></td>";
                                        }
                                        else if($ph_n_gprs==2){
                                            echo "<td colspan='4' style='font-size:10px;' ><i class='fa fa-window-close-o fa-2x' aria-hidden='true''></i></td>";
                                        }                                    
                                    ?>
                                    
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%"><b>EDGE</b></th>
                                    <?php 
                                        if($ph_n_edge==1){
                                            echo "<td colspan='4' style='font-size:10px;'><i class='fa fa-check-square-o fa-2x' aria-hidden='true''></i></td>";
                                        }
                                        else if($ph_n_edge==2){
                                            echo "<td colspan='4' style='font-size:10px;' ><i class='fa fa-window-close-o fa-2x' aria-hidden='true''></i></td>";
                                        }                                    
                                    ?>
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
                                    <td colspan="4"><?php echo $ph_b_dimensions ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Weight</th>
                                    <td colspan="4"><?php echo $ph_b_weight ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Build</th>
                                    <td colspan="4"><?php echo $ph_b_build ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">SIM</th>
                                    <td colspan="4"><?php echo $ph_b_sim ?></td>
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
                                    <td colspan="4"><?php echo $ph_d_type?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Size</th>
                                    <td colspan="4"><?php echo $ph_d_size ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Resolution</th>
                                    <td colspan="4"><?php echo $ph_d_resolution ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Multitouch</th>
                                    <?php 
                                        if($ph_d_multitouch==1){
                                            echo "<td colspan='4' style='font-size:10px;'><i class='fa fa-check-square-o fa-2x' aria-hidden='true''></i></td>";
                                        }
                                        else if($ph_d_multitouch==2){
                                            echo "<td colspan='4' style='font-size:10px;' ><i class='fa fa-window-close-o fa-2x' aria-hidden='true''></i></td>";
                                        }                                    
                                    ?>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Protection</th>
                                    <td colspan="4"><?php echo $ph_d_protection ?></td>
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
                                    <td colspan="4"><?php echo $ph_p_os ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Chipset</th>
                                    <td colspan="4"><?php echo $ph_p_chipset ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">CPU</th>
                                    <td colspan="4"><?php echo $ph_p_cpu ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">GPU</th>
                                    <td colspan="4"><?php echo $ph_p_gpu ?></td>
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
                                    <td colspan="4"><?php echo $ph_m_card_slot ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Internal</th>
                                    <td colspan="4"><?php echo $ph_m_internal ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">RAM</th>
                                    <td colspan="4"><?php echo $ph_m_ram ?></td>
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
                                    <td colspan="4"><?php echo $ph_c_primary_cam ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Secondary camera</th>
                                    <td colspan="4"><?php echo $ph_c_secondary_cam ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Features</th>
                                    <td colspan="4"><?php echo $ph_c_features ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Video</th>
                                    <td colspan="4"><?php echo $ph_c_video ?></td>
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
                                    <td colspan="4"><?php echo $ph_s_alert_types ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Loudspeaker</th>
                                    <td colspan="4"><?php echo $ph_s_loudspeaker ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">3.5mm Jack</th>
                                    <?php 
                                        if($ph_s_35mm_jak==1){
                                            echo "<td colspan='4' style='font-size:10px;'><i class='fa fa-check-square-o fa-2x' aria-hidden='true''></i></td>";
                                        }
                                        else if($ph_s_35mm_jak==2){
                                            echo "<td colspan='4' style='font-size:10px;' ><i class='fa fa-window-close-o fa-2x' aria-hidden='true''></i></td>";
                                        }                                    
                                    ?>
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
                                    <td colspan="4"><?php echo $ph_c_wlan ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Bluetooth</th>
                                    <td colspan="4"><?php echo $ph_c_bluetooth ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">GPS</th>
                                    <td colspan="4"><?php echo $ph_c_gps ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">NFC</th>
                                    <?php 
                                        if($ph_c_nfc==1){
                                            echo "<td colspan='4' style='font-size:10px;'><i class='fa fa-check-square-o fa-2x' aria-hidden='true''></i></td>";
                                        }
                                        else if($ph_c_nfc==2){
                                            echo "<td colspan='4' style='font-size:10px;' ><i class='fa fa-window-close-o fa-2x' aria-hidden='true''></i></td>";
                                        }                                    
                                        
                                    ?>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">FM Radio</th>
                                    <?php 
                                        if($ph_c_fm_radio==1){
                                            echo "<td colspan='4' style='font-size:10px;'><i class='fa fa-check-square-o fa-2x' aria-hidden='true''></i></td>";
                                        }
                                        else if($ph_c_fm_radio==2){
                                            echo "<td colspan='4' style='font-size:10px;' ><i class='fa fa-window-close-o fa-2x' aria-hidden='true''></i></td>";
                                        }                                    
                                    ?>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">USB</th>
                                    <td colspan="4"><?php echo $ph_c_usb ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Infrared port</th>
                                    <?php 
                                        if($ph_c_infrared_port==1){
                                            echo "<td colspan='4' style='font-size:10px;'><i class='fa fa-check-square-o fa-2x' aria-hidden='true''></i></td>";
                                        }
                                        else if($ph_c_infrared_port==2){
                                            echo "<td colspan='4' style='font-size:10px;' ><i class='fa fa-window-close-o fa-2x' aria-hidden='true''></i></td>";
                                        }                                    
                                    ?>
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
                                    <td colspan="4"><?php echo $ph_f_sensors ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Messaging</th>
                                    <td colspan="4"><?php echo $ph_f_messaging ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Browser</th>
                                    <td colspan="4"><?php echo $ph_f_browser ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Java</th>
                                    <?php 
                                        if($ph_f_java==1){
                                            echo "<td colspan='4' style='font-size:10px;'><i class='fa fa-check-square-o fa-2x' aria-hidden='true''></i></td>";
                                        }
                                        else if($ph_f_java==2){
                                            echo "<td colspan='4' style='font-size:10px;' ><i class='fa fa-window-close-o fa-2x' aria-hidden='true''></i></td>";
                                        }                                    
                                    ?>
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
                                    <td colspan="4"><?php echo $ph_b_type ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Battery Capacity</th>
                                    <td colspan="4"><?php echo $ph_b_capacity ?></td>
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
                                    <td colspan="4"><?php echo $ph_m_made_by ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Color</th>
                                    <td colspan="4"><?php echo $ph_m_color ?></td>
                                </tr>
                                <tr>
                                    <th colspan="1" width="15%">Other Features</th>
                                    <td colspan="4"><?php echo $ph_m_others_features ?></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div> 
                    
                </div><!-- products details end-->
                
                

                <div class="row col-md-12 container">   
                    <form method="post">
                        <textarea placeholder="Comment Here..." name="comment" class="form-control" rows="5"></textarea>
                        <?php 
                            if(isset($_SESSION['customer_username'])){

                            
                        ?>
                        <div class="pull-right" style="margin-top: 10px;margin-bottom:10px;">
                            <button  class="btn btn-success btn-lg" type="submit" name="comment_submit"><span style="padding:10px;" class='text-center'>Comment</span></button>
                        </div> 
                        <?php } 
                        else{

                        ?>
                        <div class="pull-right" style="margin-top: 10px;margin-bottom:10px;">
                        <button  class="btn btn-success btn-lg"><a href="checkout.php" style="padding:10px; color:white" class='text-center'>Please Log In to Comment</a></button>
                        </div>   
                        <?php } ?>
                    </form>
                </div>

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
            </div><!--col-md-12 end-->
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

<?php }?>
