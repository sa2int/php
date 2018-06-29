<? require 'header.php'; ?>
<?
	switch($_REQUEST['seat']){
		case '指定席': echo '追加料金 1200円です。';		break;
		case 'グリーン席': echo '追加料金2500円です。';	break;
		default: echo '追加料金はありません。';	break;		
	}
?>
<?require 'footer.php'; ?>