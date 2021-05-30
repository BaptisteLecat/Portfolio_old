var selected_next = null;

$(".card-info .picture_container button img").click(function() {
    //Reset timeout delay if an img was selected before.
    if (selected_next != null) {
        clearTimeout(selected_next);
        //Reset state for all the img. (src)
        $(".draggablecard-info .picture_container button img").attr(
            "src",
            "assets/icons/next.svg"
        );
    }
    //Set selected state for the selected img.
    $(this).attr("src", "assets/icons/next_selected.svg");

    //Step can be "Next" or "Previous"
    var step = $(this).parent().attr("name");
    //Call AJAX switcher function.
    activitySwitcher($(this).parent().parent().parent(), step);
    //Reset state after 1 second.
    selected_next = setTimeout(() => {
        $(this).attr("src", "assets/icons/next.svg");
    }, 1000);
});