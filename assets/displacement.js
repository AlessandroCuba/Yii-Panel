function displacement(id) {
    var panel = $("#body-" + id);
    var icon = $("#icon-" + id);

    if(panel.css("display") === "block") {
        icon.attr("title", "Open");
        icon.removeClass("fa-minus-square-o");
        icon.addClass("fa-plus-square-o");
        //$("#icon-" + id).toggleClass("fa-minus-square-o", "fa-plus-square-o");
    } else {
        icon.attr("title", "Closed");
        icon.removeClass("fa-plus-square-o");
        icon.addClass("fa-minus-square-o");
        //$("#icon-" + id).toggleClass("fa-minus-square-o", "fa-plus-square-o");
    }
    panel.slideToggle("slow");
}