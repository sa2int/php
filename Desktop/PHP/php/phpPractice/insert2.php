<?php require 'header.php';?>

<?php
include "dbase.php";

//insert
$insert2=$pdo->prepare("insert into product values(null, 'たこ焼き6', 18000)");

if($insert2->execute()){
	echo 'Success, Success';
} else {
	echo 'NONONONO, ',\n;
	echo \n, "PDO::errorinfo():", \n;
	print_r($pdo->errorInfo());
}




//prepare를 사용해서 SQL Injection 공격을 방어하기

$pdo = null;
?>
<?php require 'footer.php';?>
