<?php

$themeManager = new ThemeManager($db);

//récupération de l'id du sujet
$id = $_POST['id'];
$idtheme = $_POST['idtheme'];

$theme = $themeManager->getTheme($idtheme);

//récupération de l'auteur du sujet
$author=$theme->getAuthorName($themeManager->getDb(),$id);

//récupération de la date du sujet
$date=$theme->getSubjectDate($themeManager->getDb(),$id);

$sujet = $theme->getSujet($themeManager->getDb(),$id);

$titre = $sujet->getTitre();

$contenu = $sujet->getContenu();

$listMessage = $sujet->getListMessage($themeManager->getDb());

require("views/headpost.html");

$i = 0;

while(isset($listMessage[$i]))
{
	$username = $sujet->getUserName($themeManager->getDb(),$listMessage[$i]->getId());
	$date = $sujet->getMessageDate($themeManager->getDb(),$listMessage[$i]->getId());	
	require("views/post.html");
	$i++;
}

require("views/footpost.html");

if(isset($_SESSION['id']) && $_SESSION['id']!="")
	require("views/postForm.html");

?>