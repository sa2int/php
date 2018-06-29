<?php require '../header.php';?>

<?php
include "dbase.php";
//create
$sql='create table p_product (
	id int auto_increment primary key,
	name varchar(200) not null,
	price int not null
)';
try{
	$pdo->exec($sql);
	echo "Successfully created table!!";
} catch(PDOException $e){
	echo "error";
}
?>
<?php require '../footer.php';?>
