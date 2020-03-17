<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="index2.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="index.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<div class="container" id="page">
			<?php
				if (isset($_GET['key'])) {
					$key = $_GET['key'];
					$conn = new mysqli('localhost', 'root', '', 'movie_database');
					$sql = "SELECT username, registrated, status FROM activation WHERE akey = '$key';";
					$query = $conn->query($sql);
					if ($query->num_rows > 0) {
						while ($row = $query->fetch_assoc()) {
							$username = $row['username'];
							$registrated = $row['registrated'];
							$cdate = date('U');
							$ddate = $cdate - $registrated;
							if ($ddate <= 86400 && $row['status'] == 'status0') {
								$conn2 = new mysqli('localhost', 'root', '', 'movie_database');
								$sql2 = "UPDATE users SET status = 'status1' WHERE username = '$username';";
								$query2 = $conn2->query($sql2);
								$conn2->close();
								echo '
								<div id="ver-success-box" class="header-box">
									<span id="ver-success">Sikeresen aktiváltad fiókodat! Mostmár beléphetsz, jó szórakozást! ;)</span>
									<img src="images/icons/ver_success.png" alt=""/>
								</div>';
								$conn3 = new mysqli('localhost', 'root', '', 'movie_database');
								$sql3 = "UPDATE activation SET status = 'status1' WHERE username = '$username';";
								$query3 = $conn3->query($sql3);
								$conn3->close();
							} elseif ($row['status'] == 'status1') {
								echo '
								<div id="ver-error-box2" class="header-box">
									<span id="ver-error">Ez a fiók már aktiválva van.</span>
									<img src="images/icons/ver_error.png" alt=""/>
								</div>';
							} else {
								echo '
								<div id="ver-error-box" class="header-box">
									<span id="ver-error">Ez az aktivációs kulcs érvénytelen.</span>
									<img src="images/icons/ver_error.png" alt=""/>
								</div>';
							}
						}
					} else {
						echo '
						<div id="ver-error-box" class="header-box">
							<span id="ver-error">Ez az aktivációs kulcs nem létezik.</span>
							<img src="images/icons/ver_error.png" alt=""/>
						</div>';
					}
					$conn->close();
				}
			?>
			<div class="row" id="hide">
				<div class="col-xs-1"></div>
				<div class="col-xs-4">
					<div class="box" id="login-box">
						<div class="loading" id="forp-loading">
							<img src="loading.svg" class="loading-svg" id="forp-loading-svg"/>
						</div>
						<h4 class="h4"><p>Belépés</p></h4>
						<label for="lg-username">Felhasználónév</label><br/>
						<input type="text" id="lg-username" value="<?php include ('cookie_username.php'); ?>" onkeydown="formCheckLU(event)"/><br/>
						<label for="lg-password">Jelszó:</label><br/>
						<input type="password" id="lg-password" value="<?php include ('cookie_password.php'); ?>" onkeydown="formCheckLP(event)"/><br/>
						<div id="remember-box">
							<input type="checkbox" id="remember-me"/>
							<label for="remember-me" id="remember-label">Maradjak bejelentkezve</label>
						</div>
						<button type="button" id="lg-btn" onclick="lgBtnF()">Belépés</button>
						<p id="forgot-password-p" onclick="forgotPassword()">Elfelejtettem a jelszavam</p>
						<div id="forgot-password">
							<label for="forgot-password-label">E-mail cím:</label>
							<span class="msg-label" id="for-email-f">Az e-mail cím nem megfelelő formátumú!</span>
							<input type="text" id="forgot-password-input" onkeydown="forgotPassSI(event)"/>
							<button type="button" id="forgot-pass-btn" onclick="forgotPassS()">Küldés</button>
						</div>
					</div>
				</div>
				<div class="col-xs-2"></div>
				<div class="col-xs-4">
					<div class="box" id="reg-box">
						<div class="loading" id="reg-loading">
							<img src="loading.svg" class="loading-svg" id="reg-loading-svg"/>
						</div>
						<h4 class="h4"><p>Regisztráció</p></h4>
						<label for="rg-username">Felhasználónév</label>
						<span class="msg-label" id="rg-username-min">Minimum 6 karakter!</span>
						<span class="msg-label rg-username-pass">Nem egyezhet meg a felhasználónév és a jelszó!</span>
						<span class="msg-label-s" id="rg-username-s">Megfelelő</span>
						<input type="text" class="rg-input" id="rg-username" maxlength="18" onkeydown="formCheckU(event)" autocomplete="off"/><br/>
						<label for="rg-email">E-mail cím</label>
						<span class="msg-label" id="rg-email-f">Az e-mail cím nem megfelelő formátumú!</span>
						<span class="msg-label-s" id="rg-email-s">Megfelelő</span>
						<input type="text" class="rg-input" id="rg-email" onkeydown="formCheckE(event)" autocomplete="off"/><br/>
						<label for="rg-password1">Jelszó</label>
						<span class="msg-label" id="rg-pass1-min">Minimum 8 karakter!</span>
						<span class="msg-label" id="rg-pass1-caps">Tartalmaznia kell legalább egy nagybetűt!</span>
						<span class="msg-label" id="rg-pass1-lows">Tartalmaznia kell legalább egy kisbetűt!</span>
						<span class="msg-label" id="rg-pass1-num">Tartalmaznia kell legalább egy számot!</span>
						<span class="msg-label rg-username-pass">Nem egyezhet meg a felhasználónév és a jelszó!</span>
						<span class="msg-label rg-pass-eq">A két jelszónak egyeznie kell!</span>
						<span class="msg-label-s" id="rg-pass1-s">Megfelelő</span>
						<input type="password" class="rg-input" id="rg-password1" onkeydown="formCheckP1(event)" autocomplete="off"/><br/>
						<label for="rg-password2">Jelszó mégegyszer</label>
						<span class="msg-label rg-pass-eq">A két jelszónak egyeznie kell!</span>
						<span class="msg-label-s" id="rg-pass2-s">Megfelelő</span>
						<input type="password" class="rg-input" id="rg-password2" onkeydown="formCheckP2(event)" onkeyup="formCheckPeq()" autocomplete="off"/><br/>
						<div id="show-password-box">
							<input type="checkbox" id="show-password" onclick="showPass()"/>
							<label for="show-password" id="show-password-label">Jelszó megjelenítése</label>
						</div>
						<button type="button" id="rg-btn" onclick="rgBtnF()">Regisztráció</button>
					</div>
				</div>
				<div class="col-xs-1"></div>
			</div>
			<div class="row" id="forgot-password-ready">
				<section>
					Elküldtük a jelszó visszaállításához szükséges linket a(z)&nbsp;<span id="f-p-email" class="afterMail"></span>&nbsp;e-mail címre.
				</section>
			</div>
			<div class="row" id="visible">
				<div class="col-xs-12">
					<div id="success-reg-box">
						<h3 class="h3">Sikeres regisztráció!</h3>
						<section>
							A regisztráció befejezéséhez szükséges visszaigazoló e-mailt elküldtük a(z)&nbsp;<span id="cemail" class="afterMail"></span>&nbsp;e-mail címre! A levélben található link a regisztrációt követően 24 óra múlva érvényét veszti.
						</section>
					</div>
				</div>
			</div>
		</div>
		<div id="snackbar"></div>
		<div id="redirect"></div>
	</body>
</html>
