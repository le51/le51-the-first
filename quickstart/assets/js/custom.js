$(".model").click(function(event){
     event.preventDefault();
    $.ajax({

       url : 'webtools.php?_url=/models/generate', // La ressource ciblée
       type : 'GET', // Le type de la requête HTTP
       dataType : 'html',
       success : function(data, statut){
           $( ".ajax" ).html( data ); // On passe code_html à jQuery() qui va nous créer l'arbre DOM !
           //alert( "Load was performed." );
       },


    }).done(setupModel);
});


function setupModel() {
    $("#model").submit(function(e){ // On sélectionne le formulaire par son identifiant
        e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
        var donnees = $(this).serialize(); // On créer une variable content le formulaire sérialisé
        $.ajax({
            url : 'webtools.php?_url=/models/generate', // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP
            dataType : 'html',
            data : donnees,
            success : function(data, statut){
               $( "form" ).before( '<div class="alert alert-success fade-in">The model was generated successfully.</div>' ); // On passe code_html à jQuery() qui va nous créer l'arbre DOM !
               //alert( "Created" );
            },
        }).done(hideFlash);
    });
}

$(".scaffold").click(function(event){
     event.preventDefault();
    $.ajax({

       url : 'webtools.php?_url=/scaffold/generate', // La ressource ciblée
       type : 'GET', // Le type de la requête HTTP
       dataType : 'html',
       success : function(data, statut){
           $( ".ajax" ).html( data ); // On passe code_html à jQuery() qui va nous créer l'arbre DOM !
           //alert( "Load was performed." );
       },


    }).done(setupScaffold);
});


function setupScaffold() {
    $("#scaffold").submit(function(e){ // On sélectionne le formulaire par son identifiant
        e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
        var donnees = $(this).serialize(); // On créer une variable content le formulaire sérialisé
        $.ajax({
            url : 'webtools.php?_url=/scaffold/generate', // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP
            dataType : 'html',
            data : donnees,
            success : function(data, statut){
               $( "form" ).before( '<div class="alert alert-success fade-in">The scaffold was generated successfully.</div>' ); // On passe code_html à jQuery() qui va nous créer l'arbre DOM !
               //alert( "Created" );
            },
        }).done(hideFlash);
    });
}

function hideFlash(){
    $(".fade-in").fadeOut('slow')
}

$(document).ready(function() {
  $('#fieldIntro').summernote({
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,
    toolbar: [
        // [groupName, [list of button]]
        ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['picture', 'video', 'hr', 'table', 'link']]
    ]
  });
  $('#fieldBody').summernote({
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,
  });
});

$(document).ready(function() {
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });
});
