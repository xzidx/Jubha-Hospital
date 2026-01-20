(function ($) {
    $(document).ready(function () {
        "use strict";


        /* MENU TOGGLE */
        $('.side-widget .site-menu ul li i').on('click', function (e) {
            $(this).parent().children('.side-widget .site-menu ul li ul').toggle();
            return true;
        });


        // TAB
        $(".tab-nav li").on('click', function (e) {
            $(".tab-item").hide();
            $(".tab-nav li").removeClass('active');
            $(this).addClass("active");
            var selected_tab = $(this).find("a").attr("href");
            $(selected_tab).stop().show();
            return false;
        });


        // SEARCH BOX
        $('.navbar .search').on('click', function (e) {
            $(this).toggleClass('open');
            $(".search-box").toggleClass('active');
            $("body").toggleClass("overflow");
        });


        // HAMBURGER MENU
        $('.hamburger').on('click', function (e) {
            solut
            $(this).toggleClass('open');
            $(".side-widget").toggleClass('active'); p
            $("body").toggleClass("overflow");
        });


        // SCROLL TOP
        $('.scroll-top').on('click', function (e) {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

        /*------------------------
        //AUTOHEIGHT ON DOCTORS CARDS STARTS
        -------------------------*/

        //run auto_height_doctors_thumb on load event
        auto_height_doctors_thumb('.doctors-list-row');
        auto_height_doctors_thumb('.doctors-list-row-2');
        //run auto_height_doctors_thumb on resize event
        $(window).resize(function () {
            auto_height_doctors_thumb('.doctors-list-row');
            auto_height_doctors_thumb('.doctors-list-row-2');
        });

        //this is for the departments page
        $('#pills-profile-tab, #pills-profile-tab4').click(function () {
            auto_height_doctors_thumb('.doctors-list-row-2');
        });
        $('#pills-profile-tab, #pills-profile-tab4').click(function () {
            auto_height_doctors_thumb('.doctors-list-row-2');
        });
        //this is for the doctors carousel page
        setTimeout(function () {
            autoheight_doctors_carousel();
        }, 500);
        $(window).resize(function () {
            autoheight_doctors_carousel();
        });


        //auto height each doctor dynamically based on the highest details container
        function auto_height_doctors_thumb(className) {

            var doctors_row = $(className),
                w = $(window),
                cols_to_check = 3, //default for desktop
                total_cols = doctors_row.find('> div').length;

            //identify how many cols should be checked based on the window's width
            if (w.width() < 991 && w.width() > 575) { //tablet
                cols_to_check = 2;
            }
            if (w.width() < 576) { //mobile
                cols_to_check = 1;
            }

            //only do the calculation when cols_to_check != 1 - we don't need it
            if (cols_to_check != 1) {
                var starting_count = 0,
                    //based on cols_to_check and total_cols, obtain the number of generated rows_to_loop
                    rows_to_loop = total_cols / cols_to_check;

                //looping now through the generated rows_to_loop
                for (var i = 1; i <= rows_to_loop; i++) {

                    var count = 0,
                        height = 0,
                        cols_arr = [];

                    //looping now through the columns
                    for (var x = starting_count; x <= ((starting_count + cols_to_check) - 1); x++) {

                        //push the x to cols_arr so we can apply the new height to all columns later
                        cols_arr.push(x);

                        //get the height of the target column
                        var column_height = doctors_row.find('> div:eq(' + x + ') .management-team-title').outerHeight();
                        //when we get the new height, assign it to height
                        if (column_height > height)
                            height = column_height;

                        count++;
                        if (count == cols_to_check) {
                            starting_count = x + 1;
                            //on the last column, set the height to all columns in the row
                            cols_arr.forEach(function (value) {
                                doctors_row.find('> div:eq(' + value + ') .management-team-title').css('height', height + 'px');
                            });
                            //console.log('most height = ' + height);
                            break;
                        }

                    }

                }

            }
        }

        //function to autoheight the doctors carousel page
        function autoheight_doctors_carousel() {
            var carousel_item_height = 0;
            $('.doctors-related-slider').find('.doctors-departments .management-team-title').each(function () {
                var item_height = $(this).outerHeight();
                if (item_height > carousel_item_height) {
                    carousel_item_height = item_height;
                }
            });
            $('.doctors-related-slider').find('.doctors-departments .management-team-title').css('height', carousel_item_height + 'px');
        }

        var old_height = 0;
        $('.doctors-departments').hover(function () {
            old_height = $(this).find('.management-team-title').outerHeight();
            var new_height = old_height + 10;

            $(this).find('.management-team-title').css('height', new_height + 'px');
        }, function () {
            $(this).find('.management-team-title').css('height', old_height + 'px');
        })

        /*------------------------
        //AUTOHEIGHT ON DOCTORS CARDS ENDS
        -------------------------*/


        /* const menuItems = document.querySelectorAll('.left-menu li');
        menuItems.forEach((menuItem) => {
          const link = menuItem.querySelector('a');
          link.addEventListener('focus', () => {
            menuItem.querySelector('.dropdown-list').style.opacity = '1';
            menuItem.querySelector('.dropdown-list').style.visibility = 'visible';
          });
          link.addEventListener('blur', () => {
            menuItem.querySelector('.dropdown-list').style.opacity = '0';
            menuItem.querySelector('.dropdown-list').style.visibility = 'hidden';
          }); 
        }); */




        // PAGE TRANSITION
        //    $('body a').on('click', function (e) {
        //      if (typeof $(this).data('fancybox') == 'undefined') {
        //        e.preventDefault();
        //        var url = this.getAttribute("href");
        //        if (url.indexOf('#') != -1) {
        //          var hash = url.substring(url.indexOf('#'));
        //          if ($('body ' + hash).length != 0) {
        //            $('.page-transition').removeClass("active");
        //            $(".sandiwch").toggleClass("open");
        //            $(".site-menavigation").removeClass("active");
        //          }
        //        } else {
        //          $('.page-transition').toggleClass("active");
        //          setTimeout(function () {
        //            window.location = url;
        //          }, 1000);
        //        }
        //      }
        //    });


        // LOGO HOVER
        $(".logo-item").hover(function () {
            $('.logo-item').not(this).css({
                "opacity": "0.3"
            });
        },
            function () {
                $('.logo-item').not(this).css({
                    "opacity": "1"
                });
            });


    });
    // END DOCUMENT READY


    // MASONRY
    $(window).load(function () {
        $('.projects').isotope({
            itemSelector: '.projects li',
            percentPosition: true
        });
    });


    // ISOTOPE FILTER
    var $container = $('.projects');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });


    // ISOTOPE FILTER
    $('.isotope-filter li').on('click', function (e) {
        $('.isotope-filter li.current').removeClass('current');
        $(this).addClass('current');

        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        return false;
    });


    // RANGE SLIDER
    var rangeSlider = function () {
        var slider = $('.range-slider'),
            range = $('.range-slider__range'),
            value = $('.range-slider__value');

        slider.each(function () {

            value.each(function () {
                var value = $(this).prev().attr('value');
                $(this).html(value);
            });

            range.on('input', function () {
                $(this).next(value).html(this.value);
            });
        });
    };

    rangeSlider();


    // OUR HISTORY
    var swiper = new Swiper('.our-history', {
        slidesPerView: 5,
        spaceBetween: 0,
        pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
        },
        navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 0,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        }
    });


    // TESTIMONIALS SLIDER
    var swiper = new Swiper('.testimonials-slider', {
        slidesPerView: 2,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
        }
    });

    // STATISTIC SLIDER
    var swiper = new Swiper('.statistic-slider', {
        loop: true,
        slidesPerView: "auto",
        spaceBetween: 0,
        centeredSlides: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
        }
    });


    // Overview SLIDER


    var swiper = new Swiper('.overview-slider', {
        loop: true,
        slidesPerView: "auto",
        spaceBetween: 20,
        centeredSlides: true,

        navigation: {

            nextEl: '.swiper-button-next',

            prevEl: '.swiper-button-prev',

        },
        breakpoints: {

        }
    });



    // STATISTIC SLIDER
    //  var swiper = new Swiper('.partner-slider', {
    //    loop: true,
    //    slidesPerView: "5",
    //    spaceBetween: 10,
    //    centeredSlides: false,
    //    responsiveClass: true,
    //    pagination: {
    //      el: '.swiper-pagination',
    //      clickable: true,
    //    },
    //    breakpoints: {
    //      640: {
    //        slidesPerView: 2,
    //        spaceBetween: 10,
    //      },
    //      768: {
    //        slidesPerView: 3,
    //        spaceBetween: 10,
    //      },
    //      1199: {
    //        slidesPerView: 5,
    //        spaceBetween: 10,
    //      },
    //    }
    //  });


    // PROJECT SLIDER
    var swiper = new Swiper('.project-slider', {
        loop: true,
        spaceBetween: 0,
        navigation: {

            nextEl: '.swiper-button-next',

            prevEl: '.swiper-button-prev',

        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 0,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 0,
            },
        }
    });

    // Video SLIDER
    var swiper = new Swiper('.video-slider', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 0,
        centeredSlides: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

    });


    // SLIDER
    var mainslider = new Swiper('.slider-main', {
        spaceBetween: 0,
        autoplay: {
            delay: 9500,
            disableOnInteraction: false,
        },
        loop: true,
        direction: 'vertical',
        loopedSlides: 1,
        thumbs: {
            swiper: slidercontent
        }
    });


    // SLIDER CONTENT
    var slidercontent = new Swiper('.slider-content', {
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: 1,
        touchRatio: 0.2,
        slideToClickedSlide: true,
        loop: true,
        navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
        },
    });

    if ($(".slider-main")[0]) {
        mainslider.controller.control = slidercontent;
        slidercontent.controller.control = mainslider;
    } else { }


    // DATA BACKGROUND IMAGE
    var pageSection = $("*");
    pageSection.each(function (indx) {
        if ($(this).attr("data-background")) {
            $(this).css("background", "url(" + $(this).data("background") + ")");
        }
    });

    // DATA BACKGROUND COLOR
    var pageSection = $("*");
    pageSection.each(function (indx) {
        if ($(this).attr("data-background")) {
            $(this).css("background", $(this).data("background"));
        }
    });


    //COUNTER
    $(document).scroll(function () {
        $('.odometer').each(function () {
            var parent_section_postion = $(this).closest('section').position();
            var parent_section_top = parent_section_postion.top;
            if ($(document).scrollTop() > parent_section_top - 1100) {
                if ($(this).data('status') == 'yes') {
                    $(this).html($(this).data('count'));
                    $(this).data('status', 'no');
                }
            }
        });
    });


    //    // COUNTER
    //        $(document).scroll(function () {
    //            var pageYOffset = window.pageYOffset;
    //            $('.odometer').each(function () {
    //                var parent_section_postion = $(this).closest('.ad-counter-block').position();
    //
    //
    //
    //               var parent_section_top = $(this).closest('.ad-counter-block').offset().top;
    //                if (pageYOffset >= parent_section_top - ($(window).height() / 1)) {
    //
    //
    //
    //                   if ($(this).data('status') == 'yes') {
    //                        $(this).html($(this).data('count'));
    //                        $(this).data('status', 'no');
    //                    }
    //                }
    //            });
    //        });


    // STICKY NAVBAR
    $(window).on("scroll touchmove", function () {
        $('.navbar').toggleClass('sticky', $(document).scrollTop() > 0);

    });


    // STICKY UP DOWN
    var didScroll;
    var lastScrollTop = 0;
    var delta = 0;
    var navbarHeight = $('.navbar').outerHeight();

    $(window).scroll(function (event) {
        didScroll = true;
    });

    setInterval(function () {
        if (didScroll) {
            hasScrolled();
            didScroll = true;
        }
    }, 0);

    function hasScrolled() {
        var st = $(this).scrollTop();

        // Make sure they scroll more than delta
        if (Math.abs(lastScrollTop - st) <= delta)
            return;

        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight) {
            // Scroll Down
            $('.navbar').removeClass('nav-down').addClass('nav-up');
        } else {
            // Scroll Up
            if (st + $(window).height() < $(document).height()) {
                $('.navbar').removeClass('nav-up').addClass('nav-down');
            }
        }

        lastScrollTop = st;
    };

    // FORM CALCULATOR
    $(".form").change(function () {
        var totalPrice = parseFloat($('#value1').val()) + parseFloat($('#value2').val()) + parseFloat($('#value3').val()) + parseFloat($('#value4').val()),
            values = [];

        $('input[type=checkbox], input[type=radio]').each(function () {
            if ($(this).is(':checked')) {
                values.push($(this).val());
                totalPrice += parseInt($(this).val());
            }
        });

        $("#result").text(totalPrice);


    });

    $(".form").change(function () {
        total = 0;
        totalPrice();
    }).trigger("change");



})(jQuery);
//ACCOUNT DROPDOWN
$(document).ready(function () {
    $('button#accbtn').click(function () {
        $('.account-dropdown').toggleClass('active');
    });
});