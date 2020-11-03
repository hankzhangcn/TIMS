<?php
//  启动 Session
session_start();
//  声明一个名为 admin 的变量，并赋空值。
$_SESSION["admin"] = null;
echo "<script>window.location.href='../pages/login.php'; </script>";
?>
