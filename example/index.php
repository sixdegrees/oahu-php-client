<?php require("config.inc.php"); ?>

<html>
  
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  
  <body>
    
    <h1>List Movies</h1>
    <table width="100%" border="1">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Synopsis</th>
        <th>Release Date</th>
      </tr>
      <?php foreach ($oahu->listMovies() as $movie) : ?>
      <tr>
        <td><?= $movie->_id ?></td>
        <td><?= $movie->title ?></td>
        <td><?= $movie->synopsis ?></td>
        <td><?= $movie->release_date ?></td>
      </tr>
      <?php endforeach; ?>
    </table>


    
    <h2>Create Movie</h2>
    <form action="./createMovie" method="POST" accept-charset="UTF-8">
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
    
  </body>
  
</html>