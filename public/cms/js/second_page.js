$(document).on("click", ".btn-group button", function(){
    $(".btn-group button.active").removeClass("active");
    $(this).addClass("active");
});