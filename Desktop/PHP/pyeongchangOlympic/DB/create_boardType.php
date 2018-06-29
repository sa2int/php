<?php require '../header.php';?>

<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
//create
$sql=$pdo->prepare('create table board_type (
  t_num int primary key,
  t_name varchar(40) not null
  )');

	if($sql->execute()) {
		echo 'Successfully created board_type table!!';
	} else {
		echo 'error';
	}
?>
<?php require '../footer.php';?>
