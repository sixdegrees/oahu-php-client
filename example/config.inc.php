<?php
session_start();
// $_SESSION['views'] = 1; // store session data
// echo "Pageviews = ". $_SESSION['views']; //retrieve data

require_once('../lib/OahuClient.php');
require_once('./vendor/limonade.php');
require_once('./vendor/activerecord/ActiveRecord.php');

date_default_timezone_set("Europe/Paris");

function _debug($elem) {
  echo "<pre>";
  print_r($elem);
  echo "</pre>";
}

$environment = "staging";

$config = parse_ini_file('./config/' . $environment . '.ini', true);


$oahu = new OahuClient($config['host'], $config['client_id'], $config['consumer_id'], $config['consumer_secret'], $config['no_http_cache'], $config['options']);


// initialize ActiveRecord
// change the connection settings to whatever is appropriate for your mysql server
ActiveRecord\Config::initialize(function($cfg)
{
    global $config;
    $cfg->set_model_directory('./models');
    $cfg->set_connections(array("example" => $config['db_url']));
    $cfg->set_default_connection("example");
});


// require_once('./models/user.php');

// Get current user from db
if ($_SESSION['user_id']) {
  $current_user = User::find_by_id($_SESSION['user_id']);
}
