<?php
require("config.inc.php");
$movie = $oahu->createMovie($_POST['project']);
header("Location: ./index.php");
?>
