<?php // modèle MVC2
header('Content-Type: text/html; charset=utf8_bin');

session_start();

//$db = mysqli_connect('127.0.0.1','root','troiswa','forum');

//if ($db == false)
//	die("erreur de connexion à la base MySQL");

//require('objets/ContactManager.class.php');
//$manager = new ContactManager($db);

$content = 'controllers/content.php';

if (isset($_GET['page']))
{	
	$content = 'controllers/'.$_GET['page'].'.php';
}

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']))
	require($content);
else 
	require('controllers/skel.php');
?>