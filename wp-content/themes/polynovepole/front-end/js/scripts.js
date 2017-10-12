jQuery( document ).ready(function($) {
    console.log( "ready!" );
    var audio = $('#player_audio').get(0),
        playing = false;

    $('#audio-control').on('click', function (event) {
        event.preventDefault();
        if(playing == true){
        audio.pause();
        playing = false;
        $('#audio-control .fa').toggleClass('hidden');
        } else if(playing == false){
            audio.play();
            playing = true;
            $('#audio-control .fa').toggleClass('hidden');
        }
    });
    $('.open-menu-btn').click(function() { // Мобільне меню
        $('.mobileMenuWrap').toggleClass('mobileMenuWrap-showed');
        $('.open-menu-btn').toggleClass('active');
    });

    $('.closeMobileMenu').click(function() {
        $('.mobileMenuWrap').removeClass('mobileMenuWrap-showed');
        $('.open-menu-btn').removeClass('active');
    });
    $('.language').on('click',function () { //Функція для відккриття списку мов
        $(this).find('.language-dropdown').toggle();
    });
    $('.close-social-sidebar').on('click', function () {
        $(this).toggleClass('closed');
        $('.social-sidebar-wrapper').animate({width: 'toggle'});
    })
});