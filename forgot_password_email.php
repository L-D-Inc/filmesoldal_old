<?php
	if (isset ($_GET['forpSuccess']) && $_GET['forpSuccess'] == 'true') {
		$email = $_GET['email'];
		$new_pass = $_GET['newPass'];
		$to = $email;
		$subject = "Elfelejtett jelszó";
		$from = "filmkozpontmail@gmail.com";
		$message = '
		<html>
			<head>
				<meta charset="utf-8"/>
				<meta name="viewport" content="width=device-width,initial-scale=1"/>
			</head>
			<body style="background-color: #276c73; font-family: tahoma; color: #fff;">
				<div style="width: 50%; margin: auto; padding: 20px;">
					<h4>Elfelejtett jelszó!</h4>
					<h4>' . $new_pass . '</h4><p>Ez a számsor az új jelszavad. Az első belépés után ajánlott megváltoztatni.</p><br/>
					<a href="http://188.6.99.62/filmesoldal/login_page.php" style="text-decoration:none; padding: 20px; background-color: #e99406; color: #fff;
					text-transform: uppercase; width: 25%; display: block; text-align: center; margin: auto;">belépek a fiókomba</a>
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