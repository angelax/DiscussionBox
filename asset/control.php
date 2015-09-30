<?php

exit;
	$url = $_SERVER['REQUEST_URI'];

	$end = end((explode('/', $url)));
	$end =  str_split($end);

	$page = "";

	foreach($end as $letter){
		if ($letter == ".") {
			break;
		}
		$page .= $letter;
	}
	$page = "login";
	echo $page;
	exit;
	if(function_exists('load')){
		$results = load();
	}

	$url = $_SERVER['REQUEST_URI'];

	$end = end((explode('/', $url)));
	$end =  str_split($end);

	$page = "";

	foreach($end as $letter){
		if ($letter == ".") {
			break;
		}
		$page .= $letter;
	}
	$page = "login";
	// if(!isset($_SESSION["username"]) && ($page != "login" || $page != "register"))
		// $page = "login";
	// echo isset($_SESSION["username"]);
	// echo $page;
	include('view/'.$page.'.html');

	if(isset($_POST['save'])){
		save();
	}

?>