<?php

include "dbase.php";




//짧은변수

$name = $_POST['upload'];
$f_orijinaName = $_POST['f_orijinaName'];
$path = "/uploads/".$_FILES['upload']['name'];



//업로드된 파일의 존재여부 에러가 없다면

if(isset($_FILES['upload']) && !$_FILES['upload']['error'])

{

  //허용할 이미지 종류를 배열로 저장

  $imageKind = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');



  //imageKind 배열내에 $_FILES['upload']['type']에 해당되는 타입(문자열) 있는지 체크

  if(in_array($_FILES['upload']['type'], $imageKind))

  {

    if(move_uploaded_file($_FILES['upload']['upload'], "./uploads/{$_FILES['upload']['name']}"))

    {;

      $query = "update recommended set f_storedName='$f_storedName', f_size='$f_size', f_orijinaName='$f_orijinaName', f_uplodaDate='$f_uplodaDate' where b_board=$b_board";

      $db->query($query);

      echo ("<script>location.replace('./');</script>");

    }

  }

  else

  {

    echo "이미지 타입 에러";

  }

}

else

{

  echo "업로드 실패";

}

?>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<br><a href = 'test.php'>처음으로</a>
