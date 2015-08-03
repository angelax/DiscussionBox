<?php
	include('asset/header.php');
	
	function save(){
		$params = array();
		$params['message'] = $_POST['message'];
		$params['title'] = $_POST['title'];
		$params['create_date'] = date('Y-m-d H:i:s');
		$id = call_api("discussion","post",$params);
		header("Location: discussion.php?id=".$id);
		exit;
	}
?>