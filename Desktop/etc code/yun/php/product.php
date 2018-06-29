<? session_start(); ?>
<? require 'header.php'; ?>
<? require 'menu.php'; ?>
<form action="product.php" method="post">
商品検索
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>

<hr>
<?
	echo '<table>';
	echo '<th>商品番号</th><th>商品名</th><th>価格</th>';
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	if(isset($_REQUEST['keyword'])){
		$sql=$pdo->prepare('select * from product where name like ?');
		$sql->execute(['%'.$_REQUEST['keyword'].'%']);
	}else{
		$sql=$pdo->prepare('select * from product');
		$sql->execute([]);
	}

	foreach($sql->fetchAll() as $row){
		$id=$row['id'];
		echo '<tr>';
		echo '<td>', $id, '</td>';
		echo '<td>';
		echo '<a href="detail.php?id=',$id, '">', $row['name'], '</a>';
		echo '</td>';
		echo '<td>', $row['price'], '</td>';
		echo '</tr>';
	}
	echo '</table>';
?>
<? require 'footer.php';?>



