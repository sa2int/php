<? session_start(); ?>
<? require 'header.php'; ?>
<? require 'menu.php' ?>
<?
	unset($_SESSION['customer']);
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	$sql = $pdo->prepare('select * from customer where login=? and password=?');
	$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
	foreach ($sql->fetchAll() as $row){
		$_SESSION['customer']=[
			'id'=>$row['id'], 'name'=>$row['name'], 'address'=>$row['address'],
			'login'=>$row['login'], 'password'=>$row['password']];
	}
	if(isset($_SESSION['customer'])){
		echo 'いらっしゃいませ', $_SESSION['customer']['name'], 'さん。';
	}else{
		echo 'ログイン名またはパスワードが違います。';
	}
?>
<? require 'footer.php'; ?>