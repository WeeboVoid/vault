$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
$("#menu-toggle-2").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled-2");
    $('#menu').find('ul').hide();
});

function initMenu() {
    var menuSelector = $('#menu');
    var subMenSelector = $('.insidenavsubmenu');


    subMenSelector.find('.secondlevelUL').hide();
    menuSelector.find('.insidenavsubmenu').hide();

    subMenSelector.find('.secondlevelUL').children('.current').parent().show();
    menuSelector.find('.insidenavsubmenu').children('.current').parent().show();


    menuSelector.find('li a').click(
        function () {
            var checkElement = $(this).next();
            if ((checkElement.is('.insidenavsubmenu')) && (checkElement.is(':visible'))) {
                menuSelector.find('.insidenavsubmenu:visible').slideUp('normal');
                return false;
            }

            else if ((checkElement.is('.insidenavsubmenu')) && (!checkElement.is(':visible'))) {
                menuSelector.find('.insidenavsubmenu:visible').slideUp('normal');
                checkElement.slideDown('normal');
                return false;
            }
        }
    );

    subMenSelector.find('li a').click(
        function () {
            var checkElement = $(this).next();
            if ((checkElement.is('.secondlevelUL')) && (checkElement.is(':visible'))) {
                subMenSelector.find('.secondlevelUL:visible').slideUp('normal');
                return false;
            }
            else if ((checkElement.is('.secondlevelUL')) && (!checkElement.is(':visible'))) {
                subMenSelector.find('.secondlevelUL:visible').slideUp('normal');
                checkElement.slideDown('normal');
                return false;
            }
        }
    );
    menuSelector.mouseleave(
        function () {
            var checkElement = $(this).find('li a').next();
            if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                $('#menu').find('ul:visible').slideUp('normal');
                return false;
            }
        }
    );
}


$(document).ready(function () {
    initMenu();
});