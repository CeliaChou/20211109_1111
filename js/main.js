//pop//
$(".popclose").click(function() {
$('.popup').fadeOut(200);
});
$(".blacklayer").click(function() {
$('.popup').fadeOut(200);
});
$(".p0_btn").click(function() {
$("div[id=" + $(this).attr("data-pop") + "]").fadeIn(200);
});

//animation reset
var RemoveCss=setInterval(RemoveCss, 1000);
var i=1;
function RemoveCss(){
    $(".p0-"+i).removeClass("p0-L");
    i++;
    if(i==8){
        i=1;
    };
    $(".p0-"+i).addClass("p0-L");
};