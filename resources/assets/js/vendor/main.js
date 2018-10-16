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

    $('.select2').select2({
        maximumSelectionLength: 3
    })

    $(".button-show").click(function () {
        $(".optional").show(700);
    });

    $(".button-hide").click(function () {
        $(".optional").hide(700);
    });

    $(".button-toggle").click(function () {
        $(".optional").toggle(700);
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
