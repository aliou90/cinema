<?php 
require_once('bootstrap.php');
$pdo = pdo();
$table_name = 'commentaire1';
$columns = ['id','post_id ','author','comment','date_comment'];
try {
    $comment = $pdo->prepare("CREATE TABLE IF NOT EXISTS 
$table_name (
        $columns[0] INTEGER PRIMARY KEY,
        $columns[1] NUMBER NOT NULL ,
        $columns[2] VARCHAR(255) NOT NULL,
        $columns[3] TEXT NOT NULL,
        $columns[4] TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT FK_PostsComments FOREIGN KEY(post_id) REFERENCES posts(id)
)
");

 $comment->execute();
} catch (Throwable $th) {
    throw $th;
}
?>