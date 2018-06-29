<?php require '../header.php';?>
<table>
	<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<?php
include "dbase.php";

//select product
foreach ($pdo->query('select * from p_product') as $row) {
		echo '<tr>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>', $row['name'], '</td>';
		echo '<td>', $row['price'], '</td>';
		echo '</tr>';
		echo "\n";
}

?>
</table>
<hr>
<table>
	<tr><th>1111</th><th>2</th><th>3</th></tr>
<?php
//select customer
foreach ($pdo->query('select * from customer') as $row) {
		echo '<tr>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>', $row['login'], '</td>';
		echo '<td>', $row['password'], '</td>';
		echo '</tr>';
		echo "\n";
}
?>
</table>
<?php require '../footer.php';?>
