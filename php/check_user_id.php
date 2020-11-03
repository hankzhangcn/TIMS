<?php
    //从 user 数据库中返回 match 的 user_id 个数
    $user_id = $_POST["user_id"];
    include("conn.php");
    $sql = "select count(*) from user where user_id = '{$user_id}'";
    $rs = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($rs);
    echo $row[0];
?>