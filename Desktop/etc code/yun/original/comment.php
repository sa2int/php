<?
	session_start();
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');	
	$sql = $pdo->prepare('insert into Y_comment(comment_content, board_num, member_id, datetime) values(?, ?, ?, now())');

	$comment_content = htmlspecialchars($_REQUEST['comment_content']);

	if($comment_content==null){
		echo '<script type="text/javascript">alert("内容を入力してください。");</script>';
		echo "<script>window.history.back(-1);</script>";

	}else{
		$sql->execute([$comment_content, $_REQUEST['board_num'], $_SESSION['member']['id']]);
		echo '<script type="text/javascript">alert("登録成功");</script>';
		echo "<script>window.history.back(-1);</script>";
		echo "<script>window.location.reload();</script>";

	}

?>