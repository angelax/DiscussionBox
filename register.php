<?php

include('asset/header.php');

function save() {
	if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo "Invalid Email Address";
			exit;
		}
		if($_POST['password'] != $_POST['confirm_password']) {
			echo "Your password does not match";
			exit;
		}
		if($_POST['password'] != $_POST['confirm_password']) {
			echo "Your password does not match";
			exit;
		}
		unset($_POST['confirm_password']);
		unset($_POST['save']);
		$_POST['create_date'] = date('Y-m-d H:i:s');
		$_POST['password'] = MD5(trim($_POST['password']));
		include('model/user.php');
		$results = user_post($_POST);
		if(isset($results['fail'])){
			echo $results['fail'];
		}
		else{
			session_start();
			$_SESSION["username"] = $_POST['email'];
			header("Location: home.php");
			exit;
		}
	}	
	else{
		echo "You did not fill out all the fields";
	}
}

?>
