<?
if(empty($_SESSION['member'])){
	echo "<script>window.location.replace('main.php');</script>";
}
	session_start();
	date_default_timezone_set('Asia/Tokyo');

	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		if(!file_exists('upload')){
			mkdir('upload');
		}

		$file_name=basename($_FILES['file']['name']);		
			
		$img_name = explode('.' , $file_name);
		$file='upload/'.$img_name[0].'-'.date("YmdHis").'.'.$img_name[1];
			
		
		move_uploaded_file($_FILES['file']['tmp_name'], $file);	
	}

	if($_REQUEST['content']==null){
			echo '<script type="text/javascript">alert("内容を入力してください。");</script>';
			echo "<script>window.location.replace('write_modify.php?board_num?<?=$board_num?>');</script>";
	}else{

		$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
		$sql = $pdo->prepare('update Y_board set content=?, image=? where board_num=?');
	
		$board_num=$_REQUEST['board_num'];
	
		if($file == null){
			$rs=$sql->execute([$_REQUEST['content'], $_REQUEST['file'], $board_num]);
		}else{
			$rs=$sql->execute([$_REQUEST['content'], $file, $board_num]);
		}

		if($rs>0){
			echo '<script type="text/javascript">alert("修正成功");</script>';
			echo "<script>window.location.replace('mypage.php');</script>";
		}else{
			echo '<script type="text/javascript">alert("修正ができません。");</script>';
			echo "<script>window.location.replace('write_modify.php?board_num?<?=$board_num?>');</script>";
		}	
	}

?>