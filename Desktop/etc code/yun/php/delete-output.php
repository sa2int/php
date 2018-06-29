<? require 'header.php'; ?>
<? 
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	$sql = $pdo->prepare('delete from product where id=?');
	if($sql->execute([$_REQUEST['id']])){
		//echo '削除成功';
		echo("<script>location.href='delete-input.php';</script>"); 
	}else{
		echo '失敗';
	}	
?>

<? require 'footer.php'; ?>