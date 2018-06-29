<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
if(isset($_SESSTION['customer'])) {
	$id=$_SESSTION['customer']['id'];
	$sql=$pdo->prepare('select * from customer where id!=? and login=?');
	$sql->execute([$id, $_REQUEST['login']]);
} else {
	$sql=$pdo->prepare('select * from custoemr where login=?');
	$sql->execute([$_REQUEST['login']]);
}

if(empty($sql->fetchAll())) {//로그인 이름(유저ID)가 중복된게 없다면 변경 혹은 등록 가능하므로 진행.
	if(isset($_SESSTION['customer'])) {//변경
		$sql=$pdo->prepare('update customer set name=?, address=?, login=?, password=?, where id=?');
		$sql->execute([$_REQUEST['name'], $_REQUEST['address'], $_REQUEST['login'], $_REQUEST['password'], $id]);
		$_SESSTION['customer']=['id'=>$id, 'name'=>$_REQUEST['name'], 'address'=>$_REQUEST['address'], 'login'=>$_REQUEST['login'], 'password'=>$_REQUEST['password']];
		echo 'お客様情報を更新しました。';
	} else {//등록
		$sql=$pdo->prepare('insert into customer values(null,?,?,?,?)');
		$sql->execute([$_REQUEST['name'], $_REQUEST['address'], $_REQUEST['login'], $_REQUEST['password']]);
		echo 'お客様情報を登録しました。';
	}
} else {
	echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>
<?php require 'footer.php'; ?>