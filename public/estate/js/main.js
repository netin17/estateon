$(document).ready(function () {

});
$(".heading").click(function () {
    $(".innersec").toggleClass("dnone");
    $(".minprice").addClass("dnone");
    $(".disnone").addClass("dnone");
    $(".textSearch").addClass("dnone");

});
$(".heading1").click(function () {
    $(".innersec1").toggleClass("dnone");
    $(".santo").toggleClass("rot");
});
$(".heading2").click(function () {
    $(".innersec2").toggleClass("dnone");
    $(".santo2").toggleClass("rot");

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

