$(document).ready(function() {
    $('#sidebarToggle').click(function() {
        $('.col-2').toggleClass('sidebar-hidden');
        if ($('.col-2').hasClass('sidebar-hidden')) {
            $('.col-10').removeClass('col-10').addClass('col-12');
        } else {
            $('.col-12').removeClass('col-12').addClass('col-10');
        }
    });
});