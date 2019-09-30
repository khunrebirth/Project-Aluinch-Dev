$(function () {

    //// preload /////
    $('body').jpreLoader({
        splashID: "#jSplash",
        loaderVPos: '30%',
        autoClose: true,
        closeBtnText: "Let's Begin!",
        splashFunction: function () {
            //passing Splash Screen script to jPreLoader
            $('#jSplash').children('section').not('.selected').hide();
            $('#jSplash').hide().fadeIn(800);

        }
    }, function () {	//callback function

//            $('.logo-preload').fadeIn();
//
//            setTimeout(function(){
//             $(".preload-main").fadeOut("slow");
//            }, 1500);

    });
    //// preload /////

    $(".navigation ul li.mobile").click(function () {
        //aria-expanded
        $("#navi").attr("aria-expanded", "false");
        $("#navi").removeClass("in");
    });
//
//$('#arrow-lead-r').superslides('animate', 'next');
//$('#arrow-lead-l').superslides('animate', 'prev');

    window.onscroll = function (e) {
        var check_height = $(window).scrollTop();
        var check_active_height = $(window).scrollTop();
        var check_width = $(window).width();

        if (check_height > 100) {
            $("header").addClass("stuck");
            $("#arrow-lead-l").fadeOut();
            $("#arrow-lead-r").fadeOut();
            $(".nav-page").fadeIn();
        } else {
            $("header").removeClass("stuck");
            $("#arrow-lead-l").fadeIn();
            $("#arrow-lead-r").fadeIn();
            $(".nav-page").fadeOut();
        }

///////////////////////////////////////////   active //////////////////////////////////////////////
        if (check_active_height <= 6298) {
            $("nav ul li").removeClass("active");
            $("nav li.home-nav").addClass("active");
            $(".nav-page li").removeClass("active");
            $(".nav-page li.home-nav").addClass("active");
        }
        if (check_active_height > 6299 && check_active_height <= 10508) {
            $("nav ul li").removeClass("active");
            $("nav li.product-nav").addClass("active");
            $(".nav-page li").removeClass("active");
            $(".nav-page li.product-nav").addClass("active");
        }
        if (check_active_height > 10509 && check_active_height <= 15426) {
            $("nav ul li").removeClass("active");
            $("nav li.category_technology-nav").addClass("active");
            $(".nav-page li").removeClass("active");
            $(".nav-page li.category_technology-nav").addClass("active");
        }
        if (check_active_height > 15427 && check_active_height <= 16742) {
            $("nav ul li").removeClass("active");
            $("nav li.project-nav").addClass("active");
            $(".nav-page li").removeClass("active");
            $(".nav-page li.project-nav").addClass("active");
        }
        if (check_active_height > 16743) {
            $("nav ul li").removeClass("active");
            $("nav li.contact_page-nav").addClass("active");
            $(".nav-page li").removeClass("active");
            $(".nav-page li.contact_page-nav").addClass("active");
        }
///////////////////////////////////////////   active //////////////////////////////////////////////
    }

///////////////////////////////////////////   click nav  //////////////////////////////////////////////
    $(".logo").click(function () {
        $("body,html").animate({
            scrollTop: 0
        }, 500)

    });

    $(".home-nav").click(function () {
        $("body,html").animate({
            scrollTop: 0
        }, 500)
        $(".nav-page li").removeClass("active");
        $(".nav-page li.home-nav").addClass("active");
    });

    $(".product-nav").click(function () {

        $("body,html").animate({
            scrollTop: 6300
        }, 500)
        $(".nav-page li").removeClass("active");
        $(".nav-page li.product-nav").addClass("active");
    });


    $(".category_technology-nav").click(function () {
        $("body,html").animate({
            scrollTop: 10511
        }, 500)
        $(".nav-page li").removeClass("active");
        $(".nav-page li.category_technology-nav").addClass("active");
    });

    $(".project-nav").click(function () {
        $("body,html").animate({
            scrollTop: 15428
        }, 500)
        $(".nav-page li").removeClass("active");
        $(".nav-page li.project-nav").addClass("active");
    });

    $(".contact_page-nav").click(function () {
        $("body,html").animate({
            scrollTop: 16744
        }, 500)
        $(".nav-page li").removeClass("active");
        $(".nav-page li.contact_page-nav").addClass("active");
    });


///////////////////////////////////////////   click nav  //////////////////////////////////////////////
    $('#arrow-lead-l').superslides('next');    // get next slide index
    $('#arrow-lead-r').superslides('prev');    // get previous slide inde
    $('#slides').superslides({
        hashchange: false,
        animation: 'fade',
        pagination: true
    });

    var check_tagline = "1";
    $(".lead-tagline").click(function (e) {
        e.preventDefault();
        if (check_tagline == "1") {
            $(".box-lead").stop(false, true).fadeOut();
            return check_tagline = "2";

        } else {
            $(".box-lead").stop(false, true).fadeIn();
            return check_tagline = "1";

        }

    });

    $(".logo").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 500);
    });

    $(".home-nav-mobile").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 500);
    });
    $(".contact_page-nav-mobile").click(function () {
        $("html,body").animate({
            scrollTop: 6593
        }, 500);
    });

    $(".scroll-top").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 500);
    });

