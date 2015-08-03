<?php

	include_once('class/cls.discussion.php');
	
	function get($where=array()){
		$discussion = new Discussion("t_discussions");
		$result = $discussion->select($where);
		return $result;
		//return  array(array("message" => "hello there"));
	}
	
	function post($where=array()){
		$discussion = new Discussion("t_discussions");
		$result = $discussion->insert($where);
		return $result;
		header('Location: discussion.php');
	}

?>