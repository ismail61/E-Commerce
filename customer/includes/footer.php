<?php 
    include("includes/db.php");
?>

<div id="footer"><!--footer start-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 start-->
                <h4>Pages</h4>
                <ul>
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../contact.php">Contract Us</a></li>
                    <li><a href="../shop.php">Shop</a></li>
                    <li><a href="my_account.php?my_order">My Account</a></li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
                    <li>
                        <?php 
                            if(!isset($_SESSION['customer_username'])){
                                echo " <a href='../checkout.php'>Login</a> ";
                            }
                            else{
                                echo " <a href='../logout.php'>LogOut</a> ";
                            }
                        ?>
                    </li>
                    <li><a href="../customer_register.php">Register</a></li>
                    <hr>
                </ul>
            </div><!--col-sm-6 col-md-3 end-->
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 start-->
                <h4>Top Product Categories</h4>
                <ul>
                    <?php 
                        $get_top_pro_cat = "select * from product_categories LIMIT 0,7";
                        $run_top_pro_cat = mysqli_query($con,$get_top_pro_cat);
                        while ($row_top_pro_cat = mysqli_fetch_array($run_top_pro_cat)) {
                            $top_pro_cat_id = $row_top_pro_cat['p_cat_id'];
                            $top_pro_cat_title = $row_top_pro_cat['p_cat_title'];
                            echo "
                                <li><a href='../shop.php?p_cat_id=$top_pro_cat_id'>$top_pro_cat_title</a></li>
                            ";

                        }
                    ?>
                </ul>
            </div><!--col-sm-6 col-md-3-->
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 start-->
                <h4>Where to find us</h4>
                <p>
                    <strong>mobile-shop.com</strong>
                    <br>Ismail Hosen Raj
                    <br>Shreshtajit Das
                    <br>Sylhet(SUST)
                    <br>ismailhosen601@gmail.com
                    <br>+8801770964628
                </p>
                <a href="../contact.php">Go to contact us page</a>
            </div><!--col-sm-6 col-md-3-->
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 start-->
                <h4>Get the more news</h4><br>
                <h3>Stay with touch</h3>
                <div class="social_link">
                    <a href="https://www.facebook.com/hosen61" target="_blank"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a>
                </div>
            </div><!--col-sm-6 col-md-3-->
        </div>
        
    </div>
    
</div><!--footer end-->
<div id="copyright">
    <div class="container">
        <div class="col-md-12">
            <p>&copy;&nbsp;All copyright are reserved</p>
        </div>
    </div>
</div>