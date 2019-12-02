/** ********************************************** **
	@Author			Dorin Grigoras
	@Website		www.stepofweb.com
*************************************************** **/
function Init(e) {
    1 != e && (_afterResize(), _slider_full(), _topNav(), _megaNavHorizontal(), _sideNav(), _stickyFooter(), _infiniteScroll()), _owl_carousel(), _flexslider(), _lightbox(), _mixitup(), _animate(), _onepageNav(), _scrollTo(!1, 0), _parallax(), _video(), _youtubeBG(), _toggle(), _placeholder(), _wrotate(), /*_lazyload(),*/ _misc(), _countDown(), _masonryGallery(), _toastr(!1, !1, !1, !1), _charts(), _select2(), _form(), _pickers(), _editors(), _pajinate(), _zoom(), _autosuggest(), _stepper(), _slimScroll(), _modalAutoLoad(), _bgimage(), _stickyKit(), _cookie_alert(), _widget_flickr(), _widget_twitter(), _widget_facebook(), _widget_dribbble(), _widget_media(), jQuery("[data-toggle=tooltip]").tooltip(), jQuery("[data-toggle=popover]").popover()
}

function _afterResize() {
    jQuery(window).on("load", function() {
        "use strict";
        jQuery(window).resize(function() {
            window.afterResizeApp && clearTimeout(window.afterResizeApp), window.afterResizeApp = setTimeout(function() {
                _slider_full(), window.width = jQuery(window).width(), window.height = jQuery(window).height(), jQuery(".flexslider").length > 0 && jQuery(".flexslider").resize()
            }, 300)
        })
    })
}
window.width = jQuery(window).width(), window.height = jQuery(window).height(), jQuery(window).ready(function() {
    jQuery.fn.extend({
        size: function() {
            return this.length
        }
    }), _loadPopperBS4(), loadScript(plugin_path + "bootstrap/js/bootstrap.min.js", function() {
        jQuery("body").hasClass("enable-materialdesign") && loadScript(plugin_path + "mdl/material.min.js"), Init(!1)
    }), jQuery("body").hasClass("smoothscroll") && navigator.platform.indexOf("Mac") < 0 && loadScript(plugin_path + "smoothscroll.js", function() {
        jQuery.smoothScroll()
    })
}), jQuery("#preloader").length > 0 && jQuery(window).on("load", function() {
    jQuery("#preloader").fadeOut(1e3, function() {
        jQuery("#preloader").remove()
    })
});
var _arr = {};

function loadScript(e, t) {
    if (_arr[e]) t && t();
    else {
        _arr[e] = !0;
        var n = document.getElementsByTagName("body")[0],
            r = document.createElement("script");
        r.type = "text/javascript", r.src = e, r.onload = t, n.appendChild(r)
    }
}

function _slider_full() {
    _headerHeight = 0, jQuery("#header").hasClass("transparent") || jQuery("#header").hasClass("translucent") ? _headerHeight = 0 : (_headerHeight = jQuery("#header").outerHeight() || 0, jQuery("#topBar").length > 0 && (_topBarHeight = jQuery("#topBar").outerHeight() || 0, _headerHeight += _topBarHeight)), _screenHeight = jQuery(window).height() - _headerHeight, jQuery("#header").hasClass("static") && (_screenHeight = jQuery(window).height()), jQuery("#slider").hasClass("halfheight") && jQuery("#slider.halfheight").height(_screenHeight / 2), jQuery("#slider").hasClass("thirdheight") && jQuery("#slider.thirdheight").height(_screenHeight / 1.5), jQuery("#slider").hasClass("fullheight") && (jQuery("#slider.fullheight").height(_screenHeight), jQuery("#slider.fullheight-min").css({
        "min-height": _screenHeight + "px"
    })), window.width < 960 && jQuery("#slider.mobile-fullheight").height(_screenHeight)
}

function _topNav() {
    window.scrollTop = 0, window._cmScroll = 0;
    var e = jQuery("#header");
    jQuery(window).scroll(function() {
        jQuery(document).scrollTop() > 100 ? jQuery("#toTop").is(":hidden") && jQuery("#toTop").show() : jQuery("#toTop").is(":visible") && jQuery("#toTop").hide()
    });
    var t = !1;
    if (jQuery("#topMain a.dropdown-toggle").bind("click", function(e) {
            "#" == jQuery(this).attr("href") && e.preventDefault(), t = jQuery(this).parent().hasClass("resp-active"), jQuery("#topMain").find(".resp-active").removeClass("resp-active"), t || jQuery(this).parents("li").addClass("resp-active")
        }), jQuery("li.search i.fa").click(function() {
            jQuery("#header .search-box").is(":visible") ? jQuery("#header .search-box").fadeOut(300) : (jQuery(".search-box").fadeIn(300), jQuery("#header .search-box form input").focus(), jQuery("#header li.quick-cart div.quick-cart-box").is(":visible") && jQuery("#header li.quick-cart div.quick-cart-box").fadeOut(300))
        }), 0 != jQuery("#header li.search i.fa").size() && (jQuery("#header .search-box, #header li.search i.fa").on("click", function(e) {
            e.stopPropagation()
        }), jQuery("body").on("click", function() {
            jQuery("#header li.search .search-box").is(":visible") && jQuery("#header .search-box").fadeOut(300)
        })), jQuery(document).bind("click", function() {
            jQuery("#header li.search .search-box").is(":visible") && jQuery("#header .search-box").fadeOut(300)
        }), jQuery("#closeSearch").bind("click", function(e) {
            e.preventDefault(), jQuery("#header .search-box").fadeOut(300)
        }), jQuery("button#page-menu-mobile").bind("click", function() {
            jQuery(this).next("ul").slideToggle(150)
        }), jQuery(document).on("click", "li.quick-cart>a", function(e) {
            e.preventDefault();
            var t = jQuery("li.quick-cart div.quick-cart-box");
            t.is(":visible") ? t.fadeOut(300) : (t.fadeIn(300), jQuery("li.search .search-box").is(":visible") && jQuery(".search-box").fadeOut(300))
        }), 0 != jQuery("li.quick-cart>a").size() && (jQuery(document).on("click", "li.quick-cart",function(e) {
            e.stopPropagation()
        }), jQuery("body").on("click", function() {
            jQuery("li.quick-cart div.quick-cart-box").is(":visible") && jQuery("li.quick-cart div.quick-cart-box").fadeOut(300)
        })), jQuery("#page-menu ul.menu-scrollTo>li").bind("click", function(e) {
            var t = jQuery("a", this).attr("href");
            jQuery("a", this).hasClass("external") || (e.preventDefault(), jQuery("#page-menu ul.menu-scrollTo>li").removeClass("active"), jQuery(this).addClass("active"), jQuery(t).length > 0 && (_padding_top = 0, jQuery("#header").hasClass("sticky") && (_padding_top = jQuery(t).css("padding-top"), _padding_top = _padding_top.replace("px", "")), jQuery("html,body").animate({
                scrollTop: jQuery(t).offset().top - _padding_top
            }, 800, "easeInOutExpo")))
        }), window.currentScroll = 0, jQuery("button.btn-mobile").bind("click", function(e) {
            e.preventDefault(), jQuery(this).toggleClass("btn-mobile-active"), jQuery("html").removeClass("noscroll"), jQuery("#menu-overlay").remove(), jQuery("#topNav div.nav-main-collapse").hide(0), jQuery(this).hasClass("btn-mobile-active") ? (jQuery("#topNav div.nav-main-collapse").show(0), jQuery("body").append('<div id="menu-overlay"></div>'), (!jQuery("#topMain").hasClass("nav-onepage") || window.width > 960) && (jQuery("html").addClass("noscroll"), window.currentScroll = jQuery(window).scrollTop())) : (!jQuery("#topMain").hasClass("nav-onepage") || window.width > 960) && jQuery("html,body").animate({
                scrollTop: currentScroll
            }, 300, "easeInOutExpo")
        }), e.hasClass("bottom")) e.addClass("dropup"), window.homeHeight = jQuery(window).outerHeight() - 55, e.hasClass("sticky") && (window.isOnTop = !0, jQuery(window).scroll(function() {
        jQuery(document).scrollTop() > window.homeHeight / 2 ? e.removeClass("dropup") : e.addClass("dropup")
    }), jQuery(window).scroll(function() {
        jQuery(document).scrollTop() > window.homeHeight ? !0 === window.isOnTop && (jQuery("#header").addClass("fixed"), e.removeClass("dropup"), window.isOnTop = !1) : !1 === window.isOnTop && (jQuery("#header").removeClass("fixed"), e.addClass("dropup"), window.isOnTop = !0)
    }), jQuery(window).resize(function() {
        window.homeHeight = jQuery(window).outerHeight()
    }));
    else if (e.hasClass("sticky")) {
        if (_topBar_H = jQuery("#topBar").outerHeight() || 0, window.width <= 992 && _topBar_H < 1) {
            jQuery(document).scrollTop();
            l = e.outerHeight() || 0, e.addClass("fixed"), jQuery("body").css({
                "padding-top": l + "px"
            })
        }
        if (e.hasClass("transparent")) var n = jQuery("#topNav div.nav-main-collapse"),
            r = n.attr("data-switch-default") || "",
            i = n.attr("data-switch-scroll") || "";
        jQuery(window).scroll(function() {
            if (window.width > 992 && _topBar_H < 1 || _topBar_H > 0) {
                var t = jQuery(document).scrollTop();
                t > _topBar_H ? (e.addClass("fixed"), l = e.outerHeight() || 0, e.hasClass("transparent") || e.hasClass("translucent") || jQuery("body").css({
                    "padding-top": l + "px"
                })) : (e.hasClass("transparent") || e.hasClass("translucent") || jQuery("body").css({
                    "padding-top": "0px"
                }), e.removeClass("fixed"))
            }
            e.hasClass("transparent") && ("" == r && "" == i || (t > 0 ? window._cmScroll < 1 && (n.removeClass(r, i).addClass(i), window._cmScroll = 1) : t < 1 && (n.removeClass(r, i).addClass(r), window._cmScroll = 0)))
        })
    } else if (e.hasClass("scroll")) {
        var a;
        jQuery("body").addClass("header-scroll-reveal");
        var o = 0,
            s = 5,
            l = e.outerHeight() || 0;
        jQuery(window).scroll(function(e) {
            a = !0
        }), setInterval(function() {
            a && (! function() {
                var t = $(this).scrollTop();
                if (Math.abs(o - t) <= s) return;
                t > o && t > l ? e.removeClass("nav-down").addClass("nav-up") : t + jQuery(window).height() < jQuery(document).height() && e.removeClass("nav-up").addClass("nav-down");
                o = t
            }(), a = !1)
        }, 100)
    } else if (e.hasClass("static") && e.hasClass("transparent")) {
        if (_topBar_H = jQuery("#topBar").outerHeight() || 0, window.width <= 992 && _topBar_H < 1) {
            jQuery(document).scrollTop();
            l = e.outerHeight() || 0, e.addClass("fixed")
        }
        jQuery(window).scroll(function() {
            (window.width > 992 && _topBar_H < 1 || _topBar_H > 0) && (jQuery(document).scrollTop() > _topBar_H ? (e.addClass("fixed"), l = e.outerHeight() || 0) : e.removeClass("fixed"))
        })
    } else e.hasClass("static");
    if (jQuery("#slidetop a.slidetop-toggle").bind("click", function() {
            jQuery("#slidetop .container").slideToggle(150, function() {
                jQuery("#slidetop .container").is(":hidden") ? jQuery("#slidetop").removeClass("active") : jQuery("#slidetop").addClass("active")
            })
        }), jQuery(document).keyup(function(e) {
            27 == e.keyCode && jQuery("#slidetop").hasClass("active") && jQuery("#slidetop .container").slideToggle(150, function() {
                jQuery("#slidetop").removeClass("active")
            })
        }), jQuery("a#sidepanel_btn").bind("click", function(e) {
            e.preventDefault(), c = "right", jQuery("#sidepanel").hasClass("sidepanel-inverse") && (c = "left"), jQuery("#sidepanel").is(":hidden") ? (jQuery("body").append('<span id="sidepanel_overlay"></span>'), "left" == c ? jQuery("#sidepanel").stop().show().animate({
                left: "0px"
            }, 150) : jQuery("#sidepanel").stop().show().animate({
                right: "0px"
            }, 150)) : (jQuery("#sidepanel_overlay").remove(), "left" == c ? jQuery("#sidepanel").stop().animate({
                left: "-300px"
            }, 300) : jQuery("#sidepanel").stop().animate({
                right: "-300px"
            }, 300), setTimeout(function() {
                jQuery("#sidepanel").hide()
            }, 500)), jQuery("#sidepanel_overlay").unbind(), jQuery("#sidepanel_overlay").bind("click", function() {
                jQuery("a#sidepanel_btn").trigger("click")
            })
        }), jQuery("#sidepanel_close").bind("click", function(e) {
            e.preventDefault(), jQuery("a#sidepanel_btn").trigger("click")
        }), jQuery(document).keyup(function(e) {
            27 == e.keyCode && jQuery("#sidepanel").is(":visible") && jQuery("a#sidepanel_btn").trigger("click")
        }), jQuery("#menu_overlay_open").length > 0) {
        var u = !!jQuery("html").hasClass("ie9");
        1 == u && jQuery("#topMain").hide(), jQuery("#menu_overlay_open").bind("click", function(e) {
            e.preventDefault(), jQuery("body").addClass("show-menu"), 1 == u && jQuery("#topMain").show()
        }), jQuery("#menu_overlay_close").bind("click", function(e) {
            e.preventDefault(), jQuery("body").hasClass("show-menu") && jQuery("body").removeClass("show-menu"), 1 == u && jQuery("#topMain").hide()
        }), jQuery(document).keyup(function(e) {
            27 == e.keyCode && (jQuery("body").hasClass("show-menu") && jQuery("body").removeClass("show-menu"), 1 == u && jQuery("#topMain").hide())
        })
    }
    if (jQuery("#sidebar_vertical_btn").length > 0 && jQuery("body").hasClass("menu-vertical-hide")) {
        if (_paddingStatusL = jQuery("#mainMenu.sidebar-vertical").css("left"), _paddingStatusR = jQuery("#mainMenu.sidebar-vertical").css("right"), parseInt(_paddingStatusL) < 0) var c = "left";
        else if (parseInt(_paddingStatusR) < 0) c = "right";
        else c = "left";
        jQuery("#sidebar_vertical_btn").bind("click", function(e) {
            _paddingStatus = jQuery("#mainMenu.sidebar-vertical").css(c), parseInt(_paddingStatus) < 0 ? "right" == c ? jQuery("#mainMenu.sidebar-vertical").stop().animate({
                right: "0px"
            }, 200) : jQuery("#mainMenu.sidebar-vertical").stop().animate({
                left: "0px"
            }, 200) : "right" == c ? jQuery("#mainMenu.sidebar-vertical").stop().animate({
                right: "-263px"
            }, 200) : jQuery("#mainMenu.sidebar-vertical").stop().animate({
                left: "-263px"
            }, 200)
        }), jQuery(window).scroll(function() {
            _paddingStatus = parseInt(jQuery("#mainMenu.sidebar-vertical").css(c)), _paddingStatus >= 0 && ("right" == c ? jQuery("#mainMenu.sidebar-vertical").stop().animate({
                right: "-263px"
            }, 200) : jQuery("#mainMenu.sidebar-vertical").stop().animate({
                left: "-263px"
            }, 200))
        })
    }
    jQuery("#topBar").length > 0 && jQuery("#topNav ul").addClass("has-topBar"), jQuery(window).scroll(function() {
        window.width < 769 && (jQuery("#header li.quick-cart div.quick-cart-box").is(":visible") && jQuery("#header li.quick-cart div.quick-cart-box").fadeOut(0), jQuery("#header li.search .search-box").is(":visible") && jQuery("#header .search-box").fadeOut(0))
    })
}

function _megaNavHorizontal() {
    if (jQuery("#wrapper nav.main-nav").length > 0) {
        var e = jQuery("#slider").width(),
            t = jQuery("#wrapper nav.main-nav").height();
        jQuery("#wrapper nav.main-nav>div>ul>li>.main-nav-submenu").css({
            "min-height": t + "px"
        }), jQuery("#wrapper nav.main-nav>div>ul>li.main-nav-expanded>.main-nav-submenu").css({
            width: e + "px"
        }), jQuery("#wrapper nav.main-nav>div>ul>li").bind("click", function(e) {
            var t = jQuery(this);
            jQuery("div", t).hasClass("main-nav-open") || jQuery("#wrapper nav.main-nav>div>ul>li>.main-nav-submenu").removeClass("main-nav-open"), jQuery("div", t).toggleClass("main-nav-open")
        })
    }
    var n = jQuery("#header>.container").width() - 278,
        r = jQuery("#header nav.main-nav").height();

    function i() {
        jQuery("#main-nav-overlay").remove(), jQuery("#header nav.main-nav").addClass("min-nav-active"), jQuery("body").append('<div id="main-nav-overlay"></div>'), jQuery("#header button.nav-toggle-close").bind("click", function() {
            jQuery("#header nav.main-nav").removeClass("min-nav-active")
        }), jQuery("#main-nav-overlay, #header").mouseover(function() {
            a()
        })
    }

    function a() {
        jQuery("#main-nav-overlay").remove(), jQuery("#header nav.main-nav").removeClass("min-nav-active")
    }
    jQuery("#header nav.main-nav>div>ul>li>.main-nav-submenu").css({
        "min-height": r + "px"
    }), jQuery("#header nav.main-nav>div>ul>li.main-nav-expanded>.main-nav-submenu").css({
        width: n + "px"
    }), jQuery("#header nav.main-nav>div>ul>li").bind("click", function(e) {
        var t = jQuery(this);
        jQuery("div", t).hasClass("main-nav-open") || jQuery("#header nav.main-nav>div>ul>li>.main-nav-submenu").removeClass("main-nav-open"), jQuery("div", t).toggleClass("main-nav-open")
    }), window.width > 767 ? jQuery("#header button.nav-toggle").mouseover(function(e) {
        e.preventDefault(), i()
    }) : jQuery("#header button.nav-toggle").bind("click", function(e) {
        e.preventDefault(), i()
    }), jQuery("body").on("click", "#header button.nav-toggle, #header nav.main-nav", function(e) {
        e.stopPropagation()
    }), jQuery("#header button.nav-toggle, #header nav.main-nav").mouseover(function(e) {
        e.stopPropagation()
    }), jQuery(document).bind("click", function() {
        a()
    }), jQuery("nav.main-nav>div>ul>li a").bind("click", function(e) {
        "#" == jQuery(this).attr("href") && e.preventDefault()
    })
}

