use pet_leisure_bd;

SELECT * FROM usuario_dono_pet;

select * from usuario_prest_serv;
INSERT INTO usuario_dono_pet(cpf,email,senha,nome,telefone,tipo_animal_1,tipo_animal_2,tipo_animal_3,nome_animal_1,nome_animal_2,nome_animal_3,idade_animal_1,idade_animal_2,idade_animal_3,logradouro,CEP,numero,bairro,pais,estado,cidade,imagem_animal_1,imagem_animal_2,imagem_animal_3,obs)  
        VALUES ('$cpf','$email','$password','$nome','$telefone','$tipoAnimal1','$tipoAnimal2','$tipoAnimal3','$nome_animal1','$nome_animal2','$nome_animal3','$idade_animal1','$idade_animal2','$idade_animal3','$rua','$cep','$numero','$bairro','$pais','$estado','$cidade','$foto_animal1','$foto_animal2','$foto_animal3','$obs'); 
        delete  from usuario_dono_pet where id_dono_pet=1;
create database pet_leisure_bd;


drop table usuario_prest_serv;
drop table usuario_dono_pet;



create table usuario_dono_pet(
id_dono_pet int(100) auto_increment PRIMARY KEY,
cpf varchar(11) NOT NULL UNIQUE, 
email varchar(100) NOT NULL UNIQUE,
senha varchar(255) NOT NULL,
nome varchar(50) NOT NULL,
telefone varchar(13) NOT NULL,
tipo_animal_1 varchar(20) NOT NULL,
tipo_animal_2 varchar(20) NOT NULL,
tipo_animal_3 varchar(20) NOT NULL,
nome_animal_1 varchar(20) NOT NULL,
nome_animal_2 varchar(20) NOT NULL,
nome_animal_3 varchar(20) NOT NULL,
idade_animal_1 varchar(3) NOT NULL,
idade_animal_2 varchar(3) NOT NULL,
idade_animal_3 varchar(3) NOT NULL,
logradouro varchar(80) NOT NULL,
CEP varchar(8) NOT NULL,
numero varchar(4) NOT NULL,
bairro varchar(20) NOT NULL,
pais varchar(6) NOT NULL,
estado varchar(25) NOT NULL,
cidade varchar(35) NOT NULL,
imagem_animal_1 varchar(30) NOT NULL,
imagem_animal_2 varchar(30) NOT NULL,
imagem_animal_3 varchar(30) NOT NULL,
obs varchar(2000) NOT NULL, 
timestamp timestamp DEFAULT CURRENT_TIMESTAMP); 

SELECT nome, email, telefone FROM usuario_dono_pet WHERE id_dono_pet = '2';
select * from reserva; 

DELETE FROM reserva WHERE n_reserva = 2;

create table usuario_prest_serv(
id_prest_serv int(100) auto_increment PRIMARY KEY,
docIdentidade  varchar(11) NOT NULL UNIQUE, 
email varchar(100) NOT NULL UNIQUE,
senha varchar(255) NOT NULL,
nome varchar(50) NOT NULL,
telefone varchar(13) NOT NULL,
perfil varchar(20) NOT NULL,
hospedagem varchar(5) NOT NULL,
creche varchar(5) NOT NULL,
qtdAnimaisAceitos varchar(2) NOT NULL,
aceita_gato varchar(5) NOT NULL,
aceita_cachorro varchar(5) NOT NULL,
aceita_passaro varchar(5) NOT NULL,
logradouro varchar(80) NOT NULL,
CEP varchar(8) NOT NULL,
numero varchar(4) NOT NULL,
bairro varchar(50) NOT NULL,
pais varchar(6) NOT NULL,
estado varchar(25) NOT NULL,
cidade varchar(35) NOT NULL,
certificacao varchar(30) NOT NULL,
imagem_local_1 varchar(30) ,
imagem_local_2 varchar(30) ,
imagem_local_3 varchar(30) ,
obs varchar(2000) NOT NULL, 
timestamp timestamp DEFAULT CURRENT_TIMESTAMP);

-- inserindo a nova coluna Preço diária na tabela usuario prestador de serviço. 
ALTER TABLE usuario_prest_serv
ADD precoReserva float(5.00) default 60.0 not null AFTER certificacao;

Select * from usuario_prest_serv;

drop table comentarios;  

SELECT id_prest_serv, nome, email, senha FROM usuario_prest_serv WHERE email = 'thiagoesmael19@gmail.com';
-- criação tabela de reservas, adicionei a coluna observacoes para inserir na reserva.
create table reserva(
	n_reserva int(100) primary key auto_increment,
    id_dono_pet int(100) NOT NULL,
    id_prest_serv int(100) NOT NULL,
    tipo_animal varchar(20) NOT NULL,
    `data` datetime not null
);
select * from reserva;
-- inserindo a nova coluna observacoes na tabela reserva.
ALTER TABLE reserva
ADD observacoes varchar(500)  AFTER tipo_animal;
drop table comentarios;

select * from comentarios;

create table comentarios(
id_comentario  int (100) primary key auto_increment, 
email varchar (100) NOT NULL,
id_prestserv int (100) NOT NULL,
nomeDonoPet varchar (50) NOT NULL,
mensagem varchar (800) NOT NULL, 
timestamp timestamp DEFAULT CURRENT_TIMESTAMP); 

select * from usuario_prest_serv;


DROP TABLE IF EXISTS imagem_Pet;
select *from imagem_Pet;
CREATE TABLE IF NOT EXISTS imagem_Pet (
  id int not null primary key auto_increment,
  imagem_perfil varchar(60) not null,
  id_donoPet int not null,
  calendar datetime NOT NULL
); 


INSERT INTO imagem_Pet (id, imagem_perfil, calendar, id_donoPet ) VALUES (null, ' ',  now(), '1');
INSERT INTO imagem_Pet (id, imagem_perfil, calendar, id_donoPet ) VALUES (null, ' ',  now(), '2');
INSERT INTO imagem_Pet (id, imagem_perfil, calendar, id_donoPet ) VALUES (null, ' ',  now(), '3');


INSERT INTO imagem_Pet(id_donoPet) SELECT (id_dono_pet) FROM usuario_dono_pet WHERE id_dono_pet order by id_dono_pet desc limit 1;

update imagem_Pet set id_donoPet = (SELECT id_dono_pet FROM usuario_dono_pet WHERE id_dono_pet order by id_dono_pet desc limit 1) where id order by id desc limit 1;






DROP TABLE IF EXISTS imagem_Prest;


CREATE TABLE IF NOT EXISTS imagem_Prest (
  id int not null auto_increment primary key,
  perfil varchar(60) not null,
  id_prestServ int not null,
  calendar datetime not null
);

select * from imagem_Pet;
INSERT INTO imagem_Prest (id, perfil, img_local, certificacao, id_prestServ, calendar) VALUES (null, '$novo_nome', '$novo_nome2', '$novo_nome3', 1 , now());
                
UPDATE imagem_Prest set id_prestServ = (SELECT id_prest_serv FROM usuario_prest_serv WHERE id_prest_serv order by id_prest_serv desc limit 1) where id order by id desc limit 1;
