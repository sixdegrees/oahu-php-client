<a href="<?php echo url_for('/') ?>"><< Back to Movies list...</a>

<h1><?php echo $movie->title ?></h1>
<h2>Release: <?php echo $movie->release_date ?></h2>

<?php echo $movie->synopsis ?>

<p><b>Countries:</b> <?php echo implode(",", $movie->countries) ?></p>
<p><b>Genres:</b> <?php echo implode(",", $movie->genres) ?></p>

<hr>
<?php echo partial('movies/_form.html.php'); ?>

<hr>

<h2><?php echo count($resources) ?> Resources</h2>
<form action='<?php echo url_for("/movies/" . $movie->_id . "/resources")?>' method='POST' accept-charset="UTF-8">
<table width="100%" border="1">
  <tr>
    <th colspan='2'>Preview</th>
    <th>ID</th>
    <th>Slug</th>
    <th>Type</th>
    <th>Name</th>
    <th>Description</th>
    <th>Created At</th>
    <th>Updated At</th>
  </tr>
  <?php foreach($resources as $resource) : ?>
  <tr>
    <td>
      <?php if ($resource->_type == "Resources::Image") : ?>
      <input type="checkbox" value="<?php echo $resource->_id ?>" name="resource[image_ids][]" />
      <?php endif ?>
      <?php if ($resource->_type == "Resources::Video") : ?>
      <input type="checkbox" value="<?php echo $resource->_id ?>" name="resource[video_ids][]" />
      <?php endif ?>
    </td>
    <td align="center">
      <?php if ($resource->_type == "Resources::Image") : ?>
      <img src="<?php echo $resource->paths->thumb ?>.jpg" />
      <?php endif?>
    </td>
    <td><a href="<?php echo url_for("/movies/" . $movie->_id . "/resources/" . $resource->_id) ?>"><?php echo $resource->_id ?></a></td>
    <td><?php echo $resource->slug ?></td>
    <td><?php echo $resource->_type ?></td>
    <td><?php echo $resource->name ?></td>
    <td><?php echo $resource->description ?></td>
    <td><?php echo $resource->created_at ?></td>
    <td><?php echo $resource->updated_at ?></td>
  </tr>
<?php endforeach ?>
</table>

<hr>
<h2>Create Resource</h2>
  <table>
    <input type="hidden" name="project_id" value="<?php echo $movie->_id ?>" />
    <tr>
      <td>Type: </td>
      <td>
        <select name='_type'>
          <?php foreach(OahuClient::$modelTypes['Resource'] as $resourceType) : ?>
          <option value="<?php echo $resourceType ?>"><?php echo $resourceType ?></option>
          <?php endforeach ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>URL: </td>
      <td><input type="text" name="resource[source]" value="" size="60"></td>
    </tr>
    <tr>
      <td>Name: </td>
      <td><input type="text" name="resource[name]" value="" size="60"></td>
    </tr>
    <tr>
      <td>Description:</td>
      <td><textarea name="resource[description]" cols="60" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" value="create" ></td>
    </tr>
    
  </table>
  
</form>

<hr>
<?php echo partial('shared/_pub_accounts.html.php'); ?>
<hr>
<?php echo partial('shared/_publications.html.php'); ?>

