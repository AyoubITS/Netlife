$(document).ready(function()
{


  var  $pseudo = $('#pseudo'),
       $motDePasse = $('#motDePasse'),
       $confirmation = $('#confirmation'),
       $mail = $('#email'),
       $sexe = $('#sexe'),
       $erreur = $('#error'),
       $Remdp = $('ReMDP'),
       $bio = $('bio'),


       $champ.keyup(function(){
           if($($pseudo).val().length < 5){ // si la chaîne de caractères est inférieure à 5
               $(this).css({ // on rend le champ rouge
                   borderColor : 'red',
       	           color : 'red'
               });
            }
            else{
                $(this).css({ // si tout est bon, on le rend vert
       	     borderColor : 'green',
       	     color : 'green'
       	 });
            }
       });



    // Le code jQuery ici !
});
