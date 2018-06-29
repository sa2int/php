<?php require '../header.php';?>

<?php
include "dbase.php";
//insert the basic value
$sql=$pdo->prepare('insert into p_product(id, name, price) values(null, "pizza", 1080)');
if($sql->execute()) {
	echo 'Great';
} else {
	echo 'ㅠㅠ';
	echo "\nPDO::errorinfo():\n";
	print_r($pdo->errorInfo());
}
?>
<?php require '../footer.php';?>
