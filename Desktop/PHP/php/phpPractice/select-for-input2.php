<?php require 'header.php';?>
<h1>座席の種類を選択してください。</h1>
<form  action="select-for-output.php" method="post">
  <select  name="count">
    <?php
    for($i=0; $i<10; $i++){
      echo '<option value="', $i, '">', $i, '</option>';
    }
     ?>
  </select>
  <p><input type="submit" value="確定"></p>
</form>　
<?php require 'footer.php';?>
