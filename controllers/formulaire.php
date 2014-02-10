<?php

if (isset($_POST['connexion'])||isset($_GET['connexion']))
{
	$managerUser = new UserManager($db);
	$user = $managerUser->getUser($_POST['pseudo']);

	if ($user->getId() != NULL)
	{
		$bool = $user->verifPass($_POST['password']);

		if ($bool == true)
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
	
	$managerUser = new UserManager($db);
	$user = $managerUser->getUser($_POST['logpseudo']);
	
	if ($user->getId() != NULL)
	{
		echo 'Login deja existant, merci de choisir un nouveau login';
		require ('controllers/formCreationLogin.php');
	}
	else
	{

		if ($_POST['logpassword'] == $_POST['confirmpassword'])
		{
			$managerUser->insertUser($_POST['logpseudo'], $_POST['logpassword']);
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