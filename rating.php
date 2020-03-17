<?php
  if (isset ($_GET['rating'])) {
    $username = base64_decode ($_COOKIE['95261a03947a5ee795fe1d026f048ce4']);
    $moviename = $_COOKIE['movieName'];
    $rating = $_GET['rating'];
    $conn = new mysqli('localhost', 'root', '', 'movie_database');
    $sql1 = "SELECT * FROM rated_movies WHERE username = '$username' and moviename = '$moviename'";
    $query1 = $conn->query($sql1);
    if ($query1->num_rows > 0) {
      $sql2 = "UPDATE rated_movies SET rated = '$rating' WHERE username = '$username' and moviename = '$moviename'";
      $conn->query($sql2);
    } else {
      $sql3 = "INSERT INTO rated_movies (username, moviename, rated) VALUES ('$username', '$moviename', '$rating')";
      $conn->query($sql3);
    }
    $sql4 = "SELECT rated FROM rated_movies WHERE moviename = '$moviename'";
    $query4 = $conn->query($sql4);
    if ($query4->num_rows > 0) {
      $rated_num_rows = $query4->num_rows;
      while($rated_movies = $query4->fetch_assoc()) {
        $rated_sum = array_sum($rated_movies);
        $new_rated = $rated_sum / $rated_num_rows;
      }
      $sql5 = "UPDATE movies SET rated = '$new_rated' WHERE hide_name = '$moviename'";
      $conn->query($sql5);
    }
    $conn->close();
  }
?>
