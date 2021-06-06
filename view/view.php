<p>
    <a href="index.php" class="btn btn-default">Return to posts</a>
</p>
<?php foreach ($posts as $post): ?>
<h1><?php echo $post->title; ?></h1>
<h1><?php echo $post->created; ?></h1>
<h1><?php echo $post->teaser; ?></h1>
<h1><?php echo $post->content; ?></h1>
<?php endforeach; ?>