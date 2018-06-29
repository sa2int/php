<?php session_start(); ?>
<?php include "../header3.php" ?>
<?php include "dbase.php" ?>

<?php
unset($_SESSION['member']);
$sql=$pdo->prepare('select * from member where id=? and password=?');
$sql->execute([$_REQUEST['id'], $_REQUEST['password']]);
foreach ($sql->fetchAll() as $row) {
	$_SESSION['memebr']=[
		'mem_num'=>$row['mem_num'],
		'id'=>$row['id'],
		'name'=>$row['name'],
		'email'=>$row['email'],
		'password'=>$row['password'],
		'password2'=>$row['password2'],
		'phone'=>$row['phone']];
}

if (isset($_SESSION['member'])) {
	echo 'いらっしゃいませ、', $_SESSION['member']['name'], 'さん。';
} else {
	echo 'ログイン名またはパスワードが違います。';
}

?>

<?php include "../footer3.php" ?>
