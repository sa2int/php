<? require 'header.php'; ?>
<table>
	<tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>
<?
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	foreach ($pdo->query('select * from product') as $row){
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
	}
?>
</table>
<? require 'footer.php'; ?>
