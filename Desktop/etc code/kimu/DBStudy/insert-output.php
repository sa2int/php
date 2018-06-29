<?php require '../DBStudy/header.php'; ?>
<?php
//DBを繋がる部分
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', //住所部分、DB名、設定
	'game-mania', //ID
	'hayato0210'); //PW

$sql=$pdo->prepare('insert into product values(9, ?, ?)');

echo '[Debug1 : ', $_REQUEST['name'], ']';
echo '[Debug2 : ', $_REQUEST['price'], ']';

if ($sql->execute([$_REQUEST['name'], $_REQUEST['price']])) {
	echo '追加に成功しました。';
} else {
	echo '追加に失敗しました。';
}
?>
<?php require '../DBStudy/footer.php'; ?>