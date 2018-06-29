<?php require 'header.php';?>
<?php
$file='board.txt';
if(file_exists($file)){ //파일이 존재하는지에 찾기
  $board=json_decode(file_get_contents($file)); //파일이 있으면 진실 / file_get_contents은 $file 파일에 있는 글 모두 가져오기
}       //파일은 제이슨형식으로 보존되있다 php의 문자열이나 배열로 변환 해줘야 한다  변환한 파일은 변수 $board에 넣어든디
$board[]=$_REQUEST['message'];  //작성한 메세지가 배열에 들어간다.
file_put_contents($file, json_encode($board));
foreach ($board as $meesage){
  echo '<p>', $meesage, '</p><hr>';
}
?>
<?php require 'footer.php';?>
