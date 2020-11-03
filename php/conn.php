<?php
$servername = "localhost";
$username = "Hank";
$password = "123456";
$dbname = "tims";
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}
mysqli_query($conn , "set names utf8");
?>