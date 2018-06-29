<? require 'header.php'; ?>
<? 
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');

	foreach($pdo->query('select * from product') as $row){
		echo '<p>';
		echo $row['id'];
		echo $row['name'];
		echo $row['price'];
		echo '</p>';
	}
?>
<? require 'footer.php'; ?>