<?php
	$id = $_POST["id"];
	$encryptd = "";
	for($i = 0 ; $i < strlen($id) ; $i++) {
		$p = $id[$i] + 48;
		$encryptd = $encryptd.$p;
	}
	echo $encryptd;
?>