<?php

$themeManager = new ThemeManager($db);

//récupération de l'id du sujet
$id = $_POST['id'];
$idtheme = $_POST['idtheme'];

$theme = $themeManager->getTheme($idtheme);

//récupération de l'auteur du sujet
$author=$theme->getAuthorName($db,$id);

//récupération de la date du sujet
$date=$theme->getSubjectDate($db,$id);

$sujet = $theme->getSujet($db,$id);

$titre = $sujet->getTitre();

$contenu = $sujet->getContenu();

$username = $sujet->getUserName($db,$id);

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