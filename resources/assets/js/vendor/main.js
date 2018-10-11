// Back To Top
$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('#goTop').fadeIn();
    } else {
        $('#goTop').fadeOut();
    }
});
$('#goTop').click(function () {
    $("html, body").animate({scrollTop: 0}, 600);
    return false;
});

$(document).ready(function () {

    'use strict';

    $(".button-post").click(function () {
        $(".form-post").show(700);
    });

    $(".button-post-close").click(function () {
        $(".form-post").hide(700);
    });

    // ------------------------------------------------------- //
    // Search Box
    // ------------------------------------------------------ //
    $('#search').on('click', function (e) {
        e.preventDefault();
        $('.search-box').fadeIn();
    });
    $('.dismiss').on('click', function () {
        $('.search-box').fadeOut();
    });

    // ------------------------------------------------------- //
    // Adding fade effect to dropdowns
    // ------------------------------------------------------ //
    $('.dropdown').on('show.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeIn();
    });
    $('.dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeOut();
    });

    // ------------------------------------------------------- //
    // Right side navbar
    // ------------------------------------------------------ //
    $("#menu-close").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper-home").toggleClass("active");
    });
    $("#menu-toggle-right").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper-home").toggleClass("active");
    });

    //Auto height textarea
    $.each($('.textarea--autoHeight'), function () {
        var offset = this.offsetHeight - this.clientHeight;
        var resizeTextarea = function resizeTextarea(el) {
            $(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };
        $(this).on('keyup input', function () {
            resizeTextarea(this);
        }).removeAttr('data-autoresize');
    });

});

// ------------------------------------------------------- //
// Extend window in fullscreen
// ------------------------------------------------------ //
// function toggleFullScreen(elem) {
//     if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
//         if (elem.requestFullScreen) {
//             elem.requestFullScreen();
//         } else if (elem.mozRequestFullScreen) {
//             elem.mozRequestFullScreen();
//         } else if (elem.webkitRequestFullScreen) {
//             elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
//         } else if (elem.msRequestFullscreen) {
//             elem.msRequestFullscreen();
//         }
//     } else {
//         if (document.cancelFullScreen) {
//             document.cancelFullScreen();
//         } else if (document.mozCancelFullScreen) {
//             document.mozCancelFullScreen();
//         } else if (document.webkitCancelFullScreen) {
//             document.webkitCancelFullScreen();
//         } else if (document.msExitFullscreen) {
//             document.msExitFullscreen();
//         }
//     }
// }
