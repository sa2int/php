<?
if(!empty($_SESSION['customer'])){
	echo '<table>';
	echo '<th>商品番号</th><th>商品名</th><th>価格</th>';
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	$sql=$pdo->prepare('select * from favorite, product '.
			'where customer_id=? and product_id=product.id');
	$sql->execute([$_SESSION['customer']['id']]);
	foreach($sql->fetchAll() as $row){
		$id=$row['id'];
		echo '<tr>';
		echo '<td>', $id, '</td>';
		echo '<td><a href="detail.php?id=', $id, '">', $row['name'], '</a></td>';
		echo '<td>', $row['price'], '</td>';
		echo '<td><a href="favorite-delete.php?id=', $id, '">削除</a></td>';
		echo '</tr>';
	}
	echo '</table>';
}else{
	echo 'お気に入りを表示するには、ログインしてください。';
}
?>