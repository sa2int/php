<?php require '../PHPStudy/header.php'; ?>

<?php
$price = $_REQUEST['price'];
$count = $_REQUEST['count'];//変数に値を入力

echo $price, '円 X', 
$count, ' 個 = ', 
$price*$count, '円';
?>

<?php require '../PHPStudy/footer.php'; ?>