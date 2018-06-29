<?php require '../header.php';?>

<?php
include "../DB/dbase.php";
//insert the basic value
$sql=$pdo->prepare('insert into board_type(t_num, t_name )values(:t_num, :t_name)');
$sql->bindParam(':t_num', $t_num, PDO::PARAM_INT);
$sql->bindParam(':t_name', $t_name, PDO::PARAM_STR);
$t_num=1;
$t_name="Alpine Skiing";
$sql->execute();

$sql=$pdo->prepare('insert into board_type(t_num, t_name )values(:t_num, :t_name)');
$sql->bindParam(':t_num', $t_num, PDO::PARAM_INT);
$sql->bindParam(':t_name', $t_name, PDO::PARAM_STR);
$t_num=2;
$t_name="Biathlon";
$sql->execute();

$sql=$pdo->prepare('insert into board_type(t_num, t_name )values(:t_num, :t_name)');
$sql->bindParam(':t_num', $t_num, PDO::PARAM_INT);
$sql->bindParam(':t_name', $t_name, PDO::PARAM_STR);
$t_num=3;
$t_name="Cross-Country Skiing";
$sql->execute();

$sql=$pdo->prepare('insert into board_type(t_num, t_name )values(:t_num, :t_name)');
$sql->bindParam(':t_num', $t_num, PDO::PARAM_INT);
$sql->bindParam(':t_name', $t_name, PDO::PARAM_STR);
$t_num=4;
$t_name="Ice Hockey";
$sql->execute();

$sql=$pdo->prepare('insert into board_type(t_num, t_name )values(:t_num, :t_name)');
$sql->bindParam(':t_num', $t_num, PDO::PARAM_INT);
$sql->bindParam(':t_name', $t_name, PDO::PARAM_STR);
$t_num=5;
$t_name="Snowboard";
$sql->execute();

$sql=$pdo->prepare('insert into board_type(t_num, t_name )values(:t_num, :t_name)');
$sql->bindParam(':t_num', $t_num, PDO::PARAM_INT);
$sql->bindParam(':t_name', $t_name, PDO::PARAM_STR);
$t_num=6;
$t_name="Wheelchair Curling";

if($sql->execute()) {
	echo 'Success insert!', $t_name;
} else {
	echo 'Failure insert', $t_name;
	echo "\nPDO::errorinfo():\n";
	print_r($pdo->errorInfo());
}
?>
<?php require '../footer.php';?>
