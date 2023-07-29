$(document).ready(function () {

});
var flg = "off";
$(".heading").click(function () {
    $(".innersec").toggleClass("dnone");
    $(".minprice").addClass("dnone");
    $(".disnone").addClass("dnone");
    $(".textSearch").addClass("dnone");
    flg = "off";
});
$(".heading1").click(function () {
    flg = "off";
    $(".innersec1").toggleClass("dnone");
    $(".santo").toggleClass("rot");
    $(".innersec2").addClass("dnone");
    $(".santo2").addClass("rot");
});
$(".heading2").click(function () {
    flg = "off";
    $(".innersec2").toggleClass("dnone");
    $(".santo2").toggleClass("rot");
    $(".innersec1").addClass("dnone");
    $(".santo").addClass("rot");
});
$(function () {

    $(document).on("click", function (e) {
        if (flg == "on") {
            $(".innersec").addClass("dnone");
        }
        flg = "on";
    });
});

$(".heading3").click(function () {
    $(".innersec3").toggleClass("dnone");
    $(".santo3").toggleClass("rot");

});
$(".Bheading").click(function () {
    $(".minprice").toggleClass("dnone");
    $(".disnone").toggleClass("dnone");
    $(".textSearch").toggleClass("dnone");
    $(".innersec").addClass("dnone");


});
// $('li').click(function (event) {
//     $(this).toggleClass('bred');
// });
jQuery(document).ready(function () {
    jQuery('.open-menu').click(function () {
        jQuery('.header-wrap').slideToggle();
        jQuery('.open-menu').toggleClass('close-menu');
        jQuery("body").toggleClass("body-overflow");
    });
});

