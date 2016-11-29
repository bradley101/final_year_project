<?php
	include("conf.php");
	$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD);
	$q = "SELECT `rooms` from `roomsdb` WHERE `id`='".$id."'";
	$result = $db->query($q);
	$numrows = $result->rowCount();
	echo "<span class=\"disproomspan\">Number of Rooms - ".$numrows."</span>";
	$db = null;
?>