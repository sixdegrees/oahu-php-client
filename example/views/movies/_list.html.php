<h1>List Movies <?php echo $filter ?></h1>
<table width="100%" border="1">
  <tr>
    <th></th>
    <th>Title</th>
    <th>Synopsis</th>
    <th>Release Date</th>
  </tr>
  <?php foreach ($moviesList as $movie) : ?>
  <tr>
    <td>
      <a href="<?php echo url_for("/movies/" . $movie->_id) ?>"><img src="<?php echo oahuImageUrl($movie->id, "small"); ?>" /></a>
    </td>
    <td><?php echo $movie->title ?></td>
    <td><?php echo substr($movie->synopsis, 0, 250) ?>...</td>
    <td><?php echo $movie->release_date ?></td>
  </tr>
  <?php endforeach; ?>
</table>