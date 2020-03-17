function menu(a) {
	var category = a.getAttribute('data-menu-category');
	document.cookie = 'category=' + category;
}

function orderBy() {
	var order_by = document.getElementById('order-by').value;
	document.cookie = 'order_by=' + order_by;
}

window.onload = function() {
	var modalHeight = window.innerHeight;
	$('.modal').css('height', modalHeight);

	var modalContentHeight = modalHeight - 200;
	console.log(modalHeight, modalContentHeight)
	$('.modal-content').css('maxHeight', modalContentHeight);

	$('.movie-thumbnail').hover(function() {
		$('.movie-thumb-content', this).fadeIn(100);
	});
	$('.movie-thumbnail').mouseleave(function() {
		$('.movie-thumb-content', this).fadeOut(100);
	});
	$('.movie-thumbnail').hover(function() {
		$('.thumb-cover', this).fadeIn(100);
	});

	function pointsQuery() {
		var radialObj = $('#skill-progress').data('radialIndicator');
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.status == 200 && this.readyState == 4) {
				var a = document.getElementById('points');
				if (parseInt(this.responseText) != 0) {
					var b = parseInt(this.responseText);
					a.innerHTML = 'Pontszám:&nbsp;' + b;
					//rank and level configuration
					var levelBox = document.getElementById('level');
					var rankBox = document.getElementById('rank');
					var level;
					var rank;
					if (b >= 0 && b <= 10000) {
						level = 1;
						levelBox.innerHTML = 'Szint:&nbsp;' + level;
						rankBox.innerHTML = 'Rang:&nbsp;Újonc';
						radialObj.option('maxValue', 10000);
						radialObj.animate(b);
					} else if (b >= 10001 && b <= 25000) {
						level = 2;
						levelBox.innerHTML = 'Szint:&nbsp;' + level;
						rankBox.innerHTML = 'Rang:&nbsp;Felhasználó';
						radialObj.option('minValue', 10001);
						radialObj.option('maxValue', 25000);
						radialObj.animate(b);
					} else if (b >= 25001 && b <= 40000) {
						level = 3;
						levelBox.innerHTML = 'Szint:&nbsp;' + level;
						rankBox.innerHTML = 'Rang:&nbsp;Tag';
						radialObj.option('minValue', 25001);
						radialObj.option('maxValue', 40000);
						radialObj.animate(b);
					} else if (b >= 40001 && b <= 75000) {
						level = 4;
						levelBox.innerHTML = 'Szint:&nbsp;' + level;
						rankBox.innerHTML = 'Rang:&nbsp;';
						radialObj.option('minValue', 40001);
						radialObj.option('maxValue', 75000);
						radialObj.animate(b);
					} else if (b >= 75001 && b <= 100000) {
						level = 5;
						levelBox.innerHTML = 'Szint:&nbsp;' + level;
						radialObj.option('minValue', 75001);
						radialObj.option('maxValue', 100000);
						radialObj.animate(b);
					} else if (b >= 100001 && b <= 150000) {
						level = 6;
						levelBox.innerHTML = 'Szint:&nbsp;' + level;
						radialObj.option('minValue', 100001);
						radialObj.option('maxValue', 150000);
						radialObj.animate(b);
					} else if (b >= 150001 && b <= 250000) {
						level = 7;
						levelBox.innerHTML = 'Szint:&nbsp;' + level;
						radialObj.option('minValue', 150001);
						radialObj.option('maxValue', 250000);
						radialObj.animate(b);
					} else if (b >= 250001 && b <= 500000) {
						level = 8;
						levelBox.innerHTML = 'Szint:&nbsp;' + level;
						radialObj.option('minValue', 250001);
						radialObj.option('maxValue', 500000);
						radialObj.animate(b);
					} else if (b >= 500001 && b <= 1000000) {
						level = 9;
						levelBox.innerHTML = 'Szint:&nbsp;' + level;
						radialObj.option('minValue', 500001);
						radialObj.option('maxValue', 1000000);
						radialObj.animate(b);
					} else if (b >= 1000001 && b <= 3000000) {
						level = 10;
						levelBox.innerHTML = 'Szint:&nbsp;' + level;
						radialObj.option('minValue', 1000001);
						radialObj.option('maxValue', 3000000);
						radialObj.animate(b);
					}
					//rank and level configuration end
				} else {
					a.innerHTML = 0;
				}
			}
		};
		xhttp.open('GET', 'points_process.php?process=true', true);
		xhttp.send();

		//notifications check


			var target = document.getElementById('notifications-badge');
			var username = document.getElementById('username').innerText;
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if (this.responseText != '' && this.responseText != '0') {
						target.innerHTML = this.responseText;
						target.style.display = 'inline';
					}
				}
			};
			xhttp.open('GET', 'notifications_check.php?check=true&&username=' + username, true);
			xhttp.send();

		//notifications check end
	}

	$('#skill-progress').radialIndicator({
			barBgColor: '#cccccc',
      barColor: '#eb7f19',
      barWidth: 10,
      initValue: 0,
      roundCorner : true,
      percentage: false,
			displayNumber: false,
			minValue: 0,
			frameNum: 50
  });
	pointsQuery();
