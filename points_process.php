<?php
  if (isset($_GET['process']) && $_GET['process'] == 'true') {
    $username = base64_decode ($_COOKIE['95261a03947a5ee795fe1d026f048ce4']);
    $conn = new mysqli('localhost', 'root', '', 'movie_database');
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        echo $row['points'];
      }
    }
  }
?>
