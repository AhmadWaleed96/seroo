$(function() {

    $(document).on("mouseover", ".packages .package", function() {
        $(this).addClass("hover");
    });

    $(document).on("mouseout", ".packages .package", function() {
        $(this).removeClass("hover");
    });

    $(document).on("click", ".btn-group button", function() {
        $(".btn-group button.active").removeClass("active");
        $(this).addClass("active");
    });

    $(document).on("click", "a.dropdown-toggle-sp", function(event) {
        if ($(this).parent().children("ul.dropdown-menu-sp").attr("class").includes("show")) {
            $("ul.dropdown-menu-sp.show").removeClass("show");
        } else {
            $("ul.dropdown-menu-sp.show").removeClass("show");
            $(this).parent().children("ul.dropdown-menu-sp").addClass("show");
        }
    });

    $(document).on("click", function(event) {
        var close = true;
        var element = "ul.dropdown-menu-sp.show";
        if ($(event.target).attr("class")) {
            if ($(event.target).prop("tagName").toLowerCase() == "ul" && $(event.target).attr("class").toString().includes("dropdown-menu-sp")) close = false;
            if ($(event.target).prop("tagName").toLowerCase() == "a" && $(event.target).attr("class").toString().includes("dropdown-toggle-sp")) close = false;
        }
        if ($(event.target).parents("ul")) {
            if ($(event.target).parents("ul").eq(0).attr("class")) {
                if ($(event.target).parents("ul").eq(0).attr("class").toString().includes("dropdown-menu-sp")) close = false;
            }
        }
        if (close == true) $(element).removeClass("show");
    });

    $(document).on("click", ".dropdown-menu-sp.show .positive_btn", function(event) {
        var element = $(this).parent().children(".num_parent").children(".num");
        var val = parseInt(element.text(), 10);
        if (isNaN(val)) val = 0;
        element.text(++val);
        var adults_num = $(this).parents(".dropdown-menu-sp").children(".li_parent.adults").children(".num_parent").children(".num").text();
        var children_num = $(this).parents(".dropdown-menu-sp").children(".li_parent.children").children(".num_parent").children(".num").text();
        var rooms_num = $(this).parents(".dropdown-menu-sp").children(".li_parent.rooms").children(".num_parent").children(".num").text();
        $(this).parents("ul.dropdown-menu-sp").eq(0).parent().children("a.dropdown-toggle-sp").children("span.adults_num").text(adults_num);
        $(this).parents("ul.dropdown-menu-sp").eq(0).parent().children("a.dropdown-toggle-sp").children("span.children_num").text(children_num);
        $(this).parents("ul.dropdown-menu-sp").eq(0).parent().children("a.dropdown-toggle-sp").children("span.rooms_num").text(rooms_num);
    });

    $(document).on("click", ".dropdown-menu-sp.show .minus_btn", function(event) {
        var element = $(this).parent().children(".num_parent").children(".num");
        var val = parseInt(element.text(), 10);
        if (isNaN(val)) val = 1;
        var result = (val - 1) < 0 ? 0 : (val - 1);
        element.text(result);
        var adults_num = $(this).parents(".dropdown-menu-sp").children(".li_parent.adults").children(".num_parent").children(".num").text();
        var children_num = $(this).parents(".dropdown-menu-sp").children(".li_parent.children").children(".num_parent").children(".num").text();
        var rooms_num = $(this).parents(".dropdown-menu-sp").children(".li_parent.rooms").children(".num_parent").children(".num").text();
        $(this).parents("ul.dropdown-menu-sp").eq(0).parent().children("a.dropdown-toggle-sp").children("span.adults_num").text(adults_num);
        $(this).parents("ul.dropdown-menu-sp").eq(0).parent().children("a.dropdown-toggle-sp").children("span.children_num").text(children_num);
        $(this).parents("ul.dropdown-menu-sp").eq(0).parent().children("a.dropdown-toggle-sp").children("span.rooms_num").text(rooms_num);
    });

    $('#start-end.datepicker.input-daterange').datepicker({
        format: "📅 dd/mm/yyyy",
        startDate: "0d",
        todayBtn: "linked",
        orientation: "bottom auto",
        todayHighlight: true,
        beforeShowMonth: function(date) {
            if (date.getMonth() == 8) {
                return false;
            }
        },
        beforeShowYear: function(date) {
            if (date.getFullYear() == 2007) {
                return false;
            }
        },
        toggleActive: true,
        defaultViewDate: { year: 2022, month: 09, day: 13 },
        container: '#start-end.datepicker.input-daterange'
    });

    $('#leave-return.datepicker.input-daterange').datepicker({
        format: "📅 dd/mm/yyyy",
        startDate: "0d",
        todayBtn: "linked",
        orientation: "bottom auto",
        todayHighlight: true,
        beforeShowMonth: function(date) {
            if (date.getMonth() == 8) {
                return false;
            }
        },
        beforeShowYear: function(date) {
            if (date.getFullYear() == 2007) {
                return false;
            }
        },
        toggleActive: true,
        defaultViewDate: { year: 2022, month: 09, day: 13 },
        container: '#leave-return.datepicker.input-daterange'
    });

    $('#hotel-date.datepicker.input-daterange').datepicker({
        format: "📅 dd/mm/yyyy",
        startDate: "0d",
        todayBtn: "linked",
        orientation: "bottom auto",
        todayHighlight: true,
        beforeShowMonth: function(date) {
            if (date.getMonth() == 8) {
                return false;
            }
        },
        beforeShowYear: function(date) {
            if (date.getFullYear() == 2007) {
                return false;
            }
        },
        toggleActive: true,
        defaultViewDate: { year: 2022, month: 09, day: 13 },
        container: '#hotel-date.datepicker.input-daterange'
    });

    $('#transport-date.datepicker.input-daterange').datepicker({
        format: "📅 dd/mm/yyyy",
        startDate: "0d",
        todayBtn: "linked",
        orientation: "bottom auto",
        todayHighlight: true,
        beforeShowMonth: function(date) {
            if (date.getMonth() == 8) {
                return false;
            }
        },
        beforeShowYear: function(date) {
            if (date.getFullYear() == 2007) {
                return false;
            }
        },
        toggleActive: true,
        defaultViewDate: { year: 2022, month: 09, day: 13 },
        container: '#transport-date.datepicker.input-daterange'
    });

    $(document).on("click", ".nav-pills.stars-list li", function() {
        $(".nav-pills.stars-list li button.nav-link").removeClass("active");
        for (let i = 0; i <= $(this).index(); i++) {
            $(".nav-pills.stars-list li button.nav-link").eq(i).addClass("active");
        }
    });

    window.onload = function() {
        slideOne();
        slideTwo();
    }
    window.onload = function() {
        slideOne();
        slideTwo();
    }
    $(document).ready(function() {
        slideOne();
        slideTwo();
    });
    $(window).on("load", function() {
        slideOne();
        slideTwo();
    });
    $(".wrapper").ready(function() {
        slideOne();
        slideTwo();
    });
    $(".wrapper").on("load", function() {
        slideOne();
        slideTwo();
    });
    $(document).on("click", ".nav.nav-tabs .nav-link", function(event) {
        slideOne();
        slideTwo();
    });

    var isDragging = false;
    $(".wrapper input.dbl-range-input").mousedown(function() {
        isDragging = true;
    }).mousemove(function() {
        if (isDragging) {
            slideOne();
            slideTwo();
        }
    }).mouseup(function() {
        isDragging = false;
    });

    var istouchDragging = false;
    $(document).on("touchstart", ".wrapper input.dbl-range-input", function(event) {
        istouchDragging = true;
    });
    $(document).on("touchmove", ".wrapper input.dbl-range-input", function(event) {
        if (istouchDragging) {
            slideOne();
            slideTwo();
        }
    });
    $(document).on("touchend", ".wrapper input.dbl-range-input", function(event) {
        istouchDragging = false;
    });

    let sliderOne = document.getElementById("slider-1");
    let sliderTwo = document.getElementById("slider-2");
    let displayValOne = document.getElementById("range1");
    let displayValTwo = document.getElementById("range2");
    let minGap = 0;
    let sliderTrack = document.querySelector(".slider-track");
    let sliderMaxValue = document.getElementById("slider-1").max;

    function slideOne() {
        if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
            sliderOne.value = parseInt(sliderTwo.value) - minGap;
        }
        var timer = "AM";
        var res = sliderOne.value / 2;
        res = res < 1 ? res + 12 : res;
        if (res >= 13) {
            res = res - 12;
            timer = "PM";
        }
        displayValOne.textContent = res + " " + timer;
        fillColor();
    }

    function slideTwo() {
        if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
            sliderTwo.value = parseInt(sliderOne.value) + minGap;
        }
        var timer = "AM";
        var res = sliderTwo.value / 2;
        res = res < 1 ? res + 12 : res;
        if (res >= 13) {
            res = res - 12;
            timer = "PM";
        }
        displayValTwo.textContent = res + " " + timer;
        fillColor();
    }

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

});