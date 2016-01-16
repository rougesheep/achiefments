<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MCC Achievements</title>
  </head>

  <body>
    <?php 
      require 'gubbins.php';
      if ( isset( $_GET['gamertag'] ) && !empty( $_GET['gamertag'] )) {
        $gamertag = $_GET['gamertag'];
      } else {
        echo "ERROR: No Gamertag supplied.";
        exit;
      }
      echo "XUID = " . get_xuid($gamertag);
    ?>
  </body>
</html>

