<? session_start(); ?>
<? require 'header.php'; ?>
<? require 'menu.php' ?>
<?
	if(isset($_SESSION['customer'])){
		$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
		$sql=$pdo->prepare('insert into favorite value(?, ?)');
		$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
		echo 'お気に入りに商品を追加しました。';
		echo '<hr>';
		require 'favorite.php';
	}else{
		echo 'お気に入りに商品を追加するには、ログインしてください。';
	}
?>
<? require 'footer.php'; ?>