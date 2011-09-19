<div class='filter'>
	<ul class='pills'>
	  <li><a href="./index.php">all</a></li>
	  <? foreach(OahuClient::$projectFilters as $f) : ?>
	  <li><a href="<?= url_for('/', array('filter' => $f)) ?>"><?= $f ?></a></li>
	  <? endforeach ?>
	</li>
</div>
<h1>List Movies <?= $filter ?></h1>
<table width="100%" border="1">
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Synopsis</th>
    <th>Release Date</th>
    <th>Created At</th>
    <th>Updated At</th>
  </tr>
  <?php foreach ($moviesList as $movie) : ?>
  <tr>
    <td><a href="<?= url_for("/movies/" . $movie->_id) ?>"><?= $movie->_id ?></a></td>
    <td><?= $movie->title ?></td>
    <td><?= $movie->synopsis ?></td>
    <td><?= $movie->release_date ?></td>
    <td><?= $movie->created_at ?></td>
    <td><?= $movie->updated_at ?></td>
    <td><button class='btn oahu_share' href='#'
			data-oahu-type='project'
			data-oahu-id='<?= $movie->_id ?>'
			data-oahu-link='http://mystudio.com/movies/<?= $movie->_id  ?>.html'
			data-oahu-name='<?= $movie->title ?>'
			data-oahu-caption='Project Subtitle'
			data-oahu-description='<?= $movie->description ?>'
		>Share</button></td>
  </tr>
  <?php endforeach; ?>
</table>


<h2>Create Movie</h2>
<form action="./" method="POST" accept-charset="UTF-8">
  <table>
    <tr>
      <td>Title: </td>
      <td><input type="text" name="project[title]" value="" size="80"></td>
    </tr>
    <tr>
      <td>Synopsis: </td>
      <td><textarea name="project[synopsis]" cols="60" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Release Date:</td>
      <td><input type="text" name="project[release_date]" value=""></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" value="create"></td>
    </tr>
  </table>
  
</form>
