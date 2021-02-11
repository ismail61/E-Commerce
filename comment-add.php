<?php
    session_start();
    require_once ("includes/db.php");
    $commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
    $comment = isset($_POST['comment']) ? $_POST['comment'] : "";
    $commentSenderName = $_SESSION['customer_username'];
    $p_id = $_SESSION['p_id'];
    //$p_id = isset($_POST['comment_p_id']) ? $_POST['comment_p_id'] : "";
    //$p_id = $_GET['p_id'];
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO tbl_comment(p_id,parent_comment_id,comment,comment_sender_name,date)
    VALUES ('" . $p_id . "','" . $commentId . "','" . $comment . "','" . $commentSenderName . "','" . $date . "')";

    $result = mysqli_query($con, $sql);

    if (! $result) {
        $result = mysqli_error($con);
    }
    unset($_SESSION['p_id']);
    //echo "<script>alert('$p_id')</script>";
    //echo $result;
?>
