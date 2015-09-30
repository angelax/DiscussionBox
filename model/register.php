<?php

	include_once('class/cls.discussion.php');
	
	function user_get($where=array()){
		$user = new User("t_users");
		$result = $user->select($where);
		return $result;
	}
	
	function user_post($where=array()){
		$discussion = new User("t_users");
		$result = $discussion->insert($where);
		return $result;
	}

?>