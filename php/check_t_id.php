<?php
    //从 user 数据库中返回 match 的 user_id 个数
    $t_id = $_POST["t_id"];
    include("conn.php");
    $sql = "select count(*) from t_info where t_id = '{$t_id}'";
    $rs = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($rs);
    echo $row[0];
?>