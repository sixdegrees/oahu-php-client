<?php require("config.inc.php"); ?>

<html>
  
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  
  <body>
    
    <p>
      Filters: 
      <a href="./index.php">all</a>
      &nbsp;|&nbsp;
      <? foreach($oahu->projectFilters as $filter) : ?>
      <a href="./index.php?filter=<?= $filter ?>"><?= $filter ?></a>
      &nbsp;|&nbsp;
      <? endforeach ?>
    </p>
    
    <h1>List Movies</h1>
    <table width="100%" border="1">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Synopsis</th>
        <th>Release Date</th>
      </tr>
      <?php foreach ($oahu->listMovies($_GET['filter']) as $movie) : ?>
      <tr>
        <td><a href="./getMovie?id=<?= $movie->_id ?>"><?= $movie->_id ?></a></td>
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