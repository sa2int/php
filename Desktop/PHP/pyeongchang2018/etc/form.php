<form enctype="multipart/form-data" name="form" method="post" action="write.php">
		<table>
		<tr>
			<td>아이디:</td>
			<td><input type="text" name="id" /></td>
		</tr>
		<tr>
			<td>내용:</td>
			<td><textarea name="content"></textarea></td>
		</tr>
		<tr>
			<td>이미지:</td>
			<td><input type="file" name="imageform" /></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="전송" />
			</td>
		</tr>
		</table>
	</form>
