<?php require 'header.php';?>
<?php
try{
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
} catch(PDOException $e){
  print$e;
}
?>
<?php
//insert the basic value
$sql=$pdo->prepare('insert into product(name, price)  values(:name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':price', $price, PDO::PARAM_INT);
$name="松の実";
$price=700;
$sql->execute();

$sql=$pdo->prepare('insert into product(name, price)  values(:name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':price', $price, PDO::PARAM_INT);
$name="くるみ";
$price=270;
$sql->execute();

$sql=$pdo->prepare('insert into product(name, price)  values(:name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':price', $price, PDO::PARAM_INT);
$name="ひまわりの種";
$price=210;
$sql->execute();

$sql=$pdo->prepare('insert into product(name, price)  values(:name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':price', $price, PDO::PARAM_INT);
$name="アーモンド";
$price=220;
$sql->execute();

$sql=$pdo->prepare('insert into product(name, price)  values(:name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':price', $price, PDO::PARAM_INT);
$name="カシューナッツ";
$price=250;
$sql->execute();

$sql=$pdo->prepare('insert into product(name, price)  values(:name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':price', $price, PDO::PARAM_INT);
$name="ジャイアントコーン";
$price=180;
$sql->execute();

$sql=$pdo->prepare('insert into product(name, price)  values(:name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':price', $price, PDO::PARAM_INT);
$name="ピスタチオ";
$price=310;
$sql->execute();

$sql=$pdo->prepare('insert into product(name, price)  values(:name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':price', $price, PDO::PARAM_INT);
$name="マカダミアナッツ";
$price=600;
$sql->execute();

$sql=$pdo->prepare('insert into product(name, price)  values(:name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':price', $price, PDO::PARAM_INT);
$name="かぼちゃの種";
$price=180;
$sql->execute();

$sql=$pdo->prepare('insert into product(name, price)  values(:name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':price', $price, PDO::PARAM_INT);
$name="ピーナッツ";
$price=150;
$sql->execute();

$sql=$pdo->prepare('insert into product(name, price)  values(:name, :price)');
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':price', $price, PDO::PARAM_INT);
$name="クコの実";
$price=400;
$sql->execute();


if($sql->execute()) {
	echo 'Success insert!';
} else {
	echo 'Failure insert';
	echo "\nPDO::errorinfo():\n";
	print_r($pdo->errorInfo());
}
?>
<?php require 'footer.php';?>