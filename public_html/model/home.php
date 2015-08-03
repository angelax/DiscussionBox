<?php
	include('asset/header.php');

	function load(){
		$arrMessage = call_api("discussion","get");
		$results = array('arrMessage' => $arrMessage);
		return $results;
	}
?>