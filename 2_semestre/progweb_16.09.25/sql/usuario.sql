create database progweb1709;
use progweb1709;
create table usuarios (
    id int primary key auto_increment,
    nome varchar(255) not null,
    email varchar(255) not null,
    data_nasc date not null,
    senha varchar(255) not null
);
-- Versão nova
create database progweb1709;
use progweb1709;
create table usuarios (
    id int primary key auto_increment,
    nome varchar(255) not null,
    email varchar(255) not null,
    data_nascimento date not null,
    senha varchar(255) not null
);
ALTER TABLE usuarios CHANGE data_nasc data_nascimento DATE;
select * from usuarios;


