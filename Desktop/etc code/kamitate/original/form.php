<?php 
//php.ini�̕ҏW���ł��Ȃ��ꍇ�̌���ƃG���R�[�h�w��
mb_language("japanese");
mb_internal_encoding("utf-8");
  
if(!empty($_POST['mail'])){
    $to=$_POST['mail'];
    $subject=$_POST['sub'];
    $naiyou=$_POST['naiyou'];
    $name=$_POST['name'];
 

  
$success=mb_send_mail($to,$sub,"���O�F".$name."�@�{���F".$naiyou,"from:".$from);
}
?>
  
  
<?php 
if($success){
    echo('���M���܂���');
}else{
    echo('���M���s�I�I');
}
?>

