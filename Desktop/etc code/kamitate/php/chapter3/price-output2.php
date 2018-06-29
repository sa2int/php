<?php require '../header.php'; ?>

<?php
 $prise=$_REQUEST['price'];
 $count=$_REQUEST['count'];
 echo $prise, '円×';
 echo $count, '個=';
 echo $prise*$count, '円';
 
?>

<?php require '../footer.php'; ?>