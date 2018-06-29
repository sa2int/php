<?php

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');

$start = 0;
$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );//LIMIT
$sql=$pdo->prepare('Select * from kimuboard order by id DESC LIMIT ?, 5');//LIMIT[시작번호][가져올 갯수]

if($sql->execute([$start])) {
	echo '検索成功';
	echo "<br/>\n";
	foreach($sql->fetchAll() as $row) {
		print_r($row);//配列出力
		echo "<br/>\n";
	}
} else {
	echo '検索失敗';
	echo "\nPDO::errorinfo():\n";
	print_r($pdo->errorInfo());
}

?>