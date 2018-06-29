<?php require '../DBStudy/header.php' ?>
<?php
//DBを繋がる部分
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', //住所部分、DB名、設定
	'game-mania', //ID
	'hayato0210'); //PW

//foreachでテーブルの内容を出力
foreach ($pdo->query('select * from product') as $row) {
	echo '<p>', $row['id'], ':', $row['name'], ':', $row['price'], '</p>';
}
	
foreach ($pdo->query('select * from product') as $row2) {
	echo "<p>$row2[id]:$row2[name]:$row2[price]</p>";
}

echo "<table>";
echo "<tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>";
foreach ($pdo->query('select * from product') as $row2) {
echo "<tr><td>$row2[id]</td><td>$row2[name]</td><td>$row2[price]</td></tr>";
}
echo "</table>";

echo "<table>";
echo "<tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>";
foreach ($pdo->query('select * from product') as $row) {
	echo '<tr><form action="update-output.php" method="post">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<td>', $row['id'], '</td>';
	echo '<td>';
	echo '<input type="text" name="name" value="', $row['name'], '">';
	echo '</td>';
	echo '<td>';
	echo '<input type="text" name="price" value="', $row['price'], '">';
	echo '</td>';
	echo '<td><input type="submit" value="更新"></td>';
	echo '</form></tr>';
	echo "\n";
}
echo "</table>";

echo "<table>";
echo "<tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>";
foreach ($pdo->query('select * from product') as $row) {
echo "<tr><td>$row[id]</td><td>$row[name]</td><td>$row[price]</td>";
echo '<td>';
echo '<a href="delete-output.php?id=', $row['id'], '">削除</a>';
echo '</td>';
echo '</tr>';
}
echo "</table>";
?>

商品名を入力してください。
<form action="search-output.php" method="post">
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>

商品名を入力してください2。
<form action="search-output2.php" method="post">
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>

<p>商品を追加します。</p>
<form action="insert-output.php" method="post">
商品名<input type="text" name="name">
価格<input type="text" name="price">
<input type="submit" name="追加">
</form>

<p>商品を追加します2。</p>
<form action="insert-output2.php" method="post">
商品名<input type="text" name="name">
価格<input type="text" name="price">
<input type="submit" name="追加">
</form>

<br><br>
<table>
<tr><th>商品版後</th><th>商品名</th><th>商品価格<th></tr>
<?php
if(isset($_REQUEST['command'])) {
	switch($_REQUEST['command']) {
	case 'insert':
		if (empty($_REQUEST['name']) ||
			!preg_match('/[0-9]+/', $_REQUEST['price'])) break;
		$sql=$pdo->prepare('insert into product values(10,?,?)');
		$sql->execute(
			[htmlspecialchars($_REQUEST['name']), $_REQUEST['price']]);
		break;
	case 'update':
		if (empty($_REQUEST['name']) ||
			!preg_match('/[0-9]+/', $_REQUEST['price'])) break;
		$sql=$pdo->prepare(
		'update product set name=?, price=? where id=?');
		$sql->execute(
			[htmlspecialchars($_REQUEST['name']), $_REQUEST['price'], $_REQUEST['id']]);
		break;
	case 'delete':
		$sql=$pdo->prepare('delete from product where id=?');
		$sql->execute([$_REQUEST['id']]);
		break;
	}
}

foreach($pdo->query('select * from product') as $row) {
echo '<tr>';
	echo '<form action="all.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<td>', $row['id'], '</td>';
	echo '<td>';
	echo '<input type="text" name="name" value="', $row['name'], '">';
	echo '</td>';
	echo '<td>';
	echo '<input type="text" name="price" value="', $row['price'], '">';
	echo '</td>';
	echo '<td><input type="submit" value="更新"></td>';
	echo '</form>';
	echo '<form action="all.php" method="post">';
	echo '<input type="hidden" name="command" value="delete">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<td><input type="submit" value="削除"></td>';
	echo '</form>';
	echo '</tr>';
	echo "\n";
}
?>
<tr>
<form action="all.php" method="post">
<input type="hidden" name="command" value="insert">
<td></td>
<td><input type="text" name="name"></td>
<td><input type="text" name="price"></td>
<td><input type="submit" name="追加"></td>
</form>
</tr>
</table>
<?php require '../DBStudy/footer.php' ?>