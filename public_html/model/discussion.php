<?php
	include('asset/header.php');

	function load(){
		$params = array();
		$params['discussion_id'] = $_GET['id'];
		$arrMessage = call_api("discussion","get",$params);
		$arrComment = call_api("comment","get",$params);
		$results = array('arrComment' => $arrComment, 'arrMessage' => $arrMessage);
		return $results;
	}
	
	function save(){
		$params = array();
		$params['comment'] = $_POST['comment'];
		$params['create_date'] = date('Y-m-d H:i:s');
		$params['discussion_id'] = $_GET['id'];
		call_api("comment","post",$params);
		$url = $_SERVER['REQUEST_URI'];
		header("Location: ".$url);
		exit;
	}
?>