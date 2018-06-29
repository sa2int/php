<?
	session_start();
	date_default_timezone_set('Asia/Tokyo');

	$content=htmlspecialchars($_REQUEST['content']);

	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		if(!file_exists('upload')){
			mkdir('upload');
		}

		$file_name=basename($_FILES['file']['name']);		

		if(!file_exists($_FILES['file']['name'])){			
			$img_name = explode('.' , $file_name);
			$file='upload/'.$img_name[0].'-'.date("YmdHis").'.'.$img_name[1];
			
		}else{
			$file='upload/'.basename($_FILES['file']['name']);
		}
		move_uploaded_file($_FILES['file']['tmp_name'], $file);	
	}

	if($content==null){
			echo '<script type="text/javascript">alert("内容を入力してください。");</script>';
			echo "<script>window.location.replace('write.php');</script>";
	}else{
		$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
		$sql = $pdo->prepare('insert into Y_board (content, image, member_id, datetime) values(?, ?, ?, now())');
	
		$rs=$sql->execute([$content, $file, $_SESSION['member']['id']]);

		if($rs>0){
			echo '<script type="text/javascript">alert("書き込みました。");</script>';
			echo "<script>window.location.replace('mypage.php');</script>";

		
		}else{
			echo '<script type="text/javascript">alert("書き込みできません。");</script>';
			echo "<script>window.location.replace('write.php');</script>";
		}
	}

?>