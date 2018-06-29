<?php
require_once("library/phpmailer/class.phpmailer.php");   << 경로설정 주의하세요!!

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {

    $mail->Host = "smtp.gmail.com"; // email 보낼때 사용할 서버를 지정
    $mail->SMTPAuth = true; // SMTP 인증을 사용함
    $mail->Port = 465; // email 보낼때 사용할 포트를 지정
    $mail->SMTPSecure = "ssl"; // SSL을 사용함
    $mail->Username   = "chsdnpd@gmail.com"; // Gmail 계정
    $mail->Password   = "xkdlxks!1"; // 패스워드








    $mail->SetFrom('test@gmail.com', 'TESTER'); // 보내는 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
    $mail->AddAddress('tolstoi_l_n@naver.com', 'jake'); // 받을 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
    $mail->Subject = 'Email Subject'; // 메일 제목
    $mail->MsgHTML(file_get_contents('contents.html')); // 메일 내용 (HTML 형식도 되고 그냥 일반 텍스트도 사용 가능함)

    $mail->Send();

    echo "Message Sent OK";

}catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
}


?>

<?php
$sql=$pdo->prepare('insert into olympicBoards(b_boardNum, b_subject, b_contents, file01, mem_num, t_num) values(null, ?, ?, ?, ?, ?)');
if (empty($_REQUEST['b_subject'])) {
	echo '<script>alert("Please Write Subject");</script>';
} else
if (empty($_REQUEST['b_contents'])) {
	echo '<script>alert("Please Write Contents");</script>';
} else
if (empty($_REQUEST['mem_num'])) {
	echo '<script>alert("Please Login our Website");</script>';
} else
if (empty($_REQUEST['t_num'])) {
	echo '<script>alert("Please Select Board Type");</script>';
} else
if ($sql->execute(
	[htmlspecialchars($_REQUEST['b_subject']), $_REQUEST['b_contents'], $newfile01, $_SESSION['member']['mem_num'], $_REQUEST['t_num']]
)) {
	echo '<script> alert("Success to insert your Article"); </script>';
  echo '<meta http-equiv="refresh" content="0.5; url=/test/paku/pyeongchangOlympic/board/select_olympicsBoard.php">';
} else {
	echo '<script> alert("It`s fail to insert Article, Please check your code");history.go(-1) </script>';
}
?>
