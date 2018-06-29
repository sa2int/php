<?php require '../PHPStudy/header.php'; ?>
<?php
	echo '<p>質問は「', $_REQUEST['question'], '」</p>';
	echo '<p>回答は「', $_REQUEST['answer'],'」です。</p>';
?>
<?php require '../PHPStudy/footer.php'; ?>