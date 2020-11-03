<?php

//  启动 Session
session_start();
//  声明一个名为 admin 的变量，并赋空值。
$_SESSION["admin"] = null;

include "conn.php";


// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
 
else{
        $u_id = $_POST['u_id'];
        $u_pw = md5($_POST['u_pw']);
        $sql = "SELECT * from user WHERE user_id = '$u_id' AND user_pw = '$u_pw'";
        $result = mysqli_query($conn,$sql);
        $number = mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
        if (!empty($number)) {
            //  注册登陆成功的 admin 变量，并赋值 true
            $_SESSION["admin"] = true;
            $_SESSION["u_id"] = $_POST['u_id'];
            $_SESSION["u_dep"] = $row[2];
            echo "<script> window.location.href='../pages/dashboard.php'; </script>";
        } else {
            die("<script> alert('用户名或密码不正确。');window.location.href='../pages/login.php';</script>");
        }

    }

$conn->close();

?>