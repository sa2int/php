<?
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');	
	$sql = $pdo->prepare('delete from Y_board where board_num=?');
	
	if($_REQUEST['board_num']==null){
		echo '<script type="text/javascript">alert("削除失敗");</script>';
		echo "<script>window.history.back();</script>";
	}else{	
		$rs=$sql->execute([$_REQUEST['board_num']]);
	
		if($rs>0){
			echo '<script type="text/javascript">alert("書き込みを削除しました。");</script>';
			echo "<script>window.location.replace('mypage.php');</script>";
		}else{
			echo '<script type="text/javascript">alert("削除失敗");</script>';
			echo "<script>window.history.back();</script>";
		}
	}
?>