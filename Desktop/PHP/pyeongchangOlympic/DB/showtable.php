<?php require '../header.php';?>

<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
//$sql=$pdo->prepare('Show Columns from kimuboard');
$sql=$pdo->prepare('Show tables;'); //tables //Show Columns from olympicBoards 모든 테이블

if($sql->execute()) {
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
<?php require '../footer.php';?>
