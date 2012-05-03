<h1>Featured</h1>
<?php foreach ($featured as $movie) : ?>
<img src="<?php echo oahuImageUrl($movie->id, "small"); ?>" alt="<?php echo $movie->title ?>" />
<?php endforeach; ?>
