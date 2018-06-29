<style>
*{border: red 1px solid;}


  .photo{width: 500px;}

</style>

<?php require 'header.php';?>

<?php
echo '<img src="item', rand(0, 2), '.png">';
?>
<div class="bigPicture">
<p class="photo">
  <?php
echo '<img src="0', rand(1, 3), '.jpg">';
 ?>
</p>
</div>
<?php require 'footer.php';?>
