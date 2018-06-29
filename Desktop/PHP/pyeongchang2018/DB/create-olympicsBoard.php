<?php require '../header.php';?>

<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
//create
$sql=$pdo->prepare('create table olympicsBoard (
		b_boardNum int auto_increment primary key,
		b_subject varchar(50) not null,
		b_contents text not null,
		b_delete varchar(1) default "n" not null,
		file01 varchar(254),
		b_date timestamp not null default now(),
		ip char(20),
		mem_num int not null,
		foreign key(mem_num) references member(mem_num)
	)');

	if($sql->execute()) {
		echo 'Successfully created olympicsBoard table!!';
	} else {
		echo 'error';
	}
?>
<?php require '../footer.php';?>
