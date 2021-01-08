<?php 
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
?>

<?php 
    if(isset($_SESSION['customer_username'])){

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
    
    <div id="content">
        <div class="container">
            <div class="col-md-12" style="margin-top: 15px;"><!--col-md-12 breadcrumb start-->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>All Review</li>
                </ul>
            </div><!--col-md-12 breadcrumb end-->
            <div class="box">
                    <?php 
                       $p_id = $_GET['p_id'];
                        $select_comment = "SELECT * from user_review where p_id = '$p_id'";
                        $run_comment = mysqli_query($db,$select_comment);
                        while($row = mysqli_fetch_assoc($run_comment)){
                            $review_title = $row['review_title'];
                            $review_message = $row['review_message'];
                            $review_date = $row['review_user_date'];
                            $replied_message = $row['replied'];
                            $replied_date = $row['replied_date'];
                            $customer_id = $row['customer_id'];
                            $select_cus = "SELECT customer_image,customer_name from customer where customer_id = '$customer_id'";
                            $run_cus = mysqli_query($db,$select_cus);
                            $row_cus = mysqli_fetch_assoc($run_cus);
                            $customer_image = $row_cus['customer_image'];
                            $customer_name = $row_cus['customer_name'];
                            
                        
                    ?>
                    <div class="row"> 
                    <div class="col-md-12">
                        <div class="media">
                            <img src="customer/customer_images/upload/<?php echo $customer_image ?>" height="60px" width="60px" class="img-responsive img-thumbnail">
                            <div class="media-body">
                                <div class="ml-2 mt-1"><span style="font-size:22px"><?php echo $customer_name ?></span> <i><span class="lead"> &nbsp; Posted on <?php echo $review_date ?></span></i></div> 
                                <p class="ml-3"><?php echo $review_message ?>
                                </p>
                                <?php 
                                    if($replied_message!=NULL OR strlen($replied_message)!=0){
                                ?>
                                    <div class="media">
                                        <img src="customer/customer_images/admin.png" height="40px" width="40px" class="img-responsive img-thumbnail">
                                        <div class="media-body">
                                        <div class="ml-2"><span style="font-size:20px">Replied By Admin</span> <i><span class="lead">&nbsp; Posted on <?php echo $replied_date ?></span></i></div> 
                                        <p class="ml-3"> <?php echo $replied_message ?> 
                                        </p>
                                    </div>
                                <?php } ?>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <hr class="dotted">
                    <?php } ?>

                    
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</body>

</html>

                        <?php } ?>