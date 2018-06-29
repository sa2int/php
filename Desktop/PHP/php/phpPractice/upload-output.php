<?php require 'header.php';?>
<?php
  if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    if(!file_exists('upload')){ //업로드라는 파일이 존재하지 않는다면
      mkdir('upload');          //업로드라는 파일을 만든다.
    }
    $file='upload/'.basename($_FILES['file']['name']);//파일의 이름을 얻는다
    if(move_uploaded_file($_FILES['file']['tmp_name'],$file)){
      echo $file, 'のアップデートに成功しました。';
      echo '<p><img src="', $file, '"></p>';
    }else {

      echo "<script> alert('アップロード失敗しました。' );　history.back();  </script>";
  }
}else{
      echo "<script> alert('ファイルを選択してください。' );　history.back();  </script>";
  }
 ?>
<?php require 'footer.php';?>
