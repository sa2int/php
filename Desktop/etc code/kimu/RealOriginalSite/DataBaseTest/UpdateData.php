<?php

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
$sql=$pdo->prepare('Update kimuboard set hit=1 Where id=27');

if($sql->execute()) {
	echo '入力成功';
} else {
	echo '入力失敗';
	echo "\nPDO::errorinfo():\n";
	print_r($pdo->errorInfo());
}

?>