<?php
	$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD);
	//echo "<table>";
	for($i = 1 ; $i <= $rows ; $i++) {
		//echo "<tr>";
		$q = "SELECT `roomid`, `switch`, `state` FROM `roomswitches` WHERE `roomid`='".$id."room".$i."'";
		$result = $db->query($q);
		//echo "<td>";
		echo "<div class=\"roombox\">";
		echo "<h4 class=\"roomboxheading\">";
		echo "Room ".$i;
		echo "</h4>";
		echo "<div class=\"roomswitches\">";
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			echo "<h4>";
				echo $switch = " Switch ".$row["switch"].": ";
				
				$switchname = $row["roomid"]."_".$row["switch"];
				echo "<input onclick=\"toggle(this)\" type=\"button\" id=\"".$switchname."\"";
				if($row["state"] == "0") {
					echo " class=\"off\" value=\"OFF\"";
				} else {
					echo " class=\"on\" value=\"ON\"";
				}
				echo "><br>";
				echo "</h4>";
		}
		echo "</div>";
		echo "</div>";
		//echo "</td>";
		if($i < $rows) {
			$i++;
			$q = "SELECT `roomid`, `switch`, `state` FROM `roomswitches` WHERE `roomid`='".$id."room".$i."'";
			$result = $db->query($q);
			//echo "<td>";
			echo "<div class=\"roombox\">";
			echo "<h4 class=\"roomboxheading\">";
			echo "Room ".$i;
			echo "</h4>";
			echo "<div class=\"roomswitches\">";
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				echo "<h4>";
				echo $switch = " Switch ".$row["switch"].": ";
				
				$switchname = $row["roomid"]."_".$row["switch"];
				echo "<input onclick=\"toggle(this)\" type=\"button\" id=\"".$switchname."\"";
				if($row["state"] == "0") {
					echo " class=\"off\" value=\"OFF\"";
				} else {
					echo " class=\"on\" value=\"ON\"";
				}
				echo "><br>";
				echo "</h4>";
			}
			echo "</div>";
			echo "</div>";
			//echo "</td>";
		} else {
			//echo "</tr>";
			break;
		}
		//echo "</tr>";
	}
	//echo "</table>";
	$db = null;
?>