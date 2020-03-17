<?php
  if (isset ($_GET['check'])) {
    $username = $_GET['username'];
    echo 'das';
    $conn = new mysqli('localhost', 'root', '', 'movie_database');
    $sql = "SELECT id FROM users WHERE username = '$username';";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
      while ($userid_tmp = $query->fetch_assoc()) {
        $userid = $userid_tmp['id'];
        echo $userid;
        $sql2 = "SELECT id FROM tmp_notifications WHERE userid = '$userid';";
        $query2 = $conn->query($sql2);
        if ($query2->num_rows > 0) {
          while ($notid_tmp = $query2->fetch_assoc()) {
            $notificationid = $notid_tmp['id'];
            echo $notificationid;
            $sql3 = "SELECT id FROM storaged_notifications WHERE id = '$notificationid';";
            $query3 = $conn->query($sql3);

          }
        }
      }
    }
    $conn->close();
  }
?>
