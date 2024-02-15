<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- favicon begin -->
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="./favicon_io(2)/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="./favicon_io(2)/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="./favicon_io(2)/favicon-16x16.png"
    />
    <!-- favicon eind
     -->
    <link rel="manifest" href="/site.webmanifest" />
    <!-- protest riot font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
 
    <link
      href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap"
      rel="stylesheet"
    />
    <!-- einde font -->
 
    <title>Valentijn</title>
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
   include "connect.php";

   try {

    $stmt = $conn->prepare("SELECT id, img, song FROM Legenda ORDER BY RAND() LIMIT 1");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $k => $v) {
    };
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  ?>
 
    <div onclick="playAudio()" class="valentines-day-card">
      <input id="open" type="checkbox" />
      <label class="open" for="open"></label>
      <div class="card-front">
        <div class="note">
          <div class="clickhere">Klik Hier</div></div>
      </div>
 
      <div class="card-inside" >
        <div class="text-one">Fijne</div>
        <div class="text-two"></div>
        <div class="heart"></div>
        <div class="smile"></div>
        <div class="eyes"></div>
      </div>
    </div>
 
    <script defer>
      var audio = new Audio("mp3/<?php echo $v['song'] ?>");
      var isPlaying = false;
      function playAudio() {
        isPlaying ? audio.pause() : audio.play();
      }
 
      audio.onplaying = function () {
        isPlaying = true;
      };
      audio.onpause = function () {
        isPlaying = false;
      };
    </script>
  </body>
</html>
