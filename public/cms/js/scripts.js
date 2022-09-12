// Scripts


window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function() {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function(responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});


$(function() {
    $('input[name="birthdate"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        },
        function(start, end, label) {
            var years = moment().diff(start, 'years');
            alert("You are " + years + " years old.");
        });
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

$('.datepicker.input-daterange').datepicker({
    format: "dd/mm/yyyy",
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
    defaultViewDate: { year: 1977, month: 04, day: 25 },
    container: 'body'
});

$(".hover").mouseleave(
    function() {
        $(this).removeClass("hover");
    }
);