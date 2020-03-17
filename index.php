<?php
	if (isset ($_COOKIE['95261a03947a5ee795fe1d026f048ce4'])) {
		$username = base64_decode ($_COOKIE['95261a03947a5ee795fe1d026f048ce4']);
		$conn = new mysqli('localhost', 'root', '', 'movie_database');
		$sql = "SELECT ready FROM users WHERE username = '$username';";
		$query = $conn->query($sql);
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				if ($row['ready'] == 'no') {
					header ('Location: ready.php?username=' . $username);
				}
			}
		}
	} else {
		header ('Location: login_page.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<link rel="stylesheet" type="text/css" href="main.min.css"/>
		<link rel="stylesheet" type="text/css" href="style1.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="plugins.js" type="text/javascript"></script>
		<script src="radialIndicator.js"></script>
		<?php
			$user_datas = array();
			$conn = new mysqli('localhost', 'root', '', 'movie_database');
			$sql = "SELECT * FROM users WHERE username = '$username'";
			$query = $conn->query($sql);
			if ($query->num_rows > 0) {
				while ($row = $query->fetch_assoc()) {
					array_push($user_datas, $row['username'], $row['status'], $row['watched_movies'], $row['points']);
				}
			}
			$conn->close();
		?>
	</head>
	<body>
		<div id="movieModal" class="modal">
			<div class="modal-content">
				<h4 class="modal-title">Film lejátszás</h4>
				<span class="modal-close" onclick="closeModal()"><img src="images/icons/close2.png" alt=""/></span><br/>
				<div class="modal-hr"></div>
				<div id="modal-main-content"></div>
			</div>
		</div>
		<div id="profileSettingsModal" class="modal">
			<div class="modal-content">
				<h4 class="modal-title">Beállítások</h4>
				<span class="modal-close" onclick="closeModalPS()"><img src="images/icons/close2.png" alt=""/></span><br/>
				<div class="modal-hr"></div>
				<div id="modal-main-content-profile-settings">

				</div>
			</div>
		</div>
		<div id="notificationsModal" class="modal">
			<div class="modal-content">
				<h4 class="modal-title">Értesítések</h4>
				<span class="modal-close" onclick="closeModalN()"><img src="images/icons/close2.png" alt=""/></span><br/>
				<div class="modal-hr"></div>
				<div id="modal-main-content-notifications">
					<?php
						include('notifications_show.php');
					?>
					<div class="notification-box">
						<div class="not-box-left">
							<span class="notification-text">Üdvözlünk a filmkozpont.hu-n!</span>
						</div>
						<div class="not-box-right">
							<span type="button" class="notification-delete-btn" onclick="notificationDelete(this)">
								<img src="images/icons/delete.png" alt=""/>
							</span>
						</div>
					</div>
					<div class="notification-box">
						<div class="not-box-left">
							<span class="notification-text">Gratulálunk, szintet léptél! Jelenleg 2-es szintű vagy. A szintlépésért kapsz 1250 bónusz pontot.</span>
						</div>
						<div class="not-box-right">
							<span type="button" class="notification-delete-btn" onclick="notificationDelete(this)">
								<img src="images/icons/delete.png" alt=""/>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="profileDatasModal" class="modal">
			<div class="modal-content">
				<h4 class="modal-title">Profil adatok</h4>
				<span class="modal-close" onclick="closeModalD()"><img src="images/icons/close2.png" alt=""/></span><br/>
				<div class="modal-hr"></div>
				<div id="modal-main-content-profile-datas">content</div>
			</div>
		</div>
		<?php
			$conn2 = new mysqli('localhost', 'root', '', 'movie_database');
			$sql2 = "SELECT username, status FROM users WHERE username = '$username';";
			$query2 = $conn2->query($sql2);
			if ($query2->num_rows > 0) {
				while ($row = $query2->fetch_assoc()) {
					if ($row['status'] == 'status2') {
						echo '<div id="newPassModal" class="modal">
								<div class="modal-content">
									<h4 style="font-family: caviar; float: left;">Új jelszó létrehozása</h4>
									<span id="modal-close" onclick="closeModal()">&times;</span><br/>
									<hr id="modal-hr"></hr>
									<p>Nemrég "Elfelejtett jelszó" kérelmet nyújtottál be. Az automatikusan generált jelszót ajánljuk, hogy változtasd meg.</p>

								</div>
							</div>';
							$conn3 = new mysqli('localhost', 'root', '', 'movie_database');
							$sql3 = "UPDATE users SET status = 'status1' WHERE username = '$username';";
							$conn3->query($sql3);
							$conn3->close();
					}
				}
			}
			$conn2->close();
		?>
		<div id="black-cover"></div>
		<div id="page">
			<div class="col" id="left-box">
				<div id="logo-box">
					<a href="index.php">
						<img src="images/logo.jpg" alt="" id="logo"/>
					</a>
				</div>
				<div id="menu-box">
					<ul class="menu" id="main-menu">
						<?php
							$values = [];
							$descriptions = [];
							$conn = new mysqli('localhost', 'root', '', 'movie_database');
							$sql_c = 'SELECT * FROM categories';
							$query_c = $conn->query($sql_c);
							if ($query_c->num_rows > 0) {
								while ($row = $query_c->fetch_assoc()) {
									array_push($values, utf8_encode ($row['name']));
									array_push($descriptions, $row['description']);
								}
							}
							$count = array();
							$conn = new mysqli('localhost', 'root', '', 'movie_database');
							$sql = "SELECT id FROM movies";
							$query = $conn->query($sql);
							if ($query->num_rows > 0) {
								$all_movies = $query->num_rows;
							}
							$conn->close();
							echo '<li onmouseenter="miniBoxH(this)" onmouseleave="miniBoxHO(this)" data-movie-category="Összes_film"><a href="index.php?category=Összes_film"><img src="images/icons/menu_icons/Összes_film.png" alt="" class="menu-icon"/>Összes film
							<span class="badge">' . $all_movies . '</span><span class="right-arrow">&#8250</span></a></li><div class="mini-box">
								dasdasdasdsdasdsd
							</div>';
							for ($i=0; $i<count($descriptions); $i++) {
								echo '<div class="mini-box" id="mb-' . $values[$i] . '"><p>'
									. utf8_encode ($descriptions[$i]) .
								'</p></div>';
							}
							for ($i=0; $i<count($values); $i++) {
								$conn = new mysqli('localhost', 'root', '', 'movie_database');
								mysqli_set_charset($conn, 'utf8');
								$sql = "SELECT id FROM movies WHERE genre1 = '$values[$i]' or genre2 = '$values[$i]' or genre3 = '$values[$i]'";
								$query = $conn->query($sql);
								if ($query->num_rows > 0) {
									$item = $query->num_rows;
								} elseif ($query->num_rows == 0) {
									$item = 0;
								}
								$conn->close();
								array_push($count, $item);
								echo '
								<li onmouseenter="miniBoxH(this)" onmouseleave="miniBoxHO(this)" data-movie-category="' . $values[$i] . '">
									<a href="index.php?category=' . $values[$i] . '">
										<img src="images/icons/menu_icons/' . $values[$i] . '.png" alt="" class="menu-icon"/>' . $values[$i] . '
										<span class="badge">' . $count[$i] . '</span><span class="right-arrow">&#8250;</span>
									</a>
								</li>';
							}
						?>
					</ul>
					<ul class="menu" id="secondary-menu">
						<li style="cursor: not-allowed;"><a><img src="images/icons/menu_icons/Trilógiák.png" alt="" class="menu-icon"/>Trilógiák, Maratonok<span class="right-arrow">&#8250;</span></a></li>
						<li style="cursor: not-allowed;"><a><img src="images/icons/menu_icons/Sorozatok.png" alt="" class="menu-icon"/>Sorozatok<span class="right-arrow">&#8250;</span></a></li>
					</ul>
				</div>
			</div>
			<div class="col" id="center-box">
				<div id="searching-box">
					<form method="get">
						<input type="text" id="search-input" onkeydown="search()" name="search_value" value="<?php if (isset($_GET['search_value'])) {echo $_GET['search_value'];} ?>"autocomplete="off"/><img src="images/icons/search.png" alt="" id="search-img"/>
					</form>
					<div id="search-results">
						<span class="search-result" onclick="searchResult(this)"></span>
						<span class="search-result" onclick="searchResult(this)"></span>
						<span class="search-result" onclick="searchResult(this)"></span>
						<span class="search-result" onclick="searchResult(this)"></span>
						<span class="search-result" onclick="searchResult(this)"></span>
						<span id="not-found">Nincs találat</span>
					</div>
				</div>
				<div id="recommendation-box">

				</div>
				<div id="vertical-bar">
					<?php
						if (isset($_GET['category'])) {
							include ('vertical_bar.php');
						}
					?>
				</div>
				<div id="movie-thumbnails">
					<?php
						if (isset ($_GET['search_value'])) {
							$error_movie_load = '<h5 class="h5" style="colorl: #fff;">Nincs találat!</h5>';
							$search_value = $_GET['search_value'];
							if ($search_value == '') {
								echo $error_movie_load;
							} else {
								$conn = new mysqli('localhost', 'root', '', 'movie_database');
								$sql = $conn->query("SELECT * FROM movies WHERE name LIKE '%$search_value%' ORDER BY name ASC");
								if ($sql->num_rows > 0) {
									$sum = $sql->num_rows;
									echo '<h5 class="category-title">Keresés eredménye:</h5><br/>';
									while ($row = $sql->fetch_assoc()) {
										$rated = 0;
										if ($row['rated'] == 0) {
											$rated = 5;
										} else if ($row['rated'] == 2) {
											$rated = 4.5;
										} else if ($row['rated'] == 4) {
											$rated = 4;
										} else if ($row['rated'] == 6) {
											$rated = 3.5;
										} else if ($row['rated'] == 8) {
											$rated = 3;
										} else if ($row['rated'] == 10) {
											$rated = 2.5;
										} else if ($row['rated'] == 12) {
											$rated = 2;
										} else if ($row['rated'] == 14) {
											$rated = 1.5;
										} else if ($row['rated'] == 16) {
											$rated = 1;
										} else if ($row['rated'] == 18) {
											$rated = 0.5;
										}
										@ $include_movies = include ('movie_thumbnail.php');
									}
								} else {
									echo $error_movie_load;
								}
								$conn->close();
							}
						} elseif (isset($_GET['category'])) {
							$error_movie_load = '<h5 class="h5" style="color: #fff;">Ez a kategória üres!</h5>';
							$category = $_GET['category'];
							if ($category == 'Összes_film') {
								if (isset($_GET['order_by'])) {
									$order_by = $_GET['order_by'];
								} else {
									$order_by = 'name ASC';
								}
								$conn = new mysqli('localhost', 'root', '', 'movie_database');
								$sql = "SELECT * FROM movies";
								$query = $conn->query($sql);
								if ($query->num_rows > 0) {
									$num_rows = $query->num_rows;
									$movies_per_page = 25;
									$totalpages = ceil ($num_rows / $movies_per_page);
									if (isset ($_GET['page']) && !empty ($_GET['page'])) {
										$page = $_GET['page'];
									} else {
										$page = 1;
									}
									if ($totalpages > 3) {

									}
									$offset = ($page - 1) * $movies_per_page;
									$sql2 = "SELECT * FROM movies ORDER BY $order_by LIMIT $movies_per_page OFFSET $offset";
									$query2 = $conn->query($sql2);
									$num_rows2 = $query2->num_rows;
									echo '<h4 class="category-title">Összes film</h4>';
									while ($row = $query2->fetch_assoc()) {
										$rated = 0;
										if ($row['rated'] == 0) {
											$rated = 5;
										} else if ($row['rated'] == 2) {
											$rated = 4.5;
										} else if ($row['rated'] == 4) {
											$rated = 4;
										} else if ($row['rated'] == 6) {
											$rated = 3.5;
										} else if ($row['rated'] == 8) {
											$rated = 3;
										} else if ($row['rated'] == 10) {
											$rated = 2.5;
										} else if ($row['rated'] == 12) {
											$rated = 2;
										} else if ($row['rated'] == 14) {
											$rated = 1.5;
										} else if ($row['rated'] == 16) {
											$rated = 1;
										} else if ($row['rated'] == 18) {
											$rated = 0.5;
										}
										@ $include_movies = include ('movie_thumbnail.php');
									}

								} else {
									echo $error_movie_load;
								}
								$conn->close();
							} else {
								$db_conn = new mysqli('localhost', 'root', '', 'movie_database');
								mysqli_set_charset($db_conn, 'utf8');
								$order_by = 'name ASC';
								$sql = $db_conn->query("SELECT * FROM movies WHERE genre1 = '$category' or genre2 = '$category' or genre3 = '$category' ORDER BY $order_by");
								if ($sql->num_rows > 0) {
									$sum = $sql->num_rows;
									echo '<h5 class="category-title">' . $category . '</h5><br/>';
									while ($row = $sql->fetch_assoc()) {
										$rated = 0;
										if ($row['rated'] == 0) {
											$rated = 5;
										} else if ($row['rated'] == 2) {
											$rated = 4.5;
										} else if ($row['rated'] == 4) {
											$rated = 4;
										} else if ($row['rated'] == 6) {
											$rated = 3.5;
										} else if ($row['rated'] == 8) {
											$rated = 3;
										} else if ($row['rated'] == 10) {
											$rated = 2.5;
										} else if ($row['rated'] == 12) {
											$rated = 2;
										} else if ($row['rated'] == 14) {
											$rated = 1.5;
										} else if ($row['rated'] == 16) {
											$rated = 1;
										} else if ($row['rated'] == 18) {
											$rated = 0.5;
										}
										@ $include_movies = include ('movie_thumbnail.php');
									}
								} else {
									echo $error_movie_load;
								}
								$db_conn->close();
							}
						} else {
							$conn = new mysqli('localhost', 'root', '', 'movie_database');
							$query = $conn->query('SELECT * FROM movies ORDER BY id DESC LIMIT 25');
							if ($query->num_rows > 0) {
								echo '<h4 class="category-title">Legutóbbi feltöltések</h4>';
								while ($row = $query->fetch_assoc()) {
									$rated = 0;
									if ($row['rated'] == 0) {
										$rated = 5;
									} else if ($row['rated'] == 2) {
										$rated = 4.5;
									} else if ($row['rated'] == 4) {
										$rated = 4;
									} else if ($row['rated'] == 6) {
										$rated = 3.5;
									} else if ($row['rated'] == 8) {
										$rated = 3;
									} else if ($row['rated'] == 10) {
										$rated = 2.5;
									} else if ($row['rated'] == 12) {
										$rated = 2;
									} else if ($row['rated'] == 14) {
										$rated = 1.5;
									} else if ($row['rated'] == 16) {
										$rated = 1;
									} else if ($row['rated'] == 18) {
										$rated = 0.5;
									}
									@ $include_movies = include ('movie_thumbnail.php');
								}
							} else {
								echo $error_movie_load;
							}
							$conn->close();
						}
					?>
				</div>
			</div>
			<div class="col" id="right-box">
				<div id="r-top-btns">
					<button type="button" id="profile-settings" onclick="profileSettingsModal()"><img src="images/icons/profile_settings.png" alt=""/></button>
					<button type="button" id="notifications" onclick="notificationsModal()">
						<img src="images/icons/notification_empty.png" alt=""/>
						<span class="badge" id="notifications-badge"></span>
					</button>
					<button type="button" id="log-out" onclick="logOut()"><img src="images/icons/logout.png" alt=""/></button>
				</div>
				<div id="profile">
					<div id="skill-progress">
						<img src="images/icons/default_avatar.png" alt="" id="avatar" onclick="profileDatasModal()"/>
					</div>
					<p id="username"><?php echo base64_decode ($_COOKIE['95261a03947a5ee795fe1d026f048ce4']); ?></p><br/>
				</div>
				<div id="other-data">
					<span id="rank"></span><br/>
					<span id="level"></span><br/>
					<span id="watched-movies">Megtekintett filmek:&nbsp;<?php echo $user_datas[2]; ?></span><br/>
					<span id="points"></span>
				</div>
			</div>
			<div class="col" id="footer">
				<?php
				echo '<div class="center"><div class="pagination">';
				for ($i=1; $i<=$totalpages; $i++) {
					if ($i == $page) {
						echo '<a class="active">' . $i . '</a>';
					} else {
						echo '<a href="index.php?category=' . $category . '&page=' . $i . '">' . $i . '</a>';
					}
				}
				echo '</div></div>';
				?>
			</div>
		</div>
	</body>
</html>