setInterval(function() {
	pointsQuery();
}, 5000);



	var bodyHeight = document.getElementsByTagName('body')[0].offsetHeight;
	var windowHeight = window.innerHeight;
	var boxHeight;
	if (bodyHeight < windowHeight) {
		boxHeight = windowHeight;
	} else {
		boxHeight = bodyHeight;
	}
	$('#left-box').css('height', boxHeight + 'px');
	$('#right-box').css('height', boxHeight + 'px');
};



function miniBoxH(c) {
	var cat = c.getAttribute('data-movie-category');
	var catH = '#mb-' + cat;
	$(catH).fadeIn(100);
}

function miniBoxHO(c) {
	var cat = c.getAttribute('data-movie-category');
	var catH = '#mb-' + cat;
	$(catH).fadeOut(100);
}

function playMovie(m) {
	$('.movie-thumbnail').css('position', 'static');
	$('.movie-thumbnail').css('zIndex', 'auto');
	$('#black-cover').fadeOut(200);
	var modal = document.getElementById('movieModal');
	var btn = document.getElementById('play-movie-btn');
	var span = document.getElementsByClassName('close')[0];
	$('#movieModal').fadeIn(200);

	var movie = m.getAttribute('data-movie-name');
	document.cookie = "movieName=" + movie;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('modal-main-content').innerHTML = this.responseText;
		}
	};
	xhttp.open('GET', 'modal_progress.php?movieCookie=' + movie, true);
	xhttp.send();
	setTimeout(function() {
		var iframe = document.getElementById('movie-iframe');
		var width = iframe.offsetWidth;
		var height = (width / 16) * 9;
		console.log(height);
		iframe.style.height = height + 'px';
	}, 1000);

	setTimeout(function() {
		document.getElementById('movie-iframe').style.display = 'none';
		document.getElementById('movie-iframe').style.visibility = 'visible';
		$('#movie-iframe').fadeIn(200);
		document.getElementById('iframe-loading').style.visibility = 'hidden';
		document.getElementById('modal-btn-group').style.visibility = 'visible';
	}, 1200);
	setInterval (function() {
		var a = document.getElementById('points').innerText;
		var b = a.slice(10);
		var currentPoints = parseInt(b);
		var iframe = document.getElementById('movie-iframe');
		var videoDiv = iframe.contentWindow.document.getElementById('movie');
		var c = videoDiv.getAttribute('class');
		var videoTag = videoDiv.children[0];
		if (c.indexOf('vjs-playing') != -1) {
			var gotPoints = videoTag.currentTime;
			var countPoints = currentPoints + gotPoints;
			var username = document.getElementById('username').innerText;
			var xhttp = new XMLHttpRequest();
			xhttp.open('GET', 'points_insert.php?points=' + countPoints + '&&username=' + username, true);
			xhttp.send();
		}
		console.log(currentPoints, gotPoints, countPoints);
	}, 5000);

	setTimeout(function() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var ratingCode = this.responseText;
				var rating;
				if (ratingCode == 0) {
					rating = 5;
				} else if (ratingCode == 2) {
					rating = 4.5;
				} else if (ratingCode == 4) {
					rating = 4;
				} else if (ratingCode == 6) {
					rating = 3.5;
				} else if (ratingCode == 8) {
					rating = 3;
				} else if (ratingCode == 10) {
					rating = 2.5;
				} else if (ratingCode == 12) {
					rating = 2;
				} else if (ratingCode == 14) {
					rating = 1.5;
				} else if (ratingCode == 16) {
					rating = 1;
				} else if (ratingCode == 18) {
					rating = 0.5;
				}
				var a = document.getElementsByClassName('rating')[0].children[ratingCode];
				a.setAttribute('checked', 'true');
			}
		};
		xhttp.open('GET', 'own_rated.php?pquery=true', true);
		xhttp.send();
	}, 100);
}

function iframeLoad() {
	console.log('dassa');
}

function closeModal() {
	$('#movieModal').fadeOut(200);
	var iframe = document.getElementById('movie-iframe');
	var videoDiv = iframe.contentWindow.document.getElementById('movie');
	var a = videoDiv.children[0];
	a.pause();
}

function closeModalPS() {
	$('#profileSettingsModal').fadeOut(200);
}

function closeModalN() {
	$('#notificationsModal').fadeOut(200);
}

