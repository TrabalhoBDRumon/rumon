CREATE DATABASE rumon;
USE rumon;

CREATE TABLE republica(
r_id int auto_increment not null,
r_nome varchar(50) not null,
r_site varchar(255) null,
r_fundacao date null,
r_email varchar(255) null,
r_tipo char(1) not null,
r_facebook varchar(255) not null,
r_telefone bigint null,
primary key(r_id)
);

CREATE TABLE pessoa(
p_id int auto_increment not null,
p_cpf char(11) not null,
p_rg varchar(15) not null,
p_nome varchar(50) not null,
p_tipo char(1) not null,
p_carteirinha int not null,
p_nascimento date not null,
p_celular bigint null,
p_apelido varchar(50) null,
p_faculdade varchar(100) null,
rep_id int not null,
primary key(p_id),
foreign key(rep_id) REFERENCES republica(r_id)
 );

 CREATE TABLE patrimonio(
patri_id int auto_increment not null,
patri_nome Varchar(100) not null,
patri_descricao text null,
patri_valor float not null,
patri_multa float not null,
primary key(patri_id)
 );

 CREATE TABLE aluga(
 aluga_id int auto_increment not null,
 data_emprestimo date not null,
 data_devolucao date not null,
 situacao char(1) not null,
 id_rep_alugou int not null,
 id_patri_alugou int not null,
 primary key(aluga_id),
 FOREIGN Key(id_rep_alugou) REFERENCES republica(r_id),
 FOREIGN KEY(id_patri_alugou) REFERENCES patrimonio(patri_id)
 );


CREATE TABLE assembleia(
assembleia_id int auto_increment not null,
assembleia_data date not null,
primary key(assembleia_id)
 );

 CREATE TABLE frequenta(
republica_id int not null,
id_assembleia int not null,
FOREIGN KEY(republica_id) REFERENCES republica(r_id),
FOREIGN KEY (id_assembleia) REFERENCES assembleia(assebleia_id)
 );