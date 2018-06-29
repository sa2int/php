<?php require 'header.php';?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>
<?php
include "dbase.php";
$sql=$pdo->prepare('select * from product where name like ?');//prepare로 구문을 받으면　execute로 실행해야한다.
$sql->execute(['%' .$_REQUEST['keyword'].'%']); //  . 는 결합연산자로서
foreach ($sql->fetchAll() as $row) {
  echo '<tr>';
	echo '<td>', $row['id'], '</td>';
	echo '<td>', $row['name'], '</td>';
	echo '<td>', $row['price'], '</td>';
	echo '</tr>';
	echo "\n";
}
 ?>
<?php require 'footer.php';?>
