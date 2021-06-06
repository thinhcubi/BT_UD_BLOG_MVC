<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>
    <a href="index.php?page=add" class="btn btn-primary">Creat new post</a>
</p>
<ul>
    <?php foreach ($posts as $post): ?>
    <li>
        <h2> <a href="index.php?page=view&id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h2>
        <span><?php echo $post->created; ?></span>
        <p><?php echo $post->teaser; ?></p>
        <a href="index.php?page=delete&id=<?php echo $post->id; ?>" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
        <a href="index.php?page=edit&id=<?php echo $post->id; ?>" class="btn btn-warning btn-sm">Edit</a>

    </li>
    <?php endforeach; ?>
</ul>
</body>
</html>