function _sideNav() {
    jQuery("div.side-nav").each(function() {
        var e = jQuery("ul", this);
        jQuery("button", this).bind("click", function() {
            e.slideToggle(300)
        })
    }), jQuery("div.side-nav li>a.dropdown-toggle").bind("click", function(e) {
        "#" == jQuery(this).attr("href") && e.preventDefault(), jQuery(this).next("ul").slideToggle(200), jQuery(this).closest("li").toggleClass("active")
    })
}

function _animate() {
    jQuery("body").hasClass("enable-animation") && new WOW({
        boxClass: "wow",
        animateClass: "animated",
        offset: 15,
        mobile: !1,
        live: !0
    }).init();
    jQuery(".countTo").appear(function() {
        var e = jQuery(this),
            t = e.attr("data-from") || 0,
            n = e.attr("data-speed") || 1300,
            r = e.attr("data-refreshInterval") || 60;
        e.countTo({
            from: parseInt(t),
            to: e.html(),
            speed: parseInt(n),
            refreshInterval: parseInt(r)
        })
    })
}

function _onepageNav() {
    var e = jQuery(".nav-onepage");
    e.length > 0 && loadScript(plugin_path + "jquery.nav.min.js", function() {
        jQuery(e).onePageNav({
            currentClass: "active",
            changeHash: !1,
            scrollSpeed: 750,
            scrollThreshold: .5,
            filter: ":not(.external)",
            easing: "easeInOutExpo"
        }), jQuery("#topMain.nav-onepage li>a").bind("click", function() {
            window.width < 960 && jQuery("button.btn-mobile").trigger("click")
        })
    });
    var t = jQuery("#nav-bullet");
    t.length > 0 && loadScript(plugin_path + "jquery.nav.min.js", function() {
        jQuery(t).onePageNav({
            currentClass: "active",
            changeHash: !1,
            scrollSpeed: 750,
            scrollThreshold: .5,
            filter: ":not(.external)",
            easing: "easeInOutExpo"
        })
    })
}

function _owl_carousel() {
    var _container = jQuery("div.owl-carousel");
    _container.length > 0 && loadScript(plugin_path + "owl-carousel/owl.carousel.min.js", function() {
        _container.each(function() {
            var slider = jQuery(this),
                options = slider.attr("data-plugin-options"),
                $opt = eval("(" + options + ")");
            if ("true" == $opt.progressBar) var afterInit = progressBar;
            else var afterInit = !1;
            var defaults = {
                    items: 5,
                    itemsCustom: !1,
                    itemsDesktop: [1199, 4],
                    itemsDesktopSmall: [980, 3],
                    itemsTablet: [768, 2],
                    itemsTabletSmall: !1,
                    itemsMobile: [479, 1],
                    singleItem: !0,
                    itemsScaleUp: !1,
                    slideSpeed: 200,
                    paginationSpeed: 800,
                    rewindSpeed: 1e3,
                    autoPlay: !1,
                    stopOnHover: !1,
                    navigation: !1,
                    navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    rewindNav: !0,
                    scrollPerPage: !1,
                    pagination: !0,
                    paginationNumbers: !1,
                    responsive: !0,
                    responsiveRefreshRate: 200,
                    responsiveBaseWidth: window,
                    baseClass: "owl-carousel",
                    theme: "owl-theme",
                    lazyLoad: !1,
                    lazyFollow: !0,
                    lazyEffect: "fade",
                    autoHeight: !1,
                    jsonPath: !1,
                    jsonSuccess: !1,
                    dragBeforeAnimFinish: !0,
                    mouseDrag: !0,
                    touchDrag: !0,
                    transitionStyle: !1,
                    addClassActive: !1,
                    beforeUpdate: !1,
                    afterUpdate: !1,
                    beforeInit: !1,
                    afterInit: afterInit,
                    beforeMove: !1,
                    afterMove: 0 != afterInit && moved,
                    afterAction: !1,
                    startDragging: !1,
                    afterLazyLoad: !1
                },
                config = jQuery.extend({}, defaults, options, slider.data("plugin-options"));
            slider.owlCarousel(config).addClass("owl-carousel-init");
            var elem = jQuery(this);

            function progressBar(e) {
                $elem = e, buildProgressBar(), start()
            }

            function buildProgressBar() {
                $progressBar = jQuery("<div>", {
                    id: "progressBar"
                }), $bar = jQuery("<div>", {
                    id: "bar"
                }), $progressBar.append($bar).prependTo($elem)
            }

            function start() {
                percentTime = 0, isPause = !1, tick = setInterval(interval, 10)
            }
            var time = 7;

            function interval() {
                !1 === isPause && (percentTime += 1 / time, $bar.css({
                    width: percentTime + "%"
                }), percentTime >= 100 && $elem.trigger("owl.next"))
            }

            function pauseOnDragging() {
                isPause = !0
            }

            function moved() {
                clearTimeout(tick), start()
            }
        })
    });
    var _container2 = jQuery("div.owl-carousel-2");
    _container2.length > 0 && loadScript(plugin_path + "owl-carousel-2/owl.carousel.min.js", function() {
        _container2.each(function() {
            var e = jQuery(this),
                t = e.attr("data-plugin-options");
            _defaults = {
                loop: !0,
                margin: 10,
                nav: !0,
                center: !1,
                mouseDrag: !0,
                touchDrag: !0,
                pullDrag: !0,
                freeDrag: !1,
                stagePadding: 0,
                merge: !1,
                mergeFit: !0,
                autoWidth: !1,
                startPosition: 0,
                URLhashListener: !1,
                navRewind: !0,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                slideBy: 1,
                dots: !0,
                dotsEach: !1,
                dotData: !1,
                lazyLoad: !1,
                lazyContent: !1,
                autoplay: !1,
                autoplayTimeout: 3e3,
                autoplayHoverPause: !1,
                smartSpeed: 250,
                autoplaySpeed: !1,
                navSpeed: !1,
                dragEndSpeed: !1,
                callbacks: !0,
                responsiveRefreshRate: 200,
                responsiveBaseElement: "#wrapper",
                responsiveClass: !0,
                video: !1,
                videoHeight: !1,
                videoWidth: !1,
                animateOut: !1,
                animateIn: !1,
                fallbackEasing: "swing",
                info: !1,
                nestedItemSelector: !1,
                itemElement: "div",
                navContainer: !1,
                dotsContainer: !1,
                animateOut: "slideOutDown",
                animateIn: "flipInX",
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1e3: {
                        items: 5
                    }
                }
            };
            var n = jQuery.extend({}, _defaults, JSON.parse(t));
            e.owlCarousel(n).addClass("owl-loaded")
        })
    })
}

function _flexslider() {
    var e = jQuery(".flexslider");
    e.length > 0 && loadScript(plugin_path + "slider.flexslider/jquery.flexslider-min.js", function() {
        if (jQuery().flexslider) {
            var t = e.attr("data-controlNav"),
                n = e.attr("data-slideshowSpeed") || 7e3,
                r = e.attr("data-pauseOnHover") || !1;
            r = "true" == r, t = "thumbnails" == t ? "thumbnails" : "true" == t || "false" != t, _directionNav = "thumbnails" != t && 0 != t, jQuery(e).flexslider({
                animation: "slide",
                controlNav: t,
                slideshowSpeed: parseInt(n) || 7e3,
                directionNav: _directionNav,
                pauseOnHover: r,
                start: function(e) {
                    jQuery(".flex-prev").html('<i class="fa fa-angle-left"></i>'), jQuery(".flex-next").html('<i class="fa fa-angle-right"></i>')
                }
            }), e.resize()
        }
    })
}

function _lightbox() {
    var e = jQuery(".lightbox");
    e.length > 0 && loadScript(plugin_path + "magnific-popup/jquery.magnific-popup.min.js", function() {
        if (void 0 === jQuery.magnificPopup) return !1;
        jQuery.extend(!0, jQuery.magnificPopup.defaults, {
            tClose: "Close",
            tLoading: "Loading...",
            gallery: {
                tPrev: "Previous",
                tNext: "Next",
                tCounter: "%curr% / %total%"
            },
            image: {
                tError: "Image not loaded!"
            },
            ajax: {
                tError: "Content not loaded!"
            }
        }), e.each(function() {
            var e = jQuery(this),
                t = e.attr("data-plugin-options"),
                n = {};
            e.data("plugin-options") && (n = jQuery.extend({}, {
                type: "image",
                fixedContentPos: !1,
                fixedBgPos: !1,
                mainClass: "mfp-no-margins mfp-with-zoom",
                closeOnContentClick: !0,
                closeOnBgClick: !0,
                image: {
                    verticalFit: !0
                },
                zoom: {
                    enabled: !1,
                    duration: 300
                },
                gallery: {
                    enabled: !1,
                    navigateByImgClick: !0,
                    preload: [0, 1],
                    arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
                    tPrev: "Previous",
                    tNext: "Next",
                    tCounter: '<span class="mfp-counter">%curr% / %total%</span>'
                }
            }, t, e.data("plugin-options"))), jQuery(this).magnificPopup(n)
        })
    })
}

function _scrollTo(e, t) {
    0 == e ? (jQuery("a.scrollTo").bind("click", function(e) {
        e.preventDefault();
        var t = jQuery(this).attr("href"),
            n = jQuery(this).attr("data-offset") || 0;
        "#" != t && "#top" != t && jQuery("html,body").animate({
            scrollTop: jQuery(t).offset().top - parseInt(n)
        }, 800, "easeInOutExpo"), "#top" == t && jQuery("html,body").animate({
            scrollTop: 0
        }, 800, "easeInOutExpo")
    }), jQuery("#toTop").bind("click", function(e) {
        e.preventDefault(), jQuery("html,body").animate({
            scrollTop: 0
        }, 800, "easeInOutExpo")
    })) : jQuery("html,body").animate({
        scrollTop: jQuery(e).offset().top - t
    }, 800, "easeInOutExpo")
}

function _parallax() {
    jQuery().parallax && jQuery(".parallax-auto, .parallax-1, .parallax-2, .parallax-3, .parallax-4, section.page-header.page-header-parallax").each(function() {
        jQuery(this);
        jQuery(this).parallax("50%", "0.2")
    });
    var e = jQuery("#slider");
    if (e.length > 0 && e.hasClass("parallax-slider")) {
        if (window.width < 768 && e.hasClass("pallax-slider-mobile-deisable")) return !1;
        e.offset().top;
        jQuery(window).scroll(function() {
            var t = jQuery(document).scrollTop(),
                n = e.attr("data-parallax-offset") || 0;
            if (t < 768) {
                var r = jQuery("#slider").height();
                jQuery("#slider>div").css("top", .5 * t - Number(n)), e.hasClass("parallax-slider-noopacity") || jQuery("#slider>div").css("opacity", 1 - t / r * 1)
            }
        })
    }
}

function _video() {
    if (jQuery("section.section-video").length > 0) {
        var e = jQuery("section.section-video .section-container-video>video");
        _w = jQuery(window).width(), e.width(_w)
    }
}

function _youtubeBG() {
    jQuery("#YTPlayer").length > 0 && loadScript(plugin_path + "jquery.mb.YTPlayer.min.js", function() {
        if (jQuery().mb_YTPlayer) {
            /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent), jQuery(".player").mb_YTPlayer(), jQuery("#video-volume").bind("click", function(e) {
                e.preventDefault(), jQuery("#YTPlayer").toggleVolume()
            }), jQuery("#video-volume").bind("click", function() {
                jQuery("i.fa", this).hasClass("fa-volume-down") ? (jQuery("i.fa", this).removeClass("fa-volume-down"), jQuery("i.fa", this).removeClass("fa-volume-up"), jQuery("i.fa", this).addClass("fa-volume-up")) : (jQuery("i.fa", this).removeClass("fa-volume-up"), jQuery("i.fa", this).removeClass("fa-volume-v"), jQuery("i.fa", this).addClass("fa-volume-down"))
            })
        }
    })
}

function _mixitup() {
    var e = jQuery(".mix-grid");
    e.length > 0 && loadScript(plugin_path + "mixitup/jquery.mixitup.min.js", function() {
        jQuery().mixitup && (e.mixitup(), jQuery("ul.mix-filter a").bind("click", function(e) {
            e.preventDefault()
        }))
    })
}

function _toggle() {
    jQuery("div.toggle.active > p").addClass("preview-active"), jQuery("div.toggle.active > div.toggle-content").slideDown(400), jQuery("div.toggle > label").click(function(e) {
        var t = jQuery(this).parent(),
            n = jQuery(this).parents("div.toggle"),
            r = !1;
        if (n.hasClass("toggle-accordion") && void 0 !== e.originalEvent && n.find("div.toggle.active > label").trigger("click"), t.toggleClass("active"), t.find("> p").get(0)) {
            var i = (r = t.find("> p")).css("height"),
                a = r.css("height");
            r.css("height", "auto"), r.css("height", i)
        }
        var o = t.find("> div.toggle-content");
        t.hasClass("active") ? (jQuery(r).animate({
            height: a
        }, 350, function() {
            jQuery(this).addClass("preview-active")
        }), o.slideDown(350)) : (jQuery(r).animate({
            height: 25
        }, 350, function() {
            jQuery(this).removeClass("preview-active")
        }), o.slideUp(350))
    })
}

function _placeholder() {
    -1 != navigator.appVersion.indexOf("MSIE") && jQuery("[placeholder]").focus(function() {
        var e = jQuery(this);
        e.val() == e.attr("placeholder") && (e.val(""), e.removeClass("placeholder"))
    }).blur(function() {
        var e = jQuery(this);
        "" != e.val() && e.val() != e.attr("placeholder") || (e.addClass("placeholder"), e.val(e.attr("placeholder")))
    }).blur()
}

function _wrotate() {
    jQuery(".word-rotator").each(function() {
        var e = jQuery(this),
            t = e.find(".items"),
            n = t.find("> span"),
            r = n.eq(0).clone(),
            i = jQuery(this).height(),
            a = 1,
            o = 0,
            s = jQuery(this).attr("data-delay") || 2e3;
        t.append(r), e.height(i).addClass("active"), setInterval(function() {
            o = a * i, t.animate({
                top: -o + "px"
            }, 300, "easeOutQuad", function() {
                ++a > n.length && (t.css("top", 0), a = 1)
            })
        }, s)
    });
    var e = jQuery("span.rotate");
    e.length > 0 && loadScript(plugin_path + "text-rotator/jquery.simple-text-rotator.min.js", function() {
        e.each(function() {
            var e = jQuery(this),
                t = e.attr("data-animation") || "fade",
                n = e.attr("data-speed") || 2e3;
            e.textrotator({
                animation: t,
                speed: parseInt(n)
            })
        })
    })
}

// function _lazyload() {
//     var e = jQuery("img.lazy");
//     e.length > 0 && loadScript(plugin_path + "lazyload/jquery.lazyload.min.js", function() {
//         jQuery().lazyload && e.each(function() {
//             var e = jQuery(this),
//                 t = e.attr("data-effect") || "fadeIn";
//             e.lazyload({
//                 effect: t
//             })
//         })
//     })
// }

