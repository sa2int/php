<?
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	$sql = $pdo->prepare('delete from Y_comment where comment_num=?');
	
	$rs=$sql->execute([$_REQUEST['comment_num']]);

	if($rs>0){
		echo '<script type="text/javascript">alert("削除成功");</script>';
		echo "<script>window.history.back(-1);</script>";
		echo "<script>window.location.reload();</script>";
	}

?>