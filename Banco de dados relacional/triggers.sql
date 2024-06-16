--Tabela LOCAL_EMP:
--CREATE TABLE local_emp(id INTEGER, nome VARCHAR(30))
--Criar uma trigger chamada tg_local que não permita inserir na tabela LOCAL_EMP no horário das 16h às 21:00.

CREATE TABLE local_emp(id INTEGER, nome VARCHAR(30))
CREATE OR REPLACE TRIGGER TG_LOCAL
BEFORE INSERT ON LOCAL_EMP

BEGIN 
IF(TO_CHAR (sysdate, 'HH24') BETWEEN '16' AND '21') THEN RAISE_APPLICATION_ERROR(-20500, 'Somente permitido no horário das 16h às 21h.'); 
END IF; 
END