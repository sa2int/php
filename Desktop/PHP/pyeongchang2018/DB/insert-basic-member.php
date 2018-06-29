<?php require '../header.php';?>

<?php
include "dbase.php";
//insert the basic value

$phone='01012341234';
$sql=$pdo->prepare('insert into member values(null, :id, :name, :email, :password, :password2, :phone)');
$sql->bindParam(':id', $id, PDO::PARAM_STR);
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':email', $email, PDO::PARAM_STR);
$sql->bindParam(':password', $password, PDO::PARAM_STR);
$sql->bindParam(':password2', $password2, PDO::PARAM_STR);
$sql->bindValue(':phone', $phone, PDO::PARAM_INT);
$id="123";
$name="123";
$email="123@naver.com";
$password="123";
$password2="123";
$sql->execute();

///////////////

$phone='01078947894';
$sql=$pdo->prepare('insert into member values(null, :id, :name, :email, :password, :password2, :phone)');
$sql->bindParam(':id', $id, PDO::PARAM_STR);
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':email', $email, PDO::PARAM_STR);
$sql->bindParam(':password', $password, PDO::PARAM_STR);
$sql->bindParam(':password2', $password2, PDO::PARAM_STR);
$sql->bindValue(':phone', $phone, PDO::PARAM_INT);

$id="asd";
$name="asd";
$email="asd@naver.com";
$password="asd1";
$password2="asd1";

if($sql->execute()) {
	echo 'Success insert!', $name;
} else {
	echo 'Failure insert', $name;
	echo "\nPDO::errorinfo():\n";
	print_r($pdo->errorInfo());
}

?>
<?php require '../footer.php';?>
