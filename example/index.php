<?php
require('config.inc.php');


dispatch('/', 'main');
function main() {
  global $oahu;
  $filter = $_GET['filter'];
  set('filter', $filter);
  set('moviesList', $oahu->listMovies($filter));
  return render('main.html.php');
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
    return render('movie.html.php');
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
  set('resource', $resource);
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