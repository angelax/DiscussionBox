<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;>
<title>Message Board</title>
<script language= "JavaScript">
function InputCheck(form1 "")
  {
    alert("Please enter your user name.");
    form1.username.focus();
    return (false);
  }
  if (form1.content.value == "")
  {
    alert("Content can not be empty.");
    form1.content.focus();
    return (false);
  }
}
</script>
</head>
<body>
<h3>Message Board</h3>
<?php
require("./conn.php");
require("./config.php");

// current page
$p = $_GET['p']?$_GET['p']:1;
$offset = ($p-1)*$pagesize;

$query_sql = "SELECT * FROM User ORDER BY id DESC LIMIT  $offset , $pagesize";
$result = mysql_query($query_sql);
if(!$result) exit('error in finding data'.mysql_error());

// recursion
while($row = mysql_fetch_array($result)){
	$content = nl2br($row['Content']);
	echo $row['UserName'],' ';
	echo 'post on：'.date("Y-m-d H:i:s", $row['CreateTime']).'<br />';
	echo 'Content：',nl2br($row['Content']),'<br /><br />';
	
	if(!empty($row['ReplyTime'])) {
		echo '----------------------------<br />';
		echo 'Replied on：',date("Y-m-d H:i", $row['ReplyTime']),'<br />';
		echo nl2br($row['Reply']),'<br /><br />';
	}
	echo '<hr />';
}

// count pages of message in message board.
$count_result = mysql_query("SELECT count(*) FROM User");
$count_array = mysql_fetch_array($count_result);
$pagenum=ceil($count_array[0]/$pagesize);
echo '$count_array[0],' messages';
if ($pagenum > 1) {
	for($i=1;$i<=$pagenum;$i++) {
		if($i==$p) {
			echo ' [',$i,']';
		} else {
			echo ' <a href="index.php?p=',$i,'">'.$i.'</a>';
		}
	}
}
?>
<div class="form">
<form id="form1" name="form1" method="post" action="submiting.php" onSubmit="return InputCheck(this)">
<h3>New Post</h3>
<p>
<label for="title">User Name</label>
<input id="username" name="username" type="text" /><span>(Please enter your user name.)</span>
</p>
<p>
<label for="title">email:</label>
<input id="email" name="email" type="text" /><span>(Please enter your E-mail address.)</span>
</p>
<p>
<label for="title">Content:</label>
<textarea id="content" name="content" cols="50" rows="8"></textarea>
</p>
<input type="submit" name="submit" value="  Submit  " />
</form>
</div>
</body>
</html>