CREATE DATABASE project;
USE project;

ALTER DATABASE project CHARACTER SET utf8 COLLATE utf8_polish_ci;
ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE utf8_polish_ci; 

CREATE TABLE users(
login char(25) not null,
md5_password char(255) not null,
id_user bigint(11) primary key auto_increment,
access int(1) not null default 0
);


CREATE TABLE books(
ID int primary key auto_increment,
tytul varchar(50) not null,
autor varchar(50) not null,
dostepnosc boolean
);

CREATE TABLE rent (
id_rent int PRIMARY KEY auto_increment,
id_book int NOT NULL,
id_user int NOT NULL,
isRented boolean
);
 
INSERT INTO users (login, md5_password, access) 
VALUES ('Admin', '202cb962ac59075b964b07152d234b70', 2);

Alter Table rent
add FOREIGN KEY (id_book) REFERENCES books(ID);

Alter Table rent
add FOREIGN KEY (id_user) REFERENCES users(id_user);