<?php
	include('asset/header.php');

	function load(){
		$params = array();
		$params['discussion_id'] = $_GET['id'];
		include('model/discussion.php');
		include('model/comment.php');
		$arrMessage = discussion_get($params);
		$arrComment = comment_get($params);
		$results = array('arrMessage' => $arrMessage['discussions']);
		$results['creator'] = $arrMessage['users'][0]['first_name']." ".$arrMessage['users'][0]['last_name'];
		$results['arrComment'] = array();
		for($i = 0; $i<count($arrComment['comments']); $i++){
			$results['arrComment'][$i] = $arrComment['comments'][$i];
			$results['arrComment'][$i]['name'] = $arrComment['users'][$i]['first_name']." ".$arrComment['users'][$i]['last_name'];
		}
		return $results;
	}
	
	function save(){
		$params = array();
		$params['comment'] = $_POST['comment'];
		$params['create_date'] = date('Y-m-d H:i:s');
		$params['discussion_id'] = $_GET['id'];
		include('model/user.php');
		$arrUser = user_get(array('email'=>$_SESSION['username']));
		$params['user_id'] = $arrUser[0]['user_id'];
		comment_post($params);
		$url = $_SERVER['REQUEST_URI'];
		header("Location: ".$url);
		exit;
	}
?>