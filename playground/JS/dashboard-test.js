$(function() {
    $(".tanchu_kuang").hide();
    $("#tanchu_btn").click(function() {
        $(".tanchu_kuang").fadeIn(300);
        $("#close_x").click(function() {
            $(".tanchu_kuang").fadeOut(200);
        

        });
    });
});

//窗口移动
$(".kuang_title_box").mousedown(function(event) {
    var isMove = true;
    var abs_x = event.pageX - $('div.tanchu_kuang').offset().left;
    var abs_y = event.pageY - $('div.tanchu_kuang').offset().top;
    $(document).mousemove(function(event) {
        if (isMove) {
            var obj = $('div.tanchu_kuang');
            var left_x = event.pageX - abs_x;
            var top_y = event.pageY - abs_y;
            obj.css({
                'left': left_x,
                'top': top_y
            });
        }
    }).mouseup(function() {
        isMove = false;
    });
});

//窗口缩放
var oDiv = document.getElementById('tanchu_kuang');
oDiv.onmousedown = function(ev) {
    // 获取event对象，兼容性写法
    var ev = ev || event;
    // 鼠标按下时的位置
    var mouseDownX = ev.clientX;
    var mouseDownY = ev.clientY;
    // 方块上下左右四个边的位置和方块的长宽
    var T0 = this.offsetTop;
    var B0 = this.offsetTop + this.offsetHeight;
    var L0 = this.offsetLeft;
    var R0 = this.offsetLeft + this.offsetWidth;
    var W = this.offsetWidth;
    var H = this.offsetHeight;
    // 设置方块的识别范围
    var areaT = T0 + 10;
    var areaB = B0 - 10;
    var areaL = L0 + 10;
    var areaR = R0 - 10;
    // 判断改变方块的大小的方向
    // 左
    var changeL = mouseDownX < areaL;
    // 右
    var changeR = mouseDownX > areaR;
    // 上
    var changeT = mouseDownY < areaT;
    // 下
    var changeB = mouseDownY > areaB;
    // IE8 取消默认行为-设置全局捕获
    if (oDiv.setCapture) {
        oDiv.setCapture();
    }
    document.onmousemove = function(ev) {
        var ev = ev || event;
        // 鼠标移动时的鼠标位置
        var mouseMoveX = ev.clientX;
        var mouseMoveY = ev.clientY;
        //根据改变方块大小的方向不同进行大小的改变
        // 左
        if (changeL) {
            oDiv.style.width = (mouseDownX - mouseMoveX) + W + 'px';
            oDiv.style.left = L0 - (mouseDownX - mouseMoveX) + 'px';

        }
        // 右
        if (changeR) {
            oDiv.style.width = (mouseMoveX - mouseDownX) + W + 'px';
        }
        // 上
        if (changeT) {
            oDiv.style.height = (mouseDownY - mouseMoveY) + H + 'px';
            oDiv.style.top = T0 - (mouseDownY - mouseMoveY) + 'px';
        }
        // 下
        if (changeB) {
            oDiv.style.height = (mouseMoveY - mouseDownY) + H + 'px';
        }
        // 限定范围
        if (parseInt(oDiv.style.width) < 50) {
            oDiv.style.width = 50 + 'px';
        }
        if (parseInt(oDiv.style.height) < 50) {
            oDiv.style.height = 50 + 'px';
        }
    }
    document.onmouseup = function() {
        document.onmousemove = null;
        // 释放全局捕获
        if (oDiv.releaseCapture) {
            oDiv.releaseCapture();
        }
    }
    return false;
}

