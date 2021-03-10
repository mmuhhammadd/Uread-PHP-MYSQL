create database uread;
use uread;
select database();
create table users(
id int primary key auto_increment,
username varchar(20) unique not null,
password varchar(20) not null,
securityques varchar(50) not null,
securityans varchar(20) not null);
insert into users (username, password, securityques, securityans) values ('muhammad', '11111111', 'Your best friend name?', 'husien');
insert into users (username, password, securityques, securityans) values ('eslamkhaled', '88888888', 'Your best friend name?', 'muhammad');
select * from users;
use uread;
select database();
create table books (
id int primary key auto_increment,
title varchar(200) not null,
author varchar(200) not null,
year date not null,
image varchar(500) not null,
user varchar(200) not null,
foreign key (user) references users(username));
insert into books (title, author, year, image, user) values ('From Blood and Ash', 'Jennifer L. Armentrout', '2020-06-03', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1588843906l/52861201._SY475_.jpg', 'muhammad');
insert into books (title, author, year, image, user) values ('To Sleep in a Sea of Stars', 'Christopher Paolini', '2020-06-03', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1583523112l/48829708.jpg', 'muhammad');
insert into books (title, author, year, image, user) values ('Such a Fun Age', 'Kiley Reid', '2020-06-03', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1557181911l/43923951._SY475_.jpg', 'muhammad');
insert into books (title, author, year, image, user) values ('Mexican Gothic', 'Silvia Moreno-Garcia', '2020-06-03', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1607462569l/53152636._SY475_.jpg', 'eslamkhaled');
insert into books (title, author, year, image, user) values ('A Promised Land', 'Barack Obama', '2020-06-03', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1604286292l/55359022._SY475_.jpg', 'eslamkhaled');
insert into books (title, author, year, image, user) values ('Notes to My Son', 'Eric Lynn', '2020-06-03', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1571664730l/48538233._SY475_.jpg', 'eslamkhaled');
