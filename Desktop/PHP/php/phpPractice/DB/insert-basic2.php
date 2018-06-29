<?php require '../header.php';?>

<?php
include "dbase.php";
//insert the basic value
$sql='insert into p_product(id, name, price) values(null, "nacho", 430)';
try{
	$pdo->exec($sql);
	echo "inculde value";
} catch(PDOException $e){
	echo "error";
}
?>
<?php require '../footer.php';?>
