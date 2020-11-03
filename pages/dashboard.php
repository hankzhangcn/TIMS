<!------权限验证------->
<?php
include("../php/authorization.php");
include("../php/did_dname.php")
?>


<!-------html------->
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/common.css">
    <!--调试用，防止CSS被缓存-->
    <link rel="stylesheet" href="../css/dashboard.css?param=Math.random()">
    <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://s2.pstatp.com/cdn/expire-1-M/jquery-easing/1.4.1/jquery.easing.js"
        type="application/javascript"></script>
    <title>仪表盘-TIMS</title>
</head>

<body>
    <main>
        <div class="topbar">
            <div class="tbleft">
                <img class="logo" src="https://s1.ax1x.com/2020/06/09/t5LIK0.png" />
                <a class="title" href="dashboard.php">TIMS教师信息管理系统</a>
            </div>
            <div class="tbright">
                <a class="logout">登出系统</a>
                <img class="userimg" src="https://s1.ax1x.com/2020/06/10/tTPhHH.png" alt="用户头像" border="0" />
            </div>
        </div>
        <div class="funclist-pad">
            <a href="dashboard.php">
                <input type="button" class="yibiaopan" value="仪表盘">
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
                <h1>欢迎</h1></br></br>
                <a>来自 <?php echo did_dname($u_dep);?> 的管理员 <?php echo $u_id;?>，欢迎回来。</a></br>
                <a>为了防止意外登出导致的数据丢失，「登出系统」按钮仅在本页面顶栏右侧提供。</a></br>
            </div>
            <div class="workspace">
                <h1>系统概述</h1></br></br>
                <a>系统正保管着
                    <?php
                        include("../php/conn.php");
                        $sql="select count(*) from d_info";
                        $rs=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($rs);
                        echo $row[0];
                    ?>
                    个学院共
                    <?php
                        include("../php/conn.php");
                        $sql="select count(*) from t_info";
                        $rs=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($rs);
                        echo $row[0];
                    ?>
                    名教师的个人信息。</br>请在左侧选择功能来管理。
                </a></br>
                

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
    <script type="text/javascript" src="../js/dashboard.js?param=Math.random()"></script>
</body>
</html>