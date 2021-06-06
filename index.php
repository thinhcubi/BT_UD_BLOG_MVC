<?php
require "model/DBConnection.php";
require "model/PostDB.php";
require "model/Post.php";
require "controller/PostController.php";

use \Controller\PostController;
?>
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
<div class="container">
    <div class="navbar navbar-default">
        <a class="navbar-brand" href="index.php">My Blog</a>
    </div>
    <?php
    $controller = new PostController();
    $page = isset($_REQUEST['page'])? $_REQUEST['page'] : NULL;

    switch ($page){
        case 'view':
            $controller->view();
            break;
        case 'delete':
           $controller->delete();
           break;
        case 'add':
          $controller->add();
          break;
        case 'edit':
            $controller->edit();
            break;
        default :
            $controller->index();
            break;
    }
    ?>

</body>
</html>
