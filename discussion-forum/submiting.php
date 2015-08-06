<?php
if(!isset($_POST['submit'])){
    exit('access violation!');
}
// Deal with information received from forms

   
if(get_magic_quotes_gpc()){
	$username = htmlspecialchars(trim($_POST['username']));
	$email = htmlspecialchars(trim($_POST['email']));
	$content = htmlspecialchars(trim($_POST['content']));
} else {
	$username = addslashes(htmlspecialchars(trim($_POST['username'])));
	$email = addslashes(htmlspecialchars(trim($_POST['email'])));
	$content = addslashes(htmlspecialchars(trim($_POST['content'])));
}

if(strlen($username)>16){
	exit('Error: User Name can not be longer than 16 characters. [ <a href="javascript:history.back()">Back</a> ]');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	exit('Error: Invalid E-mail address. [ <a href="javascript:history.back()">Back</a> ]');
}

// Insert data into MySQL database
require("./conn.php");
$createtime = time();
$insert_sql = "INSERT INTO User (Username,Email,Content,CreateTime) VALUES 
('$username','$email','$content',$createtime)";

if(mysql_query($insert_sql)){
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Refresh" content="2;url=index.php">
<meta http-equiv="Content-Type" content="text/html;>
<title>Posted successfully</title>
</head>
<body>
<div class="refresh">
<p>Posted successfully</p>
</div>
</body>
</html>
<?php
} else {
	echo 'Post failed',mysql_error(),'[ <a href="javascript:history.back()">Back</a> ]';
}
?>