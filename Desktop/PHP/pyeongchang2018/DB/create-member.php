<?php require '../header.php';?>

<?php
include "dbase.php";
//create
$sql='create table member (
	mem_num int auto_increment primary key,
	id varchar(30) not null,
	name varchar(30) not null,
	email varchar(30) not null,
	password varchar(30) not null,
	password2 varchar(30) not null,
	phone int not null
)';
try{
	$pdo->exec($sql);
	echo "Successfully created sssboard table!!";
} catch(PDOException $e){
	echo "error";
}
?>
<?php require '../footer.php';?>
