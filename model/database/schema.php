<?php

	include ('/../settings/config.php');

	$CONN = mysql_connect(DB_HOST,DB_USER,DB_PASS);
	if(!$CONN)
		die('could not connect to db');
	
	$sql = 'CREATE DATABASE IF NOT EXISTS discussion_forum';
	mysql_query($sql);
	
	$DB = mysql_select_db(DB_NAME,$CONN);
	if(!$DB)
		die('could not select the db');

    $sql = 'CREATE TABLE IF NOT EXISTS `t_discussions` (
      `discussion_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT,
      `create_date` datetime NOT NULL,
	  `user_id` int(32) UNSIGNED NOT NULL,
	  `title` varchar(128) NOT NULL,
	  `message` text NOT NULL,
       PRIMARY KEY  (`discussion_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ';
    mysql_query($sql);
	
	$sql = 'CREATE TABLE IF NOT EXISTS `t_comments` (
      `comment_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT,
	  `discussion_id` int(32) UNSIGNED NOT NULL,
      `create_date` datetime NOT NULL,
	  `user_id` int(32) UNSIGNED NOT NULL,
	  `comment` text NOT NULL,
       PRIMARY KEY  (`comment_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ';
    mysql_query($sql);

	$sql = 'CREATE TABLE IF NOT EXISTS `t_users` (
	  `user_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT,
	  `email` varchar(255) NOT NULL,
	  `password` varchar(255) NOT NULL,
	  `first_name` varchar(255) NOT NULL,
	  `last_name` varchar(255) NOT NULL,
      `create_date` datetime NOT NULL,
       PRIMARY KEY  (`user_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ';
    mysql_query($sql);

?>