function _misc() {
    if (jQuery("#portfolio").length > 0 && jQuery("#portfolio .item-box .owl-carousel").each(function() {
            jQuery(this).parent().parent().find(".item-box-desc").css({
                "padding-top": "29px"
            })
        }), jQuery().masonry && jQuery(".masonry").masonry(), jQuery("#portfolio.portfolio-isotope").length > 0 && loadScript(plugin_path + "isotope/isotope.pkgd.min.js", function() {
            if (jQuery().isotope) {
                var e = jQuery("#portfolio");

                function t() {
                    _dw = jQuery(document).width(), e.hasClass("fullwidth") ? (_w = e.width(), _wItem = _w / _cols, _dw < 760 && (_wItem = _w / 2), _dw < 480 && (_wItem = jQuery("#portfolio").width()), jQuery("#portfolio>.portfolio-item").css({
                        width: _wItem
                    })) : (_mR = parseInt(jQuery("#portfolio>.portfolio-item").css("margin-right")), _w = jQuery("#portfolio").closest(".container").width(), _wItem = _w / _cols - _mR, _dw < 760 && (_wItem = _w / 2 - _mR), _dw < 480 && (_wItem = _w), jQuery("#portfolio.portfolio-isotope").css({
                        width: _w
                    }), jQuery("#portfolio>.portfolio-item").css({
                        width: _wItem
                    })), jQuery(".flexslider").length > 0 && jQuery(".flexslider").resize()
                }
                e.hasClass("portfolio-isotope-2") ? _cols = 2 : e.hasClass("portfolio-isotope-3") ? _cols = 3 : e.hasClass("portfolio-isotope-4") ? _cols = 4 : e.hasClass("portfolio-isotope-5") ? _cols = 5 : e.hasClass("portfolio-isotope-6") ? _cols = 6 : _cols = 4, t(), jQuery(window).on("load", function() {
                    setTimeout(function() {
                        e.isotope({
                            masonry: {},
                            filter: "*",
                            animationOptions: {
                                duration: 750,
                                easing: "linear",
                                queue: !1
                            }
                        }), jQuery("#portfolio_filter>li>a").bind("click", function(t) {
                            t.preventDefault(), jQuery("#portfolio_filter>li.active").removeClass("active"), jQuery(this).parent("li").addClass("active");
                            var n = jQuery(this).attr("data-filter");
                            e.isotope({
                                filter: n,
                                animationOptions: {
                                    duration: 750,
                                    easing: "linear",
                                    queue: !1
                                }
                            })
                        })
                    }, 50);
                    setTimeout(function() {
                        e.isotope("layout")
                    }, 300)
                }), jQuery(window).resize(function() {
                    window.afterResizeApp2 && clearTimeout(window.afterResizeApp2), window.afterResizeApp2 = setTimeout(function() {
                        t(), setTimeout(function() {
                            e.isotope("layout")
                        }, 300)
                    }, 300)
                })
            }
        }), jQuery("#blog.blog-isotope").length > 0 && loadScript(plugin_path + "isotope/isotope.pkgd.min.js", function() {
            if (jQuery().isotope) {
                var e = jQuery("#blog");

                function t() {
                    _dw = jQuery(document).width(), e.hasClass("fullwidth") ? (_w = jQuery(document).width(), _wItem = _w / _cols, _dw < 760 && (_wItem = _w / 2), _dw < 480 && (_wItem = jQuery("#blog").width()), jQuery("#blog>.blog-post-item").css({
                        width: _wItem
                    })) : (_mR = parseInt(jQuery("#blog>.blog-post-item").css("margin-right")), _w = jQuery("#blog").closest(".container").width(), _wItem = _w / _cols - _mR, _dw < 760 && (_wItem = _w / 2 - _mR), _dw < 480 && (_wItem = _w), jQuery("#blog.blog-isotope").css({
                        width: _w
                    }), jQuery("#blog>.blog-post-item").css({
                        width: _wItem
                    })), jQuery(".flexslider").length > 0 && jQuery(".flexslider").resize()
                }
                e.hasClass("blog-isotope-2") ? _cols = 2 : e.hasClass("blog-isotope-3") ? _cols = 3 : (e.hasClass("blog-isotope-4"), _cols = 4), t(), jQuery(window).on("load", function() {
                    setTimeout(function() {
                        e.isotope({
                            masonry: {},
                            filter: "*",
                            animationOptions: {
                                duration: 750,
                                easing: "linear",
                                queue: !1
                            }
                        }), jQuery("#blog_filter>li>a").bind("click", function(t) {
                            t.preventDefault(), jQuery("#blog_filter>li.active").removeClass("active"), jQuery(this).parent("li").addClass("active");
                            var n = jQuery(this).attr("data-filter");
                            e.isotope({
                                filter: n,
                                animationOptions: {
                                    duration: 750,
                                    easing: "linear",
                                    queue: !1
                                }
                            })
                        })
                    }, 50);
                    setTimeout(function() {
                        e.isotope("layout")
                    }, 300)
                }), jQuery(window).resize(function() {
                    window.afterResizeApp2 && clearTimeout(window.afterResizeApp2), window.afterResizeApp2 = setTimeout(function() {
                        t(), setTimeout(function() {
                            e.isotope("layout")
                        }, 300)
                    }, 300)
                })
            }
        }), jQuery(".box-flip").length > 0 && (jQuery(".box-flip").each(function() {
            _height1 = jQuery(".box1", this).outerHeight(), _height2 = jQuery(".box2", this).outerHeight(), _height1 >= _height2 ? _height = _height1 : _height = _height2, jQuery(this).css({
                "min-height": _height + "px"
            }), jQuery(".box1", this).css({
                "min-height": _height + "px"
            }), jQuery(".box2", this).css({
                "min-height": _height + "px"
            })
        }), jQuery(".box-flip").hover(function() {
            jQuery(this).addClass("flip")
        }, function() {
            jQuery(this).removeClass("flip")
        })), jQuery("div.sticky-side").length > 0) {
        var e = jQuery("div.sticky-side");
        _h = e.height() / 2, e.css({
            "margin-top": "-" + _h + "px"
        })
    }
    jQuery(".incr").bind("click", function(e) {
        e.preventDefault();
        var t = jQuery(this).attr("data-for"),
            n = parseInt(jQuery(this).attr("data-max")),
            r = parseInt(jQuery("#" + t).val());
        r < n && jQuery("#" + t).val(r + 1)
    }), jQuery(".decr").bind("click", function(e) {
        e.preventDefault();
        var t = jQuery(this).attr("data-for"),
            n = parseInt(jQuery(this).attr("data-min")),
            r = parseInt(jQuery("#" + t).val());
        r > n && jQuery("#" + t).val(r - 1)
    }), jQuery("a.toggle-default").bind("click", function(e) {
        e.preventDefault();
        var t = jQuery(this).attr("href");
        jQuery(t).is(":hidden") ? (jQuery(t).slideToggle(200), jQuery("i.fa", this).removeClass("fa-plus-square").addClass("fa-minus-square")) : (jQuery(t).slideToggle(200), jQuery("i.fa", this).removeClass("fa-minus-square").addClass("fa-plus-square"))
    }), jQuery("input[type=file]").length > 0 && loadScript(plugin_path + "custom.fle_upload.js"), jQuery("textarea.word-count").on("keyup", function() {
        var e = jQuery(this),
            t = this.value.match(/\S+/g).length,
            n = e.attr("data-maxlength") || 200;
        if (t > parseInt(n)) {
            var r = e.val().split(/\s+/, 200).join(" ");
            e.val(r + " ")
        } else {
            var i = e.attr("data-info");
            if ("" == i || void 0 == i) {
                var a = e.next("div");
                jQuery("span", a).text(t + "/" + n)
            } else jQuery("#" + i).text(t + "/" + n)
        }
    })
}

function _stickyFooter() {
    if (jQuery("#footer").hasClass("sticky")) {
        var e = 0,
            t = 0,
            n = jQuery("#footer.sticky");

        function r() {
            e = n.height(), t = jQuery(window).scrollTop() + jQuery(window).height() - e + "px", jQuery(document.body).height() + e > jQuery(window).height() ? n.css({
                position: "absolute"
            }).stop().animate({
                top: t
            }, 0) : n.css({
                position: "static"
            })
        }
        r(), jQuery(window).scroll(r).resize(r)
    }
}

function _countDown() {
    var e = jQuery(".countdown"),
        t = jQuery(".countdown-download");
    (e.length > 0 || t.length > 0) && loadScript(plugin_path + "countdown/jquery.countdown.pack.min.js", function() {
        e.each(function() {
            var e = jQuery(this),
                t = e.attr("data-from"),
                n = e.attr("data-labels");
            if (n && (n = n.split(",")), t) {
                var r = new Date(t);
                jQuery(this).countdown({
                    until: new Date(r),
                    labels: n || ["Years", "Months", "Weeks", "Days", "Hours", "Minutes", "Seconds"]
                })
            }
        }), t.bind("click", function(e) {
            e.preventDefault();
            var t = jQuery(this),
                n = t.attr("data-for"),
                r = jQuery("#" + n + " span.download-wait>.countdown"),
                i = parseInt(t.attr("data-seconds")),
                a = t.attr("href");
            return t.fadeOut(250, function() {
                jQuery("#" + n).fadeIn(250, function() {
                    var e = new Date;
                    e.setSeconds(e.getSeconds() + i), r.countdown({
                        until: e,
                        format: "S",
                        expiryUrl: a,
                        onExpiry: function() {
                            jQuery("#" + n + " span.download-message").removeClass("hide"), jQuery("#" + n + " span.download-wait").addClass("hide")
                        }
                    })
                })
            }), !1
        })
    })
}

function _masonryGallery() {
    jQuery(".masonry-gallery").length > 0 && jQuery(".masonry-gallery").each(function() {
        var e = jQuery(this),
            t = 4;
        e.hasClass("columns-2") ? t = 2 : e.hasClass("columns-3") ? t = 3 : e.hasClass("columns-4") ? t = 4 : e.hasClass("columns-5") ? t = 5 : e.hasClass("columns-6") && (t = 6);
        var n = e.find("a:eq(0)").outerWidth(),
            r = e.attr("data-img-big"),
            i = e.width(),
            a = i / t;
        (a = Math.floor(a)) * t >= i && e.css({
            "margin-right": "-1px"
        }), t < 6 && e.children("a").css({
            width: a + "px"
        }), parseInt(r) > 0 && (r = Number(r) - 1, e.find("a:eq(" + r + ")").css({
            width: 2 * n + "px"
        }), loadScript(plugin_path + "isotope/isotope.pkgd.min.js", function() {
            setTimeout(function() {
                e.isotope({
                    masonry: {
                        columnWidth: n
                    }
                }), e.isotope("layout")
            }, 1e3)
        }))
    })
}

function _toastr(e, t, n, r) {
    var i = jQuery(".toastr-notify");
    i.length > 0 && 0 != e && loadScript(plugin_path + "toastr/toastr.js", function() {
        i.bind("click", function(e) {
            e.preventDefault();
            var t = jQuery(this).attr("data-message"),
                n = jQuery(this).attr("data-notifyType") || "default",
                r = jQuery(this).attr("data-position") || "top-right",
                i = "true" == jQuery(this).attr("data-progressBar"),
                a = "true" == jQuery(this).attr("data-closeButton"),
                o = "true" == jQuery(this).attr("data-debug"),
                s = "true" == jQuery(this).attr("data-newestOnTop"),
                l = "true" == jQuery(this).attr("data-preventDuplicates"),
                u = jQuery(this).attr("data-showDuration") || "300",
                c = jQuery(this).attr("data-hideDuration") || "1000",
                d = jQuery(this).attr("data-timeOut") || "5000",
                p = jQuery(this).attr("data-extendedTimeOut") || "1000",
                f = jQuery(this).attr("data-showEasing") || "swing",
                h = jQuery(this).attr("data-hideEasing") || "linear",
                m = jQuery(this).attr("data-showMethod") || "fadeIn",
                y = jQuery(this).attr("data-hideMethod") || "fadeOut";
            toastr.options = {
                closeButton: a,
                debug: o,
                newestOnTop: s,
                progressBar: i,
                positionClass: "toast-" + r,
                preventDuplicates: l,
                onclick: null,
                showDuration: u,
                hideDuration: c,
                timeOut: d,
                extendedTimeOut: p,
                showEasing: f,
                hideEasing: h,
                showMethod: m,
                hideMethod: y
            }, toastr[n](t)
        }), 0 != e && (onclick = 0 != r ? function() {
            window.location = r
        } : null, toastr.options = {
            closeButton: !0,
            debug: !1,
            newestOnTop: !1,
            progressBar: !0,
            positionClass: "toast-" + t,
            preventDuplicates: !1,
            onclick: onclick,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        }, setTimeout(function() {
            toastr[n](e)
        }, 1500))
    })
}

function _charts() {
    jQuery(".piechart").length > 0 && loadScript(plugin_path + "chart.easypiechart/dist/jquery.easypiechart.min.js", function() {
        jQuery(".piechart").each(function() {
            var e = jQuery(this),
                t = e.attr("data-size") || 150,
                n = e.attr("data-animate") || "3000";
            e.easyPieChart({
                size: t,
                animate: n,
                scaleColor: !1,
                trackColor: e.attr("data-trackcolor") || "rgba(0,0,0,0.04)",
                lineWidth: e.attr("data-width") || "2",
                lineCap: "square",
                barColor: e.attr("data-color") || "#0093BF"
            }), jQuery("*", this).attr("style", "line-height:" + t + "px !important; height:" + t + "px !important; width:" + t + "px !important")
        })
    })
}

function _select2() {
    var e = jQuery("select.select2");
    e.length > 0 && loadScript(plugin_path + "select2/js/select2.full.min.js", function() {
        e.each(function() {
            var e = jQuery(this);
            e.hasClass("select2-custom") || e.select2()
        })
    })
}

function _form() {
    jQuery("form.validate-plugin").length > 0 && loadScript(plugin_path + "form.validate/jquery.form.min.js", function() {
        loadScript(plugin_path + "form.validate/jquery.validation.min.js")
    }), jQuery("form.validate").length > 0 && loadScript(plugin_path + "form.validate/jquery.form.min.js", function() {
        loadScript(plugin_path + "form.validate/jquery.validation.min.js", function() {
            jQuery().validate && jQuery("form.validate").each(function() {
                var e = jQuery(this),
                    t = e.attr("data-success") || "Successfully! Thank you!",
                    n = (e.attr("data-captcha"), e.attr("data-toastr-position") || "top-right"),
                    r = e.attr("data-toastr-type") || "success";
                _Turl = e.attr("data-toastr-url") || !1, e.append('<input type="hidden" name="is_ajax" value="true" />'), e.validate({
                    submitHandler: function(e) {
                        jQuery(e).find(".input-group-addon").find(".fa-envelope").removeClass("fa-envelope").addClass("fa-refresh fa-spin"), jQuery(e).ajaxSubmit({
                            target: jQuery(e).find(".validate-result").length > 0 ? jQuery(e).find(".validate-result") : "",
                            error: function(e) {
                                _toastr("Sent Failed!", n, "error", !1)
                            },
                            success: function(i) {
                                "_failed_" == (i = i.trim()) ? _toastr("SMTP ERROR! Please, check your config file!", n, "error", !1): "_captcha_" == i ? _toastr("Invalid Captcha!", n, "error", !1) : (jQuery(e).find(".input-group-addon").find(".fa-refresh").removeClass("fa-refresh fa-spin").addClass("fa-envelope"), jQuery(e).find("input.form-control").val(""), _toastr(t, n, r, _Turl))
                            }
                        })
                    }
                })
            })
        })
    });
    var e = jQuery("input.masked");
    e.length > 0 && loadScript(plugin_path + "form.masked/jquery.maskedinput.js", function() {
        e.each(function() {
            var e = jQuery(this);
            _format = e.attr("data-format") || "(999) 999-999999", _placeholder = e.attr("data-placeholder") || "X", jQuery.mask.definitions.f = "[A-Fa-f0-9]", e.mask(_format, {
                placeholder: _placeholder
            })
        })
    })
}

