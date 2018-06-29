<? require 'header.php'; ?>
<? 
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
	$sql = $pdo->prepare('insert into product values(null, ?, ?)');
	if (empty($_REQUEST['name'])){
		echo '商品名を入力してください。';
	}else if(!preg_match('/[0-9]+/', $_REQUEST['price'])){
		echo '商品価格を整数で入力してください';
	}else{
		if($sql->execute([htmlspecialchars($_REQUEST['name']), $_REQUEST['price']])){
			echo '追加成功';
		}else{
			echo '追加失敗';
		}
	}

?>
<? require 'footer.php'; ?>