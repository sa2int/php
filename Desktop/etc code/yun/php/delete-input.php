<? require 'header.php'; ?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<? 
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');

	foreach($pdo->query('select * from product') as $row){
		echo '<tr>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>', $row['name'], '</td>';
		echo '<td>', $row['price'], '</td>';
		echo '<td>';
		echo '<a href="delete-output.php?id=', $row['id'], '"> 削除 </a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
	}
?>
</table>
<? require 'footer.php'; ?>