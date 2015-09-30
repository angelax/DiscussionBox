<?php

	include_once('class/cls.comment.php');
	
	function comment_get($where=array()){
		$comment = new Comment("t_comments");
		$result['comments'] = $comment->select($where);
		$user = new User("t_users");
		$userInfo = array();
		foreach($result['comments'] as $d) {
			$arrUser = $user->select(array('user_id'=>$d['user_id']));
			$userInfo[] = $arrUser[0];
		}
		$result['users'] = $userInfo;
		return $result;
	}
	
	function comment_post($where=array()){
		$comment = new Comment("t_comments");
		$result = $comment->insert($where);
		return $result;
	}

?>