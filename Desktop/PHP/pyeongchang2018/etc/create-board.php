<?php require '../header.php';?>

<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
//create
$sql=$pdo->prepare('create table b_board (
		b_board int auto_increment primary key,
		b_subject varchar(50) not null,
		b_content text not null,
		b_count int UNSIGNED,
		mem_num int not null,
		b_ip varchar(15),
		b_filename varchar(250),
		b_filename2 varchar(250),
		foreign key(mem_num) references member(mem_num)
	)');

	if($sql->execute()) {
		echo 'Successfully created bbb_board table!!';
	} else {
		echo 'error';
	}
?>
<?php require '../footer.php';?>
