<div class="box">
    <center>
        <h1>Do you really want to delete your account ?</h1>
    </center>
    <br>
    <center>
        <form method="POST" action="">
            <input type="submit" name="yes" value="Yes , I Want To Delete." 
            class="btn btn-danger">
        </form>
    </center>
    <?php 
        if(isset($_POST['yes'])){
            $customer_username = $_SESSION['customer_username'];
            $select = "select customer_id from customer where customer_username = '$customer_username'";
            $run = mysqli_query($db,$select);
            $row = mysqli_fetch_array($run);
            $customer_id = $row['customer_id'];
            $delete = "DELETE from customer where customer_username = '$customer_username'";
            $run_ = mysqli_query($db,$delete);
            $pending_order = "DELETE from pending_order where customer_id = '$customer_id' ";
            $run__ =mysqli_query($db,$pending_order);
            echo "<script>alert('Your account deleted')</script>";
            echo "<script>window.open('../logout.php','_self')</script>";
        }
    ?>
</div>