<html>
  
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  
  <body>
    
    <a href="<?= url_for('/') ?>"><< Back to Movies list...</a>
    
    <h1><?= $movie->title ?></h1>
    <h2>Release: <?= $movie->release_date ?></h2>
    
    <?= $movie->synopsis ?>

    <hr>
    <h2>Update Movie</h2>
    <form action="<?= url_for("/movies/" . $movie->_id) ?>" method="POST" accept-charset="UTF-8">
      <table>
        <input type="hidden" name="_id" value="<?= $movie->_id ?>" />
        <tr>
          <td>Title: </td>
          <td><input type="text" name="project[title]" value="<?= $movie->title ?>" size="80"></td>
        </tr>
        <tr>
          <td>Synopsis: </td>
          <td><textarea name="project[synopsis]" cols="60" rows="5"><?= $movie->synopsis ?></textarea></td>
        </tr>
        <tr>
          <td>Release Date:</td>
          <td><input type="text" name="project[release_date]" value="<?= $movie->release_date ?>" size="36"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" value="create" ></td>
        </tr>
        
      </table>
    </form>
    
    <hr>

    <h2>Resources</h2>
    <table width="100%" border="1">
      <tr>
        <th>Preview</th>
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
        <td align="center">
          <? if ($resource->_type == "Resources::Image") : ?>
          <img src="<?= $resource->paths->thumb ?>.jpg" />
          <? endif?>
        </td>
        <td><a href="<?= url_for("/movies/" . $movie->_id . "/resources/" . $resource->_id) ?>"><?= $resource->_id ?></a></td>
        <td><?= $resource->slug ?></td>
        <td><?= $resource->_type ?></td>
        <td><?= $resource->name ?></td>
        <td><?= $resource->description ?></td>
        <td><?= $resource->created_at ?></td>
        <td><?= $resource->updated_at ?></td>
      </tr>
    <? endforeach ?>
    </table>
    
    <hr>
    <h2>Create Resource</h2>
    <form action='<?= url_for("/movies/" . $movie->_id . "/resources")?>' method='POST' accept-charset="UTF-8">
      <table>
        <input type="hidden" name="project_id" value="<?= $movie->_id ?>" />
        <tr>
          <td>Type: </td>
          <td>
            <select name='_type'>
              <?php foreach(OahuClient::$modelTypes['Resource'] as $resourceType) : ?>
              <option value="<?= $resourceType ?>"><?= $resourceType ?></option>
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
    <h2>Pub Accounts</h2>
    
    <hr>
    
    <h2>Publications</h2>
    <table width="100%" border="1">
      <tr>
        <th>ID</th>
        <th>Slug</th>
        <th>Type</th>
        <th>Status</th>
        <th>Title</th>
        <th>Created At</th>
        <th>Updated At</th>
      </tr>
      <?php foreach($publications as $publication) : ?>
      <tr>
        <td><?= $publication->_id ?></td>
        <td><?= $publication->slug ?></td>
        <td><?= $publication->_type ?></td>
        <td><?= $publication->status ?></td>
        <td><?= $publication->title ?></td>
        <td><?= $publication->created_at ?></td>
        <td><?= $publication->updated_at ?></td>
      </tr>
    <? endforeach ?>
    </table>
    
  </body>
  
</html>