<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 
'game-mania', 'hayato0210');
$sql=$pdo->prepare('select * from purchase_detail');
$sql->execute([]);

foreach($sql->fetchAll() as $row) {

echo $row['purchase_id'], ' ', $row['product_id'];
echo "\n";
}

?>
<?php require 'footer.php'; ?>