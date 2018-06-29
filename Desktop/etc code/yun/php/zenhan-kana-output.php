<?php require 'header.php' ?>
<?
echo 'フリガナ「', mb_convert_kana($_REQUEST['furigana']), '」です。';
?>
<?php require 'footer.php' ?>