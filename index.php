<?php
require 'load/config.php';
$page = null;
$arc = null;


// Carregar template

if(empty($_COOKIE['iduser'])){
	$page = 'home';
	$arc = 'home';
}

$template = 'themes/' . $theme . '/templates/' . $page . '/' . $arc . '.php';

require $template;