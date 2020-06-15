<?php 

 $db = mysqli_connect("localhost","root","","Ecom");

//product send to database 
function upload_products(){
    if(isset($_POST['submit'])){
        global $db;
        //fetch data using post method from from-group
        $product_cat = $_POST['product_category'];
        $cat = $_POST['categories'];
        $product_title = $_POST['product_title'];
        $product_price = $_POST['product_price'];
        $product_keyword = $_POST['product_keyword'];
        $product_description = $_POST['product_description'];

        //product image and image name
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        //image temporary name
        $tmp_img1_name = $_FILES['product_img1']['tmp_name'];
        $tmp_img2_name = $_FILES['product_img2']['tmp_name'];
        $tmp_img3_name = $_FILES['product_img3']['tmp_name'];

        //upload local storage 
        move_uploaded_file($tmp_img1_name,"product_images/image/$product_img1");
        move_uploaded_file($tmp_img2_name,"product_images/image/$product_img2");
        move_uploaded_file($tmp_img3_name,"product_images/image/$product_img3");

        //upload product to  database
        $insert_product = "INSERT INTO products (p_cat_id,cat_id,date,p_title,p_img1,p_img2,p_img3 
                           ,p_price,p_description,p_keyword)
                           VALUES ('$product_cat','$cat',NOW(),'$product_title','$product_img1','$product_img2',
                           '$product_img3','$product_price','$product_description','$product_keyword');";
        //run product
        $run_product = mysqli_query($db,$insert_product);

        //script alert
        if($run_product){
            echo "<script>alert('Inserted Product successfully')</script>";
            echo "<script>window.open('insert_product.php')</script>";
        }
        else{
            echo "<script>alert('Inserted Product Not successfully')</script>";
        }

    }
}


?>
