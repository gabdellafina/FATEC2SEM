-- 1)Criar um bloco anônimo que entre com o id do empregado.
-- Se o empregado receber entre 2000 e 4000, exibir o seu nome e o seu salário acrescido de 10%.
-- Se o empregado receber entre 4001 e 5000, exibir o seu sobrenome e o seu salário acrescido de 20%.
-- Caso contrário, exibir o id do cargo, o nome do departamento e o salário SEM aumento.

DECLARE 
    v_id INTEGER := :Id_Empregado; 
    v_nome VARCHAR(50); 
    v_sobrenome VARCHAR(50); 
    v_salario NUMBER(10,2); 
    v_idCargo VARCHAR(10); 
    v_nomeDepto VARCHAR(50); 
BEGIN 
    SELECT e.first_name,e.salary,e.last_name,e.job_id,d.department_name 
    INTO v_nome,v_salario,v_sobrenome,v_idCargo,v_nomeDepto 
    FROM employees e 
    JOIN departments d 
    ON (d.department_id = e.department_id) 
    WHERE employee_id = v_id; 
IF v_salario BETWEEN 2000 AND 4000 THEN DBMS_OUTPUT.PUT_LINE('Nome do Empregado: '||v_nome); 
DBMS_OUTPUT.PUT_LINE('Salario do Empregado + 10%: '||v_salario*1.10); 
ELSIF v_salario BETWEEN 4001 AND 5000 THEN 
DBMS_OUTPUT.PUT_LINE('Sobrenome do Empregado: '||v_sobrenome); 
DBMS_OUTPUT.PUT_LINE('Salario do Empregado + 20%: '||v_salario*1.20); 
ELSE DBMS_OUTPUT.PUT_LINE('Id do Funcionario: '||v_idCargo); 
DBMS_OUTPUT.PUT_LINE('Nome do Funcionario: '||v_nomeDepto); 
DBMS_OUTPUT.PUT_LINE('Salario do Funcionario: '||v_salario); 
END IF; 
END


--2)Exibir todas as tabuadas de 1 a 10.
--DICAS:
-- FUNÇÃO MOD
-- ESTRUTURA CONDICIONAL COM LAÇO
-- DOIS LAÇOS

DECLARE 
v_multiplicador INTEGER; 
v_multiplicando INTEGER; 
BEGIN 
FOR v_multiplicador IN 1..10 LOOP 
FOR v_multiplicando IN 1..10 LOOP 
DBMS_OUTPUT.PUT_LINE(v_multiplicador || ' * ' || v_multiplicando || ' = ' || v_multiplicador*v_multiplicando); 
END LOOP; 
END LOOP; 
END

--3)Criar um bloco que informe o id de um continente e exiba os países cadastrados e a quantidade de localizações neste país

DECLARE 
v_id INTEGER := :ID_Continente; 
v_paises VARCHAR(50); 
v_qtdLocal INTEGER; 
CURSOR paises IS 
SELECT c.country_name,COUNT(l.location_id) 
FROM regions r,countries c,locations l 
WHERE r.region_id = v_id AND r.region_id = c.region_id AND c.country_id = l.country_id 
GROUP BY c.country_name; 
BEGIN 
OPEN paises; 
DBMS_OUTPUT.PUT_LINE('Paises'); 
LOOP 
FETCH paises INTO v_paises,v_qtdLocal; 
EXIT WHEN paises%NOTFOUND; DBMS_OUTPUT.PUT_LINE('Pais: ' || v_paises || ' - Quantidade de localizações: ' || v_qtdLocal); 
END LOOP; 
CLOSE paises; 
END
