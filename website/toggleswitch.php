<?php
	$json = $_POST["data"];
	$array = json_decode($json, true);
	$id = $array["id"];
	$value = $array["value"];
	$state = "0";
	if($value == "OFF") {
		$state = "1";
	}
	$roomid = "";
	$switch = "";
	$ufound = false;
	for($i = 0 ; $i < strlen($id) ; $i++) {
		if($id[$i] == "_") {
			$ufound = true;
			continue;
		}
		if($ufound == true) {
			$switch = $switch.$id[$i];
		} else {
			$roomid = $roomid.$id[$i];
		}
	}
	include("conf.php");
	$db = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PWD);
	$q = "UPDATE `roomswitches` SET `state`='".$state."' WHERE `roomid`='".$roomid."'AND `switch`='".$switch."'";
	$result = $db->query($q);
	$count = $result->rowCount();
	if($count > 0) {
		echo "success";
	} else {
		echo "not success";
	}
?>