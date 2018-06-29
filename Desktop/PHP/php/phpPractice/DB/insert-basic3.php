<?php require '../header.php';?>

<?php
include "dbase.php";
//insert the basic value

$price='380';
$sql=$pdo->prepare('insert into p_product(id, name, price) values(null, :name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindValue(':price', $price, PDO::PARAM_INT);
$name=" lemon tea";
$sql->execute();

$price='380';
$sql=$pdo->prepare('insert into p_product(id, name, price) values(null, :name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindValue(':price', $price, PDO::PARAM_INT);
$name="black tea";

if($sql->execute()) {
	echo 'Success insert!', $name;
} else {
	echo 'Failure insert', $name;
	echo "\nPDO::errorinfo():\n";
	print_r($pdo->errorInfo());
}





?>
<?php require '../footer.php';?>
