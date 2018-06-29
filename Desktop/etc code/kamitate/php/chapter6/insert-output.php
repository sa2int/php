<?php require '../header.php'; ?>

<?php 

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 
'game-mania', 'hayato0210');

$sql=$pdo->prepare('insert into product values(0,?,?)');

if ($sql->execute([$_REQUEST['name'], $_REQUEST['price']])) {

 echo '追加に成功しました';
} else {
 echo '追加に失敗しました';
 }
 
?>

<?php require '../footer.php'; ?>