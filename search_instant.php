<?php
  include('database.php');
  if (isset ($_GET['value'])) {
    $value = $_GET['value'];
    mysqli_set_charset($conn, 'utf8');
    $sql = "SELECT name, hide_name FROM movies WHERE name LIKE '%$value%' LIMIT 5";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        echo $row['name'] . '+';
      }
    } else {
      echo 'notFound';
    }
  }
?>
