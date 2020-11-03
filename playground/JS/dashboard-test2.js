var kaibi=0;
$(function() {
    $(".workspace").hide();
    $("#tanchu_btn").click(function() {
        $(".workspace").fadeToggle(300);
        kaibi++;
        if(kaibi%2==1)
            document.getElementsByTagName("title")[0].innerText = '工作台-仪表盘-TIMS';
        else
            document.getElementsByTagName("title")[0].innerText = '仪表盘-TIMS';
        /*$(".dashboard").animate({
            position: 'absolute',
            left: '25%',
            top: '50%',
            width: '500px',
            padding: '40px 40px 80px 40px',
        },1500);*/
        });
        
    });//开关工作台
