<?php

require("views/headthemes.html");

$themeManager = new ThemeManager($db);

$listTheme = $themeManager->getListTheme();

$i = 0;

while (isset($listTheme[$i]))
{
	require("views/themes.html");
	$i++;
}

require("views/footthemes.html");

?>

