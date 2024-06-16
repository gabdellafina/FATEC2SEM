--Criar uma view chamada vw_cargo que tenha as colunas job_id e job_title;
--Exibir a estrutura da view
--Exibir os cargos que tenham um i minusculo em seu nome
--Utilizando o dicionario de dados, exibir a consulta que criou a view
--Inserir um cargo com id = 'PL' nome= 'Programador PL/SQL'
--Alterar a view para que seja somente de leitura
--Tentativa de inserir um cargo com id = 'ES' nome = 'Engenheiro de Software'
--Excluir a view
--Criar um sinonimo chamado cargo para jobs
--Criar a tabela aluno com matricula INTEGER PRIMARY KEY e nome VARCHAR(20)
--Criar uma sequencia chamada seq_aluno que inicie em 10 com incremento 10
--Utilizando a sequencia criada, inserir 3 registros na tabela ALUNO.

CREATE OR REPLACE VIEW vw_cargo (ID, nome) AS SELECT job_id, job_title FROM jobs

DESC vw_cargo

SELECT * FROM vw_cargo WHERE nome LIKE '%i%'

SELECT * FROM user_views

INSERT INTO vw_cargo (ID, nome) VALUES ('PL', 'Programador PL/SQL')

CREATE OR REPLACE VIEW vw_cargo (ID, nome) AS SELECT job_id, job_title FROM jobs WITH READ ONLY

INSERT INTO vw_cargo (ID, nome) VALUES ('ES', 'Engenheiro de Software')

DROP VIEW vw_cargo

CREATE SYNONYM cargo FOR jobs

CREATE TABLE aluno (

id_matricula INTEGER PRIMARY KEY,

nm_aluno VARCHAR(20)

)

CREATE SEQUENCE seq_aluno START WITH 10 INCREMENT BY 10

INSERT INTO aluno (id_matricula, nm_aluno) VALUES (seq_aluno.NEXTVAL, 'João')

INSERT INTO aluno (id_matricula, nm_aluno) VALUES (seq_aluno.NEXTVAL, 'Maria')

INSERT INTO aluno (id_matricula, nm_aluno) VALUES (seq_aluno.NEXTVAL, 'Pedro')