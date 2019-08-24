create table cliente (
	id smallint primary key,
	nome varchar(255)
);

create table endereco (
	id serial primary key,
	cliente smallint references cliente(id),
	principal boolean,
	rua varchar(255),
	numero smallint,
	complemento varchar(255),
	cidade varchar(255),
	estado varchar(255)
);