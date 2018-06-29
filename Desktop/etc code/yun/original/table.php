<?
$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
$pdo->setAttribute( PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION );

/*
$sql = 'CREATE TABLE Y_member (
	id VARCHAR(20) PRIMARY KEY,
	password VARCHAR(20) not null,
	name VARCHAR(20),
	e_mail VARCHAR(50),
	level INT(2) default 0
)';


$sql = 'CREATE TABLE Y_board (
	board_num INT(11) AUTO_INCREMENT PRIMARY KEY,
	content VARCHAR(500) not null,
	image VARCHAR(100),
	datetime DATETIME,
	visiable INT(1) default 0,
	member_id VARCHAR(20),
	board_recommend INT(11),
	FOREIGN KEY Y_board(member_id) REFERENCES Y_member(id) on delete cascade
 
) ENGINE=InnoDB';


$sql='CREATE TABLE Y_comment(
	comment_num INT(11) AUTO_INCREMENT PRIMARY KEY,
	comment_content VARCHAR(200) not null,
	board_num INT(11),
	member_id VARCHAR(20),
	datetime DATETIME,
	FOREIGN KEY Y_comment(board_num) REFERENCES Y_board(board_num) on delete cascade

)ENGINE=InnoDB'; 


$sql='CREATE TABLE Y_boardRecommend(
	recommend_num INT(11) AUTO_INCREMENT PRIMARY KEY,
	board_num INT(11),
	recommend_id VARCHAR(20),
	FOREIGN KEY Y_boardRecommend(board_num) REFERENCES Y_board(board_num) on delete cascade,
	FOREIGN KEY Y_boardRecommend(recommend_id) REFERENCES Y_member(id) on delete cascade

)ENGINE=InnoDB';  
*/
//$sql = 'SET foreign_key_checks = 0; drop table Y_comment; SET foreign_key_checks = 1';
$sql='alter table Y_boardRecommend drop board_recommend';
//$sql='alter table Y_board add foreign key (board_recommend) references Y_boardRecommend(recommend_count) on delete cascade on update cascade';
//$sql='ALTER TABLE Y_board ADD board_recommend FOREIGN KEY (board_recommend) REFERENCES Y_boardRecommend(board_recommend)';
//$sql='ALTER TABLE Y_boardRecommend ADD board_recommend INT(11)';
//$sql = "insert into Y_member (id, password, name, e_mail, level) values('aaa', '1234', 'aaa', 'aaa@naver.com', 0)";
//$sql='drop table Y_comment';

$res = $pdo->query($sql);

if($res<1){
	echo '失敗';
}else{
	echo '成功2';
}

?>