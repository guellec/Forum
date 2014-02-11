<?php

if (isset($_POST['connexion'])||isset($_GET['connexion']))
{
	$managerUser = new UserManager($db);

	$log = cleanStringLogin(trim($_POST['pseudo']));

	
	if(!preg_match("#[a-zA-Z0-9_]+#", $log))
	{
		$user = $managerUser->getUser($log);
		if ($user->getId() != NULL)
		{
			
			if(!preg_match("#[a-zA-Z0-9_]+#", $_POST['password']))
			{
				$bool = $user->verifPass($pass);
			}
			else
			{
				echo 'Votre password ne peut contenir que des caracteres alphanumeriques';
				$bool = false;
			}

			if ($bool == true)
			{	
				$user->initSession();
				require("controllers/avatar.php");
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
	else
	{
		echo 'Votre login ne peut contenir que des caracteres alphanumeriques';
		require ('controllers/formLogin.php');
	}
}

if (isset($_POST['creation'])||isset($_GET['creation']))
{
	$managerUser = new UserManager($db);
	$log = cleanStringLogin(trim($_POST['logpseudo']));
	
	if(!preg_match("#[a-zA-Z0-9_]+#", $log))
	{
		$user = $managerUser->getUser($log);
		if ($user->getId() != NULL || $log == "")
		{
			echo 'Login deja existant, ou vide, merci de choisir un nouveau login';
			require ('controllers/formCreationLogin.php');
		}
		else
		{
			$pass = $_POST['logpassword'];
			if(!preg_match("#[a-zA-Z0-9_]+#", $pass))
			{
				if ($pass == $_POST['confirmpassword'])
				{
					$managerUser->insertUser($log, $pass]);
					var_dump($_SESSION);
					require("controllers/avatar.php");
				}
				else
				{
					echo 'Mot de passe incorrect';
					require ('controllers/formCreationLogin.php');
				}
			}
			else
			{
				echo 'Votre password ne peut contenir que des caracteres alphanumeriques';
				require ('controllers/formCreationLogin.php');
					
			}
		}
	}
	else
	{
		echo 'Votre login ne peut contenir que des caracteres alphanumeriques';
		require ('controllers/formCreationLogin.php');
	}

}

if (isset($_POST['newsujet'])||isset($_GET['newsujet']))
{
	$contenu = cleanString($_POST['contenu']); 
	$titre = cleanString($_POST['titre']);
	if ($titre != "" &&  $contenu != "")
	{
		$themeManager = new ThemeManager($db);
		$theme = $themeManager->getTheme($_POST['id']);
		$theme->insertSujet($themeManager->getDb(), $titre, $contenu);
	}

	require("controllers/sujet.php");
}
if (isset($_POST['newpost'])||isset($_GET['newpost']))
{
	$contenu = cleanString($_POST['contenu']); 
	if ($contenu != "")
	{
		$themeManager = new ThemeManager($db);
		$theme = $themeManager->getTheme($_POST['idtheme']);
		$sujet = $theme->getSujet($themeManager->getDb(), $_POST['id']);
		$sujet->insertMessage($themeManager->getDb(), $contenu);
	}
	require("controllers/post.php");
}

function cleanString($str)
{
	$str = preg_replace('{[\]&œ~/=§%*$£+#()_{|}[<>\\\]}', '', $str);
	return $str;
}

function cleanStringLogin($str)
{
	$str = preg_replace('{[àâä]}', 'a', $str);
	$str = preg_replace('{[éèêë]}', 'e', $str);
	$str = preg_replace('{[îï]}', 'i', $str);
	$str = preg_replace('{[ùûü]}', 'u', $str);
	$str = preg_replace('{[öô]}', 'o', $str);
	$str = preg_replace('{[ŷÿ]}', 'y', $str);
	return $str;
}

?>