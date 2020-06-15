<?php
    include("includes/db.php");
    include("admin_functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Product</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <div class="row"><!-- breadcrumb row start-->
        <div class="col-lg-12">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>&nbsp;
                    DashBoard / Insert Product 
                </li>
            </div>
        </div>
    </div><!-- breadcrumb row end-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><!--panel-heading start-->
                    <h2 class="panel-title text-center">
                        <i class="fa fa-2x fa-money">
                            Insert Product
                        </i>
                    </h2>
                </div><!--panel-heading end-->
                <!--panel-body start-->
                <div class="col-lg-2"></div>
                <div class="panel-body box col-lg-8" style="margin-top: 5px;">
                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data" style="margin-top: 30px;">
                        <div class="form-group">
                            <label class="control-label"><h4 style="margin:0;">Product Title :</h4></label>                               
                            <input type="text" name="product_title" class="form-control" required>                               
                        </div>
                        <div class="form-group">
                            <label class="control-label"><h4 style="margin:0;"> Product Category :</h4></label>
                            <select class="form-control" name="product_category" required>
                                <option>Select a product category</option>
                                <?php 
                                    $get_p_cat = "select * from product_categories";
                                    $run_p_cat = mysqli_query($con,$get_p_cat);
                                    while ($row = mysqli_fetch_array($run_p_cat)) {
                                        $p_cat_id = $row['p_cat_id'];
                                        $p_cat_title = $row['p_cat_title'];
                                        echo "
                                            <option value='$p_cat_id'>$p_cat_title</option>
                                        ";
                                    }
                                ?>
                            </select>
                        </div> 
                        <div class="form-group">
                        <label class="control-label"><h4 style="margin:0;"> Categories :</h4></label>
                        <select name="categories" class=" form-control" required>
                            <option>Select a categories</option>
                            <?php 
                                $get_cat = "select * from categories";
                                $run_cat = mysqli_query($con,$get_cat);
                                while ($row = mysqli_fetch_array($run_cat)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo "
                                        <option value='$cat_id'>$cat_title</option>
                                    ";
                                }
                            ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><h4 style="margin:0;">Product Image 1 :</h4></label>                               
                            <input type="file" name="product_img1" class="form-control" required>                               
                        </div>
                        <div class="form-group">
                            <label class="control-label"><h4 style="margin:0;">Product Image 2 :</h4></label>                               
                            <input type="file" name="product_img2" class="form-control" required>                               
                        </div>
                        <div class="form-group">
                            <label class="control-label"><h4 style="margin:0;">Product Image 3 :</h4></label>                               
                            <input type="file" name="product_img3" class="form-control" required>                               
                        </div>  
                        <div class="form-group">
                            <label class="control-label"><h4 style="margin:0;">Product Price :</h4></label>                               
                            <input type="number" name="product_price" class="form-control" required>                               
                        </div>
                        <div class="form-group">
                            <label class="control-label"><h4 style="margin:0;">Product Keyword:</h4></label>                               
                            <input type="text" name="product_keyword" class="form-control" required>                               
                        </div>     
                        <div class="form-group">
                            <label class="control-label"><h4 style="margin:0;">Product Description :</h4></label>                               
                            <textarea class="form-control" name="product_description" rows="6" cols="19"></textarea>                               
                        </div> 
                        <center>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Insert Product" class="btn btn-success" >
                            </div>  
                        </center>       
                    </form>  
                    
                </div>
                <div class="col-lg-2"></div>
                <!--panel-body end-->
            </div>
        </div>
    </div>
  
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>

</html>

<?php 
    upload_products();
?>