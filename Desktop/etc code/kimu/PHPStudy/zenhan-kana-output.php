<?php require '../PHPStudy/header.php'; ?>

<?php
echo 'フリガナは「', mb_convert_kana($_REQUEST['furigana']), '」です。';
?>

<?php require '../PHPStudy/footer.php'; ?>