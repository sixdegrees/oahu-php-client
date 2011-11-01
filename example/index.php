<?php
require('config.inc.php');
layout('layouts/application.html.php');

dispatch('/', 'catalog');
function catalog() {
  global $oahu;
  if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
  } else {
    $filter = null;
  }
  $params = array();
  if (isset($_GET['page'])) {
    $params['page'] = $_GET['page'];
  }
  if (isset($_GET['limit'])) {
    $params['limit'] = $_GET['limit'];
  }
  $pub_accounts = $oahu->listPubAccounts();
  $movies = $oahu->listMovies($filter, $params);
  set('filter', $filter);
  set('moviesList', $movies);
  set('pub_accounts', $pub_accounts);
  return render('catalog.html.php');
}

dispatch_post('/movies', 'createMovie');
function createMovie() {
  global $oahu;
  $movie = $oahu->createMovie($_POST['project']);
  $oahu->connection->flushCache();
  if ($movie) {
    redirect_to('/movies/' . $movie->_id);
  } else {
    redirect_to('/movies/');
  }
}

dispatch_post('/movies/:id', 'updateMovie');
function updateMovie() {
  global $oahu;
  $movie_id = params("id");
  if ($movie_id) {
    $oahu->updateMovie($movie_id, $_POST["project"]);
    $oahu->connection->flushCache();
    redirect_to('/movies/' . $movie_id);
  } else {
    redirect_to('/');
  }  
}

dispatch('/movies/:id', 'showMovie');
function showMovie() {
  global $oahu;
  $movie_id = params("id");
  if ($movie_id) {
    set('movie', $oahu->getMovie($movie_id));
    $resources = $oahu->getMovieResources($movie_id, array("limit" => 10));
    $pub_accounts = $oahu->listPubAccounts($movie_id);
    set('resources', $resources);
    set('pub_accounts', $pub_accounts);
    set('publications', $oahu->listMoviePublications($movie_id));
    return render('movies/show.html.php');
  } else {
    redirect_to("/");
  }
}

dispatch_post('/movies/:id/resources', 'createResource');
function createResource() {
  global $oahu;
  $movie_id = params('id');
  $oahu->connection->flushCache();
  if ($movie_id) {
    $oahu->createMovieResource($movie_id, $_POST["_type"], $_POST["resource"]);
    redirect_to("/movies/" . $movie_id);
  } else {
    redirect_to("/");
  }
}

dispatch('/movies/:id/resources/:resource_id', 'showResource');
function showResource() {
  global $oahu;
  $movie_id = params('id');
  $resource_id = params('resource_id');
  $resource = $oahu->getMovieResource($movie_id, $resource_id);
  if ($resource->_type == "Resources::ImageList") {
    $images = $oahu->getMovieResources($movie_id, array("type" => "Image"));
  }
  set('resource', $resource);
  set('images', $images);
  if ($resource) {
    return render('resources/show.html.php');
  } else {
    redirect_to('/movies/');
  }
}

dispatch_post('/movies/:id/resources/:resource_id', 'updateResource');
function updateResource() {
  global $oahu;
  $movie_id = params('id');
  $resource_id = params('resource_id');
  $oahu->updateMovieResource($movie_id, $resource_id, $_POST['resource']);
  $oahu->connection->flushCache();
  redirect_to("/movies/" . $movie_id . "/resources/" . $resource_id);
}


dispatch('/pub_accounts/:id', 'showPubAccount');
function showPubAccount() {
  global $oahu;
  $pub_account_id = params('id');
  $pub_account = $oahu->getPubAccount($pub_account_id);
  
  if ($pub_account) {
    $publications = $oahu->listPublications($pub_account_id, array("limit" => 10));
    set('pub_account', $pub_account);
    set('publications', $publications);
    return render('pub_accounts/show.html.php');
  } else {
    return redirect_to('/');
  }
}

dispatch_post('/session', 'createSession');
function createSession(){
  global $oahu;
  if($oahu->validateUserAccount($_POST)) {
    $_SESSION['oahu_id'] = $_POST['_id']; 
    $current_user = User::find_by_oahu_id($_SESSION['oahu_id']);
    if (!$current_user) {
      $current_user = User::create(array(
        'oahu_id' => $_SESSION['oahu_id'],
        'name'    => $_POST['name'],
        'email'    => $_POST['email']
      ));
    }
    $_SESSION['user_id'] = $current_user->id;
    return $current_user->to_json();
  } else {
    return json_encode(array('error'=>'invalid_signature'));
  }
  
}

dispatch_post('/user', 'updateUser');
function updateUser() {
  global $current_user;
  $current_user->name = $_POST['name'];
  $current_user->email = $_POST['email'];
  $current_user->save();
  return $current_user->to_json();
}

dispatch_delete('/session','deleteSession');
function deleteSession(){
  session_destroy();
  return json_encode(array('message'=>'session_cleared'));
}

dispatch_post('/flush_cache', 'flushCache');
function flushCache() {
  global $oahu;
  $oahu->connection->flushCache();
  redirect_to("/");
};

run();
?>