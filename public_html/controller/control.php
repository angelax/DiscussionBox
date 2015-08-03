<?php

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

include('/../view/'.$page.'.html');

if(isset($_POST['save'])){
	save();
}

?>