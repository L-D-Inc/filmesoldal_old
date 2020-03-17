<?php
  if (isset($_GET['movieCookie'])) {
    $movieName = $_GET['movieCookie'];
    $conn = new mysqli('localhost', 'root', '', 'movie_database');
    $sql = "SELECT * FROM movies WHERE hide_name = '$movieName';";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        $sql2 = "SELECT rated FROM rated_movies WHERE moviename = '$movieName'";
        $query2 = $conn->query($sql2);
        if ($query2->num_rows > 0) {
          $rated_num_rows = $query2->num_rows;
        }
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
        echo '<div id="modal-left">';
        echo '<div id="img-box"><img id="movie-modal-img" src="images/posters/' . $row['hide_name'] . '.jpg" alt=""/>';
        echo '<fieldset class="rating" onclick="rating()">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="5"></label>
                <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="4.5"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="4"></label>
                <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="3.5"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="3"></label>
                <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="2.5"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="2"></label>
                <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="1.5"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="1"></label>
                <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="0.5"></label>
            </fieldset><span class="rate" id="' . $row['hide_name'] . '-rate-sum">' . $rated . '&nbsp;/&nbsp;5&nbsp;(' . $rated_num_rows . ')</span></div>';
        echo '<div id="datas-box"><h2><b>Név:</b>&nbsp;' . $row['name'] . '</h2>';
        echo '<h3><b>Kiadás éve:</b>&nbsp;' . $row['release_date'] . '</h3>';
        echo '<h3><b>Műfaj(ok):</b>&nbsp;<a href="index.php?category=' . $row['genre1'] . '">' . $row['genre1'] . '</a>&nbsp;<a href="index.php?category=' . $row['genre2'] . '">' . $row['genre2'] . '</a>&nbsp;<a href="index.php?category=' . $row['genre3'] . '">' . $row['genre3'] . '</a></h3>';
        echo '<h3><b>Hossz:</b>&nbsp;' . $row['length'] . '</h3>';
        echo '<h3><b>Szereplők:</b>&nbsp;' . $row['actor1'] . ',&nbsp;' . $row['actor2'] . ',&nbsp;' . $row['actor3'] . '</h3>';
        echo '<section><b>Leírás:</b>&nbsp;' . $row['description'] . '</section>';
        echo '</div><div style="clear:both;"></div></div><div id="modal-right">';
        echo '<img src="loading.svg" alt="" id="iframe-loading"/>';
        echo '<iframe id="movie-iframe" src="movie_player.php?movie_name=' . $row['hide_name'] . '" onload="iframeLoad()"></iframe>';
        echo '<div id="modal-btn-group"><button type="button" id="movie-trailer">trailer</button><button type="button" id="movie-full">teljes film</button></div>';
        echo '</div><div style="clear:both;"></div>';
      }
    }
    $conn->close();
  }
?>
