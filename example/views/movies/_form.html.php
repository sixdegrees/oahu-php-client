<?php if (!isset($movie)) { $movie = new stdClass; }?>


<h2><?php if (isset($movie->_id)) { echo "Update"; } else { echo "Create"; } ?> Movie</h2>

<form action="<?php echo url_for("/movies/" . $movie->_id) ?>" method="POST" accept-charset="UTF-8">
  <table>
    <input type="hidden" name="_id" value="<?php echo $movie->_id ?>" />
    <tr>
      <td>Title: </td>
      <td><input type="text" name="project[title]" value="<?php echo $movie->title ?>" size="80"></td>
    </tr>
    <tr>
      <td>Synopsis: </td>
      <td><textarea name="project[synopsis]" cols="60" rows="5"><?php echo $movie->synopsis ?></textarea></td>
    </tr>
    <tr>
      <td>Release Date:</td>
      <td><input type="text" name="project[release_date]" value="<?php echo $movie->release_date ?>" size="36"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" value="create" ></td>
    </tr>
    
  </table>
</form>