function profileSettingsModal() {
	$('#profileSettingsModal').fadeIn(200);
}

function notificationsModal() {
	$('#notificationsModal').fadeIn(200);
	var a = document.getElementById('notifications-badge');
}

function logOut() {
	var xhttp = new XMLHttpRequest();
	xhttp.open('GET', 'log_out.php?u=yes', true);
	xhttp.send();
	location.replace('index.php');
}

function profileDatasModal() {
	$('#profileDatasModal').fadeIn(200);
}

function closeModalD() {
	$('#profileDatasModal').fadeOut(200);
}

window.onclick = function(event) {
	if (event.target == document.getElementById('movieModal')) {
		$('#movieModal').fadeOut(200);
		var iframe = document.getElementById('movie-iframe');
		var videoDiv = iframe.contentWindow.document.getElementById('movie');
		var a = videoDiv.children[0];
		a.pause();
	}

	if (event.target == document.getElementById('newPassModal')) {
		$('#newPassModal').fadeOut(200);
	}

	if (event.target == document.getElementById('profileSettingsModal')) {
		$('#profileSettingsModal').fadeOut(200);
	}

	if (event.target == document.getElementById('notificationsModal')) {
		$('#notificationsModal').fadeOut(200);
	}

	if (event.target == document.getElementById('profileDatasModal')) {
		$('#profileDatasModal').fadeOut(200);
	}

	if (event.target == document.getElementById('black-cover')) {
		$('#black-cover').fadeOut(200);
	}

	if (event.target == document.getElementById('black-cover')) {
		$('.movie-thumbnail').css('position', 'static');
		$('.movie-thumbnail').css('zIndex', 'auto');
	}

	if (event.target != document.getElementById('searching-box')) {
		var i;
		for (i=0; i<=4; i++) {
			$('.search-result').fadeOut(200);
			document.getElementsByClassName('search-result')[i].innerHTML = '';
		}
	}
}

function profileDatas() {

}

function levelUp() {

}

function rating() {
	var i;
	var a;
	var rating;
	for (i=0; i<=19; i++) {
		a = document.getElementsByClassName('rating')[0].children[i];
		if (a.checked) {
			var xhttp = new XMLHttpRequest();
			xhttp.open('GET', 'rating.php?rating=' + i, true);
			xhttp.send();
		}
	}
	setTimeout(function() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var responseText = this.responseText;
				var b = responseText.split('&');
				document.getElementById(b[0] + '-rate').innerHTML = b[1];
				document.getElementById(b[0] + '-rate-sum').innerHTML = b[1] + '&nbsp;/&nbsp5&nbsp;(' + b[2] + ')';
			}
		};
		xhttp.open('GET', 'rating_check.php?check=true', true);
		xhttp.send();
	}, 500);
}

function search() {
	setTimeout(function() {
		var resultBoxes = [];
		var value = document.getElementById('search-input').value;
		if (value.length >= 3) {
			setTimeout(function() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var responseText = this.responseText;
						if (responseText == 'notFound') {
							var i;
							for (i=0; i<=4; i++) {
								document.getElementsByClassName('search-result')[i].style.display = 'none';
								document.getElementsByClassName('search-result')[i].innerHTML = '';
							}
							document.getElementById('not-found').style.display = 'block';
						} else {
							var i;
							var pPos = 0;
							var pPosNext = 0;
							var results;
							var forLength = responseText.split('+').length - 2;
							for (i=0; i<=forLength; i++) {
								if (pPosNext != 0) {
									pPos = pPosNext;
								}
								pPosNext = responseText.indexOf('+', pPos + 1);
								resultsRaw = responseText.slice(pPos, pPosNext);
								results = resultsRaw.replace('+', '');
								resultBoxes.push(results);
								document.getElementById('not-found').style.display = 'none';
								document.getElementsByClassName('search-result')[i].style.display = 'block';
								document.getElementsByClassName('search-result')[i].innerHTML = resultBoxes[i];
							}
						}
					}
				};
				xhttp.open('GET', 'search_instant.php?value=' + value, true);
				xhttp.send();
			}, 200);
		} else {
			var i;
			for (i=0; i<=4; i++) {
				document.getElementsByClassName('search-result')[i].style.display = 'none';
				document.getElementsByClassName('search-result')[i].innerHTML = '';
				document.getElementById('not-found').style.display = 'none';
			}
		}
	}, 100);
}

function searchResult(v) {
	var value = v.innerText;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var response = this.responseText;
			var responseBox = '#' + response + '-box';
			$('#black-cover').fadeIn(200);
			$(responseBox).css('position', 'relative');
			$(responseBox).css('zIndex', '9999');
		}
	};
	xhttp.open('GET', 'search.php?value=' + value, true);
	xhttp.send();
}
