<?php require '../PHPStudy/header.php'; ?>
<?php
switch ($_REQUEST['meal']) {
	case 和食:
		echo '和食';
		break;
	case 洋食:
		echo '洋食';
		break;
	case 中華:
		echo '中華';
		break;
}
echo 'をご提供いたします。';
?>
<?php require '../PHPStudy/footer.php'; ?>