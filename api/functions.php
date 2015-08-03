<?php

	function call_api($page, $function, $array){
		echo $page;
		exit;
		include($page.".php");
		exit;
		echo $page;
		if($array){
			$function."($array)";
		}
		else{
			$function."()";
		}
	}

?>