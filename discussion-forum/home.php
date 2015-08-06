<?php
	include('asset/header.php');

	function load(){
		include('model/discussion.php');
		$arrMessage = discussion_get();
		$results = array('arrMessage' => $arrMessage);
		return $results;
	}
?>