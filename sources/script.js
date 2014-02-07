//création de la fonction initClick
function initClick()
{
	$("#login").click(getLogin);

	$("#inscription").click(getCreationLogin);
	$("#logout").click(getLogout);
	
		
}

//connexion login
function getLogin(){

	var options = {
		"url" : "index.php?page=formLogin",
		"method" : "GET"
	};
	$.ajax(options).done(function(resultat) {
		$("#zonemodif").html(resultat);
		$("#formlogin").submit(envoiForm);
	});
}

//submit du login
function envoiForm(e){
		
		e.preventDefault();
	
		
		var pseudo = $("#pseudo").val();
		var password = $("#password").val();
		var connexion = "connexion";
		var options = {
			"url" : "index.php?page=formulaire",//index.php va recevoir $_GET['page']='contact' et $_GET['formulaire']=modifier
			// ca sert à simplifier les verifications dans le fichier contact.php
			"method" : "POST",
				"data" : { 
					"pseudo"	: pseudo,
					"password"  : password,
					"connexion" :connexion

				}
				
		};
		
		$.ajax(options).done(function(resultat) {
			
			$("#zonemodif").html(resultat);
			$("#formlogin").submit(envoiForm);
			
		});

	
}

//connexion Inscription
function getCreationLogin(){
	var options = {
		"url" : "index.php?page=formCreationLogin",
		"method" : "GET"
	};
	$.ajax(options).done(function(resultat) {
		$("#zonemodif").html(resultat);
		$("#formcrea").submit(envoiFormCreation);
	});
}

//submit du Inscription
function envoiFormCreation(e){
		
		e.preventDefault();
		var logpseudo = $("#logpseudo").val();
		var logpassword = $("#logpassword").val();
		var confirmpassword = $("#confirmpassword").val();
		var creation = "creation";
		var options = {
			"url" : "index.php?page=formulaire",//index.php va recevoir $_GET['page']='contact' et $_GET['formulaire']=modifier
			// ca sert à simplifier les verifications dans le fichier contact.php
			"method" : "POST",
				"data" : { 
					"logpseudo"	: logpseudo,
					"logpassword"  : logpassword,
					"confirmpassword"  : confirmpassword,
					"creation"   : creation

				}
		};
		$.ajax(options).done(function(resultat) {
			$("#zonemodif").html(resultat);
			$("#formcrea").submit(envoiFormCreation);
			
		});

	
}


//appel du logout
function getLogout(){
	var options = {
		"url" : "index.php?page=logout",
		"method" : "GET"
	};
	$.ajax(options).done(function(resultat) {
		$("#zonemodif").html(resultat);
		
	});
}

//appel de choix du theme (1: loggé, 2: pas loggé: pas de formulaire)


//appel du  choix du sujet (1: loggé, 2: pas loggé: pas de formulaire)


//submit du formulaire nouveau_sujet


//submit du formulaire nouveau_post (répondre)







//appels des fonctions
$(document).ready(function()
{	
		initClick();
		



});






