window.onload = function() {
	$('#rg-username').blur(function() {
		$('#rg-username-min').css('display', 'none');
		$('#rg-username-s').css('display', 'none');
		$('.rg-username-pass').css('display', 'none');
		$('#rg-username').css('outline', 'none');
		var rgUsernameI = document.getElementById('rg-username');
		var rgUsername = rgUsernameI.value;
		if (rgUsername == '') {
			$('#rg-username').css('outline', '1px solid #C41818');
			rgUsernameI.setAttribute('placeholder', 'A felhasználónév megadása kötelező!');
			errorData = true;
		} else if (rgUsername.length < 6) {
			$('#rg-username').css('outline', '1px solid #C41818');
			$('#rg-username-min').fadeIn(200);
			errorData = true;
		} else {
			$('#rg-username-s').fadeIn(200);
		}
	});

	$('#rg-email').blur(function() {
		$('#rg-email-f').css('display', 'none');
		$('#rg-email-s').css('display', 'none');
		$('#rg-email').css('outline', 'none');
		var rgEmailI = document.getElementById('rg-email');
		var rgEmail = rgEmailI.value;
		var x = rgEmail;
		var a;
		var atpos = x.indexOf("@");
		var dotpos = x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			a = false;
		} else {
			a = true;
		}
		if (rgEmail == '') {
			$('#rg-email').css('outline', '1px solid #C41818');
			rgEmailI.setAttribute('placeholder', 'Az e-mail cím megadása kötelező!');
			errorData = true;
		} else if (a == false) {
			$('#rg-email').css('outline', '1px solid #C41818');
			$('#rg-email-f').fadeIn(200);
			errorData = true;
		} else {
			$('#rg-email-s').fadeIn(200);
		}
	});

	$('#rg-password1').blur(function() {
		$('#rg-pass1-min').css('display', 'none');
		$('#rg-pass1-caps').css('display', 'none');
		$('#rg-pass1-lows').css('display', 'none');
		$('#rg-pass1-num').css('display', 'none');
		$('.rg-username-pass').css('display', 'none');
		$('.rg-pass-eq').css('display', 'none');
		$('#rg-pass1-s').css('display', 'none');
		$('#rg-password1').css('outline', 'none');
		var rgPass1I = document.getElementById('rg-password1');
		var rgPass1 = rgPass1I.value;
		var rgUsernameI = document.getElementById('rg-username');
		var rgUsername = rgUsernameI.value;
		if (rgPass1 == '') {
			$('#rg-password1').css('outline', '1px solid #C41818');
			rgPass1I.setAttribute('placeholder', 'A jelszó megadása kötelező!');
			errorData = true;
		} else if (rgPass1.length < 8) {
			$('#rg-password').css('outline', '1px solid #C41818');
			$('#rg-pass1-min').fadeIn(200);
			errorData = true;
		} else if (rgPass1.match(new RegExp("[A-Z]"))) {
			if (rgPass1.match(new RegExp("[a-z]"))) {
				if (rgPass1.match(new RegExp("[0-9]"))) {
					if (rgUsername == rgPass1) {
						$('#rg-username').css('outline', '1px solid #C41818');
						$('#rg-password1').css('outline', '1px solid #C41818');
						$('.rg-username-pass').fadeIn(200);
						errorData = true;
					}
				} else {
					$('#rg-password1').css('outline', '1px solid #C41818');
					$('#rg-pass1-num').fadeIn(200);
					errorData = true;
				}
			} else {
				$('#rg-password1').css('outline', '1px solid #C41818');
				$('#rg-pass1-lows').fadeIn(200);
				errorData = true;
			}
		} else {
			$('#rg-password1').css('outline', '1px solid #C41818');
			$('#rg-pass1-caps').fadeIn(200);
			errorData = true;
		}
	});

	$('#rg-password2').blur(function() {
		$('.rg-pass-eq').css('display', 'none');
		$('#rg-pass2-s').css('display', 'none');
		$('#rg-password2').css('outline', 'none');
		var rgPass2I = document.getElementById('rg-password2');
		var rgPass2 = rgPass2I.value;
		var rgPass1I = document.getElementById('rg-password1');
		var rgPass1 = rgPass1I.value;
		if (rgPass2 == '') {
			$('#rg-password2').css('outline', '1px solid #C41818');
			rgPass2I.setAttribute('placeholder', 'A jelszó megadása kötelező mégegyszer!')
			errorData = true;
		} else if (rgPass1 != rgPass2) {
			$('#rg-password1').css('outline', '1px solid #C41818');
			$('#rg-password2').css('outline', '1px solid #C41818');
			$('.rg-pass-eq').fadeIn(200);
			errorData = true;
		} else {
			$('#rg-pass1-s').fadeIn(200);
			$('#rg-pass2-s').fadeIn(200);
		}
	});

	$('#page').fadeIn(1000);
}

