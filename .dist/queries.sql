
drop database if exists todoapp;
create database todoapp;
use todoapp;

create table tasks(
    id integer primary key,
    task varchar(20) not null,
    finished boolean,
);


insert into tasks values(1, 'clean room', false);
insert into tasks values(2, 'do shoppings', false);
insert into tasks values(3, 'take out trash', false);