<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Achiefments</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body style="padding-top: 50px; padding-bottom: 20px;">
    <?php 
      require 'gubbins.php';
      if ( isset( $_GET['game'] ) && !empty( $_GET['game'] )) {
        $game = $_GET['game'];
      } else {
        $game = "all";
      }
      if ( isset( $_GET['showComplete'] ) && !empty( $_GET['showComplete'] )) {
        $showComplete = $_GET['showComplete'];
      } else {
        $showComplete = false;
      }
      if ( isset( $_GET['type'] ) && !empty( $_GET['type'] )) {
        $type = $_GET['type'];
      } else {
        $type = all;
      } 
      if ( isset( $_GET['xuid'] ) && !empty( $_GET['xuid'] )) {
        $xuid = $_GET['xuid'];
      } else {
        echo "ERROR: No XUID supplied.";
        exit;
      }
    ?>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
      <div class="navbar-header">
          <a class="navbar-brand" href="#">Achiefments</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Game <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li<?php if ( $game == "all" ) { echo " class=\"active\""; } ?>><a href="?game=all&xuid=<?php echo $xuid; ?>">All</a></li>
                <li role="separator" class="divider"></li>
                <li<?php if ( $game == "H1" ) { echo " class=\"active\""; } ?>><a href="?game=H1&xuid=<?php echo $xuid; ?>">Halo: CE</a></li>
                <li<?php if ( $game == "H2" ) { echo " class=\"active\""; } ?>><a href="?game=H2&xuid=<?php echo $xuid; ?>">Halo 2</a></li>
                <li<?php if ( $game == "H3" ) { echo " class=\"active\""; } ?>><a href="?game=H3&xuid=<?php echo $xuid; ?>">Halo 3</a></li>
                <li<?php if ( $game == "ODST" ) { echo " class=\"active\""; } ?>><a href="?game=ODST&xuid=<?php echo $xuid; ?>">Halo 3: ODST</a></li>
                <li<?php if ( $game == "H4" ) { echo " class=\"active\""; } ?>><a href="?game=H4&xuid=<?php echo $xuid; ?>">Halo 4</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Type <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li<?php if ( $type == "all" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&xuid=<?php echo $xuid; ?>">All</a></li>
                <li<?php if ( $type == "skulls" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&type=skulls&xuid=<?php echo $xuid; ?>">Skulls</a></li>
                <li<?php if ( $type == "terminals" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&type=terminals&xuid=<?php echo $xuid; ?>">Terminals</a></li>
                <li<?php if ( $type == "time" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&type=time&xuid=<?php echo $xuid; ?>">Time</a></li>
                <li<?php if ( $type == "score" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&type=score&xuid=<?php echo $xuid; ?>">Score</a></li>
                <li<?php if ( $type == "mp" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&type=mp&xuid=<?php echo $xuid; ?>">Multiplayer</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
     <?php
      echo "<div class=\"page_header\"><h1>" . ucfirst(str_replace("H","Halo ",$game)) . "</h1></div>";
      foreach (get_achievements("1144039928", $xuid) as $key => $achievement) {
        switch ($game) {
          case 'H1':
            if ( preg_match("/^Halo CE:/", $achievement["description"] ) == 1 ) {
              print_achievement($key);
            }
            break;
          case 'H2':
            if ( preg_match("/^Halo 2/", $achievement["description"] ) == 1 ) {
              print_achievement($key);
            }
            break;
          case 'H3':
            if ( preg_match("/^Halo 3:/", $achievement["description"] ) == 1 ) {
              print_achievement($key);
            }
            break;
          case 'ODST':
            if ( preg_match("/^H3: ODST:/", $achievement["description"] ) == 1 ) {
              print_achievement($key);
            }
            break;
          case 'H4':
            if ( preg_match("/^Halo 4/", $achievement["description"] ) == 1 ) {
              print_achievement($key);
            }
            break;
          default:
            print_achievement($key);
            break;
        }
      }
    ?>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
