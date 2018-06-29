<?php session_start() ?>
<?php require '../header.php'; ?>
<?php include '../DB/dbase.php';?>
<style>
header {
  display: none;
}
footer {
  display: none;
}
</style>
<?php
unset($_SESSION['member']);

$sql=$pdo->prepare('select * from member where id=? and password=?');
$sql->execute([$_REQUEST['id'], $_REQUEST['password']]);
foreach ($sql as $row) {
	$_SESSION['member']=[
		'mem_num'=>$row['mem_num'],
	  'id'=>$row['id'],
	  'name'=>$row['name'],
		'email'=>$row['email'],
	  'password'=>$row['password'],
		'password2'=>$row['password2'],
	  'phone'=>$row['phone']
	];
}

//$user_name = $_SESSION['member']['name'];


if (isset($_SESSION['member'])) {
	// echo 'Thank you for comming out Website!!';
	// echo 'いらっしゃいませ、', $_SESSION['member']['name'], 'さん。';
	//$_SESSION['member']['name'] = $user_name;

} else {
	echo '<script> alert("Sorry, we don`t recognize this account."); history.go(-1)</script>';

}
?>
<meta http-equiv="refresh" content="0.5; url=../index.php" />
<?php require '../footer.php'; ?>
<?php session_start(); ?>
