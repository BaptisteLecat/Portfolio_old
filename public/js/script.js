$(".draggable-component").draggable();
$(".draggable-component").mousedown(function() {
    console.log("clicked!");
    $(".draggable-component").removeClass("dragged");
    $(this).addClass("dragged"); //Give z-index to the element.
});

$(document).ready(function() {
    $(".draggable-component").css("position", "absolute");

    //Je dois récupérer la largeur et la hauteur de l'espace d'affichage
    var windowWidth = document.body.clientWidth;
    var windowHeight = document.body.clientHeight;
    console.log(windowHeight);
    //La largeur et la hauteur de mon élément
    $(".draggable-component").each(function() {
        var elementWidth = $(this).outerWidth(true);
        var elementHeight = $(this).outerHeight(true);

        //Positionnement X(largeur) Générer un nombre int aléatoire compris entre 0 et la largeur ecran - largeur élément.
        var Xposition =
            Math.floor(Math.random() * ((windowWidth - elementWidth) + 1));
        //Positionnement Y(hauteur) Générer un nombre int aléatoire compris entre 0 et hauteur ecran - hauteur élément.
        var Yposition =
            Math.floor(Math.random() * ((windowHeight - elementHeight) + 1));
        console.log(Yposition + " " + elementHeight);
        $(this).css("left", Xposition);
        $(this).css("top", Yposition);
    });

});