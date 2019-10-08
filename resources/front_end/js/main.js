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

	window.onscroll = function (e) {
		var check_height = $(window).scrollTop();
		var check_active_height = $(window).scrollTop();
		$(".show_height").html(check_active_height);


		if (check_height > 100) {
			$("header").addClass("stuck");
		} else {
			$("header").removeClass("stuck");
		}


	}
	var check_active_height = $(window).scrollTop();
	if (check_active_height > 0) {
		$("header").addClass("stuck");
	} else {
		$("header").removeClass("stuck");
	}

	$('#slides').superslides({
		hashchange: false,
		animation: 'fade',
		pagination: false
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

//
//    var owl_techno = $('.owl-techno1');
//    // Go to the next item
//    $('#arrow-techno-r-p1').click(function() {
//        owl_techno.trigger('next.owl.carousel');
//    })
//    // Go to the previous item
//    $('#arrow-techno-l-p1').click(function() {
//        // With optional speed parameter
//        // Parameters has to be in square bracket '[]'
//        owl_techno.trigger('prev.owl.carousel', [300]);
//    })


//
//  $('.owl-carousel').owlCarousel({
//    loop:true,
//    autoplay:true,
//    autoplayTimeout:4000,
//    autoplaySpeed:800,
//    items:1,
//    margin:30,
//    responsiveClass:true,
//    responsive:{
//        0:{
//            items:1,
//            nav:false,
//            dots:true
//        },
//        550:{
//            items:2,
//            nav:false,
//            dots:true
//        },
//        768:{
//            items:3,
//            nav:false,
//            dots:true
//        }
//    }
//  })
	$('.owl-product').owlCarousel({
		pagination: false,
		navigation: true, // Show next and prev buttons
		slideSpeed: 300,
		paginationSpeed: 400,
		singleItem: true
	})
	$('.owl-techno').owlCarousel({
		pagination: true,
		navigation: false, // Show next and prev buttons
		slideSpeed: 300,
		paginationSpeed: 400,
		items: 3,
		itemsTablet: [600, 2], //2 items between 600 and 0
	})
//     $('.owl-gallery').owlCarousel({
//        loop:false,
//        margin:0,
//        nav:false,
//        center:true,
//        URLhashListener:true,
//        autoplayHoverPause:true,
//        startPosition: 'project1',
//        dotsSpeed:500,
//        dots:false,
//        items:1
//  })
//
//  $('.owl-gallery-thumb').owlCarousel({
//        loop:false,
//        margin:20,
//        nav:false,
//        dotsSpeed:500,
//        dots:false,
//        items:4,
//          responsiveClass:true,
//          responsive:{
//            0:{
//                items:1,
//                nav:false,
//                dots:true
//            },
//            550:{
//                items:2,
//                nav:false,
//                dots:true
//            },
//            768:{
//                items:4,
//                nav:false,
//                dots:true
//            }
//    }
//  });


//    var owl_product = $('.owl-product');
//    // Go to the next item
//    $('#arrow-product-right').click(function() {
//        owl_product.trigger('next.owl.carousel');
//    })
//    // Go to the previous item
//    $('#arrow-product-left').click(function() {
//        // With optional speed parameter
//        // Parameters has to be in square bracket '[]'
//        owl_product.trigger('prev.owl.carousel', [300]);
//    })

	var owl_product = $(".owl-product");
	$("#arrow-product-right").click(function () {
		owl_product.trigger('owl.next');
	})
	$("#arrow-product-left").click(function () {
		owl_product.trigger('owl.prev');
	})
	////////////// ajax lightbox //////////////////
	// $(".lb-detail").click(function () {
	//
	//     $(".product-lightbox").addClass("show-black");
	//     $(".product-lightbox").addClass("show-black");
	//     $("body,html").addClass("overflow-hidden");
	//     var val = $(this).data("code");
	//     var id = $(this).data("val");
	//     $.ajax({
	//         type: 'POST',
	//         url: "ajax-Product.php",
	//         data: 'code=' + val + '&id=' + id,
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
	// $(".lb-detail-project").click(function () {
	//
	//     $(".warp-light-box").addClass("show-black");
	//     $(".bg-black").addClass("show-black");
	//     $("body,html").addClass("overflow-hidden");
	//     var val = $(this).data("id");
	//     var name = $(this).data("name");
	//     var des = $(this).data("des");
	//
	//     $.ajax({
	//         type: 'POST',
	//         url: "ajax-project.php",
	//         data: 'id=' + val + '&name=' + name + '&des=' + des,
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

	$("#form-cad").submit(function (e) {
		e.preventDefault();
		var valform = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: "ajax-contact_page-cad.php",
			data: valform,
			success: function (data) {
				alert("Thank you very much. We well contact_page you as fast as possible.");
				$('#form-cad').trigger("reset");
				$(".warp-light-box").removeClass("show-black");
				$(".bg-black").removeClass("show-black");
				$("body,html").removeClass("overflow-hidden");
				$(".main-bl-product").removeClass("show-main-b-product");
			},
			error: function (data) {
				console.log("error");
				console.log(data);
			}
		});
	});


	$("#cad-form").click(function () {
		$(".cad-lightbox").addClass("show-black");
		$(".cad-lightbox").addClass("show-black");
		$("body,html").addClass("overflow-hidden");
		$("#product-cad").addClass("show-main-b-product");
	});

	$(".bg-black").click(function () {
		$(".cad-lightbox").removeClass("show-black");
		$(".warp-light-box").removeClass("show-black");
		$(".bg-black").removeClass("show-black");
		$("body,html").removeClass("overflow-hidden");
		$(".main-bl-product").removeClass("show-main-b-product");
	});
	$(".close-lb").click(function () {
		$(".cad-lightbox").removeClass("show-black");
		$(".warp-light-box").removeClass("show-black");
		$(".bg-black").removeClass("show-black");
		$("body,html").removeClass("overflow-hidden");
		$(".main-bl-product").removeClass("show-main-b-product");

	});
	$(".listing > li").click(function () {
		$(".fade-black-main").addClass("show-black-product");
		$("#product-des").addClass("show-main-b-product");

	});

	$(".fade-black-main").click(function () {
		$(".fade-black-main").removeClass("show-black-product");
		$(".main-bl-product").removeClass("show-main-b-product");
	});
	////////////// ajax lightbox //////////////////


	$(".main-catlist li").click(function () {
		var val = $(this).data("val");
		$(".main-catlist li").removeClass("active");
		$(this).addClass("active");
		$(".slide-crop").css("z-index", "0");
		$("#" + val).css("z-index", "1");
	});


	//// laod more ///
	size_li2 = $(".load-ul li").size();
	x2 = 10;
	$('.load-ul li:lt(' + x2 + ')').show();
	$('#loadMore').click(function () {
		$('.load-ul li').show();
		$("#loadMore").hide();
	});
	//// laod more ///

	var faq_arrow = true;
	$(".faq-main-box").click(function () {
		var val = $(this).data("val");
		$("p." + val).slideToggle();
		$(this).find("i").toggleClass("arrow-down");
	});
});

function vdo_show(val, topic, des) {
	$("#show-vdo").html('<iframe width="100%" height="400" src="https://www.youtube.com/embed/' + val + '" frameborder="0" allowfullscreen></iframe><h1>' + topic + '</h1><p>' + des + '</p>');
}
