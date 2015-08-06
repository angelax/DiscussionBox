<?php
	include('asset/header.php');
	
	function save(){
		$params = array();
		$params['message'] = $_POST['message'];
		$params['title'] = $_POST['title'];
		$params['create_date'] = date('Y-m-d H:i:s');
		include('model/discussion.php');
		$id = discussion_post($params);
		header("Location: discussion.php?id=".$id);
		exit;
	}
?>