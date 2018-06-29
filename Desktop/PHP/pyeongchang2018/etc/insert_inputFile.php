<?php require '../header.php'; ?>
<div class="board">
<div class="boardMainImg"></div>
<div class="boardForm">
<?php

$id=$name=$mem_num='';
if (isset($_SESSION['member'])) {
	$id=$_SESSION['member']['id'];/*['id']*/
	$name=$_SESSION['member']['name'];/*['name']*/
	$mem_num=$_SESSION['member']['mem_num'];/*['email']*/

echo '<form enctype="multipart/form-data" action="insert_outputFile.php" method="post">';
echo '파일첨부<input type="file" name="upload">';
}

 ?>
<input type="submit" value="追加">
</form>
</div>
</div>
<?php require '../footer.php'; ?>
