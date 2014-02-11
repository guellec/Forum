<?php

$themeManager = new ThemeManager($db);

//récupération de l'id du sujet
$id = $_POST['id'];
$idtheme = $_POST['idtheme'];

$theme = $themeManager->getTheme($idtheme);

$sujet = $theme->getSujet($themeManager->getDb(),$id);

$titre = $sujet->getTitre();

$contenu = $sujet->getContenu();

$username = $sujet->getUserName($themeManager->getDb(),$id);

$listMessage = $sujet->getListMessage($themeManager->getDb());

require("views/headpost.html");

$i = 0;

while(isset($listMessage[$i]))
{
	$date = $sujet->getMessageDate($themeManager->getDb(),$listMessage[$i]->getId());	
	require("views/post.html");
	$i++;
}

require("views/footpost.html");

if(isset($_SESSION['id']) && $_SESSION['id']!="")
	require("views/postForm.html");

?>