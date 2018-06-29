<?php require 'header.php';?>

<?php
date_default_timezone_set('Japan');
echo '<p>', date('Y/m/d H:i:s'), '</p>';
echo '<p>', date('Y年/m月/d日 H時:i分:s秒'), '</p>';

date_default_timezone_set('S\Russia');
echo '<p>', date('Y/m/d H:i:s'), '</p>';
 ?>

<?php require 'footer.php';?>
