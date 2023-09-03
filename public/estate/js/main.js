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
$(".innersec *").click(function () {
    flg = "off";
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

    $('#builder-search').on('input', function () {
        const query = $(this).val();

        if (query.length >= 2) {
            $.ajax({
                url: '/builders/autocomplete', // Replace with your route
                dataType: 'json',
                data: {
                    query: query
                },
                success: function (data) {
                    const resultsList = $('#autocomplete-results');
                    resultsList.empty();
                    if (data.length > 0) {
                        $('#autocomplete-results').show();
                        data.forEach(function (builder) {
                            const listItem = $('<li>').text(builder.company_name).addClass('autocomplete-item');
                            resultsList.append(listItem);

                            listItem.on('click', function () {
                                const selectedName = builder.slug;
                                const encodedName = encodeURIComponent(selectedName);
                                const url = `https://builder.estateon.com/${encodedName}`;

                                window.open(url, '_blank');
                            });
                        });
                    } else {
                        $('#autocomplete-results').hide();
                    }
                }
            });
        } else {
            $('#autocomplete-results').hide();
        }
    });
});

