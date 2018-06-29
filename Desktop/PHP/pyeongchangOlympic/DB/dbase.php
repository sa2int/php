<?php
try{
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
} catch(PDOException $e){
  print$e;
}
?>
