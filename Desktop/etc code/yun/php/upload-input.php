<? require 'header.php' ?>
<p> アップロードするファイルを指定してください。 </p>
<form action="upload-output.php" method="post" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit" value="アップロード">
</form>
<? require 'footer.php' ?>