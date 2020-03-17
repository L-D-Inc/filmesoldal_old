<?php
  if (isset($_GET['ready'])) {
    if ($_GET['ready'] == 'yes') {
      $username = base64_decode($_COOKIE['95261a03947a5ee795fe1d026f048ce4']);
      $page_style = $_GET['style'];
      $movie_recommendation = $_GET['recommendation'];
      $point_collection = $_GET['pointColl'];
      $conn = new mysqli('localhost', 'root', '', 'movie_database');
      $sql = "UPDATE users SET ready = 'yes', page_style = '$page_style', movie_recommendation = '$movie_recommendation', point_collection = '$point_collection' WHERE username = '$username';";
      $conn->query($sql);
      $sql2 ="SELECT id FROM users WHERE username = '$username';";
      $a = $conn->query($sql2);
      if ($a->num_rows > 0) {
        while ($aa = $a->fetch_assoc()) {
          $userid = $aa['id'];
        }
      }
      $sql3 = "SELECT id FROM storaged_notifications WHERE circular = '1';";
      $b = $conn->query($sql3);
      if ($b->num_rows > 0) {
        while ($bb = $b->fetch_assoc()) {
          $notificationid = $bb['id'];
        }
      }
      $sql4 = "INSERT INTO tmp_notifications (userid, notificationid, saw) VALUES ('$userid', '$notificationid', '0');";
      $conn->query($sql4);
      $conn->close();
      header('Location: index.php');
    }
  }
?>
