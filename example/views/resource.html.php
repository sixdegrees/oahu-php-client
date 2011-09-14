<a href="<?= url_for('/movies/' . $resource->project_id) ?>"><< Back to Movie</a>


<h1>Resource : <?= $resource->name ?> (<?= $resource->_type ?>)</h1>
<?= $resource->description ?>    

<h2>Update Resource</h2>
<form action='<?= url_for("/movies/" . $resource->project_id . "/resources/" . $resource->_id)?>' method='POST' accept-charset="UTF-8">
  <table>
    <tr>
      <td>Name: </td>
      <td><input type="text" name="resource[name]" value="<?= $resource->name ?>" size="60"></td>
    </tr>
    <tr>
      <td>Description:</td>
      <td><textarea name="resource[description]" cols="60" rows="5"><?= $resource->description ?></textarea></td>
    </tr>
    <? if ($images): ?>
    <tr>
      <td>Image List</td>
      <td>
        <ul>
        <? foreach ($images as $image) :?>
        <li><input type="checkbox" name="resource[image_ids][]" value="<?= $image->_id ?>" <? if (in_array($image->_id, $resource->image_ids)): ?>checked='checked'<? endif ?> /> <?= $image->name ?></li>
        <? endforeach ?>
        </ul>
      </td>
    </tr>
    <? endif ?>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" value="update" ></td>
    </tr>
  </table>
  
</form>

<hr/>
<? if ($resource->_type == "Resources::Image"): ?>
<img src="<?= $resource->paths->medium ?>.jpg">
<? endif ?>

<hr/>
<? _debug($resource) ?>
