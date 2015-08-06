<?php
	include('asset/header.php');

	function load(){
		$params = array();
		$params['discussion_id'] = $_GET['id'];
		include('model/discussion.php');
		include('model/comment.php');
		$arrMessage = discussion_get($params);
		$arrComment = comment_get($params);
		$results = array('arrComment' => $arrComment, 'arrMessage' => $arrMessage);
		return $results;
	}
	
	function save(){
		$params = array();
		$params['comment'] = $_POST['comment'];
		$params['create_date'] = date('Y-m-d H:i:s');
		$params['discussion_id'] = $_GET['id'];
		comment_post($params);
		$url = $_SERVER['REQUEST_URI'];
		header("Location: ".$url);
		exit;
	}
?>