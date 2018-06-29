
<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
//create
$sql=$pdo->prepare('CREATE TRIGGER MySQL_Table_OnInsert BEFORE INSERT ON olympicsBoard FOR EACH ROW SET NEW.dateInserted = NOW()'
);

if($sql->execute()) {
  echo 'Successfully created MySQL_Table_OnInsert table!!';
} else {
  echo 'error';
}

 ?>
