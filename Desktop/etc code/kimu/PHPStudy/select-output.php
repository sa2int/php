<?php require '../PHPStudy/header.php'; ?>
<?php
switch ($_REQUEST['seat']) {
	case 自由席:
		echo '自由席';
		break;
	case 指定席:
		echo '指定席';
		break;
	default:
		echo 'グリーン席';
		break;
}
?>
<?php require '../PHPStudy/footer.php'; ?>