<?php // modèle MVC2
header('Content-Type: text/html; charset=utf8_bin');

session_start();

$db = mysqli_connect('localhost','root','troiswa','forum');

if ($db == false)
	die("erreur de connexion à la base MySQL");

require 'models/User.class.php';
require 'models/ThemeManager.class.php';

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