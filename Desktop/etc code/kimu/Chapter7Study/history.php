<?php session_start();?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if(isset($_SESSION['customer'])) {
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
$sql_purchase=$pdo->prepare('select * from purchase where customer_id=?');
$sql_purchase->execute([$_SESSION['customer']['id']]);

foreach($sql_purchase->fetchAll() as $row_purchase) {
	$sql_detail=$pdo->prepare('select * from purchase_detail, product where purchase_id=? and product_id=id');//product의 id와 같고 구매내역 ID가 내것인것들의 product 내용물 다 뽑아냄
	$sql_detail->execute([$row_purchase['id']]);
	echo '<table>';
	echo '<tr><th>商品番号</th><th>商品名</th><th>価格</th></th><th>個数</th></th><th>小計</th></th></tr>';
	$total=0;
	foreach($sql_detail->fetchAll() as $row_detail) {
		echo '<tr>';
		echo '<td>', $row_detail['id'], '</td>';
		echo '<td><a href="detail.php?id=', $row_detail['id'], '">', $row_detail['name'], '</a></td>';
		echo '<td>', $row_detail['price'],'</td>';
		echo '<td>', $row_detail['count'],'</td>';
		$subtotal=$row_detail['price']*row_detai;['count'];
		$total+=subtotal;
		echo '<td>', $subtotal,'</td>';
		echo '</tr>';
		}
	echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total, '</td></tr>';
	echo '</table>';
	echo '<hr>';
	}
} else {
	echo '購入履歴を表示するには、ログインしてください。';
}
?>
<?php require 'footer.php'; ?>