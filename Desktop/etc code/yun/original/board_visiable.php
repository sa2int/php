<?
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	$sql = $pdo->prepare('update Y_board set visiable=? where board_num=?');
	$rs=$sql->execute([$_REQUEST['visiable'], $_REQUEST['board_num']]);
	
	if($rs){
		echo '<script type="text/javascript">alert("成功");</script>';
		echo "<script>window.location.replace('mypage.php');</script>";
	}else{
		echo '<script type="text/javascript">alert("失敗");</script>';
		echo "<script>window.location.replace('mypage.php');</script>";
	}
?>