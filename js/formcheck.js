//使用JQuery内的整合的 $.Ajax 向服务器请求用户名唯一验证 正则限制纯数字 密码与重复输入密码统一验证
$(document).ready(function () {
    //绑定松开按键事件
    $("#Pw").keyup(checkPass);
    $("#Repw").keyup(checkRePass);
    $("#ID").keyup(checkID);

    //提交表单,调用验证函数
    $("#myForm").submit(function (e) {
        e.preventDefault();
        if (checkPass() == true && checkRePass() == true && checkID() == true)
            $("#myForm").unbind('submit').submit();
    });
})

//验证输入密码
function checkPass() {
    var Pw = $("#Pw").val();
    var divPw = $("#divPw");
    divPw.html("");
    if (Pw == "") {
        divPw.html("密码不能为空");
        return false;
    }
    if (Pw.length < 6) {
        divPw.html("密码必须等于或大于6个字符");
        return false;
    }
    return true;
}
//验证重复密码
function checkRePass() {
    var Pw = $("#Pw").val(); //输入密码
    var Repw = $("#Repw").val();  //再次输入密码
    var divRepw = $("#divRepw");
    divRepw.html("");
    if (Pw != Repw) {
        divRepw.html("两次输入的密码不一致");
        return false;
    }
    return true;
}

function checkID()
{    //取用户名
    var ID = $("#ID").val();
    var divID = $("#divID");
    if($("#ID").length == 0)//如果表单中没有ID条目，那么不验证
        return true;
    var regCode = /^[0-9]*$/;//仅数字验证
    divID.html("");
    if (ID == "")
    {
        divID.html("ID 不能为空");
        return false;
    }
    //调ajax
    $.ajax({
        url:"../php/check_user_id.php",
        data:{user_id:ID},
        type:"POST",
        dataType:"TEXT",
        success: function(data)
            {
                if(regCode.test(ID))
                {
                    if(data>0)
                    {
                        divID.html("该管理员ID 已存在");
                        return false;
                    }
                    else
                    {
                        divID.html("管理员 ID 可用");
                        return true;
                    }
                }
                else
                {
                    divID.html("管理员 ID 只能为数字");
                    return false;
                }
            }
    });
    return true;
}