<?
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');	
	$sql = $pdo->prepare('select id from Y_member where id=?');

	if(!preg_match('/[a-zA-z0-9]/', $_REQUEST['id'])){
		echo '<script type="text/javascript">alert("IDは英語、数字で組み合わせてください。");</script>';
	 	echo "<script>window.history.back(-1);</script>";
	}else{

		$id = mb_convert_kana(htmlspecialchars($_REQUEST['id']), 'a');
		$sql->execute([$id]);
		
		if($id==null){
			echo '<script type="text/javascript">alert("IDを入力してください。");</script>';
		 	echo "<script>window.history.back(-1);</script>";
		}else{
			if($sql->fetch()>0){
				echo '<script type="text/javascript">alert("既に使われているIDです。");</script>';
			 	echo "<script>window.location.replace('join.php?value=0');</script>";
			}else{
				echo '<script type="text/javascript">alert("使用できるIDです。");</script>';	
			 	echo "<script>window.location.replace('join.php?value=1&&id=$id');</script>";
			}
		}
	}
?>