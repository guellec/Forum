<?php

require("views/headsujets.html");

$themeManager = new ThemeManager($db);

// id du theme
$id = $_POST['id'];
$theme = $themeManager->getTheme($id);

$listSujet = $theme->getListSujet($themeManager->getDb());

$i = 0;

while(isset($listSujet[$i]))
{
	require("views/sujet.html");
	$i++;
}
require("views/footsujets.html");

if(isset($_SESSION['id']) && $_SESSION['id']!="")
	require("views/newSujetForm.html");

?>