function rgBtnF() {
	$('.msg-label').css('display', 'none');
	$('.msg-label-s').css('display', 'none');
	$('#rg-username').css('outline', 'none');
	$('#rg-email').css('outline', 'none');
	$('#rg-password1').css('outline', 'none');
	$('#rg-password2').css('outline', 'none');
	var rgUsernameI = document.getElementById('rg-username');
	var rgUsername = rgUsernameI.value;
	var rgEmailI = document.getElementById('rg-email');
	var rgEmail = rgEmailI.value;
	var rgPass1I = document.getElementById('rg-password1');
	var rgPass1 = rgPass1I.value;
	var rgPass2I = document.getElementById('rg-password2');
	var rgPass2 = rgPass2I.value;
	var errorData = false;
	var x = rgEmail;
	var a;1
	var atpos = x.indexOf("@");
	var dotpos = x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		a = false;
	} else {
		a = true;
	}
	if (rgUsername == '') {
		$('#rg-username').css('outline', '1px solid #C41818');
		rgUsernameI.setAttribute('placeholder', 'A felhasználónév megadása kötelező!');
		errorData = true;
	} else if (rgUsername.length < 6) {
		$('#rg-username').css('outline', '1px solid #C41818');
		$('#rg-username-min').fadeIn(200);
		errorData = true;
	} else {
		$('#rg-username-s').fadeIn(200);
	}
	if (rgEmail == '') {
		$('#rg-email').css('outline', '1px solid #C41818');
		rgEmailI.setAttribute('placeholder', 'Az e-mail cím megadása kötelező!');
		errorData = true;
	} else if (a == false) {
		$('#rg-email').css('outline', '1px solid #C41818');
		$('#rg-email-f').fadeIn(200);
		errorData = true;
	} else {
		$('#rg-email-s').fadeIn(200);
	}
	if (rgPass1 == '') {
		$('#rg-password1').css('outline', '1px solid #C41818');
		rgPass1I.setAttribute('placeholder', 'A jelszó megadása kötelező!');
		errorData = true;
	} else if (rgPass1.length < 8) {
		$('#rg-password').css('outline', '1px solid #C41818');
		$('#rg-pass1-min').fadeIn(200);
		errorData = true;
	} else if (rgPass1.match(new RegExp("[A-Z]"))) {
		if (rgPass1.match(new RegExp("[a-z]"))) {
			if (rgPass1.match(new RegExp("[0-9]"))) {
				if (rgUsername == rgPass1) {
					$('#rg-username').css('outline', '1px solid #C41818');
					$('#rg-password1').css('outline', '1px solid #C41818');
					$('.rg-username-pass').fadeIn(200);
					errorData = true;
				}
			} else {
				$('#rg-password1').css('outline', '1px solid #C41818');
				$('#rg-pass1-num').fadeIn(200);
				errorData = true;
			}
		} else {
			$('#rg-password1').css('outline', '1px solid #C41818');
			$('#rg-pass1-lows').fadeIn(200);
			errorData = true;
		}
	} else {
		$('#rg-password1').css('outline', '1px solid #C41818');
		$('#rg-pass1-caps').fadeIn(200);
		errorData = true;
	}
	if (rgPass2 == '') {
		$('#rg-password2').css('outline', '1px solid #C41818');
		rgPass2I.setAttribute('placeholder', 'A jelszó megadása kötelező mégegyszer!')
		errorData = true;
	} else if (rgPass1 != rgPass2) {
		$('#rg-password1').css('outline', '1px solid #C41818');
		$('#rg-password2').css('outline', '1px solid #C41818');
		$('.rg-pass-eq').fadeIn(200);
		errorData = true;
	} else {
		$('#rg-pass1-s').fadeIn(200);
		$('#rg-pass2-s').fadeIn(200);
	}
	if (errorData == false) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if (this.responseText == 'success') {
					$('#reg-loading').fadeIn(200);
					$('.rg-input').prop('disabled', true);
					var xhttp2 = new XMLHttpRequest();
					xhttp2.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							if (this.responseText == 'success') {
								$('.header-box').fadeOut(200);
								document.getElementById('cemail').innerHTML = rgEmail;
								$('#hide').fadeOut(200);
								$('#visible').fadeIn(200);
								$('#reg-loading').fadeOut(200);
							} else if (this.responseText == 'error') {
								var x = document.getElementById("snackbar");
								x.className = "show";
								setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
								document.getElementById('snackbar').innerHTML = 'Valami hiba történt a regisztráció során. Próbáld újra később!';
								$('#reg-loading').fadeOut(200);
								$('.rg-input').prop('disabled', false);
							}
						}
					};
					xhttp2.open('GET', 'reg_email.php?success=true&&rgEmail=' + rgEmail + '&&username=' + rgUsername, true);
					xhttp2.send();
				} else if (this.responseText == 'error') {
					var x = document.getElementById("snackbar");
					x.className = "show";
					setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
					document.getElementById('snackbar').innerHTML = 'Valami hiba történt a regisztráció során. Próbáld újra később!';
				} else if (this.responseText == 'registrated_username') {
					var x = document.getElementById("snackbar");
					x.className = "show";
					setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
					document.getElementById('snackbar').innerHTML = 'Ezzel a felhasználónévvel már regisztráltak!';
				} else if (this.responseText == 'registrated_email') {
					var x = document.getElementById("snackbar");
					x.className = "show";
					setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
					document.getElementById('snackbar').innerHTML = 'Ezzel az e-mail címmel már regisztráltak!';
				}
			}
		};
		xhttp.open('POST', 'registration.php', true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send('rgUsername=' + rgUsername + '&rgEmail=' + rgEmail + '&rgPassword=' + rgPass1);
	}
}

