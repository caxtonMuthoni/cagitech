$(document).ready(function () {

    var path = (window.location.pathname).substr(1);


    if (path === '') {
        path = 'home2'
    }

    $('.js__nav-link').removeClass("navbar__link--active");
    $('#' + path).addClass("navbar__link--active");


    // Current page tracking
    $('.js__nav-link').click(function () {
        $('.js__nav-link').removeClass("navbar__link--active");
        $(this).addClass("navbar__link--active");
    });

    // change navbar on scroll
    $('.js--section-about').waypoint(function (direction) {
        if (direction === "down") {
            $('.nav').addClass('navbar-light')
        } else {
            $('.nav').removeClass('navbar-light')
        }
    }, {
        offset: '300px'
    })

    //    Side menu 

    $('.js--toggle-menu').click(function () {
        console.log("clicked")
        $('.nav').toggleClass('nav__active')
    })

    // Close side menu

    $('#menucontainer').click(function (event) {
        event.stopPropagation();
        $('.nav').removeClass('nav__active')
    });


    /**
 *  Set up jcarousel
 */
    $(function () {
        var id = 0
        $('.jcarousel').jcarousel().on('jcarousel:animateend', function (event, carousel) {
            // var id = $(carousel._visible['0']).index();
            id ++
            console.log(id);
            
            $('.jp-item').removeClass('active');
            $('.jp-item').eq(id).addClass('active');

            if(id == $(carousel._visible).length){
                id = -1
            }

        });
    });


    // set width of item
    $('.jcarousel li').width($('.jcarousel').width());

    // move slider
    $('body').on('click', '.jc-right', function () {
        event.preventDefault();
        $('.jcarousel').jcarousel('scroll', '+=1');
    });

    $('body').on('click', '.jc-left', function () {
        event.preventDefault();
        $('.jcarousel').jcarousel('scroll', '-=1');
    });

    $('body').on('click', '.jp-item', function () {
        event.preventDefault();
        var id = $(this).index();
        $('.jcarousel').jcarousel('scroll', id);
    });
    

   $('.jcarousel').jcarousel({
        transition: true,
        wrap: 'circular',
        animation: {
            duration: 800,
            easing: 'linear',
            complete: function () {
            }
        }
    }).jcarouselAutoscroll({
        interval: 3000,
        target: '+=1',
        autostart: true
    });


    $('.jcarousel-pagination').jcarouselPagination({
        carousel: $('.jcarousel'),
        'perPage': 1,
        item: function(page) {
            return '<a class="jp-item" href=""></a>';
        }
    });



});