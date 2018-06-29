<?php require 'header.php';?>

<?php
foreach ($_REQUEST['genre'] as $item) {
  echo '<p>', $item, '</p>';
}
echo 'に関するお買い得情報を送りさせていただきます';
?>
<?php require 'footer.php';?>
