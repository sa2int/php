<?php require '../header.php';?>

<?php
include "dbase.php";
//insert the basic value


$array = array(
	array("java", "100"),
	array("Unity", "100"),
	array("PHP", "100"),
);
// $array[1][0];

/*
$array = array(
	"Unity",
	"Java",
	"PHP"
);
*/
// $price='380';
for($i=0; $i<$array; $i++){
	$sql=$pdo->prepare('insert into p_product(id, name, price) values(null, '$i', '$i')');
	// $name=" lemon tea";
	$sql->bindParam(':name', $i, PDO::PARAM_STR);
	$sql->bindValue(':price', $price, PDO::PARAM_INT);
}
// $sql->execute();


if($sql->execute()) {
	echo 'Success insert!', $name;
} else {
	echo 'Failure insert', $name;
	echo "\nPDO::errorinfo():\n";
	print_r($pdo->errorInfo());
}





?>
<?php require '../footer.php';?>
