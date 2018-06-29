<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
//$sql=$pdo->prepare('Drop table kimuboard');
//$sql=$pdo->prepare('Drop table requestboard');
$sql=$pdo->prepare('Drop table kimuboard');

if($sql->execute()) {
	echo '削除成功';
} else {
	echo '削除失敗';
}

?>
