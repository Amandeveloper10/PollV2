if ($(window).width() < 767){
$(".mobile_collapse").click(function() {
    $(".ks-sidebar-mobile-toggle").toggleClass('ks-open');
    $(".ks-sidebar").toggleClass('ks-open');
});
}

// subheader shadow
if ($(window).width() > 10){
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1){
            $('.ks-page-header').addClass('shadoww');
        }
        else{                
            $('.ks-page-header').removeClass('shadoww');
        }
    });
}
else {
    $('.ks-page-header').removeClass('shadoww');
}            