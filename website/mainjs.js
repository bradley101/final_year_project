function logout() {
	document.cookie = "autohomeiduser=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/";
	document.cookie = "autohomenameuser=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/";
	window.location = "/website";
}
function toggle(item) { /*
	if(item.className == "off") {
		item.className = "on";
		item.value = "ON";
	} else {
		item.className = "off";
		item.value = "OFF";
	} */
	toggleSwitchInDatabase(item, item.id, item.value);
}
function toggleSwitchInDatabase(item, id, value) {
	$.ajax({
		url: "toggleswitch.php",
		type: "POST",
		data: "data={\"id\": \"" + id + "\", \"value\": \"" + value + "\"}",
		success: function(msg) {
			if(msg == "success") {
				if(value == "OFF") {
					item.className = "on";
					item.value = "ON";
				} else {
					item.className = "off";
					item.value = "OFF";
				}
			}
		}
	});
}