<?php

	include_once('class/cls.comment.php');
	
	function get($where=array()){
		$comment = new Comment("t_comments");
		$result = $comment->select($where);
		return $result;
	}
	
	function post($where=array()){
		$comment = new Comment("t_comments");
		$result = $comment->insert($where);
		return $result;
	}

?>