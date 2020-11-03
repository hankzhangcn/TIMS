<!------权限验证、部门ID名称转换------->
<?php
include("../php/authorization.php");
include("../php/did_dname.php");
include("../php/conn.php");
include("../php/isadmin.php");

if($u_dep != 0)
    echo "<script>alert('您没有新增管理员的权限。'); window.location.href='login.php';</script>";


$new_id=$_POST['ID'];
$new_pw=$_POST['Pw'];
$new_dep=$_POST['Dep'];
$sql="INSERT INTO user VALUES ('{$new_id}','{$new_pw}','{$new_dep}')";
$result = mysqli_query($conn,$sql);
echo $sql;
if(! $result )
{
    die('本错误来自数据库提示：' . mysqli_error($conn).'。已撤销所有操作，请手动后退');
}
else{
?>
    <!DOCTYPE html>
    <html lang="zh-cn">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/shadow.css">
    <!--调试用，防止CSS被缓存-->
    <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
    <script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.4.0/jquery.min.js"></script>
    <title>密码修改成功-TIMS</title>
    </head>
    <body>
        <main>
            <div class="topbar">
                <div class="tbleft">
                    <img class="logo" src="https://s1.ax1x.com/2020/06/09/t5LIK0.png" />
                    <a class="title" href="dashboard.php">TIMS教师信息管理系统</a>
                </div>
                <div class="tbright">
                    <a class="logout" >请在『仪表盘』登出系统</a>
                    <img class="userimg" src="https://s1.ax1x.com/2020/06/10/tTPhHH.png" alt="用户头像" border="0" />
                </div>
            </div>
            <div class="funclist-pad">
                <a href="dashboard.php">
                    <input type="button" class="yibiaopan"   value="仪表盘">
                </a>
                <a href="view.php">
                    <input type="button" class="view" value="教师一览">
                </a>
                <a href="search.php">
                    <input type="button" class="search" value="教师搜索/筛选">
                </a>
                <a href="add.php">
                    <input type="button" class="add" value="教师新增">
                </a>
                <div class="crossline"></div>
                <a href="changepw.php">
                    <input type="button" class="changepw" value="修改密码">
                </a>
                <?php
                    if($u_dep == 0)
                    {
                ?>
                        <div class="crossline"></div>
                        <a href="user_view.php"><input type="button" value="管理员一览"> </a>
                        <a href="adduser.php"><input type="button" value="新增管理员"> </a>
                <?php
                    }
                ?>
            </div>
            <div class="contentflow">
                <div class="noticepad">
                    <h1></h1>
                    <a>超级管理员 <?php echo $_SESSION['u_id'];?>，您可以在本页面新增部门管理员。</a></br>
                    <a>要登出系统，请返回仪表盘。</a></br>
                </div>

                <div class="workspace">
                    <h1>部门管理员 <?php echo $new_id;?> 创建成功</h1></br></br>
                    <a href="../pages/dashboard.php">
                        <input type="button" value="返回" >
                    </a>
                </div>

                <div class="bottom">
                    <h1>版权信息</h1></br></br>
                    <a>© <?php echo date("Y");?> Hank.</a></br>
                    <a>All Rights Reserved.</a></br>
                    <a>Powered by PHP on PHPSTUDY</a>
                </div>
            </div>
        </main>
        <!--调试用，防止JS被缓存-->
        <!--<script type="text/javascript" src="../js/menage.js?param=Math.random()"></script>-->
    </body>
    </html>
    
<?php
}
$conn->close();

?>
