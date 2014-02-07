<?php

if (isset($_POST['connexion'])||isset($_GET['connexion']))
{
	$user = new User($_POST['pseudo'], $db);
	$bool = $user->verifLogin($_POST['pseudo']);

	if ($bool == true)
	{
		$bool2 = $user->verifPass($_POST['password']);

		if ($bool2 == true)
		{	
			require("views/avatar.html");
			$user->initSession();
			echo "Connecté ".$_SESSION['login'];
			// affichage nom et avatar a la place du formulaire d'inscription
		}
		else
		{
			echo "Mauvais mot de passe";
			require ('controllers/formLogin.php');
		}
	}
	else
	{
		echo 'Login inexistant';
		require ('controllers/formLogin.php');
	}
		 
	//require ('controllers/formInscription.php');
	
}

if (isset($_POST['creation'])||isset($_GET['creation']))
{

	require("views/avatar.html");
}
if (isset($_POST['newsujet'])||isset($_GET['newsujet']))
{
	require("views/sujet.html");
}
if (isset($_POST['newpost'])||isset($_GET['newpost']))
{
	require("views/post.html");
}



?>