//
//   $.scrollIt({
//   topOffset:-67
//   });

    $(".warp-gallery ul li").click(function () {
        var val = $(this).data("val");
        if (val == 1) {
            $(this).addClass("active1");
            $(".warp-gallery ul li").removeClass("active2");
            $(".warp-gallery ul li").removeClass("active3");

        } else if (val == 2) {
            $(this).addClass("active2");
            $(".warp-gallery ul li").removeClass("active1");
            $(".warp-gallery ul li").removeClass("active3");
            $(".warp-slide").css("z-index", "0");
            $("#gallery1").css("z-index", "1");

        } else {
            $(this).addClass("active3");
            $(".warp-gallery ul li").removeClass("active1");
            $(".warp-gallery ul li").removeClass("active2");
            $(".warp-slide").css("z-index", "0");
            $("#gallery2").css("z-index", "1");


        }
    });

    $('.owl-product1').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplaySpeed: 800,
        dots: false,
        margin: 30,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            500: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: false
            }
        }
    })

    var owl = $('.owl-product1');
    // Go to the next item
    $('#arrow-r-p1').click(function () {
        owl.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('#arrow-l-p1').click(function () {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl.trigger('prev.owl.carousel', [300]);
    })

    $('.owl-product2').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplaySpeed: 800,
        dots: false,
        margin: 30,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            500: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: false
            }
        }
    })

    var owl2 = $('.owl-product2');
    // Go to the next item
    $('#arrow-r-p2').click(function () {
        owl2.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('#arrow-l-p2').click(function () {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl2.trigger('prev.owl.carousel', [300]);
    })

    $('.owl-techno1').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplaySpeed: 800,
        dots: false,
        margin: 30,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            500: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: false
            }
        }
    })

    var owl_techno = $('.owl-techno1');
    // Go to the next item
    $('#arrow-techno-r-p1').click(function () {
        owl_techno.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('#arrow-techno-l-p1').click(function () {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl_techno.trigger('prev.owl.carousel');
    })

    $('.owl-techno2').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplaySpeed: 800,
        dots: false,
        margin: 30,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            500: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: false
            }
        }
    })

    var owl_techno2 = $('.owl-techno2');
    // Go to the next item
    $('#arrow-techno-r-p2').click(function () {
        owl_techno2.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('#arrow-techno-l-p2').click(function () {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl_techno2.trigger('prev.owl.carousel');
    })

    var owl_product_page = $('.owl-product-page');
    // Go to the next item
    $('#arrow-product-right').click(function () {
        owl_product_page.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('#arrow-product-left').click(function () {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl_product_page.trigger('prev.owl.carousel', [300]);
    })

    $('.owl-project').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplaySpeed: 800,
        dots: false,
        margin: 30,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            500: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: false
            }
        }
    })

    var owl_project = $('.owl-project');
    // Go to the next item
    $('#arrow-project-r-p1').click(function () {
        owl_project.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('#arrow-project-l-p1').click(function () {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl_project.trigger('prev.owl.carousel', [300]);
    })

//
//
//  $('.owl-carousel').owlCarousel({
//    loop:true,
//    autoplay:true,
//    autoplayTimeout:4000,
//    autoplaySpeed:800,
//    items:1,
//    margin:0
//  })
//  $('.owl-product-page').owlCarousel({
//    loop:true,
//    autoplay:false,
//    autoplayTimeout:4000,
//    autoplaySpeed:800,
//    nav:false,
//    dots:true,
//    items:1,
//    margin:0,
//    center:true,
//    URLhashListener:true,
//    autoplayHoverPause:true,
//    startPosition: 'URLHash'
//  })
//
//  $('.owl-gallery-thumb-page').owlCarousel({
//        items:6,
//        loop:true,
//        dots:false,
//        center:true,
//        nav:false,
//        margin:5
//  });

    ///////////////////////////// sync ////////////////////////////
    var sync1 = $(".owl-gallery"),
        sync2 = $(".owl-gallery-thumb"),
        flag = false,
        duration = 300;

    sync1.owlCarousel({
        items: 1,
        margin: 10,
        nav: false,
        dots: false
    })
        .on('change.owl.carousel', function (e) {
            if (e.namespace && e.property.name === 'items' && !flag) {
                flag = true;
                sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
                flag = false;
            }
        });

    sync2.owlCarousel({
        items: 4,
        margin: 10,
        nav: false
    })
        .on('click', '.owl-item', function () {
            sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);

        })
        .on('change.owl.carousel', function (e) {

            if (e.namespace && e.property.name === 'items' && !flag) {
                flag = true;
                sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
                flag = false;
            }
        });

    var owl_port = $('.owl-gallery-thumb');
    // Go to the next item
    $('#arrow-port-right').click(function () {
        owl_port.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('#arrow-port-left').click(function () {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl_port.trigger('prev.owl.carousel');
    })

    ///////////////////////////// sync ////////////////////////////
//
//
// $('.owl-gallery2').owlCarousel({
//    loop:true,
//    autoplay:false,
//    autoplayTimeout:4000,
//    autoplaySpeed:800,
//    nav:false,
//    dots:false,
//    items:1,
//    margin:0,
//    center:true,
//    URLhashListener:true,
//    autoplayHoverPause:true,
//    startPosition: 'URLHash'
//  })
//
//  $('.owl-gallery-thumb2').owlCarousel({
//        items:6,
//        loop:true,
//        dots:false,
//        center:true,
//        nav:false,
//        margin:5,
//        responsiveClass:true,
//        responsive:{
//        0:{
//            items:3,
//            nav:false,
//            dots:false
//        },
//        768:{
//            items:4,
//            nav:false,
//            dots:false
//        }
//       }
//  });
//
//  $('.owl-gallery3').owlCarousel({
//        loop:false,
//        margin:0,
//        nav:false,
//        center:true,
//        URLhashListener:true,
//        autoplayHoverPause:true,
//        startPosition: 'interior0',
//        dotsSpeed:500,
//        dots:false,
//         items:1
//    })
//    $('.owl-gallery-thumb3').owlCarousel({
//        loop:false,
//        margin:5,
//        nav:false,
//        dotsSpeed:500,
//        dots:false,
//        responsive:{
//        0:{
//            items:3,
//            nav:false,
//            dots:false
//        },
//        768:{
//            items:4,
//            nav:false,
//            dots:false
//        }
//        }
//    });

    ////////////// ajax lightbox //////////////////
    $(".lb-detail").click(function () {
        $(".bg-black").addClass("show-black");
        $("body,html").addClass("overflow-hidden");
        var val = $(this).data("code");
        var lang = $("body").data("lang");

        $.ajax({
            type: 'POST',
            url: "ajax-project.php",
            data: 'code=' + val + '&lang=' + lang,
            success: function (data) {
                // console.log("success");
                // console.log(data);
                // $('#myform').trigger("reset");
                $('#ajax-result').html(data);
            },
            error: function (data) {
                console.log("error");
                console.log(data);
            }
        });
    });

    ////////////// ajax lightbox //////////////////
    // $(".lb-detail-project").click(function () {
    //
    //     $(".warp-light-box").addClass("show-black");
    //     $(".bg-black").addClass("show-black");
    //     $("body,html").addClass("overflow-hidden");
    //     var val = $(this).data("id");
    //     var name = $(this).data("name");
    //     $.ajax({
    //         type: 'POST',
    //         url: "ajax-project-home.php",
    //         data: 'id=' + val + '&name=' + name,
    //         success: function (data) {
    //             // console.log("success");
    //             // console.log(data);
    //             // $('#myform').trigger("reset");
    //             $('#ajax-result').html(data);
    //         },
    //         error: function (data) {
    //             console.log("error");
    //             console.log(data);
    //         }
    //     });
    // });

    $(".vdo-lightbox").click(function () {

        $(".warp-light-box").addClass("show-black");
        $(".bg-black").addClass("show-black");
        $("body,html").addClass("overflow-hidden");
        var val = $(this).data("val");
        $('#ajax-result').html('<div class="bg-vdo"><iframe width="100%" height="400" src="https://www.youtube.com/embed/' + val + '" frameborder="0" allowfullscreen></iframe></div>');
    });

    $(".bg-black").click(function () {

        $(".warp-light-box").removeClass("show-black");
        $(".bg-black").removeClass("show-black");
        $("body,html").removeClass("overflow-hidden");
        $(".main-bl-product").removeClass("show-main-b-product");
        $('#ajax-result').html('');
    });

    $(".close-lb").click(function () {

        $(".warp-light-box").removeClass("show-black");
        $(".bg-black").removeClass("show-black");
        $("body,html").removeClass("overflow-hidden");
        $(".main-bl-product").removeClass("show-main-b-product");
        $('#ajax-result').html('');

    });

    $(".main-catlist li").click(function () {
        var val = $(this).data("val");
        $(".main-catlist li").removeClass("active");
        $(this).addClass("active");
        $(".slide-crop").css("z-index", "0");
        $("#" + val).css("z-index", "1");
    });

    var faq_arrow = true;
    $(".faq-main-box").click(function () {
        var val = $(this).data("val");
        $("p." + val).slideToggle();
        $(this).find("i").toggleClass("arrow-down");
    });
});