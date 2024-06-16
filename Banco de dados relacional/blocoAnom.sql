DECLARE

v_id INTEGER := :ID;

v_somaSal employees.salary%TYPE;

v_qtFunc INTEGER;

BEGIN

SELECT SUM(e.salary),COUNT(e.employee_id)

INTO v_somaSal, v_qtFunc

FROM employees e;

DBMS_OUTPUT.PUT_LINE('Quantidade de Funcionarios: '||v_qtFunc ||' Soma salarial: '||v_somaSal);

END;



DECLARE

v_id INTEGER := :ID;

v_nomeEmp employees.first_name%TYPE;

v_nomeDepto departments.department_name%TYPE;

BEGIN

SELECT e.first_name, d.department_name

INTO v_nomeEmp,v_nomeDepto

FROM departments d JOIN employees e

ON (d.department_id = e.department_id)

WHERE d.department_id = v_id;

DBMS_OUTPUT.PUT_LINE('Nome do empregado: '||v_nomeEmp ||' Departamento: '||v_nomeDepto);

END