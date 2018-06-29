<? session_start(); ?>
<? require 'header.php'; ?>
<? require 'menu.php' ?>
<?
	if(isset($_SESSION['customer'])){
		$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
		$sql=$pdo->prepare('delete from favorite where customer_id=? and product_id=?');
		$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
		echo 'お気に入りから商品を削除しました。';
		echo '<hr>';
	}else{
		echo 'お気に入りから商品を削除するには、ろぎぃんしてください。';
	}

	require 'favorite.php';
?>
<? require 'footer.php'; ?>