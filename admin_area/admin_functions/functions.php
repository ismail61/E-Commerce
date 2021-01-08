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
        $product_description_id = $_POST['product_description_id'];
        $product_exists_item = $_POST['exists_item'];
        $product_price = $_POST['product_price'];
        $product_color1 = $_POST['product_color1'];
        $product_color2 = $_POST['product_color2'];
        $product_color3 = $_POST['product_color3'];
        $product_keyword = $_POST['product_keyword'];
        //$product_description = $_POST['product_description'];

        

        //product image and image name
        $product_img1_name = $_FILES['product_img1']['name'];
        $product_img2_name = $_FILES['product_img2']['name'];
        $product_img3_name = $_FILES['product_img3']['name'];

        //product image and image size
        $product_img1_size = $_FILES['product_img1']['size'];
        $product_img2_size = $_FILES['product_img2']['size'];
        $product_img3_size = $_FILES['product_img3']['size'];

        /*
        //product image and image myme type
        $product_img1_type = $_FILES['product_img1']['type'];
        $product_img2_type = $_FILES['product_img2']['type'];
        $product_img3_type = $_FILES['product_img3']['type'];
        */

        $allowed = array(   "jpg" => "image/jpg",
                            "jpeg" => "image/jpeg", 
                            "gif" => "image/gif",
                            "png" => "image/png"
                        );
         
        $ext1 = pathinfo($product_img1_name, PATHINFO_EXTENSION);// Verify file extension
        $ext2 = pathinfo($product_img2_name, PATHINFO_EXTENSION);// Verify file extension
        $ext3 = pathinfo($product_img3_name, PATHINFO_EXTENSION);// Verify file extension
        
        $max_size = 5 * 1024 * 1024;//// Verify file size - 5MB maximum

        // Verify file extension
        if(!array_key_exists($ext1, $allowed) || !array_key_exists($ext2, $allowed) || !array_key_exists($ext3, $allowed)) {

            echo "<script>alert('Error: Please select a valid file format.')</script>";
        }


        //// Verify file size
        else if(($product_img1_size > $max_size) || ($product_img2_size > $max_size) || ($product_img3_size > $max_size)) {

            echo "<script>alert('Error: File size is larger than the allowed limit.')</script>";
        }

        // Check whether file exists before uploading it
        else if(file_exists("product_images/upload_image/" . $product_img1_name) ||
                file_exists("product_images/upload_image/" . $product_img2_name) || 
                file_exists("product_images/upload_image/" . $product_img3_name)){

                    if(file_exists("product_images/upload_image/" . $product_img1_name)){
                        echo "<script>alert('$product_img1_name is already exists.')</script>";
                    }
                    else if(file_exists("product_images/upload_image/" . $product_img2_name)){
                        echo "<script>alert('$product_img2_name is already exists.')</script>";
                    }
                    else{
                        echo "<script>alert('$product_img3_name is already exists.')</script>";
                    }

        }
        


        else{
            //image temporary name
            $tmp_img1_name = $_FILES['product_img1']['tmp_name'];
            $tmp_img2_name = $_FILES['product_img2']['tmp_name'];
            $tmp_img3_name = $_FILES['product_img3']['tmp_name'];

            //upload local storage 
            move_uploaded_file($tmp_img1_name,"product_images/upload_image/$product_img1_name");
            move_uploaded_file($tmp_img2_name,"product_images/upload_image/$product_img2_name");
            move_uploaded_file($tmp_img3_name,"product_images/upload_image/$product_img3_name");

            //upload product to  database
            $insert_product = "INSERT INTO products (p_cat_id,cat_id,date,p_title,p_img1,p_img2,p_img3 
                            ,p_price,p_keyword,p_color1,p_color2,p_color3,p_total_count,description_id)
                            VALUES ('$product_cat','$cat',NOW(),'$product_title','$product_img1_name','$product_img2_name',
                            '$product_img3_name','$product_price','$product_keyword','$product_color1','$product_color2'
                            ,'$product_color3','$product_exists_item','$product_description_id');";
            //run product
            $run_product = mysqli_query($db,$insert_product);

            //script alert
            if($run_product){
                //echo "<script>alert('Inserted Product successfully')</script>";
                echo "<script>window.open('index.php?dashboard','_self')</script>";
            }
            else{
                echo "<script>alert('Inserted Product Not successfully')</script>";
            }
        }

        

    }
}
function edit_product($p_id){
    if(isset($_POST['edit_pro'])){
         
        global $db;
        //fetch data using post method from from-group
        $product_cat = $_POST['product_category'];
        $cat = $_POST['categories'];
        $product_title = $_POST['product_title'];
        $product_description_id = $_POST['product_description_id'];
        $product_exists_item = $_POST['exists_item'];
        $product_price = $_POST['product_price'];
        $product_color1 = $_POST['product_color1'];
        $product_color2 = $_POST['product_color2'];
        $product_color3 = $_POST['product_color3'];
        $product_keyword = $_POST['product_keyword'];
        //$product_description = $_POST['product_description'];

        

        //product image and image name
        $product_img1_name = $_FILES['product_img1']['name'];
        $product_img2_name = $_FILES['product_img2']['name'];
        $product_img3_name = $_FILES['product_img3']['name'];

        //product image and image size
        $product_img1_size = $_FILES['product_img1']['size'];
        $product_img2_size = $_FILES['product_img2']['size'];
        $product_img3_size = $_FILES['product_img3']['size'];

        /*
        //product image and image myme type
        $product_img1_type = $_FILES['product_img1']['type'];
        $product_img2_type = $_FILES['product_img2']['type'];
        $product_img3_type = $_FILES['product_img3']['type'];
        */

        $allowed = array(   "jpg" => "image/jpg",
                            "jpeg" => "image/jpeg", 
                            "gif" => "image/gif",
                            "png" => "image/png"
                        );
         
        $ext1 = pathinfo($product_img1_name, PATHINFO_EXTENSION);// Verify file extension
        $ext2 = pathinfo($product_img2_name, PATHINFO_EXTENSION);// Verify file extension
        $ext3 = pathinfo($product_img3_name, PATHINFO_EXTENSION);// Verify file extension
        
        $max_size = 5 * 1024 * 1024;//// Verify file size - 5MB maximum

        if($product_img1_name!=NULL && $product_img2_name!=NULL && $product_img3_name!=NULL){
            // Verify file extension
            if(!array_key_exists($ext1, $allowed) || !array_key_exists($ext2, $allowed) || !array_key_exists($ext3, $allowed)) {

                echo "<script>alert('Error: Please select a valid file format.')</script>";
            }


            //// Verify file size
            else if(($product_img1_size > $max_size) || ($product_img2_size > $max_size) || ($product_img3_size > $max_size)) {

                echo "<script>alert('Error: File size is larger than the allowed limit.')</script>";
            }
            else{
                //image temporary name
                $tmp_img1_name = $_FILES['product_img1']['tmp_name'];
                $tmp_img2_name = $_FILES['product_img2']['tmp_name'];
                $tmp_img3_name = $_FILES['product_img3']['tmp_name'];

                //upload local storage 
                move_uploaded_file($tmp_img1_name,"product_images/upload_image/$product_img1_name");
                move_uploaded_file($tmp_img2_name,"product_images/upload_image/$product_img2_name");
                move_uploaded_file($tmp_img3_name,"product_images/upload_image/$product_img3_name");

                //edit product 
                $edit = "UPDATE products SET p_cat_id = '$product_cat', cat_id= '$cat',p_title = '$product_title',
                        p_img1 = '$product_img1_name', p_img2 = '$product_img2_name', p_img3 = '$product_img3_name',
                        p_price = '$product_price', p_keyword = '$product_keyword', p_color1 = '$product_color1',
                        p_color2 = '$product_color2', p_color3 = '$product_color3', p_total_count = '$product_exists_item',
                        description_id = '$product_description_id', p_edit_date = NOW() where p_id= '$p_id'; 
                ";
                //run product
                $run_product = mysqli_query(mysqli_connect("localhost","root","","Ecom"),$edit);

                //script alert
                if($run_product){
                    //echo "<script>alert('Inserted Product successfully')</script>";
                    echo "<script>window.open('index.php?view_product','_self')</script>";
                }
                else{
                    echo "<script>alert('Inserted Product Not successfully')</script>";
                }
            
            }
        }
        else if($product_img1_name==NULL && $product_img2_name==NULL && $product_img3_name==NULL){
            //edit product 
            $edit = "UPDATE products SET p_cat_id = '$product_cat', cat_id= '$cat',p_title = '$product_title',                    
                    p_price = '$product_price', p_keyword = '$product_keyword', p_color1 = '$product_color1',
                    p_color2 = '$product_color2', p_color3 = '$product_color3', p_total_count = '$product_exists_item',
                    description_id = '$product_description_id', p_edit_date = NOW() where p_id= '$p_id'; 
            ";
            //run product
            $run_product = mysqli_query(mysqli_connect("localhost","root","","Ecom"),$edit);

            //script alert
            if($run_product){
                echo "<script>alert('Inserted Product successfully')</script>";
                echo "<script>window.open('index.php?view_product','_self')</script>";
            }
            else{
                echo "<script>alert('Inserted Product Not successfully')</script>";
            }
        }
        else if($product_img1_name==NULL || $product_img2_name==NULL || $product_img3_name==NULL){
            
            if($product_img1_name==NULL && $product_img2_name!=NULL && $product_img3_name!=NULL){
                if(!array_key_exists($ext2, $allowed) || !array_key_exists($ext3, $allowed)) {

                    echo "<script>alert('Error: Please select a valid file format.')</script>";
                }
    
    
                //// Verify file size
                else if(($product_img2_size > $max_size) || ($product_img3_size > $max_size)) {
    
                    echo "<script>alert('Error: File size is larger than the allowed limit.')</script>";
                }
                else{
                    //image temporary name
                    $tmp_img2_name = $_FILES['product_img2']['tmp_name'];
                    $tmp_img3_name = $_FILES['product_img3']['tmp_name'];
    
                    //upload local storage 
                    move_uploaded_file($tmp_img2_name,"product_images/upload_image/$product_img2_name");
                    move_uploaded_file($tmp_img3_name,"product_images/upload_image/$product_img3_name");
    
                    //edit product 
                    $edit = "UPDATE products SET p_cat_id = '$product_cat', cat_id= '$cat',p_title = '$product_title',
                            p_img2 = '$product_img2_name', p_img3 = '$product_img3_name',
                            p_price = '$product_price', p_keyword = '$product_keyword', p_color1 = '$product_color1',
                            p_color2 = '$product_color2', p_color3 = '$product_color3', p_total_count = '$product_exists_item',
                            description_id = '$product_description_id', p_edit_date = NOW() where p_id= '$p_id'; 
                    ";
                    //run product
                    $run_product = mysqli_query(mysqli_connect("localhost","root","","Ecom"),$edit);
    
                    //script alert
                    if($run_product){
                        echo "<script>alert('Inserted Product successfully')</script>";
                        echo "<script>window.open('index.php?view_product','_self')</script>";
                    }
                    else{
                        echo "<script>alert('Inserted Product Not successfully')</script>";
                    }
                }
            }
            else if($product_img1_name!=NULL && $product_img2_name==NULL && $product_img3_name!=NULL){
                if(!array_key_exists($ext1, $allowed) || !array_key_exists($ext3, $allowed)) {

                    echo "<script>alert('Error: Please select a valid file format.')</script>";
                }
    
    
                //// Verify file size
                else if(($product_img1_size > $max_size) || ($product_img3_size > $max_size)) {
    
                    echo "<script>alert('Error: File size is larger than the allowed limit.')</script>";
                }
                else{
                    //image temporary name
                    $tmp_img1_name = $_FILES['product_img1']['tmp_name'];
                    $tmp_img3_name = $_FILES['product_img3']['tmp_name'];
    
                    //upload local storage 
                    move_uploaded_file($tmp_img1_name,"product_images/upload_image/$product_img1_name");
                    move_uploaded_file($tmp_img3_name,"product_images/upload_image/$product_img3_name");
    
                    //edit product 
                    $edit = "UPDATE products SET p_cat_id = '$product_cat', cat_id= '$cat',p_title = '$product_title',
                            p_img1 = '$product_img1_name', p_img3 = '$product_img3_name',
                            p_price = '$product_price', p_keyword = '$product_keyword', p_color1 = '$product_color1',
                            p_color2 = '$product_color2', p_color3 = '$product_color3', p_total_count = '$product_exists_item',
                            description_id = '$product_description_id', p_edit_date = NOW() where p_id= '$p_id'; 
                    ";
                    //run product
                    $run_product = mysqli_query(mysqli_connect("localhost","root","","Ecom"),$edit);
    
                    //script alert
                    if($run_product){
                        echo "<script>alert('Inserted Product successfully')</script>";
                        echo "<script>window.open('index.php?view_product','_self')</script>";
                    }
                    else{
                        echo "<script>alert('Inserted Product Not successfully')</script>";
                    }
                }
            }
            else  if($product_img1_name!=NULL && $product_img2_name!=NULL && $product_img3_name==NULL){
                // Verify file extension
                if(!array_key_exists($ext1, $allowed) || !array_key_exists($ext2, $allowed) ) {
    
                    echo "<script>alert('Error: Please select a valid file format.')</script>";
                }
    
    
                //// Verify file size
                else if(($product_img1_size > $max_size) || ($product_img2_size > $max_size) ) {
    
                    echo "<script>alert('Error: File size is larger than the allowed limit.')</script>";
                }
                else{
                    //image temporary name
                    $tmp_img1_name = $_FILES['product_img1']['tmp_name'];
                    $tmp_img2_name = $_FILES['product_img2']['tmp_name'];
                    
    
                    //upload local storage 
                    move_uploaded_file($tmp_img1_name,"product_images/upload_image/$product_img1_name");
                    move_uploaded_file($tmp_img2_name,"product_images/upload_image/$product_img2_name");
                    
    
                    //edit product 
                    $edit = "UPDATE products SET p_cat_id = '$product_cat', cat_id= '$cat',p_title = '$product_title',
                            p_img1 = '$product_img1_name', p_img2 = '$product_img2_name',
                            p_price = '$product_price', p_keyword = '$product_keyword', p_color1 = '$product_color1',
                            p_color2 = '$product_color2', p_color3 = '$product_color3', p_total_count = '$product_exists_item',
                            description_id = '$product_description_id', p_edit_date = NOW() where p_id= '$p_id'; 
                    ";
                    //run product
                    $run_product = mysqli_query(mysqli_connect("localhost","root","","Ecom"),$edit);
    
                    //script alert
                    if($run_product){
                        echo "<script>alert('Inserted Product successfully')</script>";
                        echo "<script>window.open('index.php?view_product','_self')</script>";
                    }
                    else{
                        echo "<script>alert('Inserted Product Not successfully')</script>";
                    }
                
                }
            }
            else  if($product_img1_name==NULL && $product_img2_name==NULL && $product_img3_name!=NULL){
                // Verify file extension
                if( !array_key_exists($ext3, $allowed)) {
    
                    echo "<script>alert('Error: Please select a valid file format.')</script>";
                }
    
    
                //// Verify file size
                else if(($product_img3_size > $max_size)) {
    
                    echo "<script>alert('Error: File size is larger than the allowed limit.')</script>";
                }
                else{
                    //image temporary name
                    $tmp_img3_name = $_FILES['product_img3']['tmp_name'];
    
                    //upload local storage 
                    move_uploaded_file($tmp_img3_name,"product_images/upload_image/$product_img3_name");
    
                    //edit product 
                    $edit = "UPDATE products SET p_cat_id = '$product_cat', cat_id= '$cat',p_title = '$product_title',
                             p_img3 = '$product_img3_name',
                            p_price = '$product_price', p_keyword = '$product_keyword', p_color1 = '$product_color1',
                            p_color2 = '$product_color2', p_color3 = '$product_color3', p_total_count = '$product_exists_item',
                            description_id = '$product_description_id', p_edit_date = NOW() where p_id= '$p_id'; 
                    ";
                    //run product
                    $run_product = mysqli_query(mysqli_connect("localhost","root","","Ecom"),$edit);
    
                    //script alert
                    if($run_product){
                        echo "<script>alert('Inserted Product successfully')</script>";
                        echo "<script>window.open('index.php?view_product','_self')</script>";
                    }
                    else{
                        echo "<script>alert('Inserted Product Not successfully')</script>";
                    }
                
                }
            }
            else  if($product_img1_name!=NULL && $product_img2_name==NULL && $product_img3_name==NULL){
                // Verify file extension
                if(!array_key_exists($ext1, $allowed)) {
    
                    echo "<script>alert('Error: Please select a valid file format.')</script>";
                }
    
    
                //// Verify file size
                else if(($product_img1_size > $max_size) ) {
    
                    echo "<script>alert('Error: File size is larger than the allowed limit.')</script>";
                }
                else{
                    //image temporary name
                    $tmp_img1_name = $_FILES['product_img1']['tmp_name'];
    
                    //upload local storage 
                    move_uploaded_file($tmp_img1_name,"product_images/upload_image/$product_img1_name");
    
                    //edit product 
                    $edit = "UPDATE products SET p_cat_id = '$product_cat', cat_id= '$cat',p_title = '$product_title',
                            p_img1 = '$product_img1_name',
                            p_price = '$product_price', p_keyword = '$product_keyword', p_color1 = '$product_color1',
                            p_color2 = '$product_color2', p_color3 = '$product_color3', p_total_count = '$product_exists_item',
                            description_id = '$product_description_id', p_edit_date = NOW() where p_id= '$p_id'; 
                    ";
                    //run product
                    $run_product = mysqli_query(mysqli_connect("localhost","root","","Ecom"),$edit);
    
                    //script alert
                    if($run_product){
                        echo "<script>alert('Inserted Product successfully')</script>";
                        echo "<script>window.open('index.php?view_product','_self')</script>";
                    }
                    else{
                        echo "<script>alert('Inserted Product Not successfully')</script>";
                    }
                
                }
            }
            else  if($product_img1_name==NULL && $product_img2_name!=NULL && $product_img3_name==NULL){
                // Verify file extension
                if(!array_key_exists($ext2, $allowed)) {
    
                    echo "<script>alert('Error: Please select a valid file format.')</script>";
                }
    
    
                //// Verify file size
                else if(($product_img2_size > $max_size)) {
    
                    echo "<script>alert('Error: File size is larger than the allowed limit.')</script>";
                }
                else{
                    //image temporary name
                    
                    $tmp_img2_name = $_FILES['product_img2']['tmp_name'];
                    
    
                    //upload local storage 
                   
                    move_uploaded_file($tmp_img2_name,"product_images/upload_image/$product_img2_name");
                    //edit product 
                    $edit = "UPDATE products SET p_cat_id = '$product_cat', cat_id= '$cat',p_title = '$product_title',
                             p_img2 = '$product_img2_name',
                            p_price = '$product_price', p_keyword = '$product_keyword', p_color1 = '$product_color1',
                            p_color2 = '$product_color2', p_color3 = '$product_color3', p_total_count = '$product_exists_item',
                            description_id = '$product_description_id', p_edit_date = NOW() where p_id= '$p_id'; 
                    ";
                    //run product
                    $run_product = mysqli_query(mysqli_connect("localhost","root","","Ecom"),$edit);
    
                    //script alert
                    if($run_product){
                        echo "<script>alert('Inserted Product successfully')</script>";
                        echo "<script>window.open('index.php?view_product','_self')</script>";
                    }
                    else{
                        echo "<script>alert('Inserted Product Not successfully')</script>";
                    }
                
                }
            }
        }
        

    }
}


