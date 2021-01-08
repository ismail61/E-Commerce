<?php 
    session_start();
    include("includes/db.php");
    include("admin_functions/functions.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
    $admin_email = $_SESSION['admin_email'];
    $select_admin = "select * from admins where admin_email = '$admin_email'";
    $run_admin = mysqli_query($db,$select_admin);
    $count = mysqli_num_rows($run_admin);
    if($count==1){
        $row = mysqli_fetch_array($run_admin);
        $admin_id = $row['admin_id'];
        $admin_name = $row['admin_name'];


        $select_products = "select * from products";
        $run_products = mysqli_query($db,$select_products);
        $products = mysqli_num_rows($run_products);


        $select_customer = "select * from customer";
        $run_customer = mysqli_query($db,$select_customer);
        $customers = mysqli_num_rows($run_customer);


        $select_product_categories = "select * from product_categories";
        $run_product_categories = mysqli_query($db,$select_product_categories);
        $product_categories = mysqli_num_rows($run_product_categories);

        $select_order = "select * from customer_order";
        $run_order = mysqli_query($db,$select_order);
        $orders = mysqli_num_rows($run_order);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/style.css">
</head>
<body>
    
    <div id="top_side">
        <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: black;">
            <div class="navbar-header">
                <button  class="navbar-toggle" data-toggle="collapse" data-target="#nav_collapse">
                    <span class="sr-only">Toggle</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>                
            </div>
            <ul class="nav navbar-right nav-top"><!--nav navbar-right nav-top start-->
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> <?php echo $admin_name ?>&nbsp;
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a href="index.php?profile">
                                <i class="fa fa-user"></i> Profile
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="index.php?view_product">
                                <i class="fa fa-envelope"></i> Products &nbsp;&nbsp;
                                <span class="badge"> <?php echo $products ?></span>
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="index.php?view_customer">
                                <i class="fa fa-users"></i> Customer &nbsp;&nbsp; 
                                <span class="badge"><?php echo $customers ?></span>
                            </a>
                        </li>
                        <!--
                        <li class="dropdown-item">
                            <a href="index.php?profile">
                                <i class="fa fa-gear"></i> product Categories
                            </a>
                        </li>-->
                        <li class="divider"></li>
                        <li>
                            <a href="includes/admin_logout.php">
                                Logout <i class="fa fa-power-off"></i> 
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!--nav navbar-right nav-top end-->
            
        </nav>
        <div class="row">
            <div class="col-md-2 col-lg-2 col-sm-3" style="background-color: black;">
                <div class="navbar-collapse collapse" id="nav_collapse">
                    <ul class="nav navbar-nav side-navbar">
                        <li>
                            <a href="index.php?dashboard">
                                <i class="fa fa-dashboard"> Dashboard</i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#products">
                                <i class="fa fa-table"> Products</i>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="collapse" id="products">
                                <li>
                                    <a href="index.php?insert_product_description">Insert Description</a>
                                </li>
                                <li>
                                    <a href="index.php?insert_product">Insert Product</a>
                                </li>
                                <li>
                                    <a href="index.php?view_product">View Product</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#product_cat">
                                <i class="fa fa-table"> Product Categories</i>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="collapse" id="product_cat">
                                <li>
                                    <a href="index.php?insert_product_cat">Insert Product Categories</a>
                                </li>
                                <li>
                                    <a href="index.php?view_product_cat">View Product Categories</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#categories">
                                <i class="fa fa-table"> Categories</i>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="collapse" id="categories">
                                <li>
                                    <a href="index.php?insert_cat">Insert Categories</a>
                                </li>
                                <li>
                                    <a href="index.php?view_cat">View Categories</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#slider">
                                <i class="fa fa-table"> Slider</i>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="collapse" id="slider">
                                <li>
                                    <a href="index.php?insert_slider">Insert Slider</a>
                                </li>
                                <li>
                                    <a href="index.php?view_slider">View Slider</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?view_customer">
                                <i class="fa fa-users"></i> View Customers
                            </a>
                        </li>
                        <li>
                            <a href="index.php?view_order">
                                <i class="fa fa-list"></i> View Orders
                            </a>
                        </li>
                        <li>
                            <a href="index.php?view_payments">
                                <i class="fa fa-money"></i> View Payments
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#admin">
                                <i class="fa fa-user-secret"> Admins</i>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="collapse" id="admin">
                                <li>
                                    <a href="index.php?insert_admin">Insert Admin</a>
                                </li>
                                <li>
                                    <a href="index.php?view_admins">View Admins</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?user_review">
                                <i class="fa fa-star"></i> View Reviews
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-lg-10 col-sm-9">
                <div id="contain">
                    <div class="container-fluid">
                        <?php 
                            if(isset($_GET['dashboard'])){
                                include("includes/dashboard.php");
                            }
                            else if(isset($_GET['insert_product'])){
                                include("includes/insert_product.php");
                            }
                            else if(isset($_GET['insert_product_description'])){
                                include("includes/insert_product_description.php");
                            }
                            else if(isset($_GET['view_product'])){
                                include("includes/view_products.php");
                            }
                            else if(isset($_GET['edit_product'])){
                                include("edit_product.php");
                            }
                            else if(isset($_GET['view_customer'])){
                                include("includes/view_customer.php");
                            }
                            else if(isset($_GET['view_customer'])){
                                include("includes/view_customer.php");
                            }
                            else if(isset($_GET['insert_admin'])){
                                include("includes/insert_admin.php");
                            }
                            else if(isset($_GET['view_admins'])){
                                include("includes/view_admins.php");
                            }
                            else if(isset($_GET['view_customer'])){
                                include("includes/view_customer.php");
                            }
                            else if(isset($_GET['insert_product_cat'])){
                                include("insert_product_cat.php");
                            }
                            else if(isset($_GET['view_product_cat'])){
                                include("view_product_cat.php");
                            }
                            else if(isset($_GET['edit_product_cat'])){
                                include("edit_product_cat.php");
                            }
                            else if(isset($_GET['insert_cat'])){
                                include("insert_cat.php");
                            }
                            else if(isset($_GET['view_cat'])){
                                include("view_cat.php");
                            }
                            else if(isset($_GET['edit_cat'])){
                                include("edit_cat.php");
                            }
                            else if(isset($_GET['view_order'])){
                                include("view_order.php");
                            }
                            else if(isset($_GET['insert_slider'])){
                                include("insert_slider.php");
                            }
                            else if(isset($_GET['view_slider'])){
                                include("view_slider.php");
                            }
                            else if(isset($_GET['edit_slider'])){
                                include("edit_slider.php");
                            }
                            else if(isset($_GET['profile'])){
                                include("profile.php");
                            }
                            else if(isset($_GET['view_payments'])){
                                include("view_payments.php");
                            }
                            else if(isset($_GET['edit_profile'])){
                                include("includes/edit_profile.php");
                            }
                            else if(isset($_GET['user_review'])){
                                include("user_review.php");
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    
    </div>


    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>

</html>

<?php } ?>