jQuery( document ).ready(function($) {
    var wow = new WOW(
        {
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       0,          // distance to the element when triggering the animation (default is 0)
            mobile:       true,       // trigger animations on mobile devices (default is true)
            live:         true,       // act on asynchronously loaded content (default is true)
            callback:     function(box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null // optional scroll container selector, otherwise use window
        }
    );
    wow.init();

    console.log( "ready!" );
    var audio = $('#player_audio').get(0),
        globalPlaying = false;

    $('.audio-control').on('click', function (event) {
        event.preventDefault();
        if(globalPlaying == true){
        audio.pause();
            globalPlaying = false;
        $('.audio-control .fa').toggleClass('hidden');
        } else if(globalPlaying == false){
            audio.play();
            globalPlaying = true;
            $('.audio-control .fa').toggleClass('hidden');
        }
    });
    $('.open-menu-btn').click(function() { // Мобільне меню
        $('.mobileMenuWrap').toggleClass('mobileMenuWrap-showed');
        $('.open-menu-btn').toggleClass('active');
    });

    $('.composition-detail-btn').on('click', function () {
        var target = $(this);
        var detailInfo = target.parent().parent().parent().parent().find('.composition-detail');
        detailInfo.addClass('showed');
        target.hide('normal');
    })

    $('.closeMobileMenu').click(function() {
        $('.mobileMenuWrap').removeClass('mobileMenuWrap-showed');
        $('.open-menu-btn').removeClass('active');
    });
    $('.language').on('click',function () { //Функція для відккриття списку мов
        $(this).find('ul li').toggle();
    });
    $('.close-social-sidebar').on('click', function () {
        $(this).toggleClass('closed');
        $('.social-sidebar-wrapper').animate({width: 'toggle'});
    })

    function showActiveDist() {
        var activeDiscId = $('.discography-list .discography-list__item.active').data('id');
        var discography = $('.discography-active .active-item');
        discography.each(function (i, elem) {
            if($(this).data('id') == activeDiscId) {
                $(this).addClass('active');
                $(this).siblings().removeClass('active');
            }
        });
    }
    showActiveDist();

    $('.discography-list__item').on('click', function () {
        var target = $(this);
        activeDiscId = target.data('id');
        target.addClass('active');
        target.siblings().removeClass('active');

        showActiveDist();
    })

    $('.composition').on('click', function () {
        var target = $(this),
            playing = $('.track-list .playing').find('audio').get(0);
        if(playing != undefined) {
            playing.pause();
            $('.audio-control .fa').toggleClass('hidden');
            playing.currentTime = 0;
        }
        $('.track-list .composition').removeClass('playing');
        target.addClass('playing');
        audio = target.find('audio').get(0);
        audio.play();
        globalPlaying = true;
        $('.audio-control .fa').toggleClass('hidden');
    });

    function isVisible( row, container ){
        var elementTop = $(row).offset().top,
            elementHeight = $(row).height(),
            containerTop = container.scrollTop(),
            containerHeight = container.height();

        return ((((elementTop - containerTop) + elementHeight) > 0) && ((elementTop - containerTop) < containerHeight));
    }
    if(isVisible('.gallery', $(window))){
        $('.gallery').toggleClass('visable');
    };

    $('.gallery_box .gllr_image_block a').fancybox();
});