function _pickers() {
    var e = jQuery(".datepicker");
    e.length > 0 && loadScript(plugin_path + "bootstrap.datepicker/js/bootstrap-datepicker.min.js", function() {
        jQuery().datepicker && e.each(function() {
            var e = jQuery(this),
                t = e.attr("data-lang") || "en";
            "en" != t && "" != t && loadScript(plugin_path + "bootstrap.datepicker/locales/bootstrap-datepicker." + t + ".min.js"), jQuery(this).datepicker({
                format: e.attr("data-format") || "yyyy-mm-dd",
                language: t,
                rtl: "true" == e.attr("data-RTL"),
                changeMonth: "false" != e.attr("data-changeMonth"),
                todayBtn: "false" != e.attr("data-todayBtn") && "linked",
                calendarWeeks: "false" != e.attr("data-calendarWeeks"),
                autoclose: "false" != e.attr("data-autoclose"),
                todayHighlight: "false" != e.attr("data-todayHighlight"),
                onRender: function(e) {}
            }).on("changeDate", function(e) {}).data("datepicker")
        })
    });
    var t = jQuery(".rangepicker");
    t.length > 0 && loadScript(plugin_path + "bootstrap.daterangepicker/moment.min.js", function() {
        loadScript(plugin_path + "bootstrap.daterangepicker/daterangepicker.js", function() {
            jQuery().datepicker && t.each(function() {
                var e = jQuery(this),
                    t = e.attr("data-format").toUpperCase() || "YYYY-MM-DD";
                e.daterangepicker({
                    format: t,
                    startDate: e.attr("data-from"),
                    endDate: e.attr("data-to"),
                    ranges: {
                        Today: [moment(), moment()],
                        Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                        "Last 7 Days": [moment().subtract(6, "days"), moment()],
                        "Last 30 Days": [moment().subtract(29, "days"), moment()],
                        "This Month": [moment().startOf("month"), moment().endOf("month")],
                        "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
                    }
                }, function(e, t, n) {})
            })
        })
    });
    var n = jQuery(".timepicker");
    n.length > 0 && loadScript(plugin_path + "timepicki/timepicki.min.js", function() {
        jQuery().timepicki && n.timepicki()
    });
    var r = jQuery(".colorpicker");
    r.length > 0 && loadScript(plugin_path + "spectrum/spectrum.min.js", function() {
        jQuery().spectrum && r.each(function() {
            var e = jQuery(this),
                t = e.attr("data-format") || "hex",
                n = e.attr("data-palletteOnly") || "false",
                r = e.attr("data-fullpicker") || "false",
                i = e.attr("data-allowEmpty") || !1;
            if (_flat = e.attr("data-flat") || !1, "true" == n || "true" == r) var a = [
                ["#000", "#444", "#666", "#999", "#ccc", "#eee", "#f3f3f3", "#fff"],
                ["#f00", "#f90", "#ff0", "#0f0", "#0ff", "#00f", "#90f", "#f0f"],
                ["#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc"],
                ["#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd"],
                ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0"],
                ["#c00", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79"],
                ["#900", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47"],
                ["#600", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130"]
            ];
            else a = null;
            e.attr("data-defaultColor") ? _color = e.attr("data-defaultColor") : _color = "#ff0000", e.attr("data-defaultColor") || "true" != i || (_color = null), e.spectrum({
                showPaletteOnly: "true" == n,
                togglePaletteOnly: "true" == n,
                flat: "true" == _flat,
                showInitial: "true" == i,
                showInput: "true" == i,
                allowEmpty: "true" == i,
                chooseText: e.attr("data-chooseText") || "Coose",
                cancelText: e.attr("data-cancelText") || "Cancel",
                color: _color,
                showInput: !0,
                showPalette: !0,
                preferredFormat: t,
                showAlpha: "rgb" == t,
                palette: a
            })
        })
    })
}

function _editors() {
    var e = jQuery("textarea.summernote");
    e.length > 0 && loadScript(plugin_path + "editor.summernote/summernote.min.js", function() {
        jQuery().summernote && e.each(function() {
            var e = jQuery(this).attr("data-lang") || "en-US";
            "en-US" != e && (alert(e), loadScript(plugin_path + "editor.summernote/lang/summernote-" + e + ".js")), jQuery(this).summernote({
                height: jQuery(this).attr("data-height") || 200,
                lang: jQuery(this).attr("data-lang") || "en-US",
                toolbar: [
                    ["style", ["style"]],
                    ["fontsize", ["fontsize"]],
                    ["style", ["bold", "italic", "underline", "strikethrough", "clear"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["table", ["table"]],
                    ["media", ["link", "picture", "video"]],
                    ["misc", ["codeview", "fullscreen", "help"]]
                ]
            })
        })
    });
    var t = jQuery("textarea.markdown");
    t.length > 0 && loadScript(plugin_path + "editor.markdown/js/bootstrap-markdown.min.js", function() {
        jQuery().markdown && t.each(function() {
            var e = jQuery(this),
                t = e.attr("data-lang") || "en";
            "en" != t && loadScript(plugin_path + "editor.markdown/locale/bootstrap-markdown." + t + ".js"), jQuery(this).markdown({
                autofocus: "true" == e.attr("data-autofocus"),
                savable: "true" == e.attr("data-savable"),
                height: e.attr("data-height") || "inherit",
                language: "en" == t ? null : t
            })
        })
    })
}

function _pajinate() {
    var e = jQuery("div.pajinate");
    e.length > 0 && loadScript(plugin_path + "pajinate/jquery.pajinate.bootstrap.min.js", function() {
        jQuery().pajinate && e.each(function() {
            var e = jQuery(this),
                t = e.attr("data-pajinante-items-per-page") || 8;
            _numLinks = e.attr("data-pajinante-num-links") || 5, e.pajinate({
                items_per_page: parseInt(t),
                num_page_links_to_display: parseInt(_numLinks),
                item_container_id: e.attr("data-pajinate-container") || ".pajinate-container",
                nav_panel_id: ".pajinate-nav ul",
                show_first_last: !1,
                wrap_around: !0,
                abort_on_small_lists: !0,
                start_page: 0,
                nav_label_prev: "&laquo;",
                nav_label_next: "&raquo;"
            })
        })
    })
}

function _infiniteScroll() {
    var e = jQuery(".infinite-scroll");
    e.length > 0 && loadScript(plugin_path + "infinite-scroll/jquery.infinitescroll.min.js", function() {
        _navSelector = e.attr("data-nextSelector") || "#inf-load-nex", _itemSelector = e.attr("data-itemSelector") || ".item", _nextSelector = _navSelector + " a", e.infinitescroll({
            loading: {
                finishedMsg: '<i class="fa fa-check"></i>',
                msgText: '<i class="fa fa-refresh fa-spin"></i>',
                img: "data:image/gif;base64,R0lGODlhGAAYAPUAABQSFCwuLBwaHAwKDKyurGxqbNze3CwqLCQmJLS2tOzu7OTi5JyenBweHBQWFJyanPz+/HRydLSytFxeXPz6/ExOTKSmpFRSVHR2dAwODAQCBOzq7PTy9ISChPT29IyKjIyOjISGhOTm5GRiZJSWlJSSlFRWVMTCxNza3ExKTNTS1KyqrHx6fGRmZKSipMzOzMTGxDQyNDw+PAQGBDQ2NERCRFxaXMzKzGxubDw6PCQiJLy+vERGRLy6vHx+fNTW1CH/C05FVFNDQVBFMi4wAwEAAAAh+QQJBQAAACwAAAAAGAAYAEAGqECAcAhoRAiojQJFiAiI0Kh0qOsZOhqhDMK9ZadgAI0WBmhAXAhFVm5HbZR0aTYdsFpSkwqjo5sRLAtpIjxuUzZpECmGjI1QA4JcKH5lGVICDHFpGyoqGx4uDWENFh4iKjcbiR4MT1ItLJSPJWkUNo9uAyhpBpaOGjdpOY7ExcYaIQs9OsUpibfENZoQIF9gY1EpqlwiLAh+M4AqJmUCOBJJGz8EOKJRQQAh+QQJBQABACwAAAAAGAAYAAAGp8CAcBhoRBILDgdFKAiI0KHAB5rUZBUWDALxMJ5R4SCmiWpoJ67iEm4TZx0upOCuB1jyir2tuXE3DnthE3IlglENchwDh0QDG3ITjUQ7ciGTQxFybJgBGkcYGhoYPaGdARdyOKchcjunhH8znQAccmCYJZGnDpAQN2WdFXI+pwEFch2znRe+MDTBbzGMbQIPHlwwLBcyNSMgLIF2Ai0WKAocBhI4uERBACH5BAkFACwALAAAAAAYABgAAAaoQJZwyNIEJiAJCpWICIjQKFGD6Gw8D4d0C3UQIJsKd1wsQSgFMldjgUAu6q1jA27EpRg34x5FUCAeT3xDAx5uBQAMJyZ8GRxuFiRuFAF3B24QKguYE3cpmAubbil3I5gGKpgIdwF/EA9tgAN8JicMGQVuHLODQgKGEKu9QgxuGMNCDQpgAMgsF38rGs4Ffx/TyBUiECtayAIPHgohAdi9DRFKTCAj5VJBACH5BAkFAAAALAAAAAAYABgAAAa0QIBwSAQMaphHoVFsOoezlsEleFqJDsnmcu1qLJBW9zpQUSpjqwyycQgPBAIiLYRBGIDMAgJRaegREB4CE3wQFAN0NHwRYHwwdAANfBIqhlx0AXwGCnx+kQV8Cp0QBZEaL3wbBnwBkReGKgl8TGkadnwugRA0dBkUhhMNHhARdBqWEAsZAAwQkHQIEgQHQgIbFDKRTRUUL4nbRC0QFjPhRBcbEm7nQg0uBi3g7Q0RDxEyzFdBACH5BAkFAAgALAAAAAAYABgAAAaxQIRwSCwKHMWkssgLCZbQYmNnUgpMh6gQoIoUZQqIh6ZFHDjV7QLCLpURIcUTAWKzvWUBhYFwcOwnA28IOx4CBXY3AIMIJRAFEmwoSIwYEAQGbDWMQiwQBh4QKpxCjhyhbqQqEByZLKQ1bAaRr4wOKGwSiKlvADd2BQIeJ4MDJ3YcSA8UlFqWdiBCAgohbyR2C4tCJhwBZTQUEAo5RQUqzVAHJuhDJjsNpFIhKfFG7FFBACH5BAkFAAAALAAAAQAYABYAAAa3QIBQmEnlNMOkcgmoGSCQEJNIY048UIhhKqS1lClKFtLjClmmoWAzvunMgJmqIWRkDTYkHIBxARpiECUDe0MIHg0RUCV6hQAaGxESEAszjkkvEk8sl0kqKgoQCJ1CGiIKChuNlwcQCigvpGcQKBKxpAMLEBI4IpaXGiVQODoeb44DwhAUAgAuGIUaEyhZDEINKr9cCDdjG81CJpxmO2MUPEojVVy6UBQ2TDGEUyFQCzKyjzk880NBACH5BAkFAAEALAAAAAAYABgAAAazwIBwGABMOhcNcckUOkoKiJTVrAYqG6k2YWXiKFptpEs0gbWbXmFmHQwbWcjNJlCSYwIhQ9qxk4UaVAIeEB1/TCANBRAnfodCExEEEDSPSzUJKCeWSzQGHBicRBUcHimiQywKC5WoGjAoCTKoATQUBBETqDMnEAUNH6ghEBQOAT6OZBo+UgxCAjF/Mw0TN1IKeUJuVTMFPSJhEBePGOHEBZYJ4SI8nCxaHB/GnBoXISYATUEAIfkECQUAKgAsAAAAABgAGAAABqpAlXCoErQsr4WBlCE6nQ2XB0Ktup5Yk6LKhZywzgKlyplSKRfwsELdYA6DDCI1OaiFgg2EALirHxAfGn5gDR4rg4RPGhEbDopYAQkdkFgjBnaVTiEoiZpDCQmfRBooIKNDBwYjqEIdCQGtDgoFnpoaEh4NqBogEA+oDisQjn4xExUIAAMILCIQFBV+JmNUHh7VEAWEMF1VCmmELt4UDAKQGSUoCy8WI+dPQQAh+QQJBQAJACwAAAAAGAAYAAAGrMCEcJhoRCQoxUblmmSI0KGA4YFYr9bFIUqsbLBgK4ErLFAosEiuESi8sBKyifKqRTWXk+el4zYULgNkQhkaZBYShoOLOigAi5ARE5CQDzOUixGYi3abXANPnlE5olyapUQzD6hELaesDgYNrAkzEi5kMwOKnxYbs1EIKh4wF5dQNSoQF2QSWC8FATo0GDcUHi2DBGFgGymLBwvcEBQPDpQZNi4qGxsoEjgCXEEAIfkEBQUACAAsAAAAABgAGAAABqZAhHCIEBQIBg/HICk4iNCh4OGBWK9WTgkQHZoUlFMJwyKpsJCFrBvhhJ7QGgqrgA9tr0BX6HhhTUQNO3Z7ADBWFAdEIQJ7UAMRJTREAjyOl0MNmJucnZ6foKGio6SdmqQphDljA5wCIUQBVRAwXJcAO6dCJlg3tl0BPxdQAgpYKDVRAh8cOF05C2g/JSw+JTAeCsOFJRxoVx4PjZgORygcHCgETl1BADs=",
                speed: "normal"
            },
            nextSelector: _nextSelector,
            navSelector: _navSelector,
            itemSelector: _itemSelector,
            behavior: "",
            state: {
                isDone: !1
            }
        }, function(t) {
            Init(!0), jQuery().isotope && (e.isotope("appended", jQuery(t)), setTimeout(function() {
                e.isotope("layout")
            }, 2e3))
        })
    })
}

function _zoom() {
    var e = jQuery("figure.zoom");
    e.length > 0 && loadScript(plugin_path + "image.zoom/jquery.zoom.min.js", function() {
        jQuery().zoom && e.each(function() {
            var e = jQuery(this),
                t = e.attr("data-mode"),
                n = e.attr("id");
            "grab" == t ? e.zoom({
                on: "grab"
            }) : "click" == t ? e.zoom({
                on: "click"
            }) : "toggle" == t ? e.zoom({
                on: "toggle"
            }) : e.zoom(), isMobile.any() && e.zoom({
                on: "toggle"
            }), n && jQuery(".zoom-more[data-for=" + n + "] a").bind("click", function(e) {
                e.preventDefault();
                var t = jQuery(this).attr("href");
                "#" != t && (jQuery(".zoom-more[data-for=" + n + "] a").removeClass("active"), jQuery(this).addClass("active"), jQuery("figure#" + n + ">.lightbox").attr("href", t), jQuery("figure#" + n + ">img").fadeOut(0, function() {
                    jQuery("figure#" + n + ">img").attr("src", t)
                }).fadeIn(500))
            })
        })
    })
}

function _autosuggest() {
    _container = jQuery("div.autosuggest"), _container.length > 0 && loadScript(plugin_path + "typeahead.bundle.js", function() {
        jQuery().typeahead && _container.each(function() {
            var e = jQuery(this),
                t = e.attr("data-minLength") || 1,
                n = e.attr("data-queryURL"),
                r = e.attr("data-limit") || 10;
            if ("false" == e.attr("data-autoload")) return !1;
            var i = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace("value"),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                limit: r,
                remote: {
                    url: n + "%QUERY"
                }
            });
            jQuery(".typeahead", e).typeahead({
                limit: r,
                hint: "false" != e.attr("data-hint"),
                highlight: "false" != e.attr("data-highlight"),
                minLength: parseInt(t),
                cache: !1
            }, {
                name: "_typeahead",
                source: i
            })
        })
    })
}

function _stepper() {
    var e = jQuery("input.stepper");
    e.length > 0 && loadScript(plugin_path + "form.stepper/jquery.stepper.min.js", function() {
        jQuery().stepper && jQuery(e).each(function() {
            var e = jQuery(this),
                t = e.attr("min") || null,
                n = e.attr("max") || null;
            e.stepper({
                limit: [t, n],
                floatPrecission: e.attr("data-floatPrecission") || 2,
                wheel_step: e.attr("data-wheelstep") || .1,
                arrow_step: e.attr("data-arrowstep") || .2,
                allowWheel: "false" != e.attr("data-mousescrool"),
                UI: "false" != e.attr("data-UI"),
                type: e.attr("data-type") || "float",
                preventWheelAcceleration: "false" != e.attr("data-preventWheelAcceleration"),
                incrementButton: e.attr("data-incrementButton") || "&blacktriangle;",
                decrementButton: e.attr("data-decrementButton") || "&blacktriangledown;",
                onStep: null,
                onWheel: null,
                onArrow: null,
                onButton: null,
                onKeyUp: null
            })
        })
    })
}

function _slimScroll() {
    jQuery(".slimscroll").length > 0 && loadScript(plugin_path + "slimscroll/jquery.slimscroll.min.js", function() {
        jQuery().slimScroll && jQuery(".slimscroll").each(function() {
            var e;
            e = jQuery(this).attr("data-height") ? jQuery(this).attr("data-height") : jQuery(this).height(), jQuery(this).slimScroll({
                size: jQuery(this).attr("data-size") || "5px",
                opacity: jQuery(this).attr("data-opacity") || .6,
                position: jQuery(this).attr("data-position") || "right",
                allowPageScroll: !1,
                disableFadeOut: !1,
                railVisible: !0,
                railColor: jQuery(this).attr("data-railColor") || "#222",
                railOpacity: jQuery(this).attr("data-railOpacity") || .05,
                alwaysVisible: "false" != jQuery(this).attr("data-alwaysVisible"),
                railVisible: "false" != jQuery(this).attr("data-railVisible"),
                color: jQuery(this).attr("data-color") || "#333",
                wrapperClass: jQuery(this).attr("data-wrapper-class") || "slimScrollDiv",
                railColor: jQuery(this).attr("data-railColor") || "#eaeaea",
                height: e
            }), "true" == jQuery(this).attr("disable-body-scroll") && jQuery(this).bind("mousewheel DOMMouseScroll", function(e) {
                var t = null;
                "mousewheel" == e.type ? t = -1 * e.originalEvent.wheelDelta : "DOMMouseScroll" == e.type && (t = 40 * e.originalEvent.detail), t && (e.preventDefault(), jQuery(this).scrollTop(t + jQuery(this).scrollTop()))
            })
        })
    })
}

function _modalAutoLoad() {
    jQuery("div.modal").length > 0 && jQuery("div.modal").each(function() {
        var e = jQuery(this),
            t = e.attr("id"),
            n = e.attr("data-autoload") || !1;
        "" != t && "hidden" == localStorage.getItem(t) && (n = "false"), "true" == n && jQuery(window).on("load", function() {
            var t = e.attr("data-autoload-delay") || 1e3;
            setTimeout(function() {
                e.modal("toggle")
            }, parseInt(t))
        }), jQuery("input.loadModalHide", this).bind("click", function() {
            jQuery(this).is(":checked") ? (localStorage.setItem(t, "hidden"), console.log("[Modal Autoload #" + t + "] Added to localStorage")) : (localStorage.removeItem(t), console.log("[Modal Autoload #" + t + "] Removed from localStorage"))
        })
    })
}

function _bgimage() {
    var e = jQuery("section[data-background], section div[data-background]");
    e.length > 0 && loadScript(plugin_path + "jquery.backstretch.min.js", function() {
        jQuery(e).each(function() {
            var e = jQuery(this),
                t = e.attr("data-background") || "";
            if ("" != t) {
                var n = e.attr("data-background-delay") || 3e3,
                    r = e.attr("data-background-fade") || 750,
                    i = t.split(",");
                (i = t.replace(" ", "").split(","))[1] ? e.backstretch(i, {
                    duration: parseInt(n),
                    fade: parseInt(r)
                }): e.backstretch(i), jQuery(".bs-next", e).bind("click", function(t) {
                    t.preventDefault(), e.data("backstretch").next()
                }), jQuery(".bs-prev", e).bind("click", function(t) {
                    t.preventDefault(), e.data("backstretch").prev()
                }), jQuery(window).resize(function() {
                    window.afterResizeBkstr && clearTimeout(window.afterResizeBkstr), window.afterResizeBkstr = setTimeout(function() {
                        e.data("backstretch").next()
                    }, 350)
                })
            }
        })
    });
    var t = jQuery("body").attr("data-background") || "";
    "" != t && loadScript(plugin_path + "jquery.backstretch.min.js", function() {
        t && (jQuery.backstretch(t), jQuery("body").addClass("transparent"))
    })
}

function _stickyKit() {
    jQuery(".sticky-kit").length < 1 || window.width < 960 || loadScript(plugin_path + "jquery.sticky-kit/jquery.sticky-kit.min.js", function() {
        jQuery(".sticky-kit").each(function() {
            var e = jQuery(this),
                t = e.data("offset") || Number(jQuery("#header").outerHeight());
            e.stick_in_parent({
                offset_top: Number(t)
            })
        })
    })
}

function _cookie_alert() {
    var e = jQuery("#cookie-alert"),
        t = _getCookie("cookie-alert");
    if (e.length > 0 && null == t) {
        var n = e.attr("data-expire") || 30;
        e.hasClass("alert-position-bottom") ? e.animate({
            bottom: "0px"
        }, 800, "easeInOutExpo") : e.animate({
            top: "0px"
        }, 800, "easeInOutExpo"), jQuery("button", e).bind("click", function() {
            _setCookie("cookie-alert", "closed", Number(n))
        })
    }
    e.length > 0 && e.hasClass("cookie-reset") && _delCookie("cookie-alert")
}

function _widget_flickr() {
    var e = jQuery(".widget-flickr");
    e.length > 0 && loadScript(plugin_path + "widget.jflickr/jflickrfeed.min.js", function() {
        jQuery().jflickrfeed && jQuery(".widget-flickr") && e.each(function() {
            var e = jQuery(this),
                t = e.attr("data-id"),
                n = e.attr("data-limit") || 14;
            e.jflickrfeed({
                limit: parseInt(n),
                qstrings: {
                    id: t
                },
                itemTemplate: '<li><a href="{{image}}" title="{{title}}"><img src="{{image_s}}" alt="{{title}}" width="63" height="63" /></a></li>'
            }, function(e) {
                _lightbox()
            })
        })
    })
}

function _widget_twitter() {
    var e = jQuery(".widget-twitter");
    e.length > 0 && loadScript(plugin_path + "widget.twittie/twittie.min.js", function() {
        jQuery().twittie && e.each(function() {
            var e = jQuery(this),
                t = e.attr("data-php") + "?username=" + e.attr("data-username") + "&limit=" + (e.attr("data-limit") || 3);
            jQuery.getJSON(t, function(t) {
                e.html(format_twitter(t))
            })
        })
    })
}

function format_twitter(e) {
    for (var t = [], n = 0; n < e.length; n++) {
        var r = e[n].user.screen_name,
            i = e[n].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(e) {
                return '<a href="' + e + '" target="_blank">' + e + "</a>"
            }).replace(/\B@([_a-z0-9]+)/gi, function(e) {
                return e.charAt(0) + '<a href="http://twitter.com/' + e.substring(1) + '" target="_blank">' + e.substring(1) + "</a>"
            });
        t.push('<li><i class="fa fa-twitter"></i><span>' + i + '</span><small><a href="http://twitter.com/' + r + "/statuses/" + e[n].id_str + '" target="_blank">' + relative_time(e[n].created_at) + "</a></small></li>")
    }
    return t.join("")
}

function relative_time(e) {
    var t = e.split(" "),
        n = Date.parse(e),
        r = arguments.length > 1 ? arguments[1] : new Date,
        i = parseInt((r.getTime() - n) / 1e3);
    return e = t[1] + " " + t[2] + ", " + t[5] + " " + t[3], (i += 60 * r.getTimezoneOffset()) < 60 ? "less than a minute ago" : i < 120 ? "about a minute ago" : i < 3600 ? parseInt(i / 60).toString() + " minutes ago" : i < 7200 ? "about an hour ago" : i < 86400 ? "about " + parseInt(i / 3600).toString() + " hours ago" : i < 172800 ? "1 day ago" : parseInt(i / 86400).toString() + " days ago"
}

function _widget_facebook() {
    var e, t, n, r, i = jQuery("div.fb-like"),
        a = jQuery("div.fb-share-button");
    (i.length > 0 || a.length > 0) && (jQuery("body").append('<div id="fb-root"></div>'), e = document, t = "facebook-jssdk", r = e.getElementsByTagName("script")[0], e.getElementById(t) || ((n = e.createElement("script")).id = t, n.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3", r.parentNode.insertBefore(n, r)))
}

function _widget_dribbble() {
    var e = jQuery(".widget-dribbble");
    e.length > 0 && loadScript(plugin_path + "widget.dribbble/jribbble.min.js", function() {
        var t = e.attr("data-token") || "f688ac519289f19ce5cebc1383c15ad5c02bd58205cd83c86cbb0ce09170c1b4",
            n = e.attr("data-target") || "_blank",
            r = e.attr("data-shots") || 2046896;
        jQuery.jribbble.setToken(t), jQuery.jribbble.shots(r).rebounds().then(function(t) {
            var r = [];
            t.forEach(function(e) {
                r.push("<li>"), r.push('<a href="' + e.html_url + '" target="' + n + '">'), r.push('<img class="img-fluid" src="' + e.images.normal + '" alt="image">'), r.push("</a></li>")
            }), e.html(r.join(""))
        })
    })
}

function _widget_media() {
    jQuery(".widget-media").length > 0 && loadScript(plugin_path + "widget.mediaelementbuild/mediaelement-and-player.min.js", function() {})
}
// /pofweb/.test(self.location.href) || /wcdn/.test(self.location.href) || /tstrap/.test(self.location.href) || (window.location = "http://www.stepofweb.com/templates.html");
var isMobile = {
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i)
    },
    Android: function() {
        return navigator.userAgent.match(/Android/i)
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i)
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i)
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i)
    },
    any: function() {
        return isMobile.iOS() || isMobile.Android() || isMobile.BlackBerry() || isMobile.Opera() || isMobile.Windows()
    }
};

