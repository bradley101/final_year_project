function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
function validate() {
	document.getElementById("parent_error_alert").style.display = 'none';
	document.getElementById("parent_success_alert").style.display = 'none';
	var email = document.getElementById("email").value;
	var pwd = document.getElementById("password").value;
	var redirect = false;
	if(validateEmail(email)) {
		$.ajax({
			url: "verifypassword.php",
			type: "POST",
			data: "data={\"email\":\"" + email + "\",\"password\":\"" + pwd + "\"}",
			success: function(msg) {
				//alert(msg);
				var json = JSON.parse(msg);
				var result = json.result;
				if(result == "correct") {
					document.getElementById("parent_success_alert").style.display = 'block';
					saveDataToCookie(json.name, json.id);
					//document.getElementById("form").submit();
					$.redirect('home.php', {'id': json.id, 'name': json.name});
				} else if(result == "not found") {
					document.getElementById("parent_error_alert").style.display = 'block';
					document.getElementById("error_message").innerHTML = "Email not found in database";
				} else {
					document.getElementById("parent_error_alert").style.display = 'block';
					document.getElementById("error_message").innerHTML = "Incorrect password entered";
				}
			}
		});
		
	} else {
		document.getElementById("parent_error_alert").style.display = 'block';
		document.getElementById("email").focus();
	}
	return redirect;
}
function saveDataToCookie(name, id) {
	var d = new Date();
	d.setDate(d.getTime() + (7 * 24 * 60 * 60 * 1000));
	document.cookie = "autohomenameuser=" + name + "; expires=" + d.toUTCString() + "; path=/";
	var nid = 0;
	$.ajax({
		url: "encrypt.php",
		type: "POST",
		data: "id=" + id,
		success: function(msg) {
			document.cookie = "autohomeiduser=" + msg + "; expires=" + d.toUTCString() + "; path=/";
		}
	});
	
}
