<?php require '../header.php'; ?>
<?php session_start(); ?>
<?php
$id=$name=$mem_num='';
if (isset($_SESSION['member'])) {
	$id=$_SESSION['member']['id'];/*['id']*/
	$name=$_SESSION['member']['name'];/*['name']*/
  $mem_num=$_SESSION['member']['mem_num'];/*['name']*/
 ?>
<div class="board">
<div class="boardMainImg"></div>
<div class="boardForm">

<section class="sectorD">
<div class="sector">
<h1>Bulletin Board</h1>
<p>Passion. Connected.</p>
    <div class="contact-wrap">
<form enctype="multipart/form-data" action="insertBoard_output.php" method="post">
	<table>
		<thead>
		<tr>
<?php
echo '<td><input type="hidden" name="mem_num" value="', $mem_num,'" readonly/></td>';
echo '<td><input type="text" name="name" value="', $name,'" readonly/></td>';
echo '<td><input type="text" name="id" value="', $id, '" readonly/></td>';
?>
		</tr>
	</thead>
	<tbody>
		<tr>
<td colspan="3" class="td"><input type="text" name="b_subject" value="Subject"
onblur="if (this.value == '') {this.value = 'Subject';}"
onfocus="if (this.value == 'Subject') {this.value = '';}"/>
</tr>
<tr>
<td colspan="3" class="td"><textarea name="b_contents" rows="5"  value="Message"
onblur="if (this.value == '') {this.value = 'Message';}"
onfocus="if (this.value == 'Message') {this.value = '';}" />Message</textarea></td>
</tr>
	<tr>
		<td colspan="1" class="td"><input type="file" name="file01"></td>
		<td colspan="2" class="td">
			<select class="" name="t_num">
				<option value="null" selected>Select Type</option>
				<option value="1">Alpine Skiing</option>
				<option value="2">Biathlo</option>
				<option value="3">Cross-Country Skiing</option>
				<option value="4">Ice Hockey</option>
				<option value="5">Snowboard</option>
				<option value="6">Wheelchair Curling</option>
			</select>
		</td>
	</tr>
		<tr>
			<td colspan="3" class="td"><input type="submit" naem="send" value="send"></td>
		</tr>
	</tbody>
	</table>
</form>
<?php } else {

  echo '<script>alert("Please Login our Website"); </script>';
  echo '<meta http-equiv="refresh" content="1; url=/test/paku/pyeongchangOlympic/memberLog/login_input.php" />';
}
?>
</div>
</div>
</section>


</div>
</div>

<?php require '../footer.php'; ?>
