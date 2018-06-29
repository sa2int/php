<? session_start(); ?>
<? require 'header.php'; ?>
<? require 'menu.php'; ?>
<?
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	$purchase_id=1;
	foreach ($pdo->query('select max(id) from purchase') as $row) {
	$purchase_id=$row['max(id)']+1;
	}
	$sql=$pdo->prepare('insert into purchase values(?,?)');
	if ($sql->execute([$purchase_id, $_SESSION['customer']['id']])) {
		foreach ($_SESSION['product'] as $product_id=>$product) {
			$sql=$pdo->prepare('insert into purchase_detail values(?,?,?)');
			$sql->execute([$purchase_id, $product_id, $product['count']]);
		}
		unset($_SESSION['product']);
		echo '購入手続きが完了しました。ありがとうございます。';
	} else {
		echo '購入手続き中にエラーが発生しました。申し訳ございません。';
	}
?>
<? require 'footer.php'; ?>
