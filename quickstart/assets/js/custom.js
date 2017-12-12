$(".generate").click(function(event){
     event.preventDefault();
    $.ajax({
        
       url : 'webtools.php?_url=/scaffold/generate', // La ressource ciblée
       type : 'GET', // Le type de la requête HTTP
       dataType : 'html',
       success : function(data, statut){
           $( ".ajax" ).html( data ); // On passe code_html à jQuery() qui va nous créer l'arbre DOM !
           //alert( "Load was performed." );
       },
       
        
    }).done(setupForm);
});


function setupForm() {
    $("#generate").submit(function(e){ // On sélectionne le formulaire par son identifiant
        e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
        var donnees = $(this).serialize(); // On créer une variable content le formulaire sérialisé
        $.ajax({
            url : 'webtools.php?_url=/scaffold/generate', // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP
            dataType : 'html',
            data : donnees,
            success : function(data, statut){
               $( "form" ).before( '<div class="alert alert-success fade-in">The migration was generated successfully.</div>' ); // On passe code_html à jQuery() qui va nous créer l'arbre DOM !
               //alert( "Created" );
            },
        }).done(hideFlash);
    });
}

function hideFlash(){
    $(".fade-in").fadeOut('slow')
}
