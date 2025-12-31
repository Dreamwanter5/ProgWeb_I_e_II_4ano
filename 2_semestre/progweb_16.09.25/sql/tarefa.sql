drop database if exists sistema_tarefas;
create database sistema_tarefas;
use sistema_tarefas
CREATE TABLE tipos_tarefa (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL UNIQUE  
    );


CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);


CREATE TABLE tarefas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipo_tarefa_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    data_prevista_finalizacao DATE NOT NULL,    
    concluida BOOLEAN DEFAULT FALSE,
    imagem_ajuda VARCHAR(255) NULL,
    usuario_id INT NOT NULL,    
    FOREIGN KEY (tipo_tarefa_id) REFERENCES tipos_tarefa(id) ON DELETE RESTRICT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);


INSERT INTO tipos_tarefa (nome) VALUES
('Pessoal'),
('Profissional'),
('Educacional'),
('Saúde'),
('Casa'),
('Lazer'),
('Financeiro'),
('Outro');

