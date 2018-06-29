<?php

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
$del = $pdo->prepare('delete from requestboard where id=?');

if($del->execute(1);) {
	echo '削除成功';
} else {
	echo '削除失敗';
	echo "\nPDO::errorinfo():\n";
	print_r($pdo->errorInfo());
}

?>