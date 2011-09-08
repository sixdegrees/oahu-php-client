<?php

require_once('../lib/OahuClient.php');
require_once('./vendor/limonade.php');

date_default_timezone_set("Europe/Paris");

function _debug($elem) {
  echo "<pre>";
  print_r($elem);
  echo "</pre>";
}

$environment = "staging";

$config = parse_ini_file('./config/' . $environment . '.ini');
$oahu = new OahuClient($config['host'], $config['client_id'], $config['consumer_id'], $config['consumer_secret'], $config['no_cache']);

?>
