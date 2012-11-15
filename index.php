<?php
  require 'vendor/autoload.php';
  $oahu = new Oahu_Client();
  $app = $oahu->getApp();
?>

<h1>Welcome, this is a Oahu app : <?php echo $app->name ?></h1>
