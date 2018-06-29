<?
	session_start();
	date_default_timezone_set('Asia/Tokyo');
	
	$headers.= "MIME-Version: 1.0";
	$headers.= "Content-Type: text/html; charset=utf-8";
	$headers.= "X-Mailer: PHP";
	
	if($_REQUEST['reportMenu']==0){
		$reportMenu='不適切な広告';
	}else if($_REQUEST['reportMenu']==1){
		$reportMenu='全年齢に合わない内容';
	}else{
		$reportMenu='その他';
	}
	$board_num=$_REQUEST['board_num'];
	$title=date("Y-m-d H:i:s"). $_SESSION['member']['id'].'-report';
	$content='
	書き込み番号 : ' . $board_num. '<br>書き込み内容 : '. $_REQUEST['content'].'<br>申告内容 : '. $reportMenu. '<br>'. $_REQUEST['reportContent'];
	$mail = 's_rin1122@naver.com';
	
	$optionValue = 'From: '. $_SESSION['member']['id']. ' <'. $_SESSION['member']['e_mail'].'>';

	mail($mail, $title, $content, $optionValue);

?>

<script>
alert("管理者にメールを送りました。");
self.close(); 
window.close();
</script>