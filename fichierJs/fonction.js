document.forms["inscription"].addEventListener("submit", function(e) {
 
	var erreur;
 
	var inputs = this;
 
	// Traitement cas par cas (input unique)
	if (inputs["email"].value != "primfx@p.com") {
		erreur = "Adresse email incorrecte";
    }
    
    
 
	// Traitement générique
	for (var i = 0; i < inputs.length; i++) {
		console.log(inputs[i]);
		if (!inputs[i].value) {
			erreur = "Veuillez renseigner tous les champs";
			break;
		}
	}
 
	if (erreur) {
		e.preventDefault();
		document.getElementById("erreur").innerHTML = erreur;
		return false;
	} else {
		alert('Formulaire envoyé !');
	}
	
});

document.forms["inscription"]["email2"].addEventListener("input", function() {
	var paragrapheErreur = document.getElementById("erreur");
 
	if (this.value != document.getElementById("email").value) {
		paragrapheErreur.innerHTML = "Les deux adresses email ne correspondent pas";
	} else {
		paragrapheErreur.innerHTML = "";
	}
})

