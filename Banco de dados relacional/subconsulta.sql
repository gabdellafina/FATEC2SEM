--a)Quanto Abel ganha?
SELECT salary FROM employees  WHERE last_name = 'Abel'

--b)QUAL O SALÁRIO DO EMPREGADO COM ID 143?
Select last_name, job_id, salary from employees where job_id = (select job_id 
FROM employees where employee_id = 141) 
AND salary >  (select salary from employees where employee_id = 143)

--c)Qual o menor salário por depto.?
 SELECT first_name, salary, department_id FROM employees
 WHERE salary IN ( SELECT MIN(salary) FROM employees
 GROUP BY department_id)
 ORDER BY salary
