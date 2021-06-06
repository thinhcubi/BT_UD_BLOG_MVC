<?php
 namespace Model;

 class PostDB
 {
     public $connection;

     public function __construct($connection)
     {
         $this->connection = $connection;
     }
     public function getAll() : array
     {
         $sql = "SELECT * FROM `blog_2`";
         $stmt = $this->connection->prepare($sql);
         $stmt->execute();
         $result = $stmt->fetchAll();
         $posts = [];
         foreach ($result as $item){
             $post = new Post($item['title'],$item['teaser'],$item['content'],$item['created']);
            $post->setID($item['id']);
             $posts[] = $post;

         }
         return $posts;
     }
     public function get($id) : array
     {
         $sql = "SELECT * FROM `blog_2` WHERE `id`= ?";
         $stmt = $this->connection->prepare($sql);
         $stmt->bindParam(1,$id);
         $stmt->execute();
         $result = $stmt->fetchAll();
         $posts = [];
         foreach ($result as $item){
             $post = new Post($item['title'],$item['teaser'],$item['content'],$item['created']);
             $post->setID($item['id']);
             $posts[] = $post;

         }
         return $posts;
     }
     public function delete($id){
         $sql = "DELETE FROM `blog_2` WHERE  `id` = ?";
         $stmt= $this->connection->prepare($sql);
         $stmt->bindParam(1,$id);
         return $stmt->execute();

     }
     public function create(object $post){
         $sql = "INSERT INTO `blog_2`(title,teaser,content,created) VALUES(?,?,?,?)";
         $stmt = $this->connection->prepare($sql);
         $stmt->bindParam(1,$post->title);
         $stmt->bindParam(2,$post->teaser);
         $stmt->bindParam(3,$post->content);
         $stmt->bindParam(4,$post->created);
          return $stmt->execute();
     }
     public function update($id,$post){
         $sql = "UPDATE `blog_2` SET `title` = ? , `teaser` = ?,`content` = ?,`created`=? WHERE `id` = ?";
         $stmt = $this->connection->prepare($sql);
         $stmt->bindParam(1,$post->title);
         $stmt->bindParam(2,$post->teaser);
         $stmt->bindParam(3,$post->content);
         $stmt->bindParam(4,$post->created);
         $stmt->bindParam(5,$id);
         return $stmt->execute();
     }
 }