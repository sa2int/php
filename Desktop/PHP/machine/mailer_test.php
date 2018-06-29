<?php
include_once('mailer.lib.php');

// mailer("보내는 사람 이름", "보내는 사람 메일주소", "받는 사람 메일주소", "제목", "내용", "1");
mailer("PHPMailer", "tolstoi_l_n@naver.com", "tolstoi_l_n@naver.com", "안녕 나는 php 메일이야", "안녕 나는 php 메일이야", 1);
?>
