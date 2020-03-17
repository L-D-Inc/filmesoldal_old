var selected;
var selectedStyle;
var a;
var b;
var c;
function styleSelect(style) {
	var styleId = style.getAttribute('data-style-id');
	selected = styleId;
	var deviceWidth = window.innerWidth;
	if (selected == styleId) {
		if (deviceWidth >= 1200) {
			$('.style-box-m').animate({
				width: '320px',
				height: '200px'
			}, 100);
			$('#' + styleId).animate({
				width: '300px',
				height: '180px'
			}, 100);
			$('#style-next-btn').fadeIn(200);
			$('#selected-style').fadeIn(200);
		} else if (deviceWidth < 1200 && deviceWidth > 992) {
			$('.style-box-m').animate({
				width: '246px',
				height: '164px'
			}, 100);
			$('#' + styleId).animate({
				width: '226px',
				height: '144px'
			}, 100);
			$('#style-next-btn').fadeIn(200);
			$('#selected-style').fadeIn(200);
		} else if (deviceWidth < 992 && deviceWidth > 767) {
			$('.style-box-m').animate({
				width: '188px',
				height: '125px'
			}, 100);
			$('#' + styleId).animate({
				width: '168px',
				height: '105px'
			}, 100);
			$('#style-next-btn').fadeIn(200);
			$('#selected-style').fadeIn(200);
		}
	}
	a = selected;
}

function styleNext() {
	$('#page-style').fadeOut(200);
	$('#progress-bar-bg2').animate({
		width: '24%'
	}, 400);
	setTimeout(function() {
		$('#num2').css('backgroundColor', '#e99406');
		$('#num2').css('border', '3px solid #fff');
		$('#num2').css('color', '#fff');
		$('#movie-recommendation').fadeIn(200);
	}, 300);
}

var recChecked = true;
b = 'Igen';
function recCheck() {
	recChecked = document.getElementById('rec-check').checked;
	if (recChecked == true) {
		document.getElementById('recSpan').innerHTML = 'Igen';
		b = 'Igen';
	} else {
		document.getElementById('recSpan').innerHTML = 'Nem';
		b = 'Nem';
	}
}

function recNext() {
	$('#movie-recommendation').fadeOut(200);
	$('#progress-bar-bg2').animate({
		width: '48%'
	}, 400);
	setTimeout(function() {
		$('#num3').css('backgroundColor', '#e99406');
		$('#num3').css('border', '3px solid #fff');
		$('#num3').css('color', '#fff');
		$('#point-collection').fadeIn(200);
	}, 300);
}

var pCChecked = true;
c = 'Igen';
function pointColl() {
	pCChecked = document.getElementById('pointColl-check').checked;
	if (pCChecked == true) {
		document.getElementById('pointCollSpan').innerHTML = 'Igen';
		c = 'Igen';
	} else {
		document.getElementById('pointCollSpan').innerHTML = 'Nem';
		c = 'Nem';
	}
}

function pointCollNext() {
	$('#point-collection').fadeOut(200);
	$('#progress-bar-bg2').animate({
		width: '72%'
	}, 400);
	setTimeout(function() {
		$('#num4').css('backgroundColor', '#e99406');
		$('#num4').css('border', '3px solid #fff');
		$('#num4').css('color', '#fff');
		$('#settings-sum').fadeIn(200);
		$('#final-box').fadeIn(200);
	}, 300);
	document.getElementById('selected-style-sum').innerHTML = a;
	document.getElementById('selected-recommendation-sum').innerHTML = b;
	document.getElementById('selected-point-sum').innerHTML = c;
}

function readyProcess() {
	location.replace('ready_process.php?ready=yes&&style=' + a + '&&recommendation=' + b + '&&pointColl=' + c);
}
