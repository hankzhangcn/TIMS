<!------权限验证、部门ID名称转换------->
<?php
include("../php/authorization.php");
include("../php/did_dname.php");
include("../php/conn.php");
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
  <title>教师新增-TIMS</title>
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
                <a>管理员 <?php echo $_SESSION['u_id'];?>，您可以在本页面新增教师。</a></br>
                <a>要登出系统，请返回仪表盘。</a></br>
            </div>
            <div class="workspace">
                <h1>教师新增</h1></br></br>
                <form id="myForm" class="info" action="add_ok.php" method="POST">
                    <table>
                        <tr>
                            <td><a>教师 ID</a></td>
                            <td><input type="text" name="t_id" id="t_id"></td>
                            <td><span id="div_t_id"></span></td>
                        </tr>
                        <tr>
                            <td><a>姓名</a></td>
                            <td><input type="text" name="t_name" id="t_name"></td>
                            <td><span id="div_t_name"></span></td>
                        </tr>
                        <tr>
                            <td><a>性别</a></td>
                            <td>
                                <div class="select">
                                    <select  name="t_gender" >
                                        <option value ="男" selected>男</option>
                                        <option value ="女">女</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><a>生日</a></td>
                            <td><input type="date" name="t_birthday"></td>
                        </tr>
                        <tr>
                            <td><a>学院</a></td>
                            <td>
                                <?php
                                    if( $u_dep != 0 )
                                    {
                                ?>
                                        <div class="select">
                                            <select  name="t_dep" >
                                                <option value ="<?php echo $u_dep;?>"><?php echo did_dname($u_dep);?></option>
                                            </select>
                                        </div>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                        <div class="select">
                                        <select  name="t_dep" >
                                            <?php
                                                $sql3="select * from d_info";
                                                $rs3=mysqli_query($conn,$sql3);
                                                while($row3=mysqli_fetch_array($rs3))
                                                {
                                            ?>
                                                <option value ="<?php echo $row3[0];?>"><?php echo $row3[1];?></option>
                                            <?php
                                                }
                                    }
                                        ?>
                                    </select>
                                    </div>
                            <td>
                        </tr>
                        <tr>
                            <td><a>学历</a></td>
                            <td><input type="text" name="t_edu"></td>
                        </tr>
                        <tr>
                            <td><a>职称</a></td>
                            <td><input type="text" name="t_title"></td>
                        </tr>
                        <tr>
                            <td><a>家庭地址</a></td>
                            <td><input type="text" name="t_addr"></td>
                        </tr>
                        <tr>
                            <td><a>手机号码</a></td>
                            <td><input type="text" name="t_telep"></td>
                        </tr>
                        <tr>
                            <td><a>在校状态</a></td>
                            <td>
                            <div class="select">
                                <select  name="t_statu" >
                                    <option value ="1" selected>在校</option>
                                    <option value ="0">离校</option>
                                </select>
                            </div>
                            </td>
                        </tr>
                    </table>
                    <input type="submit"  value="提交新增"></input>
                    </form>
                                        
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