function wheel(e) {
    e.preventDefault()
}

function disable_scroll() {
    window.addEventListener && window.addEventListener("DOMMouseScroll", wheel, !1), window.onmousewheel = document.onmousewheel = wheel
}

function enable_scroll() {
    window.removeEventListener && window.removeEventListener("DOMMouseScroll", wheel, !1), window.onmousewheel = document.onmousewheel = document.onkeydown = null
}

function enable_overlay() {
    jQuery("span.global-overlay").remove(), jQuery("body").append('<span class="global-overlay"></span>')
}

function disable_overlay() {
    jQuery("span.global-overlay").remove()
}

function _setCookie(e, t, n) {
    var r = "";
    if (n) {
        var i = new Date;
        i.setTime(i.getTime() + 24 * n * 60 * 60 * 1e3), r = "; expires=" + i.toUTCString()
    }
    document.cookie = e + "=" + t + r + "; path=/"
}

function _getCookie(e) {
    for (var t = e + "=", n = document.cookie.split(";"), r = 0; r < n.length; r++) {
        for (var i = n[r];
            " " == i.charAt(0);) i = i.substring(1, i.length);
        if (0 == i.indexOf(t)) return i.substring(t.length, i.length)
    }
    return null
}

function _delCookie(e) {
    _setCookie(e, "", -1)
}

