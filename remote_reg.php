<?php
	$rg_username = $_GET['rg_username'];
	$rg_email = $_GET['rg_email'];
	$rg_password = $_GET['rg_password'];
	$rg_password_hash = hash('sha512', substr($rg_username, 2, 4) . sha1($rg_password));
	$conn = new mysqli('localhost', 'root', '', 'movie_database');
	if (!$conn) {
		echo 'error';
	} else {
		$sql1 = "SELECT username FROM users WHERE username = '$rg_username';";
		$sql2 = "SELECT email FROM users WHERE email = '$rg_email';";
		$query1 = $conn->query($sql1);
		if (!$query1) {
			echo 'error';
		} else {
			$query2 = $conn->query($sql2);
			if (!$query2) {
				echo 'error';
			} else {
				$error_data = false;
				if ($query1->num_rows > 0) {
					echo 'registrated_username';
					$error_data = true;
				} elseif ($query2->num_rows > 0) {
					echo 'registrated_email';
					$error_data = true;
				}
				if ($error_data == false) {
					echo 'success';
					$sql3 = "INSERT INTO users (username, email, password, registrated, status, watched_movies, points) VALUES ('$rg_username', '$rg_email', '$rg_password_hash',
					CURRENT_TIMESTAMP, 'status0', '0', '0');";
					$query3 = $conn->query($sql3);
				}
			}
		}
	}
?>