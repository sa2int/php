<?
	session_start();

	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	$sql = $pdo->prepare('update Y_member set password=?, name=?, e_mail=? where id=?');

	$password = mb_convert_kana($_REQUEST['password'], 'a');
	$name = mb_convert_kana($_REQUEST['name'], 'a');
	$e_mail = mb_convert_kana($_REQUEST['e_mail'], 'a');
	$password_2 = mb_convert_kana($_REQUEST['password_2'], 'a');
	

	if($password==$password_2){
		$rs=$sql->execute([$password, $name, $e_mail, $_SESSION['id']]);
	
		if($rs>0){
			$_SESSION['member']['password']=$password;
			$_SESSION['member']['name']=$name;
			$_SESSION['member']['e_mail']=$e_mail;
			echo '<script type="text/javascript">alert("修正成功");</script>';
			echo "<script>window.location.replace('mypage.php');</script>";
		}else{
			echo '<script type="text/javascript">alert("修正失敗");</script>';
			$pdo->setAttribute( PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION );
			echo "<script>window.location.replace('mypage.php');</script>";
		}
	}else{
		echo '<script type="text/javascript">alert("パスワードとパスワード確認が一致されていません。");</script>';
		echo "<script>window.location.replace('mypage.php');</script>";
	}

?>