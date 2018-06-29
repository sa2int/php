<?php
include '../DB/dbase.php';

$sql=$pdo->prepare('SET foreign_key_checks = 0; drop table p_product78; SET foreign_key_checks = 1');

if($sql->execute()) {
  echo 'Successfully drop table bbb_board!!';
} else {
  echo 'error';
}
 ?>
