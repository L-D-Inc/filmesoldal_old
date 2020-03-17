<?php
	if (isset ($_COOKIE['95261a03947a5ee795fe1d026f048ce4'])) {
		$username = base64_decode($_COOKIE['95261a03947a5ee795fe1d026f048ce4']);
		$conn = new mysqli('localhost', 'root', '', 'movie_database');
		$sql = "SELECT ready FROM users WHERE username = '$username';";
		$query = $conn->query($sql);
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				if ($row['ready'] == 'yes') {
					header('Location: index.php');
				}
			}
		}
		$conn->close();
	} else {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="index2.css"/>
    <link rel="stylesheet" type="text/css" href="ready.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="index.js"></script>
    <script src="ready.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <h4 class="h4">Regisztráció véglegesítése</h4>
          <span>Még egy percet kérünk, gyorsan állítsd be fiókodat és már nem is zavarunk. ;)</span><br/>
					<span>Természetesen ezeket a beállításokat később megtudod változtatni.</span>
          <div id="progress-bar-bg"></div>
					<div id="progress-bar-bg2"></div>
					<div id="progress-bar">
						<div><span id="num1"><p>1</p></span></div>
						<div><span id="num2"><p>2</p></span></div>
						<div><span id="num3"><p>3</p></span></div>
						<div><span id="num4"><p>4</p></span></div>
					</div>
          <div id="content">
						<div id="page-style">
							<div class="ready-text" id="page-style-text">
								<h4>Első körben válaszd ki az oldal stílusát...</h4>
							</div>
							<div class="style-box" id="style-box-1" >
								<div class="style-box-m" id="style1" data-style-id="style1">

								</div>
								<i>Stíluslap 1 név</i>
							</div>
							<div class="style-box" id="style-box-2" >
								<div class="style-box-m" id="style2" onclick="styleSelect(this)" data-style-id="style2">

								</div>
								<i>Stíluslap 2 név</i>
							</div>
							<div class="style-box" id="style-box-3">
								<div class="style-box-m" id="style3" onclick="styleSelect(this)" data-style-id="style3">

								</div>
								<i>Stíluslap 3 név</i>
							</div>
							<div class="style-box" id="style-box-4">
								<div class="style-box-m" id="style4" onclick="styleSelect(this)" data-style-id="style4">

								</div>
								<i>Stíluslap 4 név</i>
							</div>
							<span id="selected-style"></span>
							<button type="button" class="btn btn-warning" id="style-next-btn" onclick="styleNext()">Tovább</button>
						</div>
						<div id="movie-recommendation">
							<div class="ready-text" id="movie-recommendation-text">
								<h4>Szeretnél az oldalon filmajánlót?</h4>
								<span>Ha ezt engedélyezed, az oldal tetején mindig kapni fogsz ajánlatot az aktuálisan felkapott film(ek)ről.</span>
							</div>
							<div style="float: left;">
								<label class="switch" onclick="recCheck()" id="switchLabel">
									<input type="checkbox" id="rec-check" checked/>
									<span class="slider round"></span>
								</label>
								<span id="recSpan">Igen</span><br/>
								<div style="clear:both;"></div>
							</div>
							<button type="button" class="btn btn-warning" id="rec-next-btn" onclick="recNext()">Tovább</button>
						</div>
						<div id="point-collection">
							<div class="ready-text">
								<h4>Szeretnél pontokat gyűjteni?</h4>
								<span>Ha engedélyezed a pont gyűjtést, akkor különböző nyereményjátékokon vehetsz részt, amelyen hasznos és értékes
									nyereményeket vihetsz haza. A részletekről a filmkozpont.hu-n belül tudsz majd tájékozódni.</span>
							</div>
							<div style="float: left;">
								<label class="switch" onclick="pointColl()" id="pointCollLabel">
									<input type="checkbox" id="pointColl-check" checked/>
									<span class="slider round"></span>
								</label>
								<span id="pointCollSpan">Igen</span><br/>
								<div style="clear:both;"></div>
							</div>
							<button type="button" class="btn btn-warning" id="point-coll-btn" onclick="pointCollNext()">Tovább</button>
						</div>
						<div id="settings-sum">
							<table>
								<tr>
									<td><h4>Kiválasztott stíluslap:</h4></td>
									<td>
										<h4 id="selected-style-sum" style="font-weight: bold;"></h4>
										<img src="sssa"/>
									</td>
								</tr>
								<tr>
									<td><h4>Filmajánló engedélyezve:</h4></td>
									<td><h4 id="selected-recommendation-sum" style="font-weight: bold;"></h4></td>
								</tr>
								<tr>
									<td><h4>Pontgyűjtés engedélyezve:</h4></td>
									<td><h4 id="selected-point-sum" style="font-weight: bold;"></h4></td>
								</tr>
							</table>
						</div>
					</div>
        </div>
        <div class="col-sm-2"></div>
      </div>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-10" style="text-align: center;">
					<div id="final-box">
						<h3>Mostmár élvezheted a Full HD filmeket a filmkozpont.hu-n. Jó szórakozást! ;)</h3>
						<button type="button" id="process-btn" onclick="readyProcess()">megyek filmezni</button>
					</div>
				</div>
				<div class="col-sm-1"></div>
			</div>
    </div>
	</body>
</html>
