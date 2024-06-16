--a)Exibir o título do cargo, o id do cargo e nome do empregado
SELECT jobs.job_title, jobs.job_id, employees.first_name
 FROM jobs, employees
WHERE jobs.job_id = employees.job_id

--b)Exibir o nome do departamento, o id do departamento e o sobrenome do empregado.
select departments.department_name,
        departments.department_id, employees.last_name
from departments,employees
where departments.department_id = employees.department_id

--c) Alterar para exibir somente quem trabalha nos deptos com id 10 ou 30
SELECT departments.department_name, departments.department_id, employees.last_name
	FROM departments, employees
WHERE departments.department_id = employees.department_id
	AND departments.department_id IN (10,30)

--d)Alterar para trazer TAMBÉM o título do cargo
SELECT departments.department_name,departments.department_id, employees.last_name, jobs.job_title
FROM departments, employees, jobs
WHERE departments.department_id = employees.department_id
AND departments.department_id IN (10,30)
AND jobs.job_id = employees.job_id

--e) Exibir o nome do empregado e a cidade em que ele trabalha. 
SELECT e.first_name, l.city
 FROM employees e, locations l, departments d
WHERE e. department_id = d.department_id
 AND l.location_id = d.location_id

--f)Alterar para exibir o nome do departamento e o título do cargo

SELECT e.first_name, l.city, d. department_name, j.job_title
 FROM employees e, locations l, departments d, jobs j
WHERE e. department_id = d.department_id
 AND l.location_id = d.location_id
 AND j.job_id = e.job_id
