<?php 
include("includes/db.php");
if(session_start() && (isset($_GET['price']))){
    /* PHP */
    
    $customer_username = $_SESSION['customer_username'];
    $get_customer = "select * from customer where customer_username = '$customer_username';";
    $run_customer = mysqli_query($con,$get_customer);
    $row = mysqli_fetch_array($run_customer);
    $customer_name = $row['customer_name'];
    $customer_id = $row['customer_id'];
    $customer_email = $row['customer_email'];
    $customer_phone = $row['customer_phone'];
    $customer_division = $row['customer_division'];
    $customer_district = $row['customer_district'];
    $customer_thana = $row['customer_thana'];
    $customer_address = $row['customer_address'];
    $tk = $_GET['price'];
    $post_data = array();
    $post_data['store_id'] = "rajit5ff856c334e58";
    $post_data['store_passwd'] = "rajit5ff856c334e58@ssl";
    $post_data['total_amount'] = $tk;
    $post_data['currency'] = "BDT";
    $post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
    $post_data['success_url'] = "http://localhost/Ecom/success.php?price=$tk";
    $post_data['fail_url'] = "http://localhost/Ecom/fail.php";
    $post_data['cancel_url'] = "http://localhost/Ecom/cancel.php";
    # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

    # EMI INFO
    $post_data['emi_option'] = "1";
    $post_data['emi_max_inst_option'] = "9";
    $post_data['emi_selected_inst'] = "9";

    # CUSTOMER INFORMATION
    $post_data['cus_name'] = $customer_name;
    $post_data['cus_email'] = $customer_email;
    $post_data['cus_add1'] = $customer_address;
    $post_data['cus_add2'] = $customer_thana;
    $post_data['cus_city'] = $customer_district;
    $post_data['cus_state'] = $customer_division;
    $post_data['cus_postcode'] = "1000";
    $post_data['cus_country'] = "Bangladesh";
    $post_data['cus_phone'] = $customer_phone;
    $post_data['cus_fax'] = "01711111111";

    # SHIPMENT INFORMATION
    $post_data['ship_name'] = "testrajit7rp6";
    $post_data['ship_add1 '] = "Dhaka";
    $post_data['ship_add2'] = "Dhaka";
    $post_data['ship_city'] = "Dhaka";
    $post_data['ship_state'] = "Dhaka";
    $post_data['ship_postcode'] = "1000";
    $post_data['ship_country'] = "Bangladesh";

    # OPTIONAL PARAMETERS
    $post_data['value_a'] = "ref001";
    $post_data['value_b '] = "ref002";
    $post_data['value_c'] = "ref003";
    $post_data['value_d'] = "ref004";

    # CART PARAMETERS
    $post_data['cart'] = json_encode(array(
        array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
        array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
        array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
        array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
    ));
    $post_data['product_amount'] = "100";
    $post_data['vat'] = "5";
    $post_data['discount_amount'] = "5";
    $post_data['convenience_fee'] = "3";


        
    # REQUEST SEND TO SSLCOMMERZ
    $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $direct_api_url );
    curl_setopt($handle, CURLOPT_TIMEOUT, 30);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($handle, CURLOPT_POST, 1 );
    curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


    $content = curl_exec($handle );

    $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

    if($code == 200 && !( curl_errno($handle))) {
        curl_close( $handle);
        $sslcommerzResponse = $content;
    } else {
        curl_close( $handle);
        echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
        exit;
    }

    # PARSE THE JSON RESPONSE
    $sslcz = json_decode($sslcommerzResponse, true );

    if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
        echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
        # header("Location: ". $sslcz['GatewayPageURL']);
        exit;
    } else {
        echo "JSON Data parsing error!";
    }
}
else{
    echo "<script>window.open('checkout.php')</script>";
}



?>