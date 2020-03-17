<?php
  if (isset ($_GET['pquery'])) {
    $username = base64_decode ($_COOKIE['95261a03947a5ee795fe1d026f048ce4']);
    $moviename = $_COOKIE['movieName'];
    $conn = new mysqli('localhost', 'root', '', 'movie_database');
    $sql = "SELECT rated FROM rated_movies WHERE username = '$username' and moviename = '$moviename'";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        echo $row['rated'];
      }
    }
   }
?>
