<?php session_start();?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$purchase_id=1;
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
foreach($pdo->query('select max(id) from purchase') as $row) {
	$purchase_id=$row['max(id)']+1;//상품ID를 최대로 변경해준다.(++부분)
}
$sql=$pdo->prepare('insert into purchase values(?, ?)');
if($sql->execute([$purchase_id, $_SESSION['customer']['id']])) {
	foreach($_SESSION['product'] as $product_id=>$product) {//SESSION PRODUCT에 있는 상품내용들을 반복
		//그래서 앞에있는건 무조껀 id인 상품번호가 오게 되며, 뒤쪽에껀 나머지 값들이 들어가게 된다.(cart-insert.php 참고)
		$sql=$pdo->prepare('insert into purchase_detail values(?, ?, ?)');
		$sql->execute([$purchase_id, $product_id, $product['count']]);
	}
	unset($_SESSION['product']);//구매 세션 종료->구매 리스트 삭제
	echo '<p>商品購入が終わりました。</p>';
} else {
	echo '購入手続き中にエラーが発生しました。再びログインしてください。';
}

/*$sql=$pdo->prepare('select * from purchase-detail');
$sql->execute([]);

foreach($sql->fetchAll() as $row) {
	echo $row['purchase_id'], '  ', $row['product_id'],  '  ', $row['count'];
}*/
?>
<?php require 'footer.php'; ?>