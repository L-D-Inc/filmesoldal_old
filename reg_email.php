<?php
	if (isset($_GET['success']) && $_GET['success'] == 'true') {
		$akey = hash('sha512', uniqid());
		$reg_a_date = date('U');
		$username = $_GET['username'];
		$rg_email = $_GET['rgEmail'];
		$conn = new mysqli('localhost', 'root', '', 'movie_database');
		$sql = "INSERT INTO activation (akey, username, registrated, status) VALUES ('$akey', '$username', '$reg_a_date', 'status0');";
		$query = $conn->query($sql);
		$conn->close();
		$to = $rg_email;
		$from = "filmkozpontmail@gmail.com";
		$subject = "Sikeres regisztráció a filmkozpont.hu-ra";
		$message = '
		<html>
			<head>
				<meta charset="utf-8"/>
				<meta name="viewport" content="width=device-width,initial-scale=1"/>
			</head>
			<body style="background-color: #276c73; font-family: tahoma; color: #fff;">
				<div style="width: 50%; margin: auto; padding: 20px;">
					<h4>Sikeres regisztráció!</h4>
					<p>A regisztrációd sikeres volt a filmkozpont.hu-ra, viszont az első belépés előtt aktiválnod kell fiókod. A következő gombra kattintva tudod ezt megtenni.</p><br/>
					<a href="http://188.6.99.62/filmesoldal/login_page.php?key=' . $akey . '" style="text-decoration:none; padding: 20px; background-color: #e99406; color: #fff; text-transform: uppercase; width: 25%; display: block; text-align: center; margin: auto;">
					aktiválom a fiókomat</a>
				</div>
			</body>
		</html>';
		$headers  = "From: " . $from . "\r\n"; 
		$headers .= "Content-type: text/html\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$mail = mail ($to, $subject, $message, $headers);
		if (!$mail) {
			echo 'error';
		} else {
			echo 'success';
		}
	}
?>