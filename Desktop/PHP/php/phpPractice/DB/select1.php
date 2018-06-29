<?php require '../header.php';?>

<?php
include "dbase.php";

//select
foreach ($pdo->query('select * from p_product order by id desc') as $row) {
		echo '<p>';
		echo $row[id], ':';
		echo $row[name], ':';
		echo $row[price];
		echo '</p>';
}
?>
<?php require '../footer.php';?>