function formCheckU(event) {
	var keyC = event.keyCode;
	if (keyC == 13) {
		rgBtnF();
	} else if (keyC == 9) {
		$('#rg-username-min').css('display', 'none');
		$('#rg-username-s').css('display', 'none');
		$('.rg-username-pass').css('display', 'none');
		$('#rg-username').css('outline', 'none');
		var rgUsernameI = document.getElementById('rg-username');
		var rgUsername = rgUsernameI.value;
		var rgPass1I = document.getElementById('rg-password1');
		var rgPass1 = rgPass1I.value;
		if (rgUsername == '') {
			$('#rg-username').css('outline', '1px solid #C41818');
			rgUsernameI.setAttribute('placeholder', 'A felhasználónév megadása kötelező!');
			errorData = true;
		} else if (rgUsername.length < 6) {
			$('#rg-username').css('outline', '1px solid #C41818');
			$('#rg-username-min').fadeIn(200);
			errorData = true;
		} else if (rgUsername == rgPass1) {
			$('#rg-username').css('outline', '1px solid #C41818');
			$('#rg-password1').css('outline', '1px solid #C41818');
			$('.rg-username-pass').fadeIn(200);
			errorData = true;
		}
		else {
			$('#rg-username-s').fadeIn(200);
		}
	}
}

function formCheckE(event) {
	var keyC = event.keyCode;
	if (keyC == 13) {
		rgBtnF();
	} else if (keyC == 9) {
		$('#rg-email-f').css('display', 'none');
		$('#rg-email-s').css('display', 'none');
		$('#rg-email').css('outline', 'none');
		var rgEmailI = document.getElementById('rg-email');
		var rgEmail = rgEmailI.value;
		var x = rgEmail;
		var a;
		var atpos = x.indexOf("@");
		var dotpos = x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			a = false;
		} else {
			a = true;
		}
		if (rgEmail == '') {
			$('#rg-email').css('outline', '1px solid #C41818');
			rgEmailI.setAttribute('placeholder', 'Az e-mail cím megadása kötelező!');
			errorData = true;
		} else if (a == false) {
			$('#rg-email').css('outline', '1px solid #C41818');
			$('#rg-email-f').fadeIn(200);
			errorData = true;
		} else {
			$('#rg-email-s').fadeIn(200);
		}
	}
}

