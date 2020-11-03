<!------权限验证、部门ID名称转换------->
<?php
include("../php/authorization.php");
include("../php/did_dname.php");
//获取传递的user_id
$user_id=$_GET["user_id"];
//如果直接访问，那么后退。
if($user_id == null)
    echo "<script>alert('请先选择管理员。'); window.history.back();</script>";
if( $u_dep != 0)
    echo "<script>alert('您没有管理 管理员 的权限。'); window.history.back();</script>";
?>


<!-------html------->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/shadow.css?param=Math.random()">
  <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
  <script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.4.0/jquery.min.js"></script>
  <title>教师信息修改-TIMS</title>
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
                <a>管理员 <?php echo $_SESSION['u_id'];?>，您可以在本页面修改这位管理员的信息。</a></br>
                <a>要登出系统，请返回仪表盘。</a></br>
            </div>
            <?php
                //找人
                include("../php/conn.php");
                $sql="select * from user WHERE user_id = $user_id";
                $rs=mysqli_query($conn,$sql);
                if(mysqli_num_rows($rs))
                {
                    $row=mysqli_fetch_array($rs);
                    //将原本管理员信息放入变量，方便嵌套
                    $user_dep=$row["user_dep"];
            ?>
            <div class="workspace">
                <h1>管理员 <?php echo "$user_id"?> 的信息</h1></br></br>
                <form id="myForm" class="info" action="user_menage_ok.php" method="POST">
                    <table>
                        <tr>
                            <td><a>部门</a></td>
                            <td>
                                <div class="select">
                                <select  name="user_dep" >
                                    <?php
                                        $sql3="select * from d_info WHERE d_id <> 0";
                                        $rs3=mysqli_query($conn,$sql3);
                                        while($row3=mysqli_fetch_array($rs3))
                                        if( $user_dep == $row3[0])
                                        {
                                    ?>
                                            <option value ="<?php echo $row3[0]?>" selected><?php echo $row3[1]?></option>
                                    <?php
                                        }else{
                                    ?>
                                        <option value ="<?php echo $row3[0]?>"><?php echo $row3[1]?></option>
                                    <?php
                                        }
                                    ?>
                                        </select>
                                        </div>
                            <td>
                        </tr>
                       
                    </table>
                    <input type="text" value="<?php echo $user_id;?>" name = "user_id" hidden />
                    <input type="submit" name="save" value="保存修改"></input>
                    </form>
                    <!--由于JS会阻止myform里同ID的submit，对于删除需要另外建表-->
                    <form method="post" action="user_menage_ok.php">
                        <input type="text" value="<?php echo $user_id;?>" name = "user_id" hidden />
                        <input type="submit" name="delete" value="删除管理员"></input>
                    </form>
                                        
                    <?php
                        }else{
                            echo "<script>alert('管理员不存在。'); window.history.back();</script>";
                        }
                    ?>
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
      <script type="text/javascript" src="../js/tcheck.js?param=Math.random()"></script>
</body>
</html>
