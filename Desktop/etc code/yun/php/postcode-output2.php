<? require 'header.php'; ?>
<?
	$postcode = $_REQUEST['postcode'];
	if(preg_match('/^[0-9]{3}-[0-9]{4}$/', $postcode)){
		echo '郵便番号 : ', $postcode;
	}else{
		echo '適切な郵便番号ではありません。', $postcode;
	}
?>
<? require 'footer.php'; ?>