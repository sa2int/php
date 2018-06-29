<?php session_start();?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if(isset($_SESSION['customer'])) {
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
$sql=$pdo->prepare('insert into favorite values(?,?)');
$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
echo 'お気に入りに商品を追加しました。';
echo '<hr>';
require 'favorite.php';
} else {
	echo 'お気に入りに商品を追加するには、ログインしてください。';
}
?>
<?php require 'footer.php'; ?>