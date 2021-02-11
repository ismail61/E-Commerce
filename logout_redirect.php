
<?php 

if(isset($_SESSION['time_active']) && isset($_SESSION['customer_username'])){
    $tim_e = time()-$_SESSION['time_active'];
    
    if($tim_e>300){
        echo "<script>window.open('logout.php','_self')</script>";
    }
}

?>