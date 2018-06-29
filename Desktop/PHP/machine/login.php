
<?php include "header3.php" ?>
<?php
$name=$id=$pw=$pw2=$phone=$email='';
if(isset($_SESSION['customer'])) {
  $name=$S_SESSION['customer']['name'];
  $id=$S_SESSION['customer']['id'];
  $pw=$S_SESSION['customer']['pw'];
  $pw2=$S_SESSION['customer']['pw2'];
  $phone=$S_SESSION['customer']['phone'];
  $email=$S_SESSION['customer']['email'];
}

echo '<form action="login-confirm.php" method="post">';
echo  '<table>';  
echo  '<td>Name</td>';
echo  '<td><input type="text" name="name" value="name"/></td>';
echo  '</tr>';
echo  '<tr>';
echo  '<td>Identification</td>';
echo  '<td><input type="text" name="id" value="id"/></td>';
echo  '</tr>';
// echo  '<tr>';
// echo  '<td>Password</td>';
// echo  '<td><input type="password" name="pw" value="', $pw'"/></td>';
// echo  '</tr>';
// echo  '<tr>';
// echo  '<td>Write Password again</td>';
// echo  '<td><input type="text" name="pw2" value="', $pw2'"/></td>';
// echo  '</tr>';
// echo  '<tr>';
// echo  '<td>E-mail</td>';
// echo  '<td><input type="text" name="email" value="', $email'"/></td>';
// echo  '</tr>';
// echo  '<tr>';
// echo  '<td><input type="submit" name="submit" value="Confirm" />';
// echo  '<input type="reset" name="reset" value="Cancel" /></td>';
// echo  '</tr>';
echo  '</table>';
echo  '</form>';

 ?>
<?php include "footer3.php" ?>
