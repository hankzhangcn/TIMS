
<?php
//通过部门编号 找 部门名称
    function did_dname($did){
        include("../php/conn.php");
        $did_dname_sql="select * from d_info where d_id = $did";
        $did_dname_rs=mysqli_query($conn,$did_dname_sql);
        $row2=mysqli_fetch_array($did_dname_rs);
        return $row2[1];
    }

    function dname_did($dname){
        include("../php/conn.php");
        $did_dname_sql="select * from d_info where d_name = $dname";
        $did_dname_rs=mysqli_query($conn,$did_dname_sql);
        $row2=mysqli_fetch_array($did_dname_rs);
        return $row2[1];
    }
?>