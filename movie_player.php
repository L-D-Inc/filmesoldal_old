<html>
	<head>
		<link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">
		<script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
		<script src="plugins.js"></script>
	</head>
	<body style="margin: 0px;">
		<video id='movie' class='video-js' controls preload='auto'
			poster='MY_VIDEO_POSTER.jpg' data-setup='{}' style="width: 100%; height: 100%;">
			<!--<source src='movies/<?php echo $_GET['movie_name']; ?>.mp4' type='video/mp4'> -->
			<source src="movies/proba.mp4" type="video/mp4">
		</video>
		<script src='https://vjs.zencdn.net/7.4.1/video.js'></script>
	</body>
</html>
