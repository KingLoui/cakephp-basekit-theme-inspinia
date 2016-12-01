
$(document).ready(function () {


    // Add body-small class if window less than 768px
    if ($(this).width() < 769) {
        $('body').addClass('body-small')
    } else {
        $('body').removeClass('body-small')
    }

    // MetisMenu
    $('#side-menu').metisMenu();

    // Collapse ibox function
    $('.collapse-link').on('click', function () {
        var ibox = $(this).closest('div.ibox');
        var button = $(this).find('i');
        var content = ibox.find('div.ibox-content');
        content.slideToggle(200);
        button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        ibox.toggleClass('').toggleClass('border-bottom');
        setTimeout(function () {
            ibox.resize();
            ibox.find('[id^=map-]').resize();
        }, 50);
    });

    // Close ibox function
    $('.close-link').on('click', function () {
        var content = $(this).closest('div.ibox');
        content.remove();
    });

    // Fullscreen ibox function
    $('.fullscreen-link').on('click', function () {
        var ibox = $(this).closest('div.ibox');
        var button = $(this).find('i');
        $('body').toggleClass('fullscreen-ibox-mode');
        button.toggleClass('fa-expand').toggleClass('fa-compress');
        ibox.toggleClass('fullscreen');
        setTimeout(function () {
            $(window).trigger('resize');
        }, 100);
    });

    // Close menu in canvas mode
    $('.close-canvas-menu').on('click', function () {
        $("body").toggleClass("mini-navbar");
        animateMenu();
    });

    // Run menu of canvas
    $('body.canvas-menu .sidebar-collapse').slimScroll({
        height: '100%',
        railOpacity: 0.9
    });





    // // Append config box / Only for demo purpose
    // // Uncomment on server mode to enable XHR calls
    // $.get("skin-config.html", function (data) {
    //     if (!$('body').hasClass('no-skin-config'))
    //         $('body').append(data);
    // });

    // Minimalize menu
    $('.navbar-minimalize, .overlay').on('click', function () {
        $("body").toggleClass("mini-navbar");
        animateMenu();

    });



    // Full height of sidebar
    function fix_height() {
        var heightWithoutNavbar = $("body > #wrapper").height() - 61;
        $(".sidebard-panel").css("min-height", heightWithoutNavbar + "px");

        var navbarHeigh = $('nav.navbar-default').height();
        var wrapperHeigh = $('#page-wrapper').height();

        if (navbarHeigh > wrapperHeigh) {
            $('#page-wrapper').css("min-height", navbarHeigh + "px");
        }

        if (navbarHeigh < wrapperHeigh) {
            $('#page-wrapper').css("min-height", $(window).height() + "px");
        }

        if ($('body').hasClass('fixed-nav')) {
            if (navbarHeigh > wrapperHeigh) {
                $('#page-wrapper').css("min-height", navbarHeigh - 60 + "px");
            } else {
                $('#page-wrapper').css("min-height", $(window).height() - 60 + "px");
            }
        }

    }

    fix_height();

    // Fixed Sidebar
    $(window).bind("load", function () {
        if ($("body").hasClass('fixed-sidebar')) {
            $('.sidebar-collapse').slimScroll({
                height: '100%',
                railOpacity: 0.9
            });
        }
    });

    // Move right sidebar top after scroll
    $(window).scroll(function () {
        if ($(window).scrollTop() > 0 && !$('body').hasClass('fixed-nav')) {
            $('#right-sidebar').addClass('sidebar-top');
        } else {
            $('#right-sidebar').removeClass('sidebar-top');
        }
    });

    $(window).bind("load resize scroll", function () {
        if (!$("body").hasClass('body-small')) {
            fix_height();
        }
    });

    $("[data-toggle=popover]")
        .popover();

    // Add slimscroll to element
    $('.full-height-scroll').slimscroll({
        height: '100%'
    })

    // Local Storage functions
    // Set proper body class and plugins based on user configuration
    loadLocalThemeSettings()

});


// Minimalize menu when screen is less than 768px
$(window).bind("resize", function () {
    if ($(this).width() < 769) {
        $('body').addClass('body-small')
    } else {
        $('body').removeClass('body-small')
    }
});



