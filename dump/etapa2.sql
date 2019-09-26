
use employees;
SELECT CONCAT(e.first_name, ' ', e.last_name) AS funcionario,
	   d.dept_name AS departamento,
	   DATEDIFF(de.to_date, de.from_date) AS dias_departamento
FROM employees e
LEFT JOIN dept_emp de ON de.emp_no = e.emp_no
LEFT JOIN departments d ON d.dept_no = de.dept_no
ORDER BY dias_departamento DESC, funcionario
LIMIT 10