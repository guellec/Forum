<?php

require("views/headpost.html");

$themeManager = new ThemeManager($db);

//récupération de l'id du sujet
$id = $_POST['id'];
$idtheme = $_POST['idtheme'];

var_dump($_POST);

$theme = $themeManager->getTheme($themeManager->getDb(), $idtheme);

//$sujet = $theme->getSujet($themeManager->getDb(),$id); 



//$sujet = $theme->getSujet($idtheme); 

//$listMessage = $sujet->getListMessage($themeManager->getDb());

/*$i = 0;

while(isset($listMessage[$i]))
{
	require("views/post.html");
	$i++;
}*/
require("views/footpost.html");

?>