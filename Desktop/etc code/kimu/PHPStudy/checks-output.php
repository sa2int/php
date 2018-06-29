<?php require '../PHPStudy/header.php'; ?>

<?php
foreach ($_REQUEST['genre'] as $item) {
	echo '<p>', $item, '</p>';
}
echo 'に関するお買い得情報をお送りさせてい頂きます。';
?>

<?php require '../PHPStudy/footer.php'; ?>