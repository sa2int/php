

<?php require 'header.php'; ?>
<?php
  $password=$_REQUEST['password'];
  if(preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8, }/', $password)){
      echo 'パスワード「', $password, '」を確認しました。';      //{8, }콤마가있으면 8이상 사용해도 괜찮음/ 없으면 8까지만 해야함
  } else {
      echo "<script> alert('は適切ではありません。', '$password' );　history.back();  </script>";

  }
 ?>
<?php require 'footer.php'; ?>
