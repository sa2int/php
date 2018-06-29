<?php require 'header.php';?>
<?
	unset($_SESSION['member']);
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	$sql = $pdo->prepare('select * from Y_member where id=?');
	$sql->execute([$_REQUEST['id']]);
	
	foreach($sql->fetchAll() as $row) {
		$password = $row['password'];
		$name= $row['name'];
	}	
		if($password == null){
			echo '<script type="text/javascript">alert("IDが登録されていません。");</script>';
			echo "<script>window.location.replace('main.php');</script>";
		}else if($password != $_REQUEST['password']){
			echo '<script type="text/javascript">alert("PASSWORDを確認してください");</script>';
			echo "<script>window.location.replace('main.php');</script>";		
		}else{
			$_SESSION['member']=[
			'id'=>$row['id'], 'password'=>$row['password'], 'name'=>$row['name'],
			'e_mail'=>$row['e_mail']];
			echo '<script type="text/javascript">alert("', $name, 'さんいらっしゃいませ");</script>';
			echo "<script>window.location.replace('main_member.php');</script>";
		}
	

?>
<?php require 'footer.php';?>