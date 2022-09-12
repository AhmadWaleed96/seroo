$(function(){

    $(document).on("mouseover", ".packages .package", function(){

        $(this).addClass("hover");

    });

    $(document).on("mouseout", ".packages .package", function(){

        $(this).removeClass("hover");

    });

});