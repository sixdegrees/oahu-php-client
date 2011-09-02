<?php
require('config.inc.php');
$oahu->updateMovie($_POST["_id"], $_POST["project"]);
header("Location: ./getMovie?id=" . $_POST["_id"])
?>