function insert_product_description(){

    if(isset($_POST['insert_p_description'])){
        $ph_l_announced = $_POST['ph_l_announced'];
        $ph_l_status = $_POST['ph_l_status'];
        $ph_n_technology = $_POST['ph_n_technology'];
        $ph_n_2g_bands = $_POST['ph_n_2g_bands'];
        $ph_n_3g_bands = $_POST['ph_n_3g_bands'];
        $ph_n_4g_bands = $_POST['ph_n_4g_bands'];
        $ph_n_5g_bands = $_POST['ph_n_5g_bands'];
        $ph_n_speed = $_POST['ph_n_speed'];
        $ph_n_gprs = $_POST['ph_n_gprs'];
        $ph_n_edge = $_POST['ph_n_edge'];
        $ph_b_dimensions = $_POST['ph_b_dimensions'];
        $ph_b_weight = $_POST['ph_b_weight'];
        $ph_b_build = $_POST['ph_b_build'];
        $ph_b_sim = $_POST['ph_b_sim'];
        $ph_d_type = $_POST['ph_d_type'];
        $ph_d_size = $_POST['ph_d_size'];
        $ph_d_resolution = $_POST['ph_d_resolution'];
        $ph_d_multitouch = $_POST['ph_d_multitouch'];
        $ph_d_protection = $_POST['ph_d_protection'];
        $ph_p_os = $_POST['ph_p_os'];
        $ph_p_chipset = $_POST['ph_p_chipset'];
        $ph_p_cpu = $_POST['ph_p_cpu'];
        $ph_p_gpu = $_POST['ph_p_gpu'];
        $ph_m_card_slot = $_POST['ph_m_card_slot'];
        $ph_m_internal = $_POST['ph_m_internal'];
        $ph_m_ram = $_POST['ph_m_ram'];
        $ph_c_primary_cam = $_POST['ph_c_primary_cam'];
        $ph_c_secondary_cam = $_POST['ph_c_secondary_cam'];
        $ph_c_features = $_POST['ph_m_features'];
        $ph_c_video = $_POST['ph_c_video'];
        $ph_s_alert_type = $_POST['ph_s_alert_type'];
        $ph_s_loudspeaker = $_POST['ph_s_loudspeaker'];
        $ph_s_35mm_jak = $_POST['ph_s_35mm_jak'];
        $ph_c_wlan = $_POST['ph_c_wlan'];
        $ph_c_bluetooth = $_POST['ph_c_bluetooth'];
        $ph_c_gps = $_POST['ph_c_gps'];
        $ph_c_nfc = $_POST['ph_c_nfc'];
        $ph_c_fm_radio = $_POST['ph_c_fm_radio'];
        $ph_c_usb = $_POST['ph_c_usb'];
        $ph_c_infrared_port = $_POST['ph_c_infrared_port'];
        $ph_f_sensors = $_POST['ph_f_sensors'];
        $ph_f_messaging = $_POST['ph_f_messaging'];
        $ph_f_browser = $_POST['ph_f_browser'];
        $ph_f_java = $_POST['ph_f_java'];
        $ph_b_type = $_POST['ph_b_type'];
        $ph_b_capacity = $_POST['ph_b_capacity'];
        $ph_m_made_by = $_POST['ph_m_made_by'];
        $ph_m_color = $_POST['ph_m_color'];
        $ph_m_other_features = $_POST['ph_m_other_features'];
        $product_title = $_POST['p_title'];

        $select_des = "INSERT INTO phone_description(ph_l_announced,ph_l_status,ph_n_technology,ph_n_2g_bands,ph_n_3g_bands,ph_n_4g_bands,ph_n_5g_bands,
                        ph_n_speed,ph_n_gprs,ph_n_edge,ph_b_dimensions,ph_b_weight,ph_b_build,ph_b_sim,
                        ph_d_type,ph_d_size,ph_d_resolution,ph_d_multitouch,ph_d_protection,
                        ph_p_os,ph_p_chipset,ph_p_cpu,ph_p_gpu,
                        ph_m_card_slot,ph_m_internal,ph_m_ram,
                        ph_c_primary_cam,ph_c_secondary_cam,ph_c_features,ph_c_video,
                        ph_s_alert_types,ph_s_loudspeaker,ph_s_35mm_jak,
                        ph_c_wlan,ph_c_bluetooth,ph_c_gps,ph_c_nfc,ph_c_fm_radio,ph_c_usb,ph_c_infrared_port,
                        ph_f_sensors,ph_f_messaging,ph_f_browser,ph_f_java,
                        ph_b_type,ph_b_capacity,
                        ph_m_made_by,ph_m_color,ph_m_others_features,
                        p_title)
                        VALUES('$ph_l_announced','$ph_l_status','$ph_n_technology','$ph_n_2g_bands','$ph_n_3g_bands','$ph_n_4g_bands','$ph_n_5g_bands',
                        '$ph_n_speed','$ph_n_gprs','$ph_n_edge','$ph_b_dimensions','$ph_b_weight','$ph_b_build','$ph_b_sim',
                        '$ph_d_type','$ph_d_size','$ph_d_resolution','$ph_d_multitouch','$ph_d_protection',
                        '$ph_p_os','$ph_p_chipset','$ph_p_cpu','$ph_p_gpu',
                        '$ph_m_card_slot','$ph_m_internal','$ph_m_ram',
                        '$ph_c_primary_cam','$ph_c_secondary_cam','$ph_c_features','$ph_c_video',
                        '$ph_s_alert_type','$ph_s_loudspeaker','$ph_s_35mm_jak',
                        '$ph_c_wlan','$ph_c_bluetooth','$ph_c_gps','$ph_c_nfc','$ph_c_fm_radio','$ph_c_usb','$ph_c_infrared_port',
                        '$ph_f_sensors','$ph_f_messaging','$ph_f_browser','$ph_f_java',
                        '$ph_b_type','$ph_b_capacity',
                        '$ph_m_made_by','$ph_m_color','$ph_m_other_features'
                        ,'$product_title');";
        $run_des = mysqli_query(mysqli_connect("localhost","root","","Ecom"),$select_des);
        if($run_des){
            //echo "<script>alert('Inserted')</script>";
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }
        else{
            echo "<script>alert('Not Inserted')</script>";
        }
    }
}

?>
