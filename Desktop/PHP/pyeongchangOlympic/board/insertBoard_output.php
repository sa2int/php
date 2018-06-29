<?php require '../header.php'; ?>
<?php session_start(); ?>
<style>
header {
  display: none;
}
footer {
  display: none;
}
</style>

<?php
include "../DB/dbase.php";

if($_FILES['file01']['name']){
    $size= $_FILES['file01']['size'];
    if($size > 2097152) Error('파일용량:2MB 제한합니다.');

    $file01_name=strtolower($_FILES['file01']['name']); //파일명과 확장자를 소문자로 변경
    $file01_split= explode(".",$file01_name);   // 파일명과 확장자를 분리

    $extexplode= $file01_split[count($file01_split)-2.3]; //파일명만 가져오기
    $file01_type= $file01_split[count($file01_split)-1]; // 확장자만 가져오기

    $img_ext= array('jpg','jpeg','gif','png'); //이미지 확장자 종류를 배열에 넣는다.
    if(array_search($file01_type, $img_ext) === false)Error('이미지 파일이 아닙니다.');

    $dates= date_default_timezone_set( time());  //날짜 (월,일,시간,분,초) $dates= date("mdhis", time());
    $newfile01= chr(rand(97,122)).chr(rand(97,122)).$dates.rand(1,9).rand(1,9).".".$file01_type; //파일명 생성;

    $dir="../upload/";  //업로드할 디렉터리 지정
    move_uploaded_file($_FILES['file01']['tmp_name'],$dir.$newfile01); //파일업로드;
    chmod($dir.$newfile01,0777);
}

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
<?php require '../footer.php'; ?>
