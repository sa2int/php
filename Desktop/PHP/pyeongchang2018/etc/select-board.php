<?php require '../header.php';?>

<hr>
<table style="border:red 1px solid">
	<tr><th>b_boardNum</th><th>id</th><th>b_subject</th></tr>
<?php
foreach ($pdo->query('select b_boardNum, b_subject, password from olympicsBoard o, member m where o.mem_num = m.mem_num ') as $row) {
		$b_boardNum=$row['b_boardNum'];
		echo '<tr>';
		echo '<td>', $row['b_boardNum'], '</td>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>';
		echo '<a href="detail-board.php?b_board=', $b_boardNum, '">', $row['b_subject'], '</a>';
		// echo  $row['b_subject'];
		echo '</td>';
		echo '<td>';
		echo '<a href="delete-member.php?mem_num=', $row['mem_num'], '">削除</a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
}
?>
</table>


<table style="border:red 1px solid">
	<tr><th>b_board</th><th>b_subject</th><th>b_content</th><th>b_count</th><th>b_ip</th><th>b_filename</th><th>b_filename2</th><th>mem_num</th></tr>
<?php
include "../dbase.php";
//select product
foreach ($pdo->query('select * from b_board') as $row) {
		echo '<tr>';
		echo '<td>', $row['b_boardNum'], '</td>';
		echo '<td>', $row['b_subject'], '</td>';
		echo '<td>', $row['b_content'], '</td>';
		echo '<td>', $row['b_count'], '</td>';
		echo '<td>', $row['b_ip'], '</td>';
		echo '<td>', $row['b_filename'], '</td>';
		echo '<td>', $row['b_filename2'], '</td>';
		echo '<td>', $row['mem_num'], '</td>';
		echo '<td>';
		echo '<a href="delete-member.php?mem_num=', $row['mem_num'], '">削除</a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
}
?>

<hr>
<table style="border:red 1px solid">
	<tr><th>b_board</th><th>id</th><th>b_subject</th></tr>
<?php
foreach ($pdo->query('select b_board, id, b_subject, password from b_board p, member m where p.mem_num = m.mem_num ') as $row) {
		$b_board=$row['b_board'];
		echo '<tr>';
		echo '<td>', $row['b_board'], '</td>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>';
		echo '<a href="detail-board.php?b_board=', $b_board, '">', $row['b_subject'], '</a>';
		// echo  $row['b_subject'];
		echo '</td>';
		echo '<td>';
		echo '<a href="delete-member.php?mem_num=', $row['mem_num'], '">削除</a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
}
?>
</table>
<?php require '../footer.php';?>
