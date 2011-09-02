<?php
require("config.inc.php");
$oahu->createMovieResource($_POST['project_id'], $_POST["_type"], $_POST["resource"]);
header("Location: ./getMovie.php?id=" . $_POST["project_id"]);
?>
