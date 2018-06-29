drop database if exists shop;
create database shop default character set utf8 collate utf8_general_ci;
grant all on shop.* to 'staff'@'localhost' identified by 'password';
use shop;

create table product (
	id int auto_increment primary key, 
	name varchar(200) not null, 
	price int not null
);

insert into product values(null, '���̎�', 700);
insert into product values(null, '�����', 270);
insert into product values(null, '�Ђ܂��̎�', 210);
insert into product values(null, '�A�[�����h', 220);
insert into product values(null, '�J�V���[�i�b�c', 250);
insert into product values(null, '�W���C�A���g�R�[��', 180);
insert into product values(null, '�s�X�^�`�I', 310);
insert into product values(null, '�}�J�_�~�A�i�b�c', 600);
insert into product values(null, '���ڂ���̎�', 180);
insert into product values(null, '�s�[�i�b�c', 150);
insert into product values(null, '�N�R�̎�', 400);
