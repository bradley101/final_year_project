<?php	
	include("conf.php");
	
	$json = $_POST["data"];
	$data = json_decode($json, true);
	$email = $data["email"];
	$pwd = $data["password"];
	$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);
	$q = "SELECT `name`,`id`,`password` FROM `usersdb` WHERE `email`='".$email."'";
	$res = $db->query($q);
	$ans = "not found";
	$id = "NA";
	$name = "NA";
	if($res) {
		while($row = $res->fetch(PDO::FETCH_ASSOC)) {
			$p = $row["password"];
			if($p == $pwd) {
				$ans = "correct";
				$id = $row["id"];
				$name = $row["name"];
			} else {
				$ans = "wrong";
			}
		}
	}
	$db = null;
	echo json_encode(array("result" => $ans, "id" => $id, "name" => $name));
?>