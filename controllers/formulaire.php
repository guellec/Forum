<?php

if (isset($_POST['connexion'])||isset($_GET['connexion']))
{
	require("views/avatar.html");
}

if (isset($_POST['creation'])||isset($_GET['creation']))
{
	require("views/avatar.html");
}
if (isset($_POST['newsujet'])||isset($_GET['newsujet']))
{
	require("views/sujet.html");
}
if (isset($_POST['newpost'])||isset($_GET['newpost']))
{
	require("views/post.html");
}



?>