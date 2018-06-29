<?php require 'header.php';?>

<?php
$con=mysqli_connect('mysql:host=mysql543.db.sakura.ne.jp; dbname=game-mania_test; charset=utf8', 'game-mania', 'hayato0210');
if(mysqli_connect_errno($con)){
  echo "データが繋がってないです。". mysqli_connect_error();
}else {
  echo '<script>alert("連結されています。")</script>';
}

?>

<?php require 'footer.php';?>