function loadLocalThemeSettings() {
    if (localStorageSupport()) {

        var collapse = localStorage.getItem("collapse_menu");
        var fixedsidebar = localStorage.getItem("fixedsidebar");
        var fixednavbar = localStorage.getItem("fixednavbar");
        var fixednavbar2 = localStorage.getItem("fixednavbar2");
        var boxedlayout = localStorage.getItem("boxedlayout");
        var fixedfooter = localStorage.getItem("fixedfooter");
        var animationfade = localStorage.getItem("animationfade");
        var animationpush = localStorage.getItem("animationpush");
        var animationreveal = localStorage.getItem("animationreveal");
        var skin1 = localStorage.getItem("skin1");
        var skin2 = localStorage.getItem("skin2");
        var skin3 = localStorage.getItem("skin3");

        var body = $('body');

        if (fixedsidebar == 'on') {
            body.addClass('fixed-sidebar');
            $('.sidebar-collapse').slimScroll({
                height: '100%',
                railOpacity: 0.9
            });
        }
        if (collapse == 'on') {
            if (body.hasClass('fixed-sidebar')) {
                if (!body.hasClass('body-small')) {
                    body.addClass('mini-navbar');
                }
            } else {
                if (!body.hasClass('body-small')) {
                    body.addClass('mini-navbar');
                }

            }
        }
        if (animationpush == 'on'){
            body.addClass('sidebar-push');
        }
        if (animationreveal == 'on') {
            body.addClass('sidebar-reveal');
        }
        if (fixednavbar == 'on') {
            $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
            body.addClass('fixed-nav');
        }
        if (fixednavbar2 == 'on') {
            $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
            $("body").removeClass('boxed-layout');
            $("body").addClass('fixed-nav').addClass('fixed-nav-basic');
        }
        if (boxedlayout == 'on') {
            body.addClass('boxed-layout');
        }
        if (fixedfooter == 'on') {
            $(".footer").addClass('fixed');
        }
        if (skin1 == 'on')
            body.addClass('skin-1');
        if (skin2 == 'on')
            body.addClass('skin-2');
        if (skin3 == 'on')
            body.addClass('skin-3');
    }
}


// check if browser support HTML5 local storage
function localStorageSupport() {
    return (('localStorage' in window) && window['localStorage'] !== null)
}

// For demo purpose - animation css script
function animationHover(element, animation) {
    element = $(element);
    element.hover(
        function () {
            element.addClass('animated ' + animation);
        },
        function () {
            //wait for animation to finish before removing classes
            window.setTimeout(function () {
                element.removeClass('animated ' + animation);
            }, 2000);
        });
}

function animateMenu(){
    if($('body').hasClass('body-small')) {
        // small viewport
        if(!$('body').hasClass('mini-navbar') ) {
            // hide

            $('#side-menu, .navbar-static-side').css('overflow', 'hidden');

            if($('body').hasClass('fixed-sidebar') && !$('body').hasClass('sidebar-reveal') && !$('body').hasClass('sidebar-push'))
                hideMenuContent();
            else if(!$('body').hasClass('fixed-sidebar') && !$('body').hasClass('sidebar-reveal') && !$('body').hasClass('sidebar-push'))
                hideMenuContent();
            else
                removeMenuStyles(); 
        } else {
            // show

            setTimeout(function () {
                $('#side-menu, .navbar-static-side').css('overflow', 'visible');
            }, 400);

            if($('body').hasClass('fixed-sidebar') && !$('body').hasClass('sidebar-reveal') && !$('body').hasClass('sidebar-push'))
                hideMenuContent();
            else if(!$('body').hasClass('fixed-sidebar') && !$('body').hasClass('sidebar-reveal') && !$('body').hasClass('sidebar-push')) 
                hideMenuContent();
            else if(!$('body').hasClass('fixed-sidebar'))
                removeMenuStyles();
        }
    } else {
        // big viewport
        if(!$('body').hasClass('mini-navbar') ) {
            // show

            if($('body').hasClass('fixed-sidebar') && !$('body').hasClass('sidebar-reveal') && !$('body').hasClass('sidebar-push'))
                hideMenuContent();
            else if(!$('body').hasClass('fixed-sidebar'))
                hideMenuLabels();
        } else { 
            // hide
            
            if($('body').hasClass('fixed-sidebar') && !$('body').hasClass('sidebar-reveal') && !$('body').hasClass('sidebar-push'))
                hideMenuContent();
            else
                removeMenuStyles();
        }
    }
}

function hideMenuContent () {
    $('#side-menu').hide();
    // For smoothly turn on menu
    setTimeout(function () {
        $('#side-menu').fadeIn(400);
    }, 200);
}
function hideMenuLabels () {
    $('#side-menu .nav-label, #side-menu .arrow,#side-menu .label,#side-menu li.active ul').hide();
    // For smoothly turn on menu
    setTimeout(function () {
        $('#side-menu .nav-label, #side-menu .arrow, #side-menu .label,#side-menu li.active ul').fadeIn(400);
    }, 200);
}
function removeMenuStyles() {
    $('#side-menu,#side-menu .nav-label,#side-menu .arrow,#side-menu .label,#side-menu li.active ul').removeAttr('style');
}


// Dragable panels
function WinMove() {
    var element = "[class*=col]";
    var handle = ".ibox-title";
    var connect = "[class*=col]";
    $(element).sortable(
        {
            handle: handle,
            connectWith: connect,
            tolerance: 'pointer',
            forcePlaceholderSize: true,
            opacity: 0.8
        })
        .disableSelection();
}

