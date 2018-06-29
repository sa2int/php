<?
	session_start();
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	$sql = $pdo->prepare('delete from Y_member where id=?');

	$rs=$sql->execute([$_SESSION['member']['id']]);

	if($rs>0){
		if(isset($_SESSION['member'])){
			unset($_SESSION['member']);
			echo '<script type="text/javascript">alert("脱退成功");</script>';
		 	echo "<script>window.location.replace('main.php');</script>";
		}
	}else{
		echo '<script type="text/javascript">alert("脱退失敗");</script>';
	 	echo "<script>window.location.replace('mypage.php');</script>";		
	}

?>