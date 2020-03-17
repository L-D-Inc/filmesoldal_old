<?php
  if (isset ($_GET['check'])) {
    $username = $_GET['username'];
    $conn = new mysqli('localhost', 'root', '', 'movie_database');
    $sql = "SELECT id FROM users WHERE username = '$username';";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
      while ($userid_tmp = $query->fetch_assoc()) {
        $userid = $userid_tmp['id'];
        $sql2 = "SELECT id FROM tmp_notifications WHERE userid = '$userid';";
        $query2 = $conn->query($sql2);
        echo $query2->num_rows;
      }
    }
    $conn->close();
  }
?>
