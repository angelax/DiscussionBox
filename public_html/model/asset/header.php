<?php
	include('/../../controller/control.php');
	function call_api($page, $function, $array=array()){
		require_once("/../../../api/".$page.".php");
		if(count($array) == 0){
			return call_user_func($function);
		}
		else{
			return call_user_func($function, $array);
		}
	}
?>