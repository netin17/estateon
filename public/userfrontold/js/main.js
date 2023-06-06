/*counter code */
$(document).ready(function() {

    $('.counter-num').each(function () {
    $(this).prop('Counter',0).animate({
    Counter: $(this).text()
    }, {
    duration: 4000,
    easing: 'swing',
    step: function (now) {
    $(this).text(Math.ceil(now));
    }
    });
    });
    
    });
/*---------------------------------*/
    function get_date() {
        let dd = new Date();
        let d = dd.toLocaleDateString();
        dd = dd.toDateString().split(' ')[1];
        let s = d.split('/');
        return `${s[1]}/${dd}/${s[2]}`;
    }
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    $('.time__now').html(get_date());
   /*----------------------------*/
   // Rating Initialization
   
   $(document).ready(function() {

    $('.owl-carousel').owlCarousel({
    mouseDrag:false,
    loop:true,
    margin:2,
    nav:true,
    responsive:{
    0:{
    items:1
    },
    600:{
    items:1
    },
    1000:{
    items:3
    }
    }
    });
    
    $('.owl-prev').click(function() {
    $active = $('.owl-item .item.show');
    $('.owl-item .item.show').removeClass('show');
    $('.owl-item .item').removeClass('next');
    $('.owl-item .item').removeClass('prev');
    $active.addClass('next');
    if($active.is('.first')) {
    $('.owl-item .last').addClass('show');
    $('.first').addClass('next');
    $('.owl-item .last').parent().prev().children('.item').addClass('prev');
    }
    else {
    $active.parent().prev().children('.item').addClass('show');
    if($active.parent().prev().children('.item').is('.first')) {
    $('.owl-item .last').addClass('prev');
    }
    else {
    $('.owl-item .show').parent().prev().children('.item').addClass('prev');
    }
    }
    });
    
    $('.owl-next').click(function() {
    $active = $('.owl-item .item.show');
    $('.owl-item .item.show').removeClass('show');
    $('.owl-item .item').removeClass('next');
    $('.owl-item .item').removeClass('prev');
    $active.addClass('prev');
    if($active.is('.last')) {
    $('.owl-item .first').addClass('show');
    $('.owl-item .first').parent().next().children('.item').addClass('prev');
    }
    else {
    $active.parent().next().children('.item').addClass('show');
    if($active.parent().next().children('.item').is('.last')) {
    $('.owl-item .first').addClass('next');
    }
    else {
    $('.owl-item .show').parent().next().children('.item').addClass('next');
    }
    }
    });
    
    });