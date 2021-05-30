$("#project nav ul li").click(function() {
    if (!$(this).hasClass("selected")) {
        $("#project nav ul li.selected").removeClass("selected");
        $(this).addClass("selected");

        projectSwitcher($(this).attr("name"));
    }
});