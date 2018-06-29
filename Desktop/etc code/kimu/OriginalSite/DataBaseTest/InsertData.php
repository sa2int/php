<?php

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
//$sql=$pdo->prepare('Insert into kimuboard values(null, "テスト344444444444444444444444444", "男", "キム・ジョンフン", "内容", "内容", now())');
$sql=$pdo->prepare('Insert into requestboard values(null, "テスト344444444444444444444444444", "男", "キム・ジョンフン", "内容", "内容", "内容", 0, now())');

if($sql->execute()) {
	echo '入力成功';
} else {
	echo '入力失敗';
	echo "\nPDO::errorinfo():\n";
	print_r($pdo->errorInfo());
}

?>