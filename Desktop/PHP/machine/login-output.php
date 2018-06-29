<?php include "header3.php" ?>
<?php include "dbase.php" ?>


<?php
echo  '<form name="form" action="login-output.php" method="post">';
echo  '<table>';
echo  '<td>Name</td>';
echo  '<td><input type="hidden" name="$_RQUEST['name']" /></td>';
echo  '</tr>';
echo  '<tr>';
echo  '<td>Identification</td>';
echo  '<td><input type="hidden" name="$_RQUEST['id']" /></td>';
echo  '</tr>';
echo  '<tr>';
echo  '<td>Password</td>';
echo  '<td><input type="hidden" name="$_RQUEST['pw']" /></td>';
echo  '</tr>';
echo  '<tr>';
echo  '<td>Write Password again</td>';
echo  '<td><input type="hidden" name="$_RQUEST['pw2']" /></td>';
echo  '</tr>';
echo  '<tr>';
echo  '<td>E-mail</td>';
echo  '<td><input type="hidden" name="$_RQUEST['email']" /></td>';
echo  '</tr>';
echo  '<tr>';
echo  '<td><input type="submit" name="submit" value="Confirm" />';
echo  '<input type="reset" name="reset" value="Cancel" /></td>';
echo  '</tr>';
echo  '</table>';
echo  '</form>';

 ?>


<?php include "footer3.php" ?>
