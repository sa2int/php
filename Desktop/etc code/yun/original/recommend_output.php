<?
	session_start();
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');	
	$value=$_REQUEST['value'];
	$member_id=$_SESSION['member']['id'];
	$board_num=$_REQUEST['board_num'];

	if($value==0){
		$sql = $pdo->prepare('insert into Y_boardRecommend (board_num, recommend_id) values(?, ?)');
	}else{
		$sql = $pdo->prepare('delete from Y_boardRecommend where board_num=? and recommend_id=?');
	}

	$sql->execute([$board_num, $member_id]);
	echo "<script>window.history.back(-1);</script>";
	echo "<script>window.location.reload();</script>";

	
?>