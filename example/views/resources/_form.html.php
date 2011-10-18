<?php if (!isset($resource)) { $resource = new stdClass; }?>

<h2>Update Resource</h2>
<form action='<?php echo url_for("/movies/" . $resource->project_id . "/resources/" . $resource->_id)?>' method='POST' accept-charset="UTF-8">
  <table>
    <tr>
      <td>Name: </td>
      <td><input type="text" name="resource[name]" value="<?php echo $resource->name ?>" size="60"></td>
    </tr>
    <tr>
      <td>Description:</td>
      <td><textarea name="resource[description]" cols="60" rows="5"><?php echo $resource->description ?></textarea></td>
    </tr>
    <?php if ($images): ?>
    <tr>
      <td>Image List</td>
      <td>
        <ul>
        <?php foreach ($images as $image) :?>
        <li><input type="checkbox" name="resource[image_ids][]" value="<?php echo $image->_id ?>" <?php if (in_array($image->_id, $resource->image_ids)): ?>checked='checked'<?php endif ?> /> <?php echo $image->name ?></li>
        <?php endforeach ?>
        </ul>
      </td>
    </tr>
    <?php endif ?>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" value="update" ></td>
    </tr>
  </table>
  
</form>