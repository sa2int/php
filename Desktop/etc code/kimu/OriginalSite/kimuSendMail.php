<?php

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
$sql=$pdo->prepare('Insert into requestboard values(null, ?, ?, ?, ?, ?, ?, ?, ?, 0, Now())');

if($sql->execute([$_REQUEST['title'], $_REQUEST['sex'], $_REQUEST['name'], $_REQUEST['mail'], $_REQUEST['location'], $_REQUEST['date'], $_REQUEST['time'], $_REQUEST['contents']])) {
	} 
	else {
		echo '入力失敗';
		echo "\nPDO::errorinfo():\n";
		print_r($pdo->errorInfo());
	}


require 'PHPMailer/PHPMailerAutoload.php';
//this is old PHPMailer Version code.
//if you want newest, you will see documnet first, include PHPMailer and SMTP.php
$mail = new PHPMailer; //Create new PHPMailer instance
$mail->SMTPSecure = 'ssl';//SSL for cunnecting Naver 
$mail->isSMTP(); //Set mail connect(SMTP)
#mail->isHTML(true);//HTML Link True

$mail->CharSet="UTF-8";//文字列UTF-8 SET
//Enalbe SMTP debugging
// 0 = off(for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true; // SMTP使用

$mail->Host = 'smtp.naver.com'; //Naver's SMTP Set
$mail->Port = 465;//For SSL(POP3)

$mail->Username = "john0714@naver.com"; //Username to use for SMTP
$mail->Password = "a112536a!@"; //Password to use for SMTP authentication(認証)

$mail->setFrom($_REQUEST['mail'], 'お客様');//Set who send from message
$mail->addReplyTo($_REQUEST['mail'], 'お客様');//Set an alternative reply-to address
$mail->addAddress('john0714@naver.com', '担当者');//Set who send to message

$mail->Subject= $_REQUEST['location'].'に新しい予約が来ました！';//Title
//$mail->AltBody='This is a plain-text Message Body Test'; ?? what is AltBody?

$mail->Body='以下、お客様の予約情報です。'."\n\n".
			'名題 : '.$_REQUEST['title']."\n".
			'名前 : '.$_REQUEST['name']."\n".
			'性別 : '.$_REQUEST['sex']."\n".
			'性別 : '.$_REQUEST['location']."\n".
			'予約日程 : '.$_REQUEST['date'].' / '.$_REQUEST['time']."\n".
			'詳細 : '.$_REQUEST['contents']."\n\n".
			'以上になりますので、確認をお願いします。'."\n\n".
			"http://game-mania.sakura.ne.jp/test/kimu/OriginalSite/request.php";//内容

if(!$mail->send()) {
	//if can't SMTP connect, Check Password, SMTPAuth true, SMTPSecure
	echo "メールエラー発生 : ".$mail->ErrorInfo;
} else {
	echo "<script>alert('メールを成功的に送りました。')</script>";
}

	echo("<script>location.href='index.php';</script>");
?>