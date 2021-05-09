$(".draggable-component").draggable();
$(".draggable-component").mousedown(function() {
    console.log("clicked!");
    $(".draggable-component").removeClass("dragged");
    $(this).addClass("dragged"); //Give z-index to the element.
});