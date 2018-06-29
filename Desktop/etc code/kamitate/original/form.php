<?php 
//php.iniの編集ができない場合の言語とエンコード指定
mb_language("japanese");
mb_internal_encoding("utf-8");
  
if(!empty($_POST['mail'])){
    $to=$_POST['mail'];
    $subject=$_POST['sub'];
    $naiyou=$_POST['naiyou'];
    $name=$_POST['name'];
 

  
$success=mb_send_mail($to,$sub,"名前：".$name."　本文：".$naiyou,"from:".$from);
}
?>
  
  
<?php 
if($success){
    echo('送信しました');
}else{
    echo('送信失敗！！');
}
?>

