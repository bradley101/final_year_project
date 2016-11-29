<!DOCTYPE html>
<html>
	<head>
		<title>cPanel Auto Home</title>
		<script src="jquery-3.1.1.js"></script>
		<script src="jquery-redirect.js"></script>
		<link rel="stylesheet" href="homepagenavbarcss.css" />
		<link rel="stylesheet" href="mainbodycss.css" />
		<script src="mainjs.js"></script>
	</head>
	<body>
		<ul class="top-nav-bar">
			<li class="heading" style="margin-left: 43%;"><a href="#">Auto Home</a></li>
			<li class="logout" style="float: right;" onclick="logout();"><a class="lg_class" href="#logout">Logout</a><li>
		</ul>
		<div class="mainbodycontent">
			<?php	
				$username = $_POST["name"];
				$id = $_POST["id"];
				echo "<h3 class=\"helloclass\">Hello <span class=\"usernamespan\">".$username."!</span></h3><br>";
				include("disprooms.php");
				$rows = $numrows;
			?>
			<h3 id="roomdeshead" style="text-align: center; color: #617798">Rooms Description</h3>
			<?php
				include("displayroomdetails.php");
			?>
		</div>
	</body>
</html>