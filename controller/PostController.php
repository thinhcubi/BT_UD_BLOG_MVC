<?php

namespace Controller;

use \Model\DBConnection;
use \Model\Post;
use \Model\PostDB;

class PostController
{
    public PostDB $postDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=Blog","root","Cubi@2712");
        $this->postDB = new PostDB($connection->connect());
    }
    public function index(){
        $posts = $this->postDB->getAll();
        include 'view/list.php';
    }
    public function view(){
       $id = $_GET['id'];
        $posts = $this->postDB->get($id);
        include 'view/view.php';
    }
    public function delete(){
        $id = $_GET['id'];
        $this->postDB->delete($id);
        header('Location: index.php');
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = new Post($_POST['title'], $_POST['teaser'], $_POST['content'], $_POST['created']);
            $this->postDB->create($post);
            $message = 'Post created';
        }
        include 'view/add.php';
    }
    public function edit(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $id = $_GET['id'];
            $posts = $this->postDB->get($id);
            include 'view/edit.php';
        } else {
            $id = $_POST['id'];
            $post = new Post($_POST['title'], $_POST['teaser'], $_POST['content'], $_POST['created']);
            $this->postDB->update($id, $post);
            header('Location: index.php');
        }
    }
}
