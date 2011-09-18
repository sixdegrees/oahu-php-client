<?php
require('config.inc.php');

layout('layouts/application.html.php');

dispatch('/', 'catalog');
function catalog() {
  global $oahu;
  if ($_GET['filter']) {
    $filter = $_GET['filter'];
  } else {
    $filter = null;
  }
  $params = array();
  if ($_GET['page']) {
    $params['page'] = $_GET['page'];
  }
  if ($_GET['limit']) {
    $params['limit'] = $_GET['limit'];
  }
  $movies = $oahu->listMovies($filter, $params);
  set('filter', $filter);
  set('moviesList', $movies);
  return render('catalog.html.php');
}

dispatch_post('/', 'createMovie');
function createMovie() {
  global $oahu;
  $movie = $oahu->createMovie($_POST['project']);
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
    set('resources', $oahu->getMovieResources($movie_id, array("limit" => 10)));
    set('publications', $oahu->getMoviePublications($movie_id));
    return render('movies/show.html.php');
  } else {
    redirect_to("/");
  }
}

dispatch_post('/movies/:id/resources', 'createResource');
function createResource() {
  global $oahu;
  $movie_id = params('id');
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
  return render('resource.html.php');
  if ($resource) {
    return render('resource.html.php');
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
  redirect_to("/movies/" . $movie_id . "/resources/" . $resource_id);
}


run();
?>