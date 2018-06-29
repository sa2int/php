<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
//$sql=$pdo->prepare('Create table kimuboard (id INT not null auto_increment, title Varchar(30), sex Varchar(10), name Varchar(20), subject Varchar(20), contents Varchar(200), hit INT not null, now Varchar(50), Primary Key(id))');

$sql=$pdo->prepare('Create table requestboard (id INT not null auto_increment, title Varchar(30), sex Varchar(10), name Varchar(20), mail Varchar(30), location Varchar(10), requestdate Varchar(30), requesttime Varchar(10), contents Varchar(1000), hit INT not null, now Varchar(50), Primary Key(id))');


if($sql->execute()) {
	echo '構築成功';
} else {
	echo '構築失敗';
}

?>