<?php

require('../lib/OahuClient.php');

date_default_timezone_set("Europe/Paris");

function debug($elem) {
  echo "<pre>";
  print_r($elem);
  echo "</pre>";
}

$host           = "api.oahu.fr";
$consumerId     = "YOUR_CONSUMER_ID";
$consumerSecret = "YOUR_CONSUMER_SECRET";
$clientId       = "YOUR_CLIENT_ID";

$oahu = new OahuClient($host, $clientId, $consumerId, $consumerSecret, true);

?>
