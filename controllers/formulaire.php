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
			$user->initSession();
			require("views/avatar.html");
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

}

if (isset($_POST['creation'])||isset($_GET['creation']))
{

	$user = new User($_POST['logpseudo'], $db);
	$bool = $user->verifLogin($_POST['logpseudo']);

	if ($bool == true)
	{
		echo 'Login deja existant, merci de choisir un nouveau login';
		require ('controllers/formCreationLogin.php');
	}
	else
	{
		if ($_POST['logpassword'] == $_POST['confirmpassword'])
		{
			$user->createUser($_POST['logpassword']);
			require("views/avatar.html");
		}
		else
		{
			echo 'Mot de passe incorrect';
		}
	}
	

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