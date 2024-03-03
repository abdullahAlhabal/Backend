-- Function

-- find the number of employees in the table

SELECT COUNT(id) FROM employee;

-- find the number of the employees whos have a supervisor
SELECT COUNT(*) FROM employee WHERE supervisor_id IS NOT NULL;
SELECT COUNT(supervisor_id) FROM employee;

-- FIND the number of female employees born after 1970
SELECT COUNT(*) FROM employee WHERE sex = "F" AND birth_date > "1970-01-01 00:00:00";

SELECT * FROM employee  ORDER BY sex;

-- Find the average of all emplyee's salaries
SELECT AVG(salary) FROM employee ;

-- Find the sum of all emplyee's salaries
SELECT SUM(salary) FROM employee ;

SELECT 
    (SELECT COUNT(*) FROM  employee WHERE sex = "M") AS males,
    ( SELECT COUNT(*) FROM  employee WHERE sex = "F") AS females;

SELECT COUNT(*), sex FROM employee GROUP BY sex;

-- find the total sales of each salesman

SELECT * FROM works_with;
SELECT emp_id AS salesman, SUM(total_salary) AS "Total Salary" FROM works_with GROUP BY emp_id ;