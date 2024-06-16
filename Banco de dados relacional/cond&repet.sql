--Condicional

--1)Criar um bloco que de acordo com o id do depto. exiba:
--se for entre 10 e 30: a soma salarial
--se for entre 40 e 60: a média salarial
--se for entre 70 e 90: a qtde de empregados
--Caso contrário, exibir todas as informações: SOMA, MEDIA e QTDE (ELSE)
--Obs. o id dos deptos são 10, 20, 30, 40, 50, 60, 70,80,90,100,110 e assim por diante…
DECLARE
 v_id INTEGER := :id_Departamento;
 v_soma NUMBER(10,2);
 v_media NUMBER(10,2);
 v_qtdEmp INTEGER;
BEGIN
    SELECT SUM(salary),AVG(salary),COUNT(employee_id)
    INTO v_soma, v_media, v_qtdEmp
    FROM employees
     WHERE department_id = v_id;
    if v_id BETWEEN 10 AND 30 THEN
DBMS_OUTPUT.PUT_LINE('Soma: ' || v_soma);
elsif v_id BETWEEN 40 AND 60 THEN
DBMS_OUTPUT.PUT_LINE('Média: ' || v_media);
elsif v_id BETWEEN 70 AND 90 THEN
DBMS_OUTPUT.PUT_LINE('Qde Empregados: ' || v_qtdEmp);
else
DBMS_OUTPUT.PUT_LINE('Soma: ' || v_soma);
DBMS_OUTPUT.PUT_LINE('Média: ' || v_media);
DBMS_OUTPUT.PUT_LINE('Qde Empregados: ' || v_qtdEmp);
END IF;
END;

--2)Criar um bloco que entre com o id do empregado (inicia 100,101, etc) e exiba:
--Se for entre 100 e 110 exibir o nome do empregado;
--Se for entre 111 e 120  exibir o salário;
--Caso contrário, exibir o nome, o salário e a data de admissão EMPLOYEES (employee_id, first_name, salary, hire_date).
DECLARE
    v_id INTEGER := :ID_Empregado;
    v_nome VARCHAR(50);
    v_sobrenome VARCHAR(50);
    v_salario employees.salary%TYPE;
    v_admissao employees.hire_date%TYPE;
BEGIN
    SELECT first_name, last_na;
    ELSE
    DBMS_OUTPUT.PUT_LINE('ID Empregado: ' || v_id);
    DBMS_OUTPUT.PUT_LINE('Nome Empregado: ' || v_nome || '-' || v_sobrenome);
    DBMS_OUTPUT.PUT_LINE('Salário Empregado: ' || v_salario);
    DBMS_OUTPUT.PUT_LINE('Data de Admissão: ' || v_admissao);
    END IF;
END;


--REPETIÇÃO (LAÇOS OU LOOPS)

--A)Loop Básico (incrementado com qualquer número, tem que ter condição de saída)
DECLARE
    v_num INTEGER := 1;
BEGIN
    LOOP
        INSERT INTO loop (numero, tipo)
        VALUES (v_num, 'Loop Básico');
        v_num := v_num + 1;
        EXIT WHEN v_num > 100000;
    END LOOP;
END;

--B)While (só inicia o laço se a condição for verdadeira, também pode fazer incremento em números diferentes 1)
DECLARE
    v_num INTEGER := 1;
BEGIN
    WHILE v_num <= 10 LOOP
        INSERT INTO loop (numero, tipo)
        VALUES (v_num, 'Loop Básico');
        v_num := v_num + 1;
    END LOOP;
END;
--C)For (incremento somente com 1, variável de incremento declarada de forma implícita)
BEGIN
   FOR v_num IN 1..10 LOOP
        INSERT INTO loop (numero, tipo)
        VALUES (v_num, 'For');
    END LOOP;
END;

SELECT * FROM loop;
TRUNCATE TABLE loop;

--D)For Invertido
BEGIN
   FOR v_num IN REVERSE 1..10 LOOP
        INSERT INTO loop (numero, tipo)
        VALUES (v_num, 'For');
    END LOOP;
END;


--EXERCÍCIO: Criar um bloco que entre com 1 número e exiba a tabuada desse número.
DECLARE
    v_num INTEGER := :numero;
    v_contador INTEGER := 1;
    v_resultado INTEGER;
BEGIN
    LOOP
        v_resultado := v_num* v_contador;
        DBMS_OUTPUT.PUT_LINE(v_num || ' x ' || v_contador || ' = ' || v_resultado);
        v_contador := v_contador + 1;
        EXIT WHEN v_contador > 10;
    END LOOP;
END;


--Alterar para que só aceitar números de 1 a 10 (ESTRUTURA CONDICIONAL)

DECLARE 
 v_entrada INTEGER := :Numero;
 v_multiplicador INTEGER;
BEGIN
IF v_entrada BETWEEN 1 AND 10 THEN
 FOR v_multiplicador IN 0..10 LOOP
  DBMS_OUTPUT.PUT_LINE(v_entrada || ' * ' || v_multiplicador || ' = ' || v_entrada*v_multiplicador); 
 END LOOP;
 ELSE
  DBMS_OUTPUT.PUT_LINE('Digite um numero entre 1 e 10');
 END IF; 
END;
