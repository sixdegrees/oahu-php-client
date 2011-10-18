<a href="<?php echo url_for('/movies/' . $resource->project_id) ?>"><< Back to Movie</a>


<h1>Resource : <?php echo $resource->name ?> (<?php echo $resource->_type ?>)</h1>
<?php echo $resource->description ?>    

<hr>
<?php echo partial('resources/_form.html.php'); ?>

<hr/>
<?php if ($resource->_type == "Resources::Image"): ?>
<img src="<?php echo $resource->paths->medium ?>.jpg">
<?php endif ?>

<hr/>
<?php _debug($resource) ?>
