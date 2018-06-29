<?php require '../header.php';?>

<?php
include "../DB/dbase.php";
//insert the basic value

$sql=$pdo->prepare('insert into b_board(b_board, b_subject, b_content, b_count, mem_num, b_ip )
values(null, :b_subject, :b_content, :b_count, :mem_num, :b_ip)');
$sql->bindParam(':b_subject', $b_subject, PDO::PARAM_STR);
$sql->bindParam(':b_content', $b_content, PDO::PARAM_STR);
$sql->bindParam(':b_count', $b_count, PDO::PARAM_INT);
$sql->bindParam(':mem_num', $mem_num, PDO::PARAM_INT);
$sql->bindParam(':b_ip', $b_ip, PDO::PARAM_STR);


$b_subject="hello board";
$b_content="hello board nice to meet you";
$b_count="0";
$mem_num="1";
$b_ip="0";



if($sql->execute()) {
	echo 'Success insert!', $b_content;
} else {
	echo 'Failure insert', $b_content;
	echo "\nPDO::errorinfo():\n";
	print_r($pdo->errorInfo());
}
?>
<?php require '../footer.php';?>
