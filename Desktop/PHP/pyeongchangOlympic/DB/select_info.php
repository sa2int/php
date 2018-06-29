<?php require "../header.php" ?>
<?php include "../DB/dbase.php" ?>
<table>
  <tr><th>t_num</th><th>t_name</th></tr>
<?php
foreach($pdo->query('select * from board_type;') as $row) {
  echo '<tr>';
  echo '<td>', $row['t_num'], '</td>';
  echo '<td>', $row['t_name'], '<a href="../board/delete_filed.php?t_num=', $row['t_num'], '">削除</a></td>';
  echo '</tr>';
}
?>
</table>

<?php require "../footer.php" ?>
