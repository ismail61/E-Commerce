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
?>