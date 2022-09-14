$(function() {

    $(document).on("mouseover", ".packages .package", function() {

        $(this).addClass("hover");

    });

    $(document).on("mouseout", ".packages .package", function() {

        $(this).removeClass("hover");

    });

});

function fillColor() {
    percent1 = (sliderOne.value / sliderMaxValue) * 100;
    percent2 = (sliderTwo.value / sliderMaxValue) * 100;
    sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
}

$(document).on("click", ".next-previous .npbtn.next-btn:not([disabled])", function(event) {

    var clicked_tab = $(this).parents(".tab-pane.fade").index();
    $(".tab-pane.fade").removeClass("show").removeClass("active");
    $(".nav.nav-tabs .nav-link").removeClass("active");
    $(".tab-pane.fade").eq(++clicked_tab).addClass("show").addClass("active");
    $(".nav.nav-tabs .nav-link").eq(clicked_tab).addClass("active");

});

$(document).on("click", ".next-previous .npbtn.previous-btn:not([disabled])", function(event) {

    var clicked_tab = $(this).parents(".tab-pane.fade").index();
    $(".tab-pane.fade").removeClass("show").removeClass("active");
    $(".nav.nav-tabs .nav-link").removeClass("active");
    $(".tab-pane.fade").eq(--clicked_tab).addClass("show").addClass("active");
    $(".nav.nav-tabs .nav-link").eq(clicked_tab).addClass("active");

});

$(document).on("click", ".page-nav .trans-parent:not(.active) .translation", function(event) {
    $(this).parents(".trans-parent").addClass("active");
});

$(document).on("click", ".page-nav .trans-parent.active .translation", function(event) {
    $(this).parents(".trans-parent").removeClass("active");
});

$(document).on("click", ".page-nav .trans-parent.active .trans-selection .trans-select", function(event) {
    $(".page-nav .trans-parent.active .translation").html($(this).html());
    $(this).parents(".trans-parent").removeClass("active");
});