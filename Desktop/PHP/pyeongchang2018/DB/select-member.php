<?php require '../header.php';?>
<table>
	<tr><th>number</th><th>Identification</th><th>name</th><th>e-mail</th><th>password</th><th>password2</th><th>phone</th></tr>
<?php
include "../DB/dbase.php";
//select product
foreach ($pdo->query('select * from member;') as $row) {
		echo '<tr>';
		echo '<td>', $row['mem_num'], '</td>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>', $row['name'], '</td>';
		echo '<td>', $row['email'], '</td>';
		echo '<td>', $row['password'], '</td>';
		echo '<td>', $row['password2'], '</td>';
		echo '<td>', $row['phone'], '</td>';
		echo '<td>';
		echo '<a href="delete-member.php?mem_num=', $row['mem_num'], '">削除</a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
}


?>
</table>
<?php require '../footer.php';?>
