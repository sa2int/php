<?php

mb_language("Japanese");
mb_internal_encoding("UTF-8");

$to      = 'h-saito@amuse-app.com';
$subject = 'タイトル';
$message = '本文';
$headers = 'From: from@hoge.co.jp' . "\r\n";

mb_send_mail($to, $subject, $message, $headers);

echo 'aaa';

?>