function formCheckP1(event) {
	var keyC = event.keyCode;
	if (keyC == 13) {
		rgBtnF();
	} else if (keyC == 9) {
		$('#rg-pass1-min').css('display', 'none');
		$('#rg-pass1-caps').css('display', 'none');
		$('#rg-pass1-lows').css('display', 'none');
		$('#rg-pass1-num').css('display', 'none');
		$('.rg-username-pass').css('display', 'none');
		$('.rg-pass-eq').css('display', 'none');
		$('#rg-pass1-s').css('display', 'none');
		$('#rg-password1').css('outline', 'none');
		var rgPass1I = document.getElementById('rg-password1');
		var rgPass1 = rgPass1I.value;
		var rgUsernameI = document.getElementById('rg-username');
		var rgUsername = rgUsernameI.value;
		if (rgPass1 == '') {
			$('#rg-password1').css('outline', '1px solid #C41818');
			rgPass1I.setAttribute('placeholder', 'A jelszó megadása kötelező!');
			errorData = true;
		} else if (rgPass1.length < 8) {
			$('#rg-password').css('outline', '1px solid #C41818');
			$('#rg-pass1-min').fadeIn(200);
			errorData = true;
		} else if (rgPass1.match(new RegExp("[A-Z]"))) {
			if (rgPass1.match(new RegExp("[a-z]"))) {
				if (rgPass1.match(new RegExp("[0-9]"))) {
					if (rgUsername == rgPass1) {
						$('#rg-username').css('outline', '1px solid #C41818');
						$('#rg-password1').css('outline', '1px solid #C41818');
						$('.rg-username-pass').fadeIn(200);
						errorData = true;
					}
				} else {
					$('#rg-password1').css('outline', '1px solid #C41818');
					$('#rg-pass1-num').fadeIn(200);
					errorData = true;
				}
			} else {
				$('#rg-password1').css('outline', '1px solid #C41818');
				$('#rg-pass1-lows').fadeIn(200);
				errorData = true;
			}
		} else {
			$('#rg-password1').css('outline', '1px solid #C41818');
			$('#rg-pass1-caps').fadeIn(200);
			errorData = true;
		}
	}
}

function formCheckP2(event) {
	var keyC = event.keyCode;
	if (keyC == 13) {
		rgBtnF();
	} else if (keyC == 9) {
		$('.rg-pass-eq').css('display', 'none');
		$('#rg-pass2-s').css('display', 'none');
		$('#rg-password2').css('outline', 'none');
		var rgPass2I = document.getElementById('rg-password2');
		var rgPass2 = rgPass2I.value;
		var rgPass1I = document.getElementById('rg-password1');
		var rgPass1 = rgPass1I.value;
		if (rgPass2 == '') {
			$('#rg-password2').css('outline', '1px solid #C41818');
			rgPass2I.setAttribute('placeholder', 'A jelszó megadása kötelező mégegyszer!')
			errorData = true;
		} else if (rgPass1 != rgPass2) {
			$('#rg-password1').css('outline', '1px solid #C41818');
			$('#rg-password2').css('outline', '1px solid #C41818');
			$('.rg-pass-eq').fadeIn(200);
			errorData = true;
		} else {
			$('#rg-pass1-s').fadeIn(200);
			$('#rg-pass2-s').fadeIn(200);
		}
	}
}

function formCheckPeq() {
	if (document.getElementById('rg-password1').value != document.getElementById('rg-password2').value) {
		$('#rg-pass1-s').fadeOut(200);
		$('#rg-pass2-s').fadeOut(200);
	} else if (document.getElementById('rg-password1').value == document.getElementById('rg-password2').value) {
		$('.rg-pass-eq').fadeOut(200);
		setTimeout(function() {
			$('#rg-pass1-s').fadeIn(200);
			$('#rg-pass2-s').fadeIn(200);
			$('#rg-password1').css('outline', 'none');
			$('#rg-password2').css('outline', 'none');
		}, 250);
	}
}

function showPass() {
	var a = document.getElementById('rg-password1');
	var b = document.getElementById('rg-password2');
	if (a.type == 'password') {
		a.type = 'text';
		b.type = 'text';
	} else {
		a.type = 'password';
		b.type = 'password';
	}
}

