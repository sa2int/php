<?php require 'header.php';?>

<?php
include "dbase.php";

//select
foreach ($pdo->query('select * from product') as $row) {
		echo "<p>$row[id]:$row[name]:$row[price]</p>";
}

$pdo = null;
?>
<?php require 'footer.php';?>
