<?php
session_start();
//如果没有经过../PHP/login.php的登录验证，就不允许进入
//同时，只有点击了“登录”按钮才会清空admin信息。
if(isset($_SESSION['u_id']) && $_SESSION['admin']==true)
{   
    $admin = true;
    $u_dep = $_SESSION["u_dep"];
    $u_id = $_SESSION["u_id"];
}
else{
    echo "<script>alert('请先登录。'); window.location.href='login.php';</script>";
}