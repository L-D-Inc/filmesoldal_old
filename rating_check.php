<?php
  if (isset ($_GET['check'])) {
    $moviename = $_COOKIE['movieName'];
    $conn = new mysqli('localhost', 'root', '', 'movie_database');
    $sql = "SELECT rated FROM movies WHERE hide_name = '$moviename'";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        $num_rows = $query->num_rows;
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
        echo $moviename . '&' . $rated . '&' . $num_rows;
      }
    }
  }
?>
