//使用JQuery内的整合的 $.Ajax 向服务器请求用户名唯一验证 正则限制纯数字 密码与重复输入密码统一验证
var old_t_id;
$(document).ready(function () {
    old_t_id = $("#t_id").val();
    $("#t_id").keyup(checktid);
    $("#t_name").keyup(checktname);

    //提交表单,调用验证函数
    $("#myForm").submit(function (e) {
        e.preventDefault();
        if (checktid() == true && checktname() == true)
            $("#myForm").unbind('submit').submit();
    });
})

function checktname()
{
    var name = $("#t_name").val();
    var divName = $("#div_t_name");
    divName.html("");
    if(name == "")
    {
        divName.html("教师姓名不能为空");
        return false;
    }
    else{
        return true;
    }
}
function checktid()
{
    var ID = $("#t_id").val();
    var divID = $("#div_t_id");
    divID.html("");
    if (ID == "")
    {
        divID.html("ID 不能为空");
        return false;
    }
    //调ajax
    if(ID != old_t_id)
    {
        $.ajax({
            url:"../php/check_t_id.php",
            data:{t_id:ID},
            type:"POST",
            dataType:"TEXT",
            success: function(data)
                {
                        if(data>0)
                        {
                            divID.html("该教师 ID 已存在");
                            return false;
                        }
                        else
                        {
                            divID.html("教师 ID 可用");
                            return true;
                        }
                }
        });
    }
    else
        return true;
    return true;
}

