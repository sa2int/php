<?php require 'header.php';?>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script>
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
<body>
	<div class="write-input">
		<div style="text-align: center; margin-top: 30px; font-size: 1.2em;"><u>あなたの考えや感情を話してください。</u></div>
		<form action="write_output.php" method="post" enctype="multipart/form-data">
		<div class="write-form">
			<div class="image"><img id="img" style="max-width: 80%;"></div>
			<textarea  name="content" style="resize: vertical" onKeyUp="checkByte(this.form);" rows="20" cols="80%"></textarea>
			<p class="data_count"><em id="messagebyte">0</em>/500 byte</p>
		</div>
		<div class="write-btn">
			<input id="file" name="file" type="file" accept="image/*">
			<input type="submit" value="書き込む" style="background-color: black; color: white; height: 40px;">
		</div>
		</form>
	</div>
</body>
<?php require 'footer.php';?>