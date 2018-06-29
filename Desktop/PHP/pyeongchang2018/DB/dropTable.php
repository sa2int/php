<?php
include '../dbase.php';

$sql=$pdo->prepare('SET foreign_key_checks = 0; drop table pp1_member; SET foreign_key_checks = 1');

if($sql->execute()) {
  echo 'Successfully drop table olympicsBoard!!';
} else {
  echo 'error';
}
 ?>
