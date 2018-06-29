<?php require '../header.php';?>

<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
//create
$sql=$pdo->prepare('create table fileBoard (
		f_boardNum int auto_increment primary key,
		f_orijinaName varchar(260) not null,
		f_storedName varchar(36) not null,
    f_size int,
    f_uplodaDate timestamp not null default now(),
    f_delChk varchar(1) default "n" not null,
		b_boardNum int not null,
		foreign key(b_boardNum) references olympicsBoard(b_boardNum)
	)');

	if($sql->execute()) {
		echo 'Successfully created fileBoard table!!';
	} else {
		echo 'error';
	}
?>
<?php require '../footer.php';?>
