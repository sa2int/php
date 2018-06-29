<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php include '../DB/dbase.php'; ?>
<style>
.info {
	text-align: center;
	font-family: 'Montserrat', sans-serif;
	 font-size:30px;
}

header {
  display: none;
}
footer {
  display: none;
}
</style>
<?php
if (isset($_SESSION['member'])) {
	$mem_num=$_SESSION['member']['mem_num'];
	$sql=$pdo->prepare('select * from member where mem_num!=? and id=?');
	$sql->execute([$mem_num, $_REQUEST['id']]);
} else {
	$sql=$pdo->prepare('select * from member where id=?');
	$sql->execute([$_REQUEST['id']]);
}
if (empty($sql->fetchAll())) {
	if (isset($_SESSION['member'])) {
		$sql=$pdo->prepare('update member set email=?,  password=?, password2=?, phone=? where mem_num=?');
		$sql->execute([
			$_REQUEST['email'], $_REQUEST['password'],
		  $_REQUEST['password2'], $_REQUEST['phone'], $mem_num]);
			$_SESSION['member']=[
		    'mem_num'=>$mem_num, 'name'=>$_REQUEST['name'],
				'id'=>$_REQUEST['id'], 'email'=>$_REQUEST['email'],
		    'password'=>$_REQUEST['password'], 'password2'=>$_REQUEST['password2'], 'phone'=>$_REQUEST['phone']];
		echo '<div class="boardMainImg"></div>';
		echo '<div class="info">';
		//echo '<div>お客様情報を更新しました。</div>';
		?>
		<script>alert("情報が変更させていただきました。");</script>
		<?php
		echo '<meta http-equiv="refresh" content="0.5; url=../index.php" />';
		echo '<div>';
	//	echo '<a href="../index.php">Topへ</a>';
		echo '</div>';
		echo '</div>';
	} else {
$password=$_REQUEST['password'];
$password2=$_REQUEST['password2'];
		if ($password2==$password){

		if (preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}/', $password)) {
				$sql=$pdo->prepare('insert into member values(null,?,?,?,?,?,?)');
				$sql->execute([
					$_REQUEST['id'], $_REQUEST['name'],
				    $_REQUEST['email'], $_REQUEST['password'],
						 $_REQUEST['password2'], $_REQUEST['phone']]);
				echo '<div class="info">';
				echo '<meta http-equiv="refresh" content="1; url=../index.php" />';
			} else {
				echo '<script>alert("Sorry, we don`t recognize this password.")</script>';
				echo '<meta http-equiv="refresh" content="0.5; url=/test/paku/pyeongchangOlympic/memberLog/signUp_input.php">';
			}
		} else {
			echo '<script>alert("Sorry, It`s not same password and password2.")</script>';
		}


	}
} else {
	echo '<script>alert("ログイン名がすでに使用されていますので、変更してください。";)</script>';
}
?>
<?php require '../footer.php'; ?>
