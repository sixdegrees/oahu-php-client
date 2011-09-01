<?php
require('config.inc.php');

$movies = $oahu->listMovies();
$movie = $movies[0];

$updatedMovie = $oahu->updateMovie($movie->_id, array("title" => "Super Movie @ " . mktime()));
?>

<html>
  
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  
  <body>

    <h1>Before <?= $movie->title ?></h1>
    <? debug($movie); ?>

    <h2>After <?= $updatedMovie->title ?></h2>
    <? debug($updatedMovie); ?>
  
  </body>
</html>