<?php
  if (isset ($_GET['value'])) {
    $value = $_GET['value'];
    $conn = new mysqli('localhost', 'root', '', 'movie_database');
    mysqli_set_charset($conn, 'utf8');
    $sql = "SELECT hide_name FROM movies WHERE name = '$value'";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        echo $row['hide_name'];
      }
    }
  }
?>
