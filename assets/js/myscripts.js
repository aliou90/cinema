$(document).ready(function() {
    // Afficher la division sélectionnée et cacher les autres
    function afficherDivisionSelectionnee(divisionId) {
        // Cacher toutes les divisions
        $("div[id^='req']").hide();
        
        // Afficher la division sélectionnée
        $(divisionId).show();
    }
    
    // Cacher toutes les divisions sauf la première par défaut
    $("div[id^='req']").not(":first").hide();
    
    // Lorsqu'un lien avec la classe "req-link" est cliqué
    $("a.req-link").click(function(event) {
        event.preventDefault();
        
        // Récupérer l'ID de la division correspondante
        var divisionId = $(this).attr("href");
        
        // Afficher la division sélectionnée et cacher les autres
        afficherDivisionSelectionnee(divisionId);
    });
});


// Menu active -Stylisation
$(document).ready(function() {
    // Appliquer la classe "active" à l'élément sélectionné
    function appliquerStyleActif(elementId) {
        $(".list-group-item").removeClass("active");
        $("#" + elementId).addClass("active");
    }

    // Lorsqu'un lien avec la classe "req-link" est cliqué
    $("a.req-link").click(function(event) {
        event.preventDefault();

        // Récupérer l'ID de l'élément de menu correspondant
        var elementId = $(this).attr("id");

        // Appliquer le style actif à l'élément sélectionné
        appliquerStyleActif(elementId);
    });
});