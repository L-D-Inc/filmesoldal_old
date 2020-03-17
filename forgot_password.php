<?php
	if (isset ($_GET['email'])) {
		$email = $_GET['email'];
		$new_pass = $_GET['newPass'];
		$new_pass_hash = hash('sha512', sha1($new_pass));
		$conn = new mysqli ('localhost', 'root', '', 'movie_database');
		$sql = "SELECT email, status FROM users WHERE email = '$email';";
		$query = $conn->query($sql);
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				if ($row['status'] == 'status0') {
					echo 'status0';
				} elseif ($row['status'] == 'status1') {
					echo 'success';
					$conn2 = new mysqli('localhost', 'root', '', 'movie_database');
					$sql2 = "UPDATE users SET password = '$new_pass_hash', status = 'status2' WHERE email = '$email';";
					$query2 = $conn2->query($sql2);
					$conn2->close();
				}
			}
		} else {
			echo 'accountNotFound';
		}
		$conn->close();
	}
?>
