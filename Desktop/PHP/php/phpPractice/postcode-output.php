

<?php require 'header.php'; ?>
<?php
  $postcode=$_REQUEST['postcode'];
  if(preg_match('/^[0-9]{7}$/', $postcode)){
      echo '郵便番号', $postcode, 'を確認しました。';
  } else {
      echo "<script> alert('今書いてくれた番号は', $postcode, /'は適切な郵便番号ではありません。'/);  </script>";
  }
 ?>
<?php require 'footer.php'; ?>
