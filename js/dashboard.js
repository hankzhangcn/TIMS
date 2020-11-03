$(document).ready(function(){
    $(".funclist-pad").animate({
        top:"100"
    },1000,'easeOutExpo');
    $(".noticepad").delay(100).animate({
        marginTop:"0"
    },1000,'easeOutExpo');
    $(".workspace").delay(200).animate({
        marginTop:"0px"
    },1000,'easeOutExpo');
    $(".bottom").delay(300).animate({
        marginTop:"0px"
    },1000,'easeOutExpo');
    $(".topbar").animate({
        top:"0px"
    },1000,'easeOutExpo');
});


$(".logout").click(function(){
    $(".funclist-pad").delay(200).animate({
        top:"3000px"
    },600,'easeInExpo',function(){
        window.location.href="../php/logout_ok.php";
    });
    $(".noticepad").delay(200).animate({
        marginTop:"3000px"
    },500,'easeInExpo');
    $(".workspace").delay(100).animate({
        marginTop:"3000px"
    },600,'easeInExpo');
    $(".bottom").animate({
        marginTop:"3000px"
    },700,'easeInExpo');
    $(".topbar").animate({
        top:"-300px"
    },700,'easeInExpo')
});