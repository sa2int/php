<?php require 'header.php';?>

<?php
echo $_REQUEST['price'], '円X';
?>
</br>
<?php
echo $_REQUEST['count'], '個＝';
?>
</br>
<?php
echo $_REQUEST['price']*$_REQUEST['count'], '円';
?>

<?php require 'footer.php';?>
