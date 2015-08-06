<?php

	include_once('class/cls.comment.php');
	
	function comment_get($where=array()){
		$comment = new Comment("t_comments");
		$result = $comment->select($where);
		return $result;
	}
	
	function comment_post($where=array()){
		$comment = new Comment("t_comments");
		$result = $comment->insert($where);
		return $result;
	}

?>