<?php
    //require('includes/db.php');

    $sql = "UPDATE visitors SET visitorS = visitorS+1 WHERE id = 1";
    mysqli_query($con,$sql);

    $sql = "SELECT visitorS FROM visitors WHERE id = 1";
    mysqli_query($con,$sql);


?>
