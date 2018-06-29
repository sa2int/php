<?php require '../header.php'; ?>

<?php 

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 
'game-mania', 'hayato0210');

$sql=$pdo->prepare('delete from product where id=?');

if ($sql->execute([$_REQUEST['id']])) {

 echo '削除に成功しました';
} else {
 echo '削除に失敗しました';
 }

?>

<?php require '../footer.php'; ?>