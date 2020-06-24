<?php 

 $db = mysqli_connect("localhost","root","","Ecom");

 //Product Categories on shop sidebar
function getProCat(){
    global $db;
    $get_top_pro_cat = "select * from product_categories";
    $run_top_pro_cat = mysqli_query($db,$get_top_pro_cat);
    while ($row_top_pro_cat = mysqli_fetch_array($run_top_pro_cat)) {
        $top_pro_cat_id = $row_top_pro_cat['p_cat_id'];
        $top_pro_cat_title = $row_top_pro_cat['p_cat_title'];
        echo "
            <li class='text-uppercase'><a href='shop.php?p_cat_id=$top_pro_cat_id'>
            <b>$top_pro_cat_title</b></a></li>
        ";

    }
}

//Categories on shop sidebar
function getCat(){
    global $db;
    $get_cat = "select * from categories";
    $run_cat = mysqli_query($db,$get_cat);
    while($row_cat = mysqli_fetch_array($run_cat)){
        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['cat_title'];
        echo "
            <li class='text-uppercase'><a href='shop.php?cat_id=$cat_id'><b>$cat_title</b></a></li>
        ";
    }
}

//products
function getproducts(){
    global $db;
    $get_products = "select * from products order by 1 DESC LIMIT 0,8";
    $run_products = mysqli_query($db,$get_products);
    while($row_products = mysqli_fetch_array($run_products)){
        $products_id = $row_products['p_id'];
        $products_title = $row_products['p_title'];
        $products_price = $row_products['p_price'];
        $products_img = $row_products['p_img1'];    
        echo "
            <div class='col-md-3 col-sm-6 center-responsive' >
                <div class='product'>
                    <a href='details.php?p_id=$products_id'>
                        <img src='admin_area/product_images/upload_image/$products_img' class='img-responsive'>
                    </a>
                    <div class='text'>
                        <h3><a href='details.php?p_id=$products_id'>$products_title</a></h3>
                    </div>
                    <p class='price'>Tk $products_price</p>
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


//products categories base products
function pro_cat_base_products(){
    global $db;
    if(isset($_GET['p_cat_id'])){
        $p_cat_id = $_GET['p_cat_id'];
        $get_pro_cat = "select * from product_categories where p_cat_id=$p_cat_id";
        $run_pro_cat = mysqli_query($db,$get_pro_cat);
        $row_pro_cat = mysqli_fetch_array($run_pro_cat);
        $pro_cat_title = $row_pro_cat['p_cat_title'];
        $pro_cat_description = $row_pro_cat['p_cat_description'];
        

        $get_product = "select * from products where p_cat_id = $p_cat_id";
        $run_product = mysqli_query($db,$get_product);
        $count_products = mysqli_num_rows($run_product);
        if($count_products==0){
            echo "
                <div class='box'>
                    <h1 class='text-center'>OPPS</h1>
                    <p class='text-center'>No Products Found In This Category</p>
                </div>
            ";
        }
        else{
            echo "
                <div class='box'>
                    <h1 class='text-center'>$pro_cat_title</h1>
                    <p>$pro_cat_description</p>
                </div>
            ";
            while($row_products = mysqli_fetch_array($run_product)){
                $products_id = $row_products['p_id'];
                $products_title = $row_products['p_title'];
                $products_price = $row_products['p_price'];
                $products_img = $row_products['p_img1'];    
                echo "
                    <div class='col-md-4 col-sm-6 center-responsive' >
                        <div class='product'>
                            <a href='details.php?p_id=$products_id'>
                                <img src='admin_area/product_images/upload_image/$products_img' class='img-responsive'>
                            </a>
                            <div class='text'>
                                <h3><a href='details.php?p_id=$products_id'>$products_title</a></h3>
                            </div>
                            <p class='price'>Tk $products_price</p>
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
    }
}


//categories base products
function cat_base_products(){
    global $db;
    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
        $get_cat = "select * from categories where cat_id=$cat_id";
        $run_cat = mysqli_query($db,$get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_title = $row_cat['cat_title'];
        $cat_description = $row_cat['cat_description'];
        

        $get_product = "select * from products where cat_id = $cat_id";
        $run_product = mysqli_query($db,$get_product);
        $count_products = mysqli_num_rows($run_product);
        if($count_products==0){
            echo "
                <div class='box'>
                    <h1 class='text-center'>OPPS</h1>
                    <p class='text-center'>No Products Found In This Category</p>
                </div>
            ";
        }
        else{
            echo "
                <div class='box'>
                    <h1 class='text-center'>$cat_title</h1>
                    <p>$cat_description</p>
                </div>
            ";
            while($row_products = mysqli_fetch_array($run_product)){
                $products_id = $row_products['p_id'];
                $products_title = $row_products['p_title'];
                $products_price = $row_products['p_price'];
                $products_img = $row_products['p_img1'];    
                echo "
                    <div class='col-md-4 col-sm-6 center-responsive' >
                        <div class='product'>
                            <a href='details.php?p_id=$products_id'>
                                <img src='admin_area/product_images/upload_image/$products_img' class='img-responsive'>
                            </a>
                            <div class='text'>
                                <h3><a href='details.php?p_id=$products_id'>$products_title</a></h3>
                            </div>
                            <p class='price'>Tk $products_price</p>
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
    }
}

//related products function
function related_products(){
    global $db;
    if(isset($_GET['p_id'])){
        $p_id = $_GET['p_id'];
        $query = "select * from products where p_id=$p_id";
        $run_query = mysqli_query($db,$query);
        $row_query = mysqli_fetch_array($run_query);
        $p_cat_id = $row_query['p_cat_id'];


        $get_pro = "select * from products where p_cat_id = $p_cat_id order by 1 DESC LIMIT 0,3";
        $run_pro = mysqli_query($db,$get_pro);
        $count_pro = mysqli_num_rows($run_pro);
        if($count_pro==0){
            echo "
                <div class='box'>
                    <h1 class='text-center'>OPPS</h1>
                    <p>No Products Is Founded In This Products Category</p>
                </div>
            ";
        }
        else{
            while($row_pro = mysqli_fetch_array($run_pro)){
                $products_id = $row_pro['p_id'];
                $products_title = $row_pro['p_title'];
                $products_price = $row_pro['p_price'];
                $products_img = $row_pro['p_img1'];    
                echo "
                    <div class='col-md-4 col-sm-6 center-responsive single' >
                        <div class='product' style='height: 410px;'>
                            <a href='details.php?p_id=$products_id'>
                                <img src='admin_area/product_images/upload_image/$products_img' class='img-responsive'>
                            </a>
                            <div class='text'>
                                <h3><a href='details.php?p_id=$products_id'>$products_title</a></h3>
                            </div>
                            <p class='price'>Tk $products_price</p>
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
        
    }
}


?>