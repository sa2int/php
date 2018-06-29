<? require 'header.php' ?>
<?
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		if(!file_exists('upload')){
			mkdir('upload');
		}
		$file='upload/'.basename($_FILES['file']['name']);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file)){
			echo $file, 'のアップロードに成功しました。';
			echo '<p><img src="', $file, '"></p>';
		}else{
			echo 'アップロードに失敗しました。';
		}
	}else{
		echo 'ファイルを選択してください。';
	}
?>
<? require 'footer.php' ?>