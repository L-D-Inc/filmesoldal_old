<?php
  if (isset ($_GET['points'])) {
    $points = $_GET['points'];
    $username = $_GET['username'];
    $conn = new mysqli('localhost', 'root', '', 'movie_database');
    $sql = "UPDATE users SET points = '$points' WHERE username = '$username';";
    $conn->query($sql);
    $conn->close();
  }
?>
