--1.Criar uma procedure chamada prc_depto que de acordo com o depto informado exiba a quantidade de empregados POR id do cargo.
--DICAS:EMPLOYEES (employee_id, job_id, department_id)
--FUNÇÃO: COUNT

CREATE OR REPLACE PROCEDURE prc_depto(depto_id IN NUMBER) IS
BEGIN
FOR emp_reg IN (SELECT job_id, COUNT(*) AS qtd_empregados
FROM employees
WHERE department_id = depto_id
GROUP BY job_id)
LOOP
DBMS_OUTPUT.PUT_LINE('ID do Cargo: ' || emp_reg.job_id || ', Quantidade de Empregados: ' || emp_reg.qtd_empregados);
END LOOP;
END;

--Criar uma função chamada fnc_inss que de acordo com o salário informado retorne o valor de INSS a ser pago. 
--DICA: CASE OU IF-ELSIF-ELSE-END IF
--tabela no documento compartilhado
--Acima deste valor  é fixado a contribuição pelo teto R$ 908,85

CREATE OR REPLACE FUNCTION fnc_inss(salario NUMBER)
RETURN NUMBER
IS inss NUMBER;
BEGIN
IF salario <= 1412.00 THEN
inss := 105.90;
ELSIF salario <= 2666.68 THEN
inss := 125.47;
ELSIF salario <= 4000.03 THEN
inss := 487.23;
ELSIF salario <= 120000.00 THEN
inss := salario * 0.14;
ELSE
inss := 908.85;
END IF;
RETURN inss;
END