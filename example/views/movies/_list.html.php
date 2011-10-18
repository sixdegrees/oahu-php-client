<div class='filter'>
	<ul class='pills'>
	  <li><a href="./index.php">all</a></li>
	  <?php foreach(OahuClient::$projectFilters as $f) : ?>
	  <li><a href="<?php echo url_for('/', array('filter' => $f)) ?>"><?php echo $f ?></a></li>
	  <?php endforeach ?>
	</li>
</div>
<h1>List Movies <?php echo $filter ?></h1>
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
    <td><a href="<?php echo url_for("/movies/" . $movie->_id) ?>"><?php echo $movie->_id ?></a></td>
    <td><?php echo $movie->title ?></td>
    <td><?php echo substr($movie->synopsis, 0, 250) ?>...</td>
    <td><?php echo $movie->release_date ?></td>
    <td><?php echo $movie->created_at ?></td>
    <td><?php echo $movie->updated_at ?></td>
    <td>
      <button class='btn oahu_share' href='#'
  			data-oahu-type='project'
  			data-oahu-id='<?php echo $movie->_id ?>'
  			data-oahu-link='http://mystudio.com/movies/<?php echo $movie->_id  ?>.html'
  			data-oahu-name='<?php echo $movie->title ?>'
  			data-oahu-caption='Project Subtitle'
  			data-oahu-description='<?php echo $movie->description ?>'>
  			Share
  		</button>
  	</td>
  </tr>
  <?php endforeach; ?>
</table>
