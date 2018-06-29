<?php require 'header.php';?>
<?
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');	
	$sql = $pdo->prepare('insert into Y_member (id, password, name, e_mail) values(?, ?, ?, ?)');
	
	$id = htmlspecialchars(mb_convert_kana($_REQUEST['id'], 'a'));
	$password = htmlspecialchars(mb_convert_kana($_REQUEST['password'], 'a'));
	$name = htmlspecialchars(mb_convert_kana($_REQUEST['name'], 'a'));
	$mail_id = htmlspecialchars(mb_convert_kana($_REQUEST['e_mail'], 'a'));
	$mail_domein= htmlspecialchars(mb_convert_kana($_REQUEST['mail_domein'], 'a'));
	
	$e_mail= $mail_id.'@'.$mail_domein;
	
	
	if($_REQUEST['value']==0){
		echo '<script type="text/javascript">alert("ID重複チェックをしてください。");</script>';
	 	echo "<script>window.history.back();</script>";
	}else if($password==null){
		echo '<script type="text/javascript">alert("パスワードを入力してください。");</script>';
	 	echo "<script>window.history.back();</script>";
	}else if($name==null){
		echo '<script type="text/javascript">alert("名前を入力してください。");</script>';
	 	echo "<script>window.history.back();</script>";
	}else if($e_mail==null){
		echo '<script type="text/javascript">alert("メールアドレスを入力してください。");</script>';
	 	echo "<script>window.history.back();</script>";
	}else if(!preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-z0-9]{8,30}/', $password)){
		echo '<script type="text/javascript">alert("パスワードは8~30字で数字、英語小文字、大文字を含めます。");</script>';
	 	echo "<script>window.history.back();</script>";
	}else if($password!=$_REQUEST['password_2']){
		echo '<script type="text/javascript">alert("パスワードが一致されていません。");</script>';
	 	echo "<script>window.history.back();</script>";
	}else{
		$rs= $sql->execute([$id, $password, $name, $e_mail]);	
	
		if ($rs>0){
			echo '<script type="text/javascript">alert("会員登録成功");</script>';
		 	echo "<script>window.location.replace('main.php');</script>";
		}else{
			echo '<script type="text/javascript">alert("会員登録失敗");</script>';
		 	echo "<script>history.back();</script>";
		}

	}


?>
<?php require 'footer.php';?>