function _loadPopperBS4() {
    var e, t;
    e = this, t = function() {
        "use strict";

        function e(e) {
            return e && "[object Function]" === {}.toString.call(e)
        }

        function t(e, t) {
            if (1 !== e.nodeType) return [];
            var n = getComputedStyle(e, null);
            return t ? n[t] : n
        }

        function n(e) {
            return "HTML" === e.nodeName ? e : e.parentNode || e.host
        }

        function r(e) {
            if (!e) return document.body;
            switch (e.nodeName) {
                case "HTML":
                case "BODY":
                    return e.ownerDocument.body;
                case "#document":
                    return e.body
            }
            var i = t(e),
                a = i.overflow,
                o = i.overflowX,
                s = i.overflowY;
            return /(auto|scroll)/.test(a + s + o) ? e : r(n(e))
        }

        function i(e) {
            var n = e && e.offsetParent,
                r = n && n.nodeName;
            return r && "BODY" !== r && "HTML" !== r ? -1 !== ["TD", "TABLE"].indexOf(n.nodeName) && "static" === t(n, "position") ? i(n) : n : e ? e.ownerDocument.documentElement : document.documentElement
        }

        function a(e) {
            return null === e.parentNode ? e : a(e.parentNode)
        }

        function o(e, t) {
            if (!(e && e.nodeType && t && t.nodeType)) return document.documentElement;
            var n = e.compareDocumentPosition(t) & Node.DOCUMENT_POSITION_FOLLOWING,
                r = n ? e : t,
                s = n ? t : e,
                l = document.createRange();
            l.setStart(r, 0), l.setEnd(s, 0);
            var u, c, d = l.commonAncestorContainer;
            if (e !== d && t !== d || r.contains(s)) return u = d, c = u.nodeName, "BODY" === c || "HTML" !== c && i(u.firstElementChild) !== u ? i(d) : d;
            var p = a(e);
            return p.host ? o(p.host, t) : o(e, a(t).host)
        }

        function s(e) {
            var t = "top" === (1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : "top") ? "scrollTop" : "scrollLeft",
                n = e.nodeName;
            if ("BODY" === n || "HTML" === n) {
                var r = e.ownerDocument.documentElement;
                return (e.ownerDocument.scrollingElement || r)[t]
            }
            return e[t]
        }

        function l(e, t) {
            var n = "x" === t ? "Left" : "Top",
                r = "Left" == n ? "Right" : "Bottom";
            return parseFloat(e["border" + n + "Width"], 10) + parseFloat(e["border" + r + "Width"], 10)
        }

        function u(e, t, n, r) {
            return M(t["offset" + e], t["scroll" + e], n["client" + e], n["offset" + e], n["scroll" + e], L() ? n["offset" + e] + r["margin" + ("Height" === e ? "Top" : "Left")] + r["margin" + ("Height" === e ? "Bottom" : "Right")] : 0)
        }

        function c() {
            var e = document.body,
                t = document.documentElement,
                n = L() && getComputedStyle(t);
            return {
                height: u("Height", e, t, n),
                width: u("Width", e, t, n)
            }
        }

        function d(e) {
            return W({}, e, {
                right: e.left + e.width,
                bottom: e.top + e.height
            })
        }

        function p(e) {
            var n = {};
            if (L()) try {
                n = e.getBoundingClientRect();
                var r = s(e, "top"),
                    i = s(e, "left");
                n.top += r, n.left += i, n.bottom += r, n.right += i
            } catch (e) {} else n = e.getBoundingClientRect();
            var a = {
                    left: n.left,
                    top: n.top,
                    width: n.right - n.left,
                    height: n.bottom - n.top
                },
                o = "HTML" === e.nodeName ? c() : {},
                u = o.width || e.clientWidth || a.right - a.left,
                p = o.height || e.clientHeight || a.bottom - a.top,
                f = e.offsetWidth - u,
                h = e.offsetHeight - p;
            if (f || h) {
                var m = t(e);
                f -= l(m, "x"), h -= l(m, "y"), a.width -= f, a.height -= h
            }
            return d(a)
        }

        function f(e, n) {
            var i = L(),
                a = "HTML" === n.nodeName,
                o = p(e),
                l = p(n),
                u = r(e),
                c = t(n),
                f = parseFloat(c.borderTopWidth, 10),
                h = parseFloat(c.borderLeftWidth, 10),
                m = d({
                    top: o.top - l.top - f,
                    left: o.left - l.left - h,
                    width: o.width,
                    height: o.height
                });
            if (m.marginTop = 0, m.marginLeft = 0, !i && a) {
                var y = parseFloat(c.marginTop, 10),
                    g = parseFloat(c.marginLeft, 10);
                m.top -= f - y, m.bottom -= f - y, m.left -= h - g, m.right -= h - g, m.marginTop = y, m.marginLeft = g
            }
            return (i ? n.contains(u) : n === u && "BODY" !== u.nodeName) && (m = function(e, t) {
                var n = 2 < arguments.length && void 0 !== arguments[2] && arguments[2],
                    r = s(t, "top"),
                    i = s(t, "left"),
                    a = n ? -1 : 1;
                return e.top += r * a, e.bottom += r * a, e.left += i * a, e.right += i * a, e
            }(m, n)), m
        }

        function h(e, i, a, l) {
            var u, p, h, m, y, g, v, j = {
                    top: 0,
                    left: 0
                },
                w = o(e, i);
            if ("viewport" === l) u = w, p = u.ownerDocument.documentElement, h = f(u, p), m = M(p.clientWidth, window.innerWidth || 0), y = M(p.clientHeight, window.innerHeight || 0), g = s(p), v = s(p, "left"), j = d({
                top: g - h.top + h.marginTop,
                left: v - h.left + h.marginLeft,
                width: m,
                height: y
            });
            else {
                var Q;
                "scrollParent" === l ? "BODY" === (Q = r(n(i))).nodeName && (Q = e.ownerDocument.documentElement) : Q = "window" === l ? e.ownerDocument.documentElement : l;
                var b = f(Q, w);
                if ("HTML" !== Q.nodeName || function e(r) {
                        var i = r.nodeName;
                        return "BODY" !== i && "HTML" !== i && ("fixed" === t(r, "position") || e(n(r)))
                    }(w)) j = b;
                else {
                    var _ = c(),
                        C = _.height,
                        A = _.width;
                    j.top += b.top - b.marginTop, j.bottom = C + b.top, j.left += b.left - b.marginLeft, j.right = A + b.left
                }
            }
            return j.left += a, j.top += a, j.right -= a, j.bottom -= a, j
        }

        function m(e, t, n, r, i) {
            var a = 5 < arguments.length && void 0 !== arguments[5] ? arguments[5] : 0;
            if (-1 === e.indexOf("auto")) return e;
            var o = h(n, r, a, i),
                s = {
                    top: {
                        width: o.width,
                        height: t.top - o.top
                    },
                    right: {
                        width: o.right - t.right,
                        height: o.height
                    },
                    bottom: {
                        width: o.width,
                        height: o.bottom - t.bottom
                    },
                    left: {
                        width: t.left - o.left,
                        height: o.height
                    }
                },
                l = Object.keys(s).map(function(e) {
                    return W({
                        key: e
                    }, s[e], {
                        area: (t = s[e], t.width * t.height)
                    });
                    var t
                }).sort(function(e, t) {
                    return t.area - e.area
                }),
                u = l.filter(function(e) {
                    var t = e.width,
                        r = e.height;
                    return t >= n.clientWidth && r >= n.clientHeight
                }),
                c = 0 < u.length ? u[0].key : l[0].key,
                d = e.split("-")[1];
            return c + (d ? "-" + d : "")
        }

        function y(e, t, n) {
            return f(n, o(t, n))
        }

        function g(e) {
            var t = getComputedStyle(e),
                n = parseFloat(t.marginTop) + parseFloat(t.marginBottom),
                r = parseFloat(t.marginLeft) + parseFloat(t.marginRight);
            return {
                width: e.offsetWidth + r,
                height: e.offsetHeight + n
            }
        }

        function v(e) {
            var t = {
                left: "right",
                right: "left",
                bottom: "top",
                top: "bottom"
            };
            return e.replace(/left|right|bottom|top/g, function(e) {
                return t[e]
            })
        }

        function j(e, t, n) {
            n = n.split("-")[0];
            var r = g(e),
                i = {
                    width: r.width,
                    height: r.height
                },
                a = -1 !== ["right", "left"].indexOf(n),
                o = a ? "top" : "left",
                s = a ? "left" : "top",
                l = a ? "height" : "width",
                u = a ? "width" : "height";
            return i[o] = t[o] + t[l] / 2 - r[l] / 2, i[s] = n === s ? t[s] - r[u] : t[v(s)], i
        }

        function w(e, t) {
            return Array.prototype.find ? e.find(t) : e.filter(t)[0]
        }

        function Q(t, n, r) {
            return (void 0 === r ? t : t.slice(0, function(e, t, n) {
                if (Array.prototype.findIndex) return e.findIndex(function(e) {
                    return e[t] === n
                });
                var r = w(e, function(e) {
                    return e[t] === n
                });
                return e.indexOf(r)
            }(t, "name", r))).forEach(function(t) {
                t.function && console.warn("`modifier.function` is deprecated, use `modifier.fn`!");
                var r = t.function || t.fn;
                t.enabled && e(r) && (n.offsets.popper = d(n.offsets.popper), n.offsets.reference = d(n.offsets.reference), n = r(n, t))
            }), n
        }

        function b(e, t) {
            return e.some(function(e) {
                var n = e.name;
                return e.enabled && n === t
            })
        }

        function _(e) {
            for (var t = [!1, "ms", "Webkit", "Moz", "O"], n = e.charAt(0).toUpperCase() + e.slice(1), r = 0; r < t.length - 1; r++) {
                var i = t[r],
                    a = i ? "" + i + n : e;
                if (void 0 !== document.body.style[a]) return a
            }
            return null
        }

        function C(e) {
            var t = e.ownerDocument;
            return t ? t.defaultView : window
        }

        function A(e, t, n, i) {
            n.updateBound = i, C(e).addEventListener("resize", n.updateBound, {
                passive: !0
            });
            var a = r(e);
            return function e(t, n, i, a) {
                var o = "BODY" === t.nodeName,
                    s = o ? t.ownerDocument.defaultView : t;
                s.addEventListener(n, i, {
                    passive: !0
                }), o || e(r(s.parentNode), n, i, a), a.push(s)
            }(a, "scroll", n.updateBound, n.scrollParents), n.scrollElement = a, n.eventsEnabled = !0, n
        }

        function k() {
            var e, t;
            this.state.eventsEnabled && (cancelAnimationFrame(this.scheduleUpdate), this.state = (e = this.reference, t = this.state, C(e).removeEventListener("resize", t.updateBound), t.scrollParents.forEach(function(e) {
                e.removeEventListener("scroll", t.updateBound)
            }), t.updateBound = null, t.scrollParents = [], t.scrollElement = null, t.eventsEnabled = !1, t))
        }

        function x(e) {
            return "" !== e && !isNaN(parseFloat(e)) && isFinite(e)
        }

        function S(e, t) {
            Object.keys(t).forEach(function(n) {
                var r = ""; - 1 !== ["width", "height", "top", "right", "bottom", "left"].indexOf(n) && x(t[n]) && (r = "px"), e.style[n] = t[n] + r
            })
        }

        function E(e, t, n) {
            var r = w(e, function(e) {
                    return e.name === t
                }),
                i = !!r && e.some(function(e) {
                    return e.name === n && e.enabled && e.order < r.order
                });
            if (!i) {
                var a = "`" + t + "`";
                console.warn("`" + n + "` modifier is required by " + a + " modifier in order to work, be sure to include it before " + a + "!")
            }
            return i
        }

        function I(e) {
            var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
                n = Y.indexOf(e),
                r = Y.slice(n + 1).concat(Y.slice(0, n));
            return t ? r.reverse() : r
        }

        function T(e, t, n, r) {
            var i = [0, 0],
                a = -1 !== ["right", "left"].indexOf(r),
                o = e.split(/(\+|\-)/).map(function(e) {
                    return e.trim()
                }),
                s = o.indexOf(w(o, function(e) {
                    return -1 !== e.search(/,|\s/)
                }));
            o[s] && -1 === o[s].indexOf(",") && console.warn("Offsets separated by white space(s) are deprecated, use a comma (,) instead.");
            var l = /\s*,\s*|\s+/,
                u = -1 === s ? [o] : [o.slice(0, s).concat([o[s].split(l)[0]]), [o[s].split(l)[1]].concat(o.slice(s + 1))];
            return (u = u.map(function(e, r) {
                var i = (1 === r ? !a : a) ? "height" : "width",
                    o = !1;
                return e.reduce(function(e, t) {
                    return "" === e[e.length - 1] && -1 !== ["+", "-"].indexOf(t) ? (e[e.length - 1] = t, o = !0, e) : o ? (e[e.length - 1] += t, o = !1, e) : e.concat(t)
                }, []).map(function(e) {
                    return function(e, t, n, r) {
                        var i = e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
                            a = +i[1],
                            o = i[2];
                        if (!a) return e;
                        if (0 === o.indexOf("%")) {
                            var s;
                            switch (o) {
                                case "%p":
                                    s = n;
                                    break;
                                case "%":
                                case "%r":
                                default:
                                    s = r
                            }
                            return d(s)[t] / 100 * a
                        }
                        return "vh" === o || "vw" === o ? ("vh" === o ? M(document.documentElement.clientHeight, window.innerHeight || 0) : M(document.documentElement.clientWidth, window.innerWidth || 0)) / 100 * a : a
                    }(e, i, t, n)
                })
            })).forEach(function(e, t) {
                e.forEach(function(n, r) {
                    x(n) && (i[t] += n * ("-" === e[r - 1] ? -1 : 1))
                })
            }), i
        }
        for (var O = Math.min, B = Math.floor, M = Math.max, D = "undefined" != typeof window && "undefined" != typeof document, H = ["Edge", "Trident", "Firefox"], N = 0, P = 0; P < H.length; P += 1)
            if (D && 0 <= navigator.userAgent.indexOf(H[P])) {
                N = 1;
                break
            } var z, F = D && window.Promise ? function(e) {
                var t = !1;
                return function() {
                    t || (t = !0, window.Promise.resolve().then(function() {
                        t = !1, e()
                    }))
                }
            } : function(e) {
                var t = !1;
                return function() {
                    t || (t = !0, setTimeout(function() {
                        t = !1, e()
                    }, N))
                }
            },
            L = function() {
                return void 0 == z && (z = -1 !== navigator.appVersion.indexOf("MSIE 10")), z
            },
            q = function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            },
            R = function() {
                function e(e, t) {
                    for (var n, r = 0; r < t.length; r++) n = t[r], n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                }
                return function(t, n, r) {
                    return n && e(t.prototype, n), r && e(t, r), t
                }
            }(),
            U = function(e, t, n) {
                return t in e ? Object.defineProperty(e, t, {
                    value: n,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : e[t] = n, e
            },
            W = Object.assign || function(e) {
                for (var t, n = 1; n < arguments.length; n++)
                    for (var r in t = arguments[n], t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r]);
                return e
            },
            G = ["auto-start", "auto", "auto-end", "top-start", "top", "top-end", "right-start", "right", "right-end", "bottom-end", "bottom", "bottom-start", "left-end", "left", "left-start"],
            Y = G.slice(3),
            K = "flip",
            J = "clockwise",
            V = "counterclockwise",
            Z = function() {
                function t(n, r) {
                    var i = this,
                        a = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : {};
                    q(this, t), this.scheduleUpdate = function() {
                        return requestAnimationFrame(i.update)
                    }, this.update = F(this.update.bind(this)), this.options = W({}, t.Defaults, a), this.state = {
                        isDestroyed: !1,
                        isCreated: !1,
                        scrollParents: []
                    }, this.reference = n && n.jquery ? n[0] : n, this.popper = r && r.jquery ? r[0] : r, this.options.modifiers = {}, Object.keys(W({}, t.Defaults.modifiers, a.modifiers)).forEach(function(e) {
                        i.options.modifiers[e] = W({}, t.Defaults.modifiers[e] || {}, a.modifiers ? a.modifiers[e] : {})
                    }), this.modifiers = Object.keys(this.options.modifiers).map(function(e) {
                        return W({
                            name: e
                        }, i.options.modifiers[e])
                    }).sort(function(e, t) {
                        return e.order - t.order
                    }), this.modifiers.forEach(function(t) {
                        t.enabled && e(t.onLoad) && t.onLoad(i.reference, i.popper, i.options, t, i.state)
                    }), this.update();
                    var o = this.options.eventsEnabled;
                    o && this.enableEventListeners(), this.state.eventsEnabled = o
                }
                return R(t, [{
                    key: "update",
                    value: function() {
                        return function() {
                            if (!this.state.isDestroyed) {
                                var e = {
                                    instance: this,
                                    styles: {},
                                    arrowStyles: {},
                                    attributes: {},
                                    flipped: !1,
                                    offsets: {}
                                };
                                e.offsets.reference = y(this.state, this.popper, this.reference), e.placement = m(this.options.placement, e.offsets.reference, this.popper, this.reference, this.options.modifiers.flip.boundariesElement, this.options.modifiers.flip.padding), e.originalPlacement = e.placement, e.offsets.popper = j(this.popper, e.offsets.reference, e.placement), e.offsets.popper.position = "absolute", e = Q(this.modifiers, e), this.state.isCreated ? this.options.onUpdate(e) : (this.state.isCreated = !0, this.options.onCreate(e))
                            }
                        }.call(this)
                    }
                }, {
                    key: "destroy",
                    value: function() {
                        return function() {
                            return this.state.isDestroyed = !0, b(this.modifiers, "applyStyle") && (this.popper.removeAttribute("x-placement"), this.popper.style.left = "", this.popper.style.position = "", this.popper.style.top = "", this.popper.style[_("transform")] = ""), this.disableEventListeners(), this.options.removeOnDestroy && this.popper.parentNode.removeChild(this.popper), this
                        }.call(this)
                    }
                }, {
                    key: "enableEventListeners",
                    value: function() {
                        return function() {
                            this.state.eventsEnabled || (this.state = A(this.reference, this.options, this.state, this.scheduleUpdate))
                        }.call(this)
                    }
                }, {
                    key: "disableEventListeners",
                    value: function() {
                        return k.call(this)
                    }
                }]), t
            }();
        return Z.Utils = ("undefined" == typeof window ? global : window).PopperUtils, Z.placements = G, Z.Defaults = {
            placement: "bottom",
            eventsEnabled: !0,
            removeOnDestroy: !1,
            onCreate: function() {},
            onUpdate: function() {},
            modifiers: {
                shift: {
                    order: 100,
                    enabled: !0,
                    fn: function(e) {
                        var t = e.placement,
                            n = t.split("-")[0],
                            r = t.split("-")[1];
                        if (r) {
                            var i = e.offsets,
                                a = i.reference,
                                o = i.popper,
                                s = -1 !== ["bottom", "top"].indexOf(n),
                                l = s ? "left" : "top",
                                u = s ? "width" : "height",
                                c = {
                                    start: U({}, l, a[l]),
                                    end: U({}, l, a[l] + a[u] - o[u])
                                };
                            e.offsets.popper = W({}, o, c[r])
                        }
                        return e
                    }
                },
                offset: {
                    order: 200,
                    enabled: !0,
                    fn: function(e, t) {
                        var n, r = t.offset,
                            i = e.placement,
                            a = e.offsets,
                            o = a.popper,
                            s = a.reference,
                            l = i.split("-")[0];
                        return n = x(+r) ? [+r, 0] : T(r, o, s, l), "left" === l ? (o.top += n[0], o.left -= n[1]) : "right" === l ? (o.top += n[0], o.left += n[1]) : "top" === l ? (o.left += n[0], o.top -= n[1]) : "bottom" === l && (o.left += n[0], o.top += n[1]), e.popper = o, e
                    },
                    offset: 0
                },
                preventOverflow: {
                    order: 300,
                    enabled: !0,
                    fn: function(e, t) {
                        var n = t.boundariesElement || i(e.instance.popper);
                        e.instance.reference === n && (n = i(n));
                        var r = h(e.instance.popper, e.instance.reference, t.padding, n);
                        t.boundaries = r;
                        var a = t.priority,
                            o = e.offsets.popper,
                            s = {
                                primary: function(e) {
                                    var n = o[e];
                                    return o[e] < r[e] && !t.escapeWithReference && (n = M(o[e], r[e])), U({}, e, n)
                                },
                                secondary: function(e) {
                                    var n = "right" === e ? "left" : "top",
                                        i = o[n];
                                    return o[e] > r[e] && !t.escapeWithReference && (i = O(o[n], r[e] - ("right" === e ? o.width : o.height))), U({}, n, i)
                                }
                            };
                        return a.forEach(function(e) {
                            var t = -1 === ["left", "top"].indexOf(e) ? "secondary" : "primary";
                            o = W({}, o, s[t](e))
                        }), e.offsets.popper = o, e
                    },
                    priority: ["left", "right", "top", "bottom"],
                    padding: 5,
                    boundariesElement: "scrollParent"
                },
                keepTogether: {
                    order: 400,
                    enabled: !0,
                    fn: function(e) {
                        var t = e.offsets,
                            n = t.popper,
                            r = t.reference,
                            i = e.placement.split("-")[0],
                            a = B,
                            o = -1 !== ["top", "bottom"].indexOf(i),
                            s = o ? "right" : "bottom",
                            l = o ? "left" : "top",
                            u = o ? "width" : "height";
                        return n[s] < a(r[l]) && (e.offsets.popper[l] = a(r[l]) - n[u]), n[l] > a(r[s]) && (e.offsets.popper[l] = a(r[s])), e
                    }
                },
                arrow: {
                    order: 500,
                    enabled: !0,
                    fn: function(e, n) {
                        var r;
                        if (!E(e.instance.modifiers, "arrow", "keepTogether")) return e;
                        var i = n.element;
                        if ("string" == typeof i) {
                            if (!(i = e.instance.popper.querySelector(i))) return e
                        } else if (!e.instance.popper.contains(i)) return console.warn("WARNING: `arrow.element` must be child of its popper element!"), e;
                        var a = e.placement.split("-")[0],
                            o = e.offsets,
                            s = o.popper,
                            l = o.reference,
                            u = -1 !== ["left", "right"].indexOf(a),
                            c = u ? "height" : "width",
                            p = u ? "Top" : "Left",
                            f = p.toLowerCase(),
                            h = u ? "left" : "top",
                            m = u ? "bottom" : "right",
                            y = g(i)[c];
                        l[m] - y < s[f] && (e.offsets.popper[f] -= s[f] - (l[m] - y)), l[f] + y > s[m] && (e.offsets.popper[f] += l[f] + y - s[m]), e.offsets.popper = d(e.offsets.popper);
                        var v = l[f] + l[c] / 2 - y / 2,
                            j = t(e.instance.popper),
                            w = parseFloat(j["margin" + p], 10),
                            Q = parseFloat(j["border" + p + "Width"], 10),
                            b = v - e.offsets.popper[f] - w - Q;
                        return b = M(O(s[c] - y, b), 0), e.arrowElement = i, e.offsets.arrow = (U(r = {}, f, Math.round(b)), U(r, h, ""), r), e
                    },
                    element: "[x-arrow]"
                },
                flip: {
                    order: 600,
                    enabled: !0,
                    fn: function(e, t) {
                        if (b(e.instance.modifiers, "inner")) return e;
                        if (e.flipped && e.placement === e.originalPlacement) return e;
                        var n = h(e.instance.popper, e.instance.reference, t.padding, t.boundariesElement),
                            r = e.placement.split("-")[0],
                            i = v(r),
                            a = e.placement.split("-")[1] || "",
                            o = [];
                        switch (t.behavior) {
                            case K:
                                o = [r, i];
                                break;
                            case J:
                                o = I(r);
                                break;
                            case V:
                                o = I(r, !0);
                                break;
                            default:
                                o = t.behavior
                        }
                        return o.forEach(function(s, l) {
                            if (r !== s || o.length === l + 1) return e;
                            r = e.placement.split("-")[0], i = v(r);
                            var u, c = e.offsets.popper,
                                d = e.offsets.reference,
                                p = B,
                                f = "left" === r && p(c.right) > p(d.left) || "right" === r && p(c.left) < p(d.right) || "top" === r && p(c.bottom) > p(d.top) || "bottom" === r && p(c.top) < p(d.bottom),
                                h = p(c.left) < p(n.left),
                                m = p(c.right) > p(n.right),
                                y = p(c.top) < p(n.top),
                                g = p(c.bottom) > p(n.bottom),
                                w = "left" === r && h || "right" === r && m || "top" === r && y || "bottom" === r && g,
                                b = -1 !== ["top", "bottom"].indexOf(r),
                                _ = !!t.flipVariations && (b && "start" === a && h || b && "end" === a && m || !b && "start" === a && y || !b && "end" === a && g);
                            (f || w || _) && (e.flipped = !0, (f || w) && (r = o[l + 1]), _ && (a = "end" === (u = a) ? "start" : "start" === u ? "end" : u), e.placement = r + (a ? "-" + a : ""), e.offsets.popper = W({}, e.offsets.popper, j(e.instance.popper, e.offsets.reference, e.placement)), e = Q(e.instance.modifiers, e, "flip"))
                        }), e
                    },
                    behavior: "flip",
                    padding: 5,
                    boundariesElement: "viewport"
                },
                inner: {
                    order: 700,
                    enabled: !1,
                    fn: function(e) {
                        var t = e.placement,
                            n = t.split("-")[0],
                            r = e.offsets,
                            i = r.popper,
                            a = r.reference,
                            o = -1 !== ["left", "right"].indexOf(n),
                            s = -1 === ["top", "left"].indexOf(n);
                        return i[o ? "left" : "top"] = a[n] - (s ? i[o ? "width" : "height"] : 0), e.placement = v(t), e.offsets.popper = d(i), e
                    }
                },
                hide: {
                    order: 800,
                    enabled: !0,
                    fn: function(e) {
                        if (!E(e.instance.modifiers, "hide", "preventOverflow")) return e;
                        var t = e.offsets.reference,
                            n = w(e.instance.modifiers, function(e) {
                                return "preventOverflow" === e.name
                            }).boundaries;
                        if (t.bottom < n.top || t.left > n.right || t.top > n.bottom || t.right < n.left) {
                            if (!0 === e.hide) return e;
                            e.hide = !0, e.attributes["x-out-of-boundaries"] = ""
                        } else {
                            if (!1 === e.hide) return e;
                            e.hide = !1, e.attributes["x-out-of-boundaries"] = !1
                        }
                        return e
                    }
                },
                computeStyle: {
                    order: 850,
                    enabled: !0,
                    fn: function(e, t) {
                        var n = t.x,
                            r = t.y,
                            a = e.offsets.popper,
                            o = w(e.instance.modifiers, function(e) {
                                return "applyStyle" === e.name
                            }).gpuAcceleration;
                        void 0 !== o && console.warn("WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!");
                        var s, l, u = void 0 === o ? t.gpuAcceleration : o,
                            c = p(i(e.instance.popper)),
                            d = {
                                position: a.position
                            },
                            f = {
                                left: B(a.left),
                                top: B(a.top),
                                bottom: B(a.bottom),
                                right: B(a.right)
                            },
                            h = "bottom" === n ? "top" : "bottom",
                            m = "right" === r ? "left" : "right",
                            y = _("transform");
                        if (l = "bottom" == h ? -c.height + f.bottom : f.top, s = "right" == m ? -c.width + f.right : f.left, u && y) d[y] = "translate3d(" + s + "px, " + l + "px, 0)", d[h] = 0, d[m] = 0, d.willChange = "transform";
                        else {
                            var g = "bottom" == h ? -1 : 1,
                                v = "right" == m ? -1 : 1;
                            d[h] = l * g, d[m] = s * v, d.willChange = h + ", " + m
                        }
                        var j = {
                            "x-placement": e.placement
                        };
                        return e.attributes = W({}, j, e.attributes), e.styles = W({}, d, e.styles), e.arrowStyles = W({}, e.offsets.arrow, e.arrowStyles), e
                    },
                    gpuAcceleration: !0,
                    x: "bottom",
                    y: "right"
                },
                applyStyle: {
                    order: 900,
                    enabled: !0,
                    fn: function(e) {
                        return S(e.instance.popper, e.styles), t = e.instance.popper, n = e.attributes, Object.keys(n).forEach(function(e) {
                            !1 === n[e] ? t.removeAttribute(e) : t.setAttribute(e, n[e])
                        }), e.arrowElement && Object.keys(e.arrowStyles).length && S(e.arrowElement, e.arrowStyles), e;
                        var t, n
                    },
                    onLoad: function(e, t, n, r, i) {
                        var a = y(0, t, e),
                            o = m(n.placement, a, t, e, n.modifiers.flip.boundariesElement, n.modifiers.flip.padding);
                        return t.setAttribute("x-placement", o), S(t, {
                            position: "absolute"
                        }), n
                    },
                    gpuAcceleration: void 0
                }
            }
        }, Z
    }, "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : e.Popper = t()
}
Number.prototype.formatMoney = function(e, t, n) {
        var r = this,
            i = (e = isNaN(e = Math.abs(e)) ? 2 : e, t = void 0 == t ? "." : t, n = void 0 == n ? "," : n, r < 0 ? "-" : ""),
            a = String(parseInt(r = Math.abs(Number(r) || 0).toFixed(e))),
            o = (o = a.length) > 3 ? o % 3 : 0;
        return i + (o ? a.substr(0, o) + n : "") + a.substr(o).replace(/(\d{3})(?=\d)/g, "$1" + n) + (e ? t + Math.abs(r - a).toFixed(e).slice(2) : "")
    },
    function(e) {
        e.fn.countTo = function(t) {
            return t = t || {}, jQuery(this).each(function() {
                var n = jQuery.extend({}, e.fn.countTo.defaults, {
                        from: jQuery(this).data("from"),
                        to: jQuery(this).data("to"),
                        speed: jQuery(this).data("speed"),
                        refreshInterval: jQuery(this).data("refresh-interval"),
                        decimals: jQuery(this).data("decimals")
                    }, t),
                    r = Math.ceil(n.speed / n.refreshInterval),
                    i = (n.to - n.from) / r,
                    a = this,
                    o = jQuery(this),
                    s = 0,
                    l = n.from,
                    u = o.data("countTo") || {};

                function c(e) {
                    var t = n.formatter.call(a, e, n);
                    o.html(t)
                }
                o.data("countTo", u), u.interval && clearInterval(u.interval), u.interval = setInterval(function() {
                    s++, c(l += i), "function" == typeof n.onUpdate && n.onUpdate.call(a, l);
                    s >= r && (o.removeData("countTo"), clearInterval(u.interval), l = n.to, "function" == typeof n.onComplete && n.onComplete.call(a, l))
                }, n.refreshInterval), c(l)
            })
        }, e.fn.countTo.defaults = {
            from: 0,
            to: 0,
            speed: 1e3,
            refreshInterval: 100,
            decimals: 0,
            formatter: function(e, t) {
                return e.toFixed(t.decimals)
            },
            onUpdate: null,
            onComplete: null
        }
    }(jQuery),
    function(e) {
        e.fn.appear = function(t, n) {
            var r = e.extend({
                data: void 0,
                one: !0,
                accX: 0,
                accY: 0
            }, n);
            return this.each(function() {
                var n = e(this);
                if (n.appeared = !1, t) {
                    var i = e(window),
                        a = function() {
                            if (n.is(":visible")) {
                                var e = i.scrollLeft(),
                                    t = i.scrollTop(),
                                    a = n.offset(),
                                    o = a.left,
                                    s = a.top,
                                    l = r.accX,
                                    u = r.accY,
                                    c = n.height(),
                                    d = i.height(),
                                    p = n.width(),
                                    f = i.width();
                                s + c + u >= t && s <= t + d + u && o + p + l >= e && o <= e + f + l ? n.appeared || n.trigger("appear", r.data) : n.appeared = !1
                            } else n.appeared = !1
                        },
                        o = function() {
                            if (n.appeared = !0, r.one) {
                                i.unbind("scroll", a);
                                var o = e.inArray(a, e.fn.appear.checks);
                                o >= 0 && e.fn.appear.checks.splice(o, 1)
                            }
                            t.apply(this, arguments)
                        };
                    r.one ? n.one("appear", r.data, o) : n.bind("appear", r.data, o), i.scroll(a), e.fn.appear.checks.push(a), a()
                } else n.trigger("appear", r.data)
            })
        }, e.extend(e.fn.appear, {
            checks: [],
            timeout: null,
            checkAll: function() {
                var t = e.fn.appear.checks.length;
                if (t > 0)
                    for (; t--;) e.fn.appear.checks[t]()
            },
            run: function() {
                e.fn.appear.timeout && clearTimeout(e.fn.appear.timeout), e.fn.appear.timeout = setTimeout(e.fn.appear.checkAll, 20)
            }
        }), e.each(["append", "prepend", "after", "before", "attr", "removeAttr", "addClass", "removeClass", "toggleClass", "remove", "css", "show", "hide"], function(t, n) {
            var r = e.fn[n];
            r && (e.fn[n] = function() {
                var t = r.apply(this, arguments);
                return e.fn.appear.run(), t
            })
        })
    }(jQuery), jQuery.fn.parallax = function(e, t, n) {
        function r() {
            var r = jQuery(window).scrollTop();
            i = n ? function(e) {
                return e.outerHeight(!0)
            } : function(e) {
                return e.height()
            }, o.each(function() {
                var n = jQuery(this),
                    o = n.offset().top,
                    s = i(n);
                if (!(r > o + s || o > r + window.height)) {
                    var l = Math.round((a - r) * t);
                    n.css("backgroundPosition", e + " " + l + "px")
                }
            })
        }
        var i, a, o = jQuery(this);
        (arguments.length < 1 || null === e) && (e = "50%"), (arguments.length < 2 || null === t) && (t = .1), (arguments.length < 3 || null === n) && (n = !0), o.each(function() {
            (a = o.offset().top) < window.height && (a = 0)
        }), jQuery(window).bind("scroll", r).resize(r), r()
    }, jQuery.easing.jswing = jQuery.easing.swing, jQuery.extend(jQuery.easing, {
        def: "easeOutQuad",
        swing: function(e, t, n, r, i) {
            return jQuery.easing[jQuery.easing.def](e, t, n, r, i)
        },
        easeInQuad: function(e, t, n, r, i) {
            return r * (t /= i) * t + n
        },
        easeOutQuad: function(e, t, n, r, i) {
            return -r * (t /= i) * (t - 2) + n
        },
        easeInOutQuad: function(e, t, n, r, i) {
            return (t /= i / 2) < 1 ? r / 2 * t * t + n : -r / 2 * (--t * (t - 2) - 1) + n
        },
        easeInCubic: function(e, t, n, r, i) {
            return r * (t /= i) * t * t + n
        },
        easeOutCubic: function(e, t, n, r, i) {
            return r * ((t = t / i - 1) * t * t + 1) + n
        },
        easeInOutCubic: function(e, t, n, r, i) {
            return (t /= i / 2) < 1 ? r / 2 * t * t * t + n : r / 2 * ((t -= 2) * t * t + 2) + n
        },
        easeInQuart: function(e, t, n, r, i) {
            return r * (t /= i) * t * t * t + n
        },
        easeOutQuart: function(e, t, n, r, i) {
            return -r * ((t = t / i - 1) * t * t * t - 1) + n
        },
        easeInOutQuart: function(e, t, n, r, i) {
            return (t /= i / 2) < 1 ? r / 2 * t * t * t * t + n : -r / 2 * ((t -= 2) * t * t * t - 2) + n
        },
        easeInQuint: function(e, t, n, r, i) {
            return r * (t /= i) * t * t * t * t + n
        },
        easeOutQuint: function(e, t, n, r, i) {
            return r * ((t = t / i - 1) * t * t * t * t + 1) + n
        },
        easeInOutQuint: function(e, t, n, r, i) {
            return (t /= i / 2) < 1 ? r / 2 * t * t * t * t * t + n : r / 2 * ((t -= 2) * t * t * t * t + 2) + n
        },
        easeInSine: function(e, t, n, r, i) {
            return -r * Math.cos(t / i * (Math.PI / 2)) + r + n
        },
        easeOutSine: function(e, t, n, r, i) {
            return r * Math.sin(t / i * (Math.PI / 2)) + n
        },
        easeInOutSine: function(e, t, n, r, i) {
            return -r / 2 * (Math.cos(Math.PI * t / i) - 1) + n
        },
        easeInExpo: function(e, t, n, r, i) {
            return 0 == t ? n : r * Math.pow(2, 10 * (t / i - 1)) + n
        },
        easeOutExpo: function(e, t, n, r, i) {
            return t == i ? n + r : r * (1 - Math.pow(2, -10 * t / i)) + n
        },
        easeInOutExpo: function(e, t, n, r, i) {
            return 0 == t ? n : t == i ? n + r : (t /= i / 2) < 1 ? r / 2 * Math.pow(2, 10 * (t - 1)) + n : r / 2 * (2 - Math.pow(2, -10 * --t)) + n
        },
        easeInCirc: function(e, t, n, r, i) {
            return -r * (Math.sqrt(1 - (t /= i) * t) - 1) + n
        },
        easeOutCirc: function(e, t, n, r, i) {
            return r * Math.sqrt(1 - (t = t / i - 1) * t) + n
        },
        easeInOutCirc: function(e, t, n, r, i) {
            return (t /= i / 2) < 1 ? -r / 2 * (Math.sqrt(1 - t * t) - 1) + n : r / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + n
        },
        easeInElastic: function(e, t, n, r, i) {
            var a = 1.70158,
                o = 0,
                s = r;
            if (0 == t) return n;
            if (1 == (t /= i)) return n + r;
            if (o || (o = .3 * i), s < Math.abs(r)) {
                s = r;
                a = o / 4
            } else a = o / (2 * Math.PI) * Math.asin(r / s);
            return -s * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * i - a) * (2 * Math.PI) / o) + n
        },
        easeOutElastic: function(e, t, n, r, i) {
            var a = 1.70158,
                o = 0,
                s = r;
            if (0 == t) return n;
            if (1 == (t /= i)) return n + r;
            if (o || (o = .3 * i), s < Math.abs(r)) {
                s = r;
                a = o / 4
            } else a = o / (2 * Math.PI) * Math.asin(r / s);
            return s * Math.pow(2, -10 * t) * Math.sin((t * i - a) * (2 * Math.PI) / o) + r + n
        },
        easeInOutElastic: function(e, t, n, r, i) {
            var a = 1.70158,
                o = 0,
                s = r;
            if (0 == t) return n;
            if (2 == (t /= i / 2)) return n + r;
            if (o || (o = i * (.3 * 1.5)), s < Math.abs(r)) {
                s = r;
                a = o / 4
            } else a = o / (2 * Math.PI) * Math.asin(r / s);
            return t < 1 ? s * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * i - a) * (2 * Math.PI) / o) * -.5 + n : s * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * i - a) * (2 * Math.PI) / o) * .5 + r + n
        },
        easeInBack: function(e, t, n, r, i, a) {
            return void 0 == a && (a = 1.70158), r * (t /= i) * t * ((a + 1) * t - a) + n
        },
        easeOutBack: function(e, t, n, r, i, a) {
            return void 0 == a && (a = 1.70158), r * ((t = t / i - 1) * t * ((a + 1) * t + a) + 1) + n
        },
        easeInOutBack: function(e, t, n, r, i, a) {
            return void 0 == a && (a = 1.70158), (t /= i / 2) < 1 ? r / 2 * (t * t * ((1 + (a *= 1.525)) * t - a)) + n : r / 2 * ((t -= 2) * t * ((1 + (a *= 1.525)) * t + a) + 2) + n
        },
        easeInBounce: function(e, t, n, r, i) {
            return r - jQuery.easing.easeOutBounce(e, i - t, 0, r, i) + n
        },
        easeOutBounce: function(e, t, n, r, i) {
            return (t /= i) < 1 / 2.75 ? r * (7.5625 * t * t) + n : t < 2 / 2.75 ? r * (7.5625 * (t -= 1.5 / 2.75) * t + .75) + n : t < 2.5 / 2.75 ? r * (7.5625 * (t -= 2.25 / 2.75) * t + .9375) + n : r * (7.5625 * (t -= 2.625 / 2.75) * t + .984375) + n
        },
        easeInOutBounce: function(e, t, n, r, i) {
            return t < i / 2 ? .5 * jQuery.easing.easeInBounce(e, 2 * t, 0, r, i) + n : .5 * jQuery.easing.easeOutBounce(e, 2 * t - i, 0, r, i) + .5 * r + n
        }
    }),
    function() {
        var e, t, n, r, i, a = function(e, t) {
                return function() {
                    return e.apply(t, arguments)
                }
            },
            o = [].indexOf || function(e) {
                for (var t = 0, n = this.length; n > t; t++)
                    if (t in this && this[t] === e) return t;
                return -1
            };
        t = function() {
            function e() {}
            return e.prototype.extend = function(e, t) {
                var n, r;
                for (n in t) r = t[n], null == e[n] && (e[n] = r);
                return e
            }, e.prototype.isMobile = function(e) {
                return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(e)
            }, e.prototype.addEvent = function(e, t, n) {
                return null != e.addEventListener ? e.addEventListener(t, n, !1) : null != e.attachEvent ? e.attachEvent("on" + t, n) : e[t] = n
            }, e.prototype.removeEvent = function(e, t, n) {
                return null != e.removeEventListener ? e.removeEventListener(t, n, !1) : null != e.detachEvent ? e.detachEvent("on" + t, n) : delete e[t]
            }, e.prototype.innerHeight = function() {
                return "innerHeight" in window ? window.innerHeight : document.documentElement.clientHeight
            }, e
        }(), n = this.WeakMap || this.MozWeakMap || (n = function() {
            function e() {
                this.keys = [], this.values = []
            }
            return e.prototype.get = function(e) {
                var t, n, r, i, a;
                for (t = r = 0, i = (a = this.keys).length; i > r; t = ++r)
                    if (n = a[t], n === e) return this.values[t]
            }, e.prototype.set = function(e, t) {
                var n, r, i, a, o;
                for (n = i = 0, a = (o = this.keys).length; a > i; n = ++i)
                    if (r = o[n], r === e) return void(this.values[n] = t);
                return this.keys.push(e), this.values.push(t)
            }, e
        }()), e = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (e = function() {
            function e() {
                "undefined" != typeof console && null !== console && console.warn("MutationObserver is not supported by your browser."), "undefined" != typeof console && null !== console && console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.")
            }
            return e.notSupported = !0, e.prototype.observe = function() {}, e
        }()), r = this.getComputedStyle || function(e) {
            return this.getPropertyValue = function(t) {
                var n;
                return "float" === t && (t = "styleFloat"), i.test(t) && t.replace(i, function(e, t) {
                    return t.toUpperCase()
                }), (null != (n = e.currentStyle) ? n[t] : void 0) || null
            }, this
        }, i = /(\-([a-z]){1})/g, this.WOW = function() {
            function i(e) {
                null == e && (e = {}), this.scrollCallback = a(this.scrollCallback, this), this.scrollHandler = a(this.scrollHandler, this), this.start = a(this.start, this), this.scrolled = !0, this.config = this.util().extend(e, this.defaults), this.animationNameCache = new n
            }
            return i.prototype.defaults = {
                boxClass: "wow",
                animateClass: "animated",
                offset: 0,
                mobile: !0,
                live: !0,
                callback: null
            }, i.prototype.init = function() {
                var e;
                return this.element = window.document.documentElement, "interactive" === (e = document.readyState) || "complete" === e ? this.start() : this.util().addEvent(document, "DOMContentLoaded", this.start), this.finished = []
            }, i.prototype.start = function() {
                var t, n, r, i, a;
                if (this.stopped = !1, this.boxes = function() {
                        var e, n, r, i;
                        for (i = [], e = 0, n = (r = this.element.querySelectorAll("." + this.config.boxClass)).length; n > e; e++) t = r[e], i.push(t);
                        return i
                    }.call(this), this.all = function() {
                        var e, n, r, i;
                        for (i = [], e = 0, n = (r = this.boxes).length; n > e; e++) t = r[e], i.push(t);
                        return i
                    }.call(this), this.boxes.length)
                    if (this.disabled()) this.resetStyle();
                    else
                        for (i = this.boxes, n = 0, r = i.length; r > n; n++) t = i[n], this.applyStyle(t, !0);
                return this.disabled() || (this.util().addEvent(window, "scroll", this.scrollHandler), this.util().addEvent(window, "resize", this.scrollHandler), this.interval = setInterval(this.scrollCallback, 50)), this.config.live ? new e((a = this, function(e) {
                    var t, n, r, i, o;
                    for (o = [], r = 0, i = e.length; i > r; r++) n = e[r], o.push(function() {
                        var e, r, i, a;
                        for (a = [], e = 0, r = (i = n.addedNodes || []).length; r > e; e++) t = i[e], a.push(this.doSync(t));
                        return a
                    }.call(a));
                    return o
                })).observe(document.body, {
                    childList: !0,
                    subtree: !0
                }) : void 0
            }, i.prototype.stop = function() {
                return this.stopped = !0, this.util().removeEvent(window, "scroll", this.scrollHandler), this.util().removeEvent(window, "resize", this.scrollHandler), null != this.interval ? clearInterval(this.interval) : void 0
            }, i.prototype.sync = function() {
                return e.notSupported ? this.doSync(this.element) : void 0
            }, i.prototype.doSync = function(e) {
                var t, n, r, i, a;
                if (null == e && (e = this.element), 1 === e.nodeType) {
                    for (a = [], n = 0, r = (i = (e = e.parentNode || e).querySelectorAll("." + this.config.boxClass)).length; r > n; n++) t = i[n], o.call(this.all, t) < 0 ? (this.boxes.push(t), this.all.push(t), this.stopped || this.disabled() ? this.resetStyle() : this.applyStyle(t, !0), a.push(this.scrolled = !0)) : a.push(void 0);
                    return a
                }
            }, i.prototype.show = function(e) {
                return this.applyStyle(e), e.className = e.className + " " + this.config.animateClass, null != this.config.callback ? this.config.callback(e) : void 0
            }, i.prototype.applyStyle = function(e, t) {
                var n, r, i, a;
                return r = e.getAttribute("data-wow-duration"), n = e.getAttribute("data-wow-delay"), i = e.getAttribute("data-wow-iteration"), this.animate((a = this, function() {
                    return a.customStyle(e, t, r, n, i)
                }))
            }, i.prototype.animate = "requestAnimationFrame" in window ? function(e) {
                return window.requestAnimationFrame(e)
            } : function(e) {
                return e()
            }, i.prototype.resetStyle = function() {
                var e, t, n, r, i;
                for (i = [], t = 0, n = (r = this.boxes).length; n > t; t++) e = r[t], i.push(e.style.visibility = "visible");
                return i
            }, i.prototype.customStyle = function(e, t, n, r, i) {
                return t && this.cacheAnimationName(e), e.style.visibility = t ? "hidden" : "visible", n && this.vendorSet(e.style, {
                    animationDuration: n
                }), r && this.vendorSet(e.style, {
                    animationDelay: r
                }), i && this.vendorSet(e.style, {
                    animationIterationCount: i
                }), this.vendorSet(e.style, {
                    animationName: t ? "none" : this.cachedAnimationName(e)
                }), e
            }, i.prototype.vendors = ["moz", "webkit"], i.prototype.vendorSet = function(e, t) {
                var n, r, i, a;
                a = [];
                for (n in t) r = t[n], e["" + n] = r, a.push(function() {
                    var t, a, o, s;
                    for (s = [], t = 0, a = (o = this.vendors).length; a > t; t++) i = o[t], s.push(e["" + i + n.charAt(0).toUpperCase() + n.substr(1)] = r);
                    return s
                }.call(this));
                return a
            }, i.prototype.vendorCSS = function(e, t) {
                var n, i, a, o, s, l;
                for (n = (i = r(e)).getPropertyCSSValue(t), o = 0, s = (l = this.vendors).length; s > o; o++) a = l[o], n = n || i.getPropertyCSSValue("-" + a + "-" + t);
                return n
            }, i.prototype.animationName = function(e) {
                var t;
                try {
                    t = this.vendorCSS(e, "animation-name").cssText
                } catch (n) {
                    t = r(e).getPropertyValue("animation-name")
                }
                return "none" === t ? "" : t
            }, i.prototype.cacheAnimationName = function(e) {
                return this.animationNameCache.set(e, this.animationName(e))
            }, i.prototype.cachedAnimationName = function(e) {
                return this.animationNameCache.get(e)
            }, i.prototype.scrollHandler = function() {
                return this.scrolled = !0
            }, i.prototype.scrollCallback = function() {
                var e;
                return !this.scrolled || (this.scrolled = !1, this.boxes = function() {
                    var t, n, r, i;
                    for (i = [], t = 0, n = (r = this.boxes).length; n > t; t++) e = r[t], e && (this.isVisible(e) ? this.show(e) : i.push(e));
                    return i
                }.call(this), this.boxes.length || this.config.live) ? void 0 : this.stop()
            }, i.prototype.offsetTop = function(e) {
                for (var t; void 0 === e.offsetTop;) e = e.parentNode;
                for (t = e.offsetTop; e = e.offsetParent;) t += e.offsetTop;
                return t
            }, i.prototype.isVisible = function(e) {
                var t, n, r, i, a;
                return n = e.getAttribute("data-wow-offset") || this.config.offset, i = (a = window.pageYOffset) + Math.min(this.element.clientHeight, this.util().innerHeight()) - n, t = (r = this.offsetTop(e)) + e.clientHeight, i >= r && t >= a
            }, i.prototype.util = function() {
                return null != this._util ? this._util : this._util = new t
            }, i.prototype.disabled = function() {
                return !this.config.mobile && this.util().isMobile(navigator.userAgent)
            }, i
        }()
    }.call(this),
    function(e, t, n) {
        function r(e, t) {
            return typeof e === t
        }

        function i(e) {
            var t = j.className,
                n = g._config.classPrefix || "";
            if (w && (t = t.baseVal), g._config.enableJSClass) {
                var r = new RegExp("(^|\\s)" + n + "no-js(\\s|$)");
                t = t.replace(r, "$1" + n + "js$2")
            }
            g._config.enableClasses && (t += " " + n + e.join(" " + n), w ? j.className.baseVal = t : j.className = t)
        }

        function a() {
            return "function" != typeof t.createElement ? t.createElement(arguments[0]) : w ? t.createElementNS.call(t, "http://www.w3.org/2000/svg", arguments[0]) : t.createElement.apply(t, arguments)
        }

        function o(e, t) {
            if ("object" == typeof e)
                for (var n in e) _(e, n) && o(n, e[n]);
            else {
                var r = (e = e.toLowerCase()).split("."),
                    a = g[r[0]];
                if (2 == r.length && (a = a[r[1]]), void 0 !== a) return g;
                t = "function" == typeof t ? t() : t, 1 == r.length ? g[r[0]] = t : (!g[r[0]] || g[r[0]] instanceof Boolean || (g[r[0]] = new Boolean(g[r[0]])), g[r[0]][r[1]] = t), i([(t && 0 != t ? "" : "no-") + r.join("-")]), g._trigger(e, t)
            }
            return g
        }

        function s(e) {
            return e.replace(/([a-z])-([a-z])/g, function(e, t, n) {
                return t + n.toUpperCase()
            }).replace(/^-/, "")
        }

        function l(e, n, r, i) {
            var o, s, l, u, c, d = "modernizr",
                p = a("div"),
                f = ((c = t.body) || ((c = a(w ? "svg" : "body")).fake = !0), c);
            if (parseInt(r, 10))
                for (; r--;) l = a("div"), l.id = i ? i[r] : d + (r + 1), p.appendChild(l);
            return (o = a("style")).type = "text/css", o.id = "s" + d, (f.fake ? f : p).appendChild(o), f.appendChild(p), o.styleSheet ? o.styleSheet.cssText = e : o.appendChild(t.createTextNode(e)), p.id = d, f.fake && (f.style.background = "", f.style.overflow = "hidden", u = j.style.overflow, j.style.overflow = "hidden", j.appendChild(f)), s = n(p, e), f.fake ? (f.parentNode.removeChild(f), j.style.overflow = u, j.offsetHeight) : p.parentNode.removeChild(p), !!s
        }

        function u(e, t) {
            return function() {
                return e.apply(t, arguments)
            }
        }

        function c(e) {
            return e.replace(/([A-Z])/g, function(e, t) {
                return "-" + t.toLowerCase()
            }).replace(/^ms-/, "-ms-")
        }

        function d(t, i, o, u) {
            function d() {
                f && (delete O.style, delete O.modElem)
            }
            if (u = !r(u, "undefined") && u, !r(o, "undefined")) {
                var p = function(t, r) {
                    var i = t.length;
                    if ("CSS" in e && "supports" in e.CSS) {
                        for (; i--;)
                            if (e.CSS.supports(c(t[i]), r)) return !0;
                        return !1
                    }
                    if ("CSSSupportsRule" in e) {
                        for (var a = []; i--;) a.push("(" + c(t[i]) + ":" + r + ")");
                        return l("@supports (" + (a = a.join(" or ")) + ") { #modernizr { position: absolute; } }", function(e) {
                            return "absolute" == getComputedStyle(e, null).position
                        })
                    }
                    return n
                }(t, o);
                if (!r(p, "undefined")) return p
            }
            for (var f, h, m, y, g, v = ["modernizr", "tspan", "samp"]; !O.style && v.length;) f = !0, O.modElem = a(v.shift()), O.style = O.modElem.style;
            for (m = t.length, h = 0; m > h; h++)
                if (y = t[h], g = O.style[y], j = y, w = "-", !!~("" + j).indexOf(w) && (y = s(y)), O.style[y] !== n) {
                    if (u || r(o, "undefined")) return d(), "pfx" != i || y;
                    try {
                        O.style[y] = o
                    } catch (e) {}
                    if (O.style[y] != g) return d(), "pfx" != i || y
                } var j, w;
            return d(), !1
        }

        function p(e, t, n, i, a) {
            var o = e.charAt(0).toUpperCase() + e.slice(1),
                s = (e + " " + S.join(o + " ") + o).split(" ");
            return r(t, "string") || r(t, "undefined") ? d(s, t, i, a) : function(e, t, n) {
                var i;
                for (var a in e)
                    if (e[a] in t) return !1 === n ? e[a] : (i = t[e[a]], r(i, "function") ? u(i, n || t) : i);
                return !1
            }(s = (e + " " + b.join(o + " ") + o).split(" "), t, n)
        }

        function f(e, t, r) {
            return p(e, n, n, t, r)
        }
        var h = [],
            m = [],
            y = {
                _version: "3.3.1",
                _config: {
                    classPrefix: "",
                    enableClasses: !0,
                    enableJSClass: !0,
                    usePrefixes: !0
                },
                _q: [],
                on: function(e, t) {
                    var n = this;
                    setTimeout(function() {
                        t(n[e])
                    }, 0)
                },
                addTest: function(e, t, n) {
                    m.push({
                        name: e,
                        fn: t,
                        options: n
                    })
                },
                addAsyncTest: function(e) {
                    m.push({
                        name: null,
                        fn: e
                    })
                }
            },
            g = function() {};
        g.prototype = y, g = new g;
        var v = y._config.usePrefixes ? " -webkit- -moz- -o- -ms- ".split(" ") : ["", ""];
        y._prefixes = v;
        var j = t.documentElement,
            w = "svg" === j.nodeName.toLowerCase();
        w || function(e, t) {
            function n() {
                var e = h.elements;
                return "string" == typeof e ? e.split(" ") : e
            }

            function r(e) {
                var t = f[e[d]];
                return t || (t = {}, p++, e[d] = p, f[p] = t), t
            }

            function i(e, n, i) {
                return n || (n = t), s ? n.createElement(e) : (i || (i = r(n)), !(a = i.cache[e] ? i.cache[e].cloneNode() : c.test(e) ? (i.cache[e] = i.createElem(e)).cloneNode() : i.createElem(e)).canHaveChildren || u.test(e) || a.tagUrn ? a : i.frag.appendChild(a));
                var a
            }

            function a(e) {
                e || (e = t);
                var a, l, u, c, d, p, f = r(e);
                return !h.shivCSS || o || f.hasCSS || (f.hasCSS = (c = "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}", d = (u = e).createElement("p"), p = u.getElementsByTagName("head")[0] || u.documentElement, d.innerHTML = "x<style>" + c + "</style>", !!p.insertBefore(d.lastChild, p.firstChild))), s || (a = e, (l = f).cache || (l.cache = {}, l.createElem = a.createElement, l.createFrag = a.createDocumentFragment, l.frag = l.createFrag()), a.createElement = function(e) {
                    return h.shivMethods ? i(e, a, l) : l.createElem(e)
                }, a.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + n().join().replace(/[\w\-:]+/g, function(e) {
                    return l.createElem(e), l.frag.createElement(e), 'c("' + e + '")'
                }) + ");return n}")(h, l.frag)), e
            }
            var o, s, l = e.html5 || {},
                u = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
                c = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
                d = "_html5shiv",
                p = 0,
                f = {};
            ! function() {
                try {
                    var e = t.createElement("a");
                    e.innerHTML = "<xyz></xyz>", o = "hidden" in e, s = 1 == e.childNodes.length || function() {
                        t.createElement("a");
                        var e = t.createDocumentFragment();
                        return void 0 === e.cloneNode || void 0 === e.createDocumentFragment || void 0 === e.createElement
                    }()
                } catch (e) {
                    o = !0, s = !0
                }
            }();
            var h = {
                elements: l.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",
                version: "3.7.3",
                shivCSS: !1 !== l.shivCSS,
                supportsUnknownElements: s,
                shivMethods: !1 !== l.shivMethods,
                type: "default",
                shivDocument: a,
                createElement: i,
                createDocumentFragment: function(e, i) {
                    if (e || (e = t), s) return e.createDocumentFragment();
                    for (var a = (i = i || r(e)).frag.cloneNode(), o = 0, l = n(), u = l.length; u > o; o++) a.createElement(l[o]);
                    return a
                },
                addElements: function(e, t) {
                    var n = h.elements;
                    "string" != typeof n && (n = n.join(" ")), "string" != typeof e && (e = e.join(" ")), h.elements = n + " " + e, a(t)
                }
            };
            e.html5 = h, a(t), "object" == typeof module && module.exports && (module.exports = h)
        }(void 0 !== e ? e : this, t);
        var Q = "Moz O ms Webkit",
            b = y._config.usePrefixes ? Q.toLowerCase().split(" ") : [];
        y._domPrefixes = b;
        var _, C, A = function() {
            var e = !("onblur" in t.documentElement);
            return function(t, r) {
                var i;
                return !!t && (r && "string" != typeof r || (r = a(r || "div")), !(i = (t = "on" + t) in r) && e && (r.setAttribute || (r = a("div")), r.setAttribute(t, ""), i = "function" == typeof r[t], r[t] !== n && (r[t] = n), r.removeAttribute(t)), i)
            }
        }();
        y.hasEvent = A, g.addTest("video", function() {
            var e = a("video"),
                t = !1;
            try {
                (t = !!e.canPlayType) && ((t = new Boolean(t)).ogg = e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/, ""), t.h264 = e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/, ""), t.webm = e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/, ""), t.vp9 = e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/, ""), t.hls = e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/, ""))
            } catch (e) {}
            return t
        }), _ = r(C = {}.hasOwnProperty, "undefined") || r(C.call, "undefined") ? function(e, t) {
            return t in e && r(e.constructor.prototype[t], "undefined")
        } : function(e, t) {
            return C.call(e, t)
        }, y._l = {}, y.on = function(e, t) {
            this._l[e] || (this._l[e] = []), this._l[e].push(t), g.hasOwnProperty(e) && setTimeout(function() {
                g._trigger(e, g[e])
            }, 0)
        }, y._trigger = function(e, t) {
            if (this._l[e]) {
                var n = this._l[e];
                setTimeout(function() {
                    var e;
                    for (e = 0; e < n.length; e++)(0, n[e])(t)
                }, 0), delete this._l[e]
            }
        }, g._q.push(function() {
            y.addTest = o
        });
        var k = "CSS" in e && "supports" in e.CSS,
            x = "supportsCSS" in e;
        g.addTest("supports", k || x);
        var S = y._config.usePrefixes ? Q.split(" ") : [];
        y._cssomPrefixes = S;
        var E = function(t) {
            var r, i = v.length,
                a = e.CSSRule;
            if (void 0 === a) return n;
            if (!t) return !1;
            if ((r = (t = t.replace(/^@/, "")).replace(/-/g, "_").toUpperCase() + "_RULE") in a) return "@" + t;
            for (var o = 0; i > o; o++) {
                var s = v[o];
                if (s.toUpperCase() + "_" + r in a) return "@-" + s.toLowerCase() + "-" + t
            }
            return !1
        };
        y.atRule = E;
        var I = y.testStyles = l,
            T = {
                elem: a("modernizr")
            };
        g._q.push(function() {
            delete T.elem
        });
        var O = {
            style: T.elem.style
        };
        g._q.unshift(function() {
                delete O.style
            }), y.testProp = function(e, t, r) {
                return d([e], n, t, r)
            }, y.testAllProps = p, y.prefixed = function(e, t, n) {
                return 0 === e.indexOf("@") ? E(e) : (-1 != e.indexOf("-") && (e = s(e)), t ? p(e, t, n) : p(e, "pfx"))
            }, y.testAllProps = f, g.addTest("csstransitions", f("transition", "all", !0)), g.addTest("csstransforms3d", function() {
                var e = !!f("perspective", "1px", !0),
                    t = g._config.usePrefixes;
                if (e && (!t || "webkitPerspective" in j.style)) {
                    var n;
                    g.supports ? n = "@supports (perspective: 1px)" : (n = "@media (transform-3d)", t && (n += ",(-webkit-transform-3d)")), I("#modernizr{width:0;height:0}" + (n += "{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}"), function(t) {
                        e = 7 === t.offsetWidth && 18 === t.offsetHeight
                    })
                }
                return e
            }),
            function() {
                var e, t, n, i, a, o, s;
                for (var l in m)
                    if (m.hasOwnProperty(l)) {
                        if (e = [], (t = m[l]).name && (e.push(t.name.toLowerCase()), t.options && t.options.aliases && t.options.aliases.length))
                            for (n = 0; n < t.options.aliases.length; n++) e.push(t.options.aliases[n].toLowerCase());
                        for (i = r(t.fn, "function") ? t.fn() : t.fn, a = 0; a < e.length; a++) o = e[a], s = o.split("."), 1 === s.length ? g[s[0]] = i : (!g[s[0]] || g[s[0]] instanceof Boolean || (g[s[0]] = new Boolean(g[s[0]])), g[s[0]][s[1]] = i), h.push((i ? "" : "no-") + s.join("-"))
                    }
            }(), i(h), delete y.addTest, delete y.addAsyncTest;
        for (var B = 0; B < g._q.length; B++) g._q[B]();
        e.Modernizr = g
    }(window, document);