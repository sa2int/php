<?php require '../DBStudy/header.php'; ?>
<?php
//DBを繋がる部分
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', //住所部分、DB名、設定
	'game-mania', //ID
	'hayato0210'); //PW
$pdo->setAttribute( PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION );//エラーが発生したら、エラーメッセージ出る

$sql=$pdo->prepare('delete from product where id=?');
if($sql->execute([$_REQUEST['id']])) {
	echo '削除しました。';
} else {
	echo '削除できないんです。';
}
?>
<?php require '../DBStudy/footer.php'; ?>