function lgBtnF() {
	var errorData = false;
	var lgUsernameI = document.getElementById('lg-username');
	var lgUsername = lgUsernameI.value;
	var lgPasswordI = document.getElementById('lg-password');
	var lgPassword = lgPasswordI.value;
	var rememberMe = document.getElementById('remember-me');
	var success;
	if (lgUsername == '') {
		$('#lg-username').css('outline', '1px solid #C41818');
		lgUsernameI.setAttribute('placeholder', 'A felhasználónév megadása kötelező!');
		errorData = true;
	} else {
		lgUsernameSend = lgUsername;
		$('#lg-username').css('outline', 'none');
	}
	if (lgPassword == '') {
		 $('#lg-password').css('outline', '1px solid #C41818');
		 lgPasswordI.setAttribute('placeholder', 'A jelszó megadása kötelező!');
		 errorData = true;
	} else {
		lgPasswordSend = lgPassword;
		$('#lg-password').css('outline', 'none');
	}
	if (rememberMe.checked == true) {
		rememberMe = 'true';
	} else {
		rememberMe = 'false';
	}
	if (errorData == false && lgUsernameSend != '' && lgPasswordSend != '') {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var a = this.responseText;
				if (a == 'status0') {
					var x = document.getElementById("snackbar");
					x.className = "show";
					setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
					document.getElementById('snackbar').innerHTML = 'Ez a fiók még nincs aktiválva!';
				} else if (a == 'accountNotFound') {
					var x = document.getElementById("snackbar");
					x.className = "show";
					setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
					document.getElementById('snackbar').innerHTML = 'Hibás felhasználónév vagy jelszó!';
				} else if (a == 'status1') {
					location.replace('redirect.php');
				} else if (a == 'status2') {
					location.replace('redirect.php');
				}
			}
		};
		xhttp.open('POST', 'login.php', true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send('lgUsername=' + lgUsernameSend + '&lgPassword=' + lgPasswordSend + '&rememberMe=' + rememberMe);
	}
}

function formCheckLU(event) {
	var keyC = event.keyCode;
	if (keyC == 13) {
		lgBtnF();
	}
}

function formCheckLP(event) {
	var keyC = event.keyCode;
	if (keyC == 13) {
		lgBtnF();
	}
}

function forgotPassword() {
	$('#forgot-password').fadeIn(200);
}

function forgotPassS() {
	var n = document.getElementById('forgot-password-input');
	var newPass = Math.floor((Math.random() * 1000000) + 1);
	console.log(newPass);
	var b = n.value;
	var x = b;
	var a;1
	var atpos = x.indexOf("@");
	var dotpos = x.lastIndexOf(".");
	if (b == '') {
		$('#forgot-password-input').css('outline', '1px solid #C41818');
		n.setAttribute('placeholder', 'Az e-mail cím megadása kötelező!');
	} else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		$('#for-email-f').fadeIn(200);
		$('#forgot-password-input').css('outline', '1px solid #C41818');
	} else {
		var xhttp3 = new XMLHttpRequest();
		xhttp3.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var c = this.responseText;
				if (c == 'status0') {
					var x = document.getElementById("snackbar");
					x.className = "show";
					setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
					document.getElementById('snackbar').innerHTML = 'Ez a fiók még nincs aktiválva!';
					$('#forgot-password-input').css('outline', '1px solid #C41818');
				} else if (c == 'accountNotFound') {
					var x = document.getElementById("snackbar");
					x.className = "show";
					setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
					document.getElementById('snackbar').innerHTML = 'Ezzel az e-mail címmel nem található regisztrált fiók!';
					$('#forgot-password-input').css('outline', '1px solid #C41818');
				} else if (c == 'success') {
					$('#forp-loading').fadeIn(200);
					n.disabled = true;
					var xhttp4 = new XMLHttpRequest();
					xhttp4.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var d = this.responseText;
							if (d == 'error') {
								var x = document.getElementById("snackbar");
								x.className = "show";
								setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
								document.getElementById('snackbar').innerHTML = 'Valami hiba történt az e-mail elküldése közben!';
								$('#forp-loading').fadeOut(200);
								n.disabled = false;
							} else if (d == 'success') {
								$('.header-box').fadeOut(200);
								document.getElementById('f-p-email').innerHTML = b;
								$('#forp-loading').fadeOut(200);
								$('#hide').fadeOut(200);
								$('#forgot-password-ready').fadeIn(200);
							}
						}
					};
					xhttp4.open('GET', 'forgot_password_email.php?forpSuccess=true&email=' + b + '&&newPass=' + newPass, true);
					xhttp4.send();
				}
			}
		};
		xhttp3.open('GET', 'forgot_password.php?email=' + b + '&&newPass=' + newPass, true);
		xhttp3.send();
	}
}

function forgotPassSI(event) {
	var keyC = event.keyCode;
	if (keyC == 13) {
		forgotPassS();
	}
}
