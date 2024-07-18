create database SistemaSeguranca;


create table usuario {
    id INT primary key,
    email VARCHAR(100),
    senha VARCHAR(50),

};

create table senhas_antigas {
    id INT primary key,
    senha_antiga VARCHAR(50),
    data_criacao DATE,
    id_usuario INT,
    CONSTRAINT FK_id_usuario FOREIGN KEY (id_usuario)
    REFERENCES usuario(id)
};



