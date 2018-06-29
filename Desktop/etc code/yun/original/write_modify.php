<?php require 'header.php';?>
<?
if(empty($_SESSION['member'])){
	echo "<script>window.location.replace('main.php');</script>";
}
?>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script type="text/javascript">
        $(function() {
            $("#file").on('change', function(){
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                    $('#img').attr('src', e.target.result);
                }

              reader.readAsDataURL(input.files[0]);
            }
        }

	var limitByte = 500;
	function checkByte(frm) {
	        var totalByte = 0;
	        var message = frm.content.value;
	
	        for(var i =0; i < message.length; i++) {
	                var currentByte = message.charCodeAt(i);
	                if(currentByte > 128) totalByte += 2;
			else {	totalByte++;	}
        }

        $('#messagebyte').text(totalByte);

        if(totalByte > limitByte) {
                alert("最大500byteまで書けます。");
         frm.content.value = message.substring(0,limitByte);
        }
}


</script>
<?
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');	
	$sql = $pdo->prepare('select content, image from Y_board where board_num=?');
	$sql->execute([$_REQUEST['board_num']]);

	foreach($sql->fetchAll() as $row){
		$board_num = $_REQUEST['board_num'];
		$content= $row['content'];
		$image= $row['image'];
	}
?>

<body>
	<div class="write-input">
		<form action="write_modify_output.php" method="post" enctype="multipart/form-data">
		<div class="write-form">
			<div class="image"><img id="img" style="max-width: 80%;" src="<?= $image ?>"></div>
			<textarea  name="content" style="resize: vertical" onKeyUp="checkByte(this.form);" rows="20" cols="80%"><?=$content?></textarea>
			<p class="data_count"><em id="messagebyte">0</em>/500 byte</p>
		</div>
		<div class="write-btn">
			<input id="file" name="file" type="file" accept="image/*">
			<input type="hidden" name="file" value="<?=$image?>">
			<input type="hidden" name="board_num" value="<?=$board_num?>">
			<input type="submit" value="書き込む" style="background-color: black; color: white; height: 40px;">
		</div>
		</form>
	</div>
</body>
<?php require 'footer.php';?>