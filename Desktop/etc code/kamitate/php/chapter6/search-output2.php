<?php require '../header.php'; ?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<?php 

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 
'game-mania', 'hayato0210');

$sql=$pdo->prepare('select * from product where name like ?');
$sql->execute(['%'.$_REQUEST['keyword'].'%']);

foreach ($sql->fetchAll() as $row) {
 
 echo '<tr>';
 echo '<td>', $row['id'], '</td>';
 echo '<td>', $row['name'], '</td>';
 echo '<td>', $row['price'], '</td>';
 echo '</tr>';
}

?>
</table>
<?php require '../footer.php'; ?>