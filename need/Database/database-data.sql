drop table if exists users;
create table users(
	username varchar(50) PRIMARY KEY,
	password varchar(50) NOT NULL,
	fullname varchar(100),
	email varchar(50),
	phone varchar(10));
INSERT INTO users(username,password,fullname,email,phone) VALUES ('klnarayana',md5('waph'),'Lakshmi Narayana','klnarayana1717@gmail.com','5135377858');