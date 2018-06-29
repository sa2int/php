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
		echo '<a href="../memberLog/delete-member.php?mem_num=', $row['mem_num'], '">削除</a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
}


?>
</table>
<table style="border:red 1px solid">
	<tr><th>b_boardNum</th><th>name</th><th>b_subject</th><th>b_content</th><th>b_delete</th><th>file01</th><th>b_date</th><th>mem_num</th><th>t_num</th></tr>
<?php
include "../DB/dbase.php";
//select product
foreach ($pdo->query('select b_boardNum, name, b_subject, b_delete, file01, b_date, o.mem_num, t_num  from olympicBoards o, member m where m.mem_num = o.mem_num order by b_boardNum DESC') as $row) {
		echo '<tr>';
		echo '<td>', $row['b_boardNum'], '</td>';
		echo '<td>', $row['name'], '</td>';
		echo '<td>', $row['b_subject'], '</td>';
		echo '<td>', $row['b_delete'], '</td>';
		echo '<td>', $row['file01'], '></td>';
		echo '<td>', $row['b_date'], '</td>';
		echo '<td>', $row['mem_num'], '</td>';
		echo '<td>', $row['t_num'], '</td>';
		echo '<td>';
		echo '<a href="delete_filed.php?b_boardNum=', $row['b_boardNum'], '">削除</a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
}
?>

<hr>
<table style="border:red 1px solid">
	<tr><th>b_boardNum</th><th>id</th><th>name</th><th>b_subject</th><th>t_num</th><th>t_name</th><th>delete</th></tr>
<?php

foreach ($pdo->query('select o.b_boardNum, id, name, b_subject, b.t_num, t_name from olympicBoards o, board_type b, member m where m.mem_num = o.mem_num and o.t_num = b.t_num') as $row) {
		$b_boardNum=$row['b_boardNum'];
		echo '<tr>';
		echo '<td>', $row['b_boardNum'], '</td>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>', $row['name'], '</td>';
		echo '<td>';
		echo '<a href="../board/detail-board.php?b_boardNum=', $b_boardNum, '">', $row['b_subject'], '</a>';
		echo '</td>';
		echo '<td>', $row['t_num'], '</td>';
		echo '<td>', $row['t_name'], '</td>';
		echo '<td>';
		echo '<a href="../board/delete-olmpicsBoard.php?b_boardNum=', $row['b_boardNum'], '">削除</a>';
		echo '</td>';
		echo '</tr>';

		echo "\n";
}
?>
</table>



<hr>
<table style="border:red 1px solid">
	<tr><th>id</th><th>name</th><th>b_boardNum</th><th>b_subject</th><th>t_num</th><th>t_name</th><th>delete</th></tr>
<?php
foreach ($pdo->query('select id, name, o.b_boardNum, b_subject, t.t_num, t_name from olympicBoards o, member m, board_type t where m.mem_num = o.mem_num and o.t_num = t.t_num and o.t_num = 1 ') as $row) {
		$t_num=$row['t_num'];
echo '<tr>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>', $row['name'], '</td>';

		echo '<td>', $row['b_boardNum'], '</td>';
		echo '<td>';
		echo '<a href="detail_board.php?b_boardNum=', $b_boardNum, '">', $row['b_subject'], '</a>';
		echo '</td>';
		echo '<td>', $row['t_num'], '</td>';
		echo '<td>', $row['t_name'], '</td>';
		echo '<td>';
		echo '<a href="../board/delete-olmpicsBoard.php?b_boardNum=', $row['b_boardNum'], '">削除</a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
}
?>
</table>


<hr>
<table style="border:red 1px solid">
	<tr><th>b_boardNum</th><th>id</th><th>name</th><th>b_subject</th><th>t_num</th><th>t_name</th><th>delete</th></tr>
<?php
foreach ($pdo->query('select o.b_boardNum, b_subject, t.t_num, t_name from olympicBoards o, board_type t where o.t_num = t.t_num and t.t_num = 6 ') as $row) {
		$t_num=$row['t_num'];
		echo '<tr>';
		echo '<td>', $row['b_boardNum'], '</td>';
		echo '<td>';
		echo '<a href="../board/detail-board.php?b_boardNum=', $b_boardNum, '">', $row['b_subject'], '</a>';
		echo '</td>';
		echo '<td>', $row['t_num'], '</td>';
		echo '<td>', $row['t_name'], '</td>';
		echo '<td>';
		echo '<a href="../board/delete-olmpicsBoard.php?b_boardNum=', $row['b_boardNum'], '">削除</a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
}
?>
</table>





<?php require '../footer.php';?>
