<?php

require('../lib/OahuClient.php');

date_default_timezone_set("Europe/Paris");

function debug($elem) {
  echo "<pre>";
  print_r($elem);
  echo "</pre>";
}

$environment = "local";

$config = parse_ini_file('./config/' . $environment . '.ini');


$oahu = new OahuClient($config['host'], $config['client_id'], $config['consumer_id'], $config['consumer_secret'], $config['no_cache']);

?>
