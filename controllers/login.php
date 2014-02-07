<?

$user = new User($_POST['login']);
$bool = $user->verifLogin($_POST['login']);

if ($bool == true)
{
	$bool2 = $user->verifPass($_POST['pass'])

	if ($bool2 == true)
	{	
		echo "Connecté";
		// affichage nom et avatar a la place du formulaire d'inscription
	}

	else
	{
		echo "Mauvais mot de passe";
		require ('controllers/formLogin.php');
	}
}
else 
	require ('controllers/formInscription.php');
?>