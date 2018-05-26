create database produto;

create table addproduto (
id int auto_increment primary key not null,
descricao varchar(255),
quantidade int,
valor decimal(10,2)
)Engine innoDB;

drop table addproduto;

insert into addproduto (descricao, quantidade, valor) values ('Mouse USB Microsoft','10','25.00');
insert into addproduto (descricao, quantidade, valor) values ('Teclado USB Microsoft','10','45.00');
insert into addproduto (descricao, quantidade, valor) values ('Memoria 4GB','10','180.00');
insert into addproduto (descricao, quantidade, valor) values ('HD Seagate 1TB','10','240.00');
insert into addproduto (descricao, quantidade, valor) values ('Placa-Mae Gigabyte','10','365.00');

select * from addproduto;