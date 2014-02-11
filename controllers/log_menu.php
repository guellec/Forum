<?
if(isset($_SESSION['id']) && $_SESSION['id']!="")
	require 'views/logout_menu.html';
else
	require 'views/login_menu.html';
?>