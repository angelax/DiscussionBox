<?php

include('asset/header.php');

function save() {
	$username = $_POST['email'];
	$password = MD5(trim($_POST['password']));
	include('model/user.php');
	$results = user_get(array('email'=>$username,'password'=>$password));
	if($results){
		$_SESSION["username"] = $username;
		header("Location: home.php");
		exit;
	}
	echo "Login failed. Please try again";
}

?>
