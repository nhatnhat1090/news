$(document).ready(function () {

    //all page
    $('.search-icon').click(function () {
        if ($(window).width() >= 992) {


            if ($('.search').hasClass("show-search")) {

            }
            else {
                $('.search').addClass("show-search");
            }
        }
    });

    $('.close-search').click(function () {
        if ($(window).width() >= 992) {


            if ($('.search').hasClass("show-search")) {
                $('.search').removeClass("show-search");
            }
        }

    });

    $('.show-sub-menu').click(function () {
        if ($(window).width() < 992) {

            if ($(this).parent().find(".submenu").is(":visible")) {
                $(this).parent().find(".submenu").slideUp();
                $(this).removeClass("active");
            }
            else {
                $(this).parent().find(".submenu").slideDown();
                $(this).addClass("active");
            }
        }
    });

    $('.show-nav').click(function () {
        if ($(window).width() < 992) {

            if ($(".nav").is(":visible")) {
                $(".nav").slideUp();
                $(this).removeClass("active");
            }
            else {
                $(".nav").slideDown();
                $(this).addClass("active");
            }
        }


    });


    //$(window).scroll(function () {
    //    if ($(this).scrollTop() > 100) {
    //        $('.scrollup').fadeIn();
    //    } else {
    //        $('.scrollup').fadeOut();
    //    }
    //});


    $(window).scroll(function () {

        if ($(window).width() >= 992) {
            if ($(this).scrollTop() > 130) {

                $('.menu-outer').addClass("menu-outer-fixed");
            }
            else {
                $('.menu-outer').removeClass("menu-outer-fixed");
            }
        }
    });


    var owl1 = $(".slider-video");
    owl1.owlCarousel({

        itemsCustom: [
          [350, 1],
          [550, 2],
          [600, 3],
          [700, 3],
            [992, 4],
               [1024, 5],

        ],
        navigation: true,
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        stopOnHover: true,
        rewindNav: false
    });


    var owl2 = $(".partner-slider");
    owl2.owlCarousel({

        itemsCustom: [
              [300, 2],
          [350, 3],
          [550, 4],
          [600, 5],
          [700, 6],
            [992, 7],
               [1024, 9],
        ],
        navigation: true,
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        stopOnHover: true,
        rewindNav: false
    });
    $(".top-news").niceScroll({ cursorcolor: "#ccc" });
    $(".top-qa").niceScroll({ cursorcolor: "#ccc" });
    $(window).resize(function () {
        if ($(window).width() <= 992) {
            if ($('.menu-outer').hasClass("menu-outer-fixed")) {

                $('.menu-outer').removeClass("menu-outer-fixed");
            }
        }
    }).trigger('resize');


    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });

    $("#toTop").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1000);
    });

    //home page

    var owl = $("#owl-text");
    owl.owlCarousel({
    
       


        navigation : false, // Show next and prev buttons
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem: true,
    autoPlay: 3000,

    });

    var owl = $(".slider-edulink");
    owl.owlCarousel({

        itemsCustom: [
          [350, 1],
          [550, 2],
          [600, 3],
          [700, 3],
            [992, 4],

        ],
        navigation: true,
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        stopOnHover: true,
        rewindNav: false

    });


    

    $('.show-comment').click(function () {
       

            if ($(".comment-hidden").is(":visible")) {
               
                $(".comment-hidden").slideUp();
            }
            else {
                $(".comment-hidden").slideDown();
            }
    });
});