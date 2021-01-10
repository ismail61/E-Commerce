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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>

<body>
<script type="text/javascript">
$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        //alert("You must check at least one checkbox.");
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
                        <li  class="active">
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
                    <li>Cart</li>
                </ul>
            </div><!--col-md-12 breadcrumb end-->
            <form action="" enctype="multipart/form-data" method="POST">
                <div class="col-md-9" id="cart"><!--col-md-9 start-->
                    <div class="box">
                        <h1 class="text-center">Shopping Cart</h1>
                        <p class="text-center">Currently you have <?php count_item(); ?> item(s) in your cart</p>
                        <hr>
                        <table class="table table-responsive table-bordered" ><!--table responsive start-->
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Color</th>
                                    <th>Delete</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $ip_address = get_client_ip();
                                    $select_cart = "select * from cart where ip_address = '$ip_address'";
                                    $run_cart = mysqli_query($db,$select_cart);
                                    while($row_cart = mysqli_fetch_array($run_cart)){
                                        $total = 0;
                                        $p_id = $row_cart['p_id'];
                                        $product_quantity = $row_cart['product_quantity'];
                                        $product_color = $row_cart['product_color'];
                                        $get_product = "select * from products where p_id ='$p_id'";
                                        $run_product = mysqli_query($db,$get_product);
                                        $row_product = mysqli_fetch_array($run_product);
                                        $p_img = $row_product['p_img1'];
                                        $p_title = $row_product['p_title'];
                                        $p_price = $row_product['p_price'];
                                        $sub_total = $p_price * $product_quantity;
                                        $total += $sub_total;
                                    
                                ?>
                                <tr>
                                    <td><a href="details.php?p_id=<?php echo $p_id ?>"><img src="admin_area/product_images/upload_image/<?php echo $p_img ?>" 
                                                     class="img-responsive"style="width: 50px;"></a></td>
                                    <td><a href="details.php?p_id=<?php echo $p_id ?>"><?php echo $p_title ?></a></td>
                                    <td><?php echo $product_quantity ?></td>
                                    <td><?php echo $p_price ?></td>
                                    <td><?php echo $product_color ?></td>
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $p_id ?>"> </td>
                                    <td><?php echo $total ?></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="6">TOTAL AMOUNT :</th>
                                    <th >Tk <?php total_price(); ?></th>
                                </tr>
                            </tfoot>
                        </table><!--table responsive end-->
                    </div>
                    
                    <div class="box-footer col-md-12"><!--box-footer col-md-12 start-->
                        <div class="pull-left">
                            <a href="shop.php" class="btn btn-default">
                                <i class="fa fa-chevron-left"></i>&nbsp;Continue Shopping
                            </a>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-default" type="submit" name="update" value="Update Cart" id="checkBtn">
                                <i class="fa fa-refresh"></i>&nbsp;Update Cart
                            </button>
                            <a href="checkout.php" class="btn btn-primary">
                                Proceed to checkout&nbsp;<i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div><!--box-footer col-md-12-->
                    <hr><br>
                </div><!--col-md-9 end-->
            </form>
            <?php update_cart(); ?>
            <?php 
                if(isset($_SESSION['customer_username'])){
                    $customer_username = $_SESSION['customer_username'];
                }
            ?>
            <br><br>
            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3 class="text-center">Order Summary</h3>
                    </div>
                    <p class="text-muted">
                        Shipping and additional costs are calculated based on the values you have entered
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Order Sub Total</td>
                                    <th>Tk <?php total_price();?></th>
                                </tr>
                                <tr>
                                    <td>Shipping and Handling</td>
                                    <td>Tk 0</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>Tk 0</td>
                                </tr>
                                <tr class="size">
                                    <th class="text-left">Total</th>
                                    <th>Tk <?php echo total_price(); ?> </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!--footer start-->
    <div style="margin-top: 40px;">
        <?php
            include("includes/footer.php");
        ?>
    </div>
    <!--footer end--> 
    <?php 
        if(isset($_SESSION['customer_username'])){
            $name = $_SESSION['customer_username'];
            $value = 0;
            $res = mysqli_fetch_assoc(mysqli_query($con,"SELECT status_ from customer where customer_username='$name'"));
            $status = $res['status_'];
            if($status==$value){
                echo "<script>window.open('logout.php','_self')</script>";
            }
        }
    ?>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>

</html>