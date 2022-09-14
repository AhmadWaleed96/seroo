$(function(){

    $(document).on("mouseover", ".packages .package", function(){

        $(this).addClass("hover");

    });

    $(document).on("mouseout", ".packages .package", function(){

        $(this).removeClass("hover");

    });

    $(document).on("click", ".package-block .package-close", function(){

        $(".pack-block-parent").removeClass("active");

    });

    $(document).on("click", ".packages .package", function(){

        $(".pack-block-parent").addClass("active");

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