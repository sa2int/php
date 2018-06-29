<? require 'header.php'; ?>
<? require 'menu.php'; ?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<? 
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');

	foreach($pdo->query('select * from product') as $row){
		echo '<tr>';
		echo '<td>', htmlspecialchars($row['id']), '</td>';
		echo '<td>', htmlspecialchars($row['name']), '</td>';
		echo '<td>', htmlspecialchars($row['price']), '</td>';
		echo '</tr>';
		echo "\n";
	}
?>
</table>
<? require 'footer.php'; ?>