<?php require 'header.php';?>

<?php
include "dbase.php";

//insert
$insert = "insert into product values(null, 'お好み焼き', 890)";
try{
	$pdo->exec($insert);
	echo "Success";
}catch(PDOException $e){
	echo "error";
}



//prepare를 사용해서 SQL Injection 공격을 방어하기

$pdo = null;
?>
<?php require 'footer.php';?>
