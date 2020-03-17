<?php
  if (isset ($_GET['u'])) {
    if ($_GET['u'] == 'yes') {
      setcookie ('7e63be8b9187082d1fbc91ebf259ac82', '', time() - 316000000);
      setcookie ('95261a03947a5ee795fe1d026f048ce4', '', time() - 316000000);
      setcookie ('movieName', '', time() - 316000000);
    }
  }
?>
