<?php
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	
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

	if(!isset($_SESSION["username"]) && $page != "login" && $page != "register") {
		$_SESSION["url"] = $url;
		header("Location: login.php");
		exit;
	}
	
	if(function_exists('load')){
		$results = load();
	}

	include('view/'.$page.'.html');

	if(isset($_POST['save'])){
		save();
	}
?>