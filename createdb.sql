drop database if exists registration;
create database registration;
use registration;

create table users (
	id int not null auto_increment,
	username varchar(100) not null,
	password varchar(100) not null,
	email varchar(100) not null,
	admin char(5) not null,
	PRIMARY KEY ( id ));

create table comments ( 
	id int not null auto_increment, 
	comment varchar(200) not null,
	fromuser varchar(100) not null,
	PRIMARY KEY ( id ));
