<?php
	$lg_username = $_POST['lgUsername'];
	$lg_password = $_POST['lgPassword'];
	$lg_password_hash = hash ('sha512', sha1 ($lg_password));
	$remember_me = $_POST['rememberMe'];
	if (isset ($lg_username) && isset ($lg_password) && isset ($remember_me)) {
		$conn = new mysqli('localhost', 'root', '', 'movie_database');
		$sql = "SELECT username, password, status FROM users WHERE username = '$lg_username' and password = '$lg_password_hash';";
		$query = $conn->query($sql);
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				if ($row['status'] == 'status0') {
					echo 'status0';
				} elseif ($row['status'] == 'status1') {
					echo 'status1';
					if ($remember_me == 'true') {
						setcookie ('95261a03947a5ee795fe1d026f048ce4', base64_encode ($lg_username), time() + (10 * 365 * 24 * 60 * 60));
						setcookie ('7e63be8b9187082d1fbc91ebf259ac82', base64_encode ($lg_password), time() + (10 * 365 * 24 * 60 * 60));
					} else {
						setcookie ('95261a03947a5ee795fe1d026f048ce4', base64_encode ($lg_username));
						setcookie ('7e63be8b9187082d1fbc91ebf259ac82', base64_encode ($lg_password));
					}
				} elseif ($row['status'] == 'status2') {
					echo 'status2';
					if ($remember_me == 'true') {
						setcookie ('95261a03947a5ee795fe1d026f048ce4', base64_encode ($lg_username), time() + (10 * 365 * 24 * 60 * 60));
						setcookie ('7e63be8b9187082d1fbc91ebf259ac82', base64_encode ($lg_password), time() + (10 * 365 * 24 * 60 * 60));
					} else {
						setcookie ('95261a03947a5ee795fe1d026f048ce4', base64_encode ($lg_username));
						setcookie ('7e63be8b9187082d1fbc91ebf259ac82', base64_encode ($lg_password));
					}
				}
			}
		} else {
			echo 'accountNotFound';
		}
	}
?>
