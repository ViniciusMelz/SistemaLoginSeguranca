drop database if exists SistemaSeguranca;
create database SistemaSeguranca;

SET SQL_safe_updates = 0;

use sistemaseguranca;

create table usuario (
    id INT primary key,
    email VARCHAR(100) unique,
    senha VARCHAR(50)
);

create table senhas_antigas (
    id INT primary key auto_increment,
    senha_antiga VARCHAR(50),
    data_criacao DATE,
    id_usuario INT,
    CONSTRAINT FK_id_usuario FOREIGN KEY (id_usuario)
    REFERENCES usuario(id)
);
 
CREATE TRIGGER inseriuUsuario AFTER insert on usuario
 FOR each row
INSERT INTO senhas_antigas(senha_antiga, data_criacao, id_usuario) VALUES
(NEW.senha, sysdate(), NEW.id);

CREATE TRIGGER trocarSenhaUsuario AFTER update on usuario
 FOR each row
INSERT INTO senhas_antigas(senha_antiga, data_criacao, id_usuario) VALUES
(new.senha, sysdate(), new.id);