<?php

$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
$sql = $pdo->prepare('Select * from requestboard where id=?');
$sql->execute([$_GET['id']]);
foreach($sql->fetchAll() as $row) {}

require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer; //Create new PHPMailer instance
$mail->SMTPSecure = 'ssl';//SSL for cunnecting Naver 
$mail->isSMTP(); //Set mail connect(SMTP)
#mail->isHTML(true);//HTML Link True

$mail->CharSet="UTF-8";//文字列UTF-8 SET
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true; // SMTP使用

$mail->Host = 'smtp.naver.com'; //Naver's SMTP Set
$mail->Port = 465;//For SSL(POP3)

$mail->Username = "john0714@naver.com"; //Username to use for SMTP
$mail->Password = "a112536a!@"; //Password to use for SMTP authentication(認証)

$mail->setFrom('john0714@naver.com', '担当者');//Set who send from message
$mail->addReplyTo('john0714@naver.com', '担当者');//Set an alternative reply-to address
$mail->addAddress($row['mail'], 'お客様');//Set who send to message

$mail->Subject= 'お客様の申請がキャンセルされました。';//Title
//$mail->AltBody='This is a plain-text Message Body Test'; ?? what is AltBody?

$mail->Body='以下、お客様の申請内容です。'."\n\n".
			'名題 : '.$row['title']."\n".
			'名前 : '.$row['name']."\n".
			'性別 : '.$row['sex']."\n".
			'性別 : '.$row['location']."\n".
			'予約日程 : '.$row['requestdate'].' / '.$row['requesttime']."\n".
			'詳細 : '.$row['contents']."\n\n".
			'キャンセル理由 : '.$_REQUEST['reason']."\n\n".
			'以上になります、申し訳ございません。';//内容

if(!$mail->send()) {
	//if can't SMTP connect, Check Password, SMTPAuth true, SMTPSecure
	echo "メールエラー発生 : ".$mail->ErrorInfo;
} else {
	echo "<script>alert('キャンセル完了')</script>";
	$del = $pdo->prepare('delete from requestboard where id=?');
	$del->execute([$_GET['id']]);
}

	echo("<script>location.href='request.php';</script>");
?>