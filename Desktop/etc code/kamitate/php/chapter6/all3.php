<?php require '../header.php'; ?>

<?php 

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 
'game-mania', 'hayato0210');

foreach ($pdo->query('select * from product') as $row) {
 
 echo "<p>$row[id]:$row[name]:$row[price]</p>";
 
}
?>
<?php require '../footer.php'; ?>