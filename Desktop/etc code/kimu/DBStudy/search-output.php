<?php require '../DBStudy/header.php' ?>
<?php
//DBを繋がる部分
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', //住所部分、DB名、設定
	'game-mania', //ID
	'hayato0210'); //PW

$sql=$pdo->prepare('select * from product where name=?');
$sql->execute([$_REQUEST['keyword']]);

echo "<table>";
echo "<tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>";
foreach ($sql->fetchAll() as $row) {
echo "<tr><td>$row[id]</td><td>$row[name]</td><td>$row[price]</td></tr>";
}
echo "</table>";
?>

<?php require '../DBStudy/footer.php' ?>