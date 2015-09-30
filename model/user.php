<?php

	include_once('class/cls.user.php');
	
	function user_get($where=array()){
		$user = new User("t_users");
		$result = $user->select($where);
		return $result;
	}
	
	function user_post($where=array()){
		$user = new User("t_users");
		$result = $user->select();
		foreach($result as $u){
			if($where['email'] == $u['email'])
				return array("fail" => "This account already exists");
		}
		$user->insert($where);
		return;
	}

?>