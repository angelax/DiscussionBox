<?php

	include_once('class/cls.discussion.php');
	
	function discussion_get($where=array()){
		$discussion = new Discussion("t_discussions");
		$result = $discussion->select($where);
		return $result;
	}
	
	function discussion_post($where=array()){
		$discussion = new Discussion("t_discussions");
		$result = $discussion->insert($where);
		return $result;
	}

?>