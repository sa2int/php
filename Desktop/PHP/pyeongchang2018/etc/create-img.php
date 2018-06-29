<?php require '../header.php';?>

<?php
include "dbase.php";
//create
$sql='create table create-img (
	`fileNo` INT NOTNULLAUTO_INCREMENTPRIMARYKEY ,
`bbsNo` INT NOTNULL ,
`path` VARCHAR( 255)NOTNULL ,
`filename` VARCHAR( 50)NOTNULL
)';
try{
	$pdo->exec($sql);
	echo "Successfully created create table!!";
} catch(PDOException $e){
	echo "error";
}
?>
<?php require '../footer.php';?>
