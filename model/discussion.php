<?php

	include_once('class/cls.discussion.php');
	include_once('class/cls.user.php');
	
	function discussion_get($where=array()){
		$discussion = new Discussion("t_discussions");
		$result['discussions'] = $discussion->select($where,"de");
		$user = new User("t_users");
		$userInfo = array();
		foreach($result['discussions'] as $d) {
			$arrUser = $user->select(array('user_id'=>$d['user_id']));
			$userInfo[] = $arrUser[0];
		}
		$result['users'] = $userInfo;
		return $result;
	}
	
	function discussion_post($where=array()){
		$discussion = new Discussion("t_discussions");
		$result = $discussion->insert($where);
		return $result;
	}

?>