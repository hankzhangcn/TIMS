$(document).ready(function(){
    $(".loginpad").animate({
        top:"50%",
        marginTop:"-250px"
    },900,'easeOutExpo');

    $("form").submit(function(e){
        //阻止提交
        e.preventDefault();
        //先播放动画
        $(".loginpad").animate({
            top:"-100%",
        },500,'easeInQuart');
        //播放完再提交，延迟500ms
        setTimeout(function(){
            $("form").unbind('submit').submit();
        },500);
        
    });

});

