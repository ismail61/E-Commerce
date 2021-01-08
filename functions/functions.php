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
                <div class='product' style='height:440px;'>
                    <a href='details.php?p_id=$products_id' style='height:300px;'>
                        <img height='100px' width='100px' src='admin_area/product_images/upload_image/$products_img' class='img-responsive'>
                    </a>
                    <div class='text'>
                        <h3><a href='details.php?p_id=$products_id'>$products_title</a></h3>
                    </div><br>
                    <p class='price'>Tk $products_price</p><br>
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


        $get_pro = "select * from products where p_cat_id = $p_cat_id order by 1 DESC LIMIT 1,4";
        $run_pro = mysqli_query($db,$get_pro);
        $count_pro = mysqli_num_rows($run_pro);
        if($count_pro==0){
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

//rating 
function user_rating($customer_name,$customer_email,$customer_id){
    global $db;
    if(isset($_POST['review_submit'])){
        
        $exists = true;         //rating not exists in this product
        $p_id = $_GET['p_id'];
        $rating = $_POST['rating'];
        //$review_user_name  = $_POST['review_user_name'];
        //$review_user_email = $_POST['review_user_email'];
        $review_title = $_POST['review_title'];
        $review_message = $_POST['review_message'];

        $get_p_id = "select p_id from rating";
        $run_p_id = mysqli_query($db,$get_p_id);
        while($row_p_id = mysqli_fetch_array($run_p_id)){
            $rating_p_id = $row_p_id['p_id'];
            if($rating_p_id==$p_id){
                $exists = false;            //rating already exists in this product
                break;
            }
            else{
                continue;
            }
        }
            
        if($exists) {

            $insert_rating = "INSERT INTO rating(p_id,rating_number,total_rating_point,created_rating,modified_rating) 
                            values('$p_id','1','$rating',NOW(),NOW());";
            $run_insert_rating = mysqli_query($db,$insert_rating);
            if($run_insert_rating){
                $client_ip = get_client_ip();
                $insert_review = "INSERT INTO user_review(p_id,ip_address,review_user_date,review_user_name,review_user_email,review_title,review_message,rating_point,customer_id) 
                                    VALUES ('$p_id','$client_ip',NOW(),'$customer_name','$customer_email','$review_title','$review_message','$rating','$customer_id');";
                $run_insert_review = mysqli_query($db,$insert_review);
                if($run_insert_review){
                    //echo "<script>alert('Inserted Rating successfully')</script>";
                    echo "<script>window.open('details.php?p_id=$p_id','_self')</script>";
                }
                else{
                    echo "<script>alert('Inserted Review Not successfully But ')</script>";

                }
            }
            else{
                echo "<script>alert('Inserted Rating  Not successfully')</script>";
            }
        }
        else{

            $get_p_idd = "select * from rating where p_id=$p_id";
            $run_p_idd = mysqli_query($db,$get_p_idd);
            $row_p_idd = mysqli_fetch_array($run_p_idd);
            $rating_number = $row_p_idd['rating_number'] + 1;
            $total_rating_point = $row_p_idd['total_rating_point'] + $rating;
            $created_rating =$row_p_idd['created_rating'];
            $update_rating ="UPDATE rating SET rating_number = '$rating_number' , total_rating_point ='$total_rating_point' ,
                             created_rating = '$created_rating', modified_rating = NOW()
                            where p_id=$p_id;
                            ";
            $run_update_query = mysqli_query($db,$update_rating);
            if($run_update_query){
                $client_ip = get_client_ip();
                $insert_review = "INSERT INTO user_review(p_id,ip_address,review_user_date,review_user_name,review_user_email,review_title,review_message,rating_point,customer_id) 
                VALUES ('$p_id','$client_ip',NOW(),'$customer_name','$customer_email','$review_title','$review_message',
                '$rating','$customer_id');";
                $run_insert_review = mysqli_query($db,$insert_review);
                if($run_insert_review){
                    //echo "<script>alert('Inserted Rating successfully')</script>";
                    echo "<script>window.open('details.php?p_id=$p_id','_self')</script>";
                }
                else{
                    echo "<script>alert('Inserted Review Not successfully ')</script>";

                }
                
            }
            else{
                echo "<script>alert('Inserted Rating Not successfully')</script>";
            }
        }
        
    }
}
//check email
function check_email($email_address){

    $email = "$email_address";
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

//add cart 
function add_cart(){
    global $db;
    if(isset($_POST['cart_btn'])){
        $p_id = $_GET['p_id'];
        $product_quantity = $_POST['product_qty'];
        $product_color = $_POST['product_color'];
        $client_ip = get_client_ip();
        $check = "select * from cart where ip_address = '$client_ip' AND p_id ='$p_id'";
        $run_check = mysqli_query($db,$check);
        $row_cart = mysqli_num_rows($run_check);
        if($row_cart>0){
            echo "<script>alert('This product is already added in your cart')</script>";
            echo "<script>window.open('details.php?p_id=$p_id','_self')</script>";
        }
        else{
            $insert_cart = "INSERT INTO cart(p_id,ip_address,product_quantity,product_color)
                            VALUES('$p_id','$client_ip','$product_quantity','$product_color');";
            $run_insert_cart = mysqli_query($db,$insert_cart);
            if($run_insert_cart){
                //echo "<script>alert('Inserted')</script>";
                echo "<script>window.open('details.php?p_id=$p_id','_self')</script>";
            }
            else{
                echo "<script>alert('Not Inserted')</script>";

            }
        }
    }

}
//add wishlist

function add_wishlist($customer_id){
    global $db;
    $p_id = $_GET['p_id'];
    $product_quantity = $_POST['product_qty'];
    $product_color = $_POST['product_color'];
    $check = "SELECT * from wishlist where customer_id = '$customer_id' AND p_id ='$p_id'";
    $run_check = mysqli_query($db,$check);
    $row_count = mysqli_num_rows($run_check);
    if($row_count>0){
        echo "<script>alert('This product is already added in your wishlist')</script>";
        echo "<script>window.open('details.php?p_id=$p_id','_self')</script>";
    }
    else if($row_count==0){
        $insert_wishlist = "INSERT INTO wishlist(p_id,customer_id,product_quantity,product_color)
                        VALUES('$p_id','$customer_id','$product_quantity','$product_color');";
        $run_insert_wishlist = mysqli_query($db,$insert_wishlist);
        if($run_insert_wishlist){
            //echo "<script>alert('Inserted wishlist')</script>";
            echo "<script>window.open('customer/my_account.php?my_wishlist','_self')</script>";
        }
        else{
            echo "<script>alert('Not Inserted')</script>";

        }
            
        }
}
//count item
function count_item(){
    global $db;
    $client_ip = get_client_ip();
    $get_item = "select * from cart where ip_address='$client_ip'";
    $run_item = mysqli_query($db,$get_item);
    $count_item = mysqli_num_rows($run_item);
    echo $count_item;
}
//total price
function total_price(){
    global $db;
    $total_price = 0;
    $client_ip = get_client_ip();
    $get_cart = "select * from cart where ip_address='$client_ip'";
    $run_cart = mysqli_query($db,$get_cart);
    while($row_cart = mysqli_fetch_array($run_cart)){
        $p_id = $row_cart['p_id'];
        $product_quantity = $row_cart['product_quantity'];
        $get_price = "select p_price from products where p_id='$p_id'";
        $run_price = mysqli_query($db,$get_price);
        $row_price = mysqli_fetch_array($run_price);
        $sub_price = $row_price['p_price'] * $product_quantity;
        $total_price += $sub_price;
    }
    echo $total_price;
}
//update  cart
function update_cart(){
    global $db;
    if(isset($_POST['update'])){
        foreach ($_POST['remove'] as $remove_p_id) {
            $delete_cart = "delete from cart where p_id=$remove_p_id";
            $run_delete_cart = mysqli_query($db,$delete_cart);
            if($run_delete_cart){
                //echo "<script>alert('Updated Cart')</script>";
                echo "<script>window.open('cart.php','_SELF')</script>";
            }
            else{
                echo "<script>alert('Updated Cart Not Successfully')</script>";
            }
        }
    }
}
// Function to get the client IP address
function get_client_ip() {

    $ip_address = '';

    if (isset($_SERVER['HTTP_CLIENT_IP'])){
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else if(isset($_SERVER['HTTP_X_FORWARDED'])){
        $ip_address = $_SERVER['HTTP_X_FORWARDED'];
    }
    else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
        $ip_address = $_SERVER['HTTP_FORWARDED_FOR'];
    }
    else if(isset($_SERVER['HTTP_FORWARDED'])){
        $ip_address = $_SERVER['HTTP_FORWARDED'];
    }
    else if(isset($_SERVER['REMOTE_ADDR'])){
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    else{
        $ip_address = 'UNKNOWN';
    }
    return $ip_address;
}

//insert customer

function insert_customer(){
    global $db;
    if(isset($_POST['submit'])){
        $customer_name = $_POST['c_name'];
        $customer_email = $_POST['c_email'];
        $customer_phone = $_POST['c_phone'];
        $customer_username = $_POST['c_username'];
        $customer_password = $_POST['c_password'];
        $customer_division = $_POST['c_division'];
        $customer_district = $_POST['c_district'];
        $customer_thana = $_POST['c_thana'];
        $customer_address = $_POST['c_address'];
        $customer_image = $_FILES['c_image']['name'];
        $customer_image_size = $_FILES['c_image']['size'];
        

        $allowed = array(   "jpg" => "image/jpg",
        "jpeg" => "image/jpeg", 
        "gif" => "image/gif",
        "png" => "image/png"
        );
        $ext1 = pathinfo($customer_image,PATHINFO_EXTENSION);
        $max_size = 5 * 1024 * 1024;//// Verify file size - 5MB maximum

        
        // Verify file extension
        if(!array_key_exists($ext1, $allowed)) {

            echo "<script>alert('Error: Please select a valid file format.')</script>";
        }
        //// Verify file size
        else if(($customer_image_size > $max_size)) {

            echo "<script>alert('Error: File size is larger than the allowed limit.')</script>";
        }
        else{
            $customer_image_tmp_name = $_FILES['c_image']['tmp_name'];
            $client_ip = get_client_ip();
            move_uploaded_file($customer_image_tmp_name,"customer/customer_images/upload/$customer_image");
            $insert_customer = "INSERT INTO customer(customer_name,customer_email,customer_phone,customer_username,customer_password,customer_division,
            customer_district,customer_thana,customer_address,customer_image,customer_ip_address)
             values('$customer_name','$customer_email','$customer_phone','$customer_username','$customer_password','$customer_division'
             ,'$customer_district','$customer_thana','$customer_address','$customer_image','$client_ip');";
            $run_insert_customer = mysqli_query($db,$insert_customer);

            $check_cart = "select * from cart where ip_address= $client_ip";
            $run_check_cart = mysqli_query($db,$check_cart);
            $cart_row = mysqli_num_rows($run_check_cart);
            if($cart_row>0){
                $_SESSION['customer_username'] = $customer_username;
                echo "<script>alert('You have been registered successfully')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }
            else{
                $_SESSION['customer_username'] = $customer_username;
                echo "<script>alert('You have been registered successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
            
        }
        
    }
}

?>