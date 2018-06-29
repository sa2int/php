

<?php require 'header.php'; ?>
<?php
  $postcode=$_REQUEST['postcode'];
  if(preg_match('/^[0-9]{3}-[0-9]{4}$/', $postcode)){
      echo '郵便番号', $postcode, 'を確認しました。';
  } else {
      echo "<script> alert('今書いてくれた番号は', $postcode, /'は適切な郵便番号ではありません。'/); history.back(); </script>";
  }  //php에서 경고창 띄우기, 이전페이지로 돌아가기


 ?>
<?php require 'footer.php'; ?>
