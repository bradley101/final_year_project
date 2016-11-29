<?php
	$enc = $_POST["id"];
	$id = "";
	for($i = 0 ; $i < strlen($enc) ; $i++) {
		$p = $enc[$i];
		$q = $enc[$i + 1];
		$p = ($p * 10) + $q;
		$p = $p - 48;
		$id = $id.$p;
		$i++;
	}
	echo $id;
?>