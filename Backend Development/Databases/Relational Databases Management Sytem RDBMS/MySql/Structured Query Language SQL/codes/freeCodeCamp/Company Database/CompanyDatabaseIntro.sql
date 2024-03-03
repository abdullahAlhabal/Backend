-- Active: 1707219229819@@127.0.0.1@3306@companydatabase
DROP DATABASE CompanyDatabase;

CREATE DATABASE CompanyDatabase;

USE CompanyDatabase;

-- Create employee table
CREATE TABLE employee (
    id INT(11) AUTO_INCREMENT PRIMARY KEY ,
    first_name TINYTEXT NOT NULL,
    last_name TINYTEXT NOT NULL,
    birth_date DATE NOT NULL,
    sex ENUM("M", "F") NOT NULL,
    salary DECIMAL(6, 3) NOT NULL,
    supervisor_id INT(11),
    branch_id INT(11) ,
    INDEX (id)
);


DESCRIBE employee;
-- Create Branch table
CREATE TABLE branch (
    id INT(11) AUTO_INCREMENT PRIMARY KEY ,
    name TINYTEXT NOT NULL,
    manager_id INT(11),
    manager_start_date DATE NOT NULL,
    FOREIGN KEY (manager_id) REFERENCES employee(id) ON DELETE SET NULL
);

ALTER TABLE employee ADD FOREIGN KEY (supervisor_id) REFERENCES employee(id) ON DELETE SET NULL;
ALTER TABLE employee ADD FOREIGN KEY (branch_id) REFERENCES Branch(id) ON DELETE SET NULL;

INSERT INTO employee (id, first_name, last_name, birth_date, sex, salary, supervisor_id, branch_id) VALUES (100, "David", "Wallance", "1967-11-17" , "M", 250.000, Null, NULL);

INSERT INTO Branch (id, name, manager_id, manager_start_date) VALUES (1, "Corporate", 100, "2006-02-09");

UPDATE employee SET  branch_id = 1 WHERE id = 100 ;

INSERT INTO employee (id, first_name, last_name, birth_date, sex, salary, supervisor_id, branch_id) VALUES (101, "Jan", "Levinson", "1961-05-11", "F", 110.000, 100, 1);

CREATE TABLE Client (
    id INT(11) AUTO_INCREMENT PRIMARY KEY ,
    name TINYTEXT NOT NULL,
    branch_id INT(11),
    FOREIGN KEY (branch_id) REFERENCES Branch(id) ON DELETE SET NULL
);

CREATE TABLE Works_With (
    emp_id INT(11),
    client_id INT(11),
    total_salary DECIMAL(6,3) NOT NULL,
    PRIMARY KEY (emp_id, client_id),
    Foreign Key (emp_id) REFERENCES employee(id) ON DELETE CASCADE,
    Foreign Key (client_id) REFERENCES Client(id) ON DELETE CASCADE
);

CREATE TABLE Branch_Supplier (
    branch_id INT(11),
    supplier_name VARCHAR(40),
    supply_type ENUM("Paper", "Custom Forms", "Writing Utensils"),
    PRIMARY KEY (branch_id, supplier_name),
    FOREIGN KEY (branch_id) REFERENCES Branch(id) ON DELETE CASCADE
);

-- INSERT

INSERT INTO employee (id, first_name, last_name, birth_date, sex, salary, supervisor_id, branch_id) VALUES (102, "Micheal", "Scott", "1964-03-15", "M", 75.000, 100, NULL);
INSERT INTO Branch (id, name, manager_id, manager_start_date) VALUES (2, "Scartion", 102, "1992-04-06");
UPDATE employee SET branch_id = 2 WHERE id = 102 ;
INSERT INTO employee (id, first_name, last_name, birth_date, sex, salary, supervisor_id, branch_id) VALUES (106, "Josh", "Porter", "1969-03-15", "M", 175.000, 100, NULL);
INSERT INTO Branch (id, name, manager_id, manager_start_date) VALUES (3, "Stamford", 106, "1998-02-06");
UPDATE employee SET branch_id = 3 WHERE id = 106 ;

INSERT INTO employee (id, first_name, last_name, birth_date, sex, salary, supervisor_id, branch_id) VALUES (103, "angela", "AS", "1997-03-12", "F", 186.000, 102, 2);
INSERT INTO employee (id, first_name, last_name, birth_date, sex, salary, supervisor_id, branch_id) VALUES (104, "kelly", "FZ", "1997-03-12", "F", 12.020, 102, 2);
INSERT INTO employee (id, first_name, last_name, birth_date, sex, salary, supervisor_id, branch_id) VALUES (105, "Stanley", "GC", "1997-03-12", "M", 56.000, 102, 2);
INSERT INTO employee (id, first_name, last_name, birth_date, sex, salary, supervisor_id, branch_id) VALUES (107, "Andy", "HE", "1997-03-12", "F", 136.000, 106, 3);
INSERT INTO employee (id, first_name, last_name, birth_date, sex, salary, supervisor_id, branch_id) VALUES (108, "Jim", "QU", "1997-03-12", "M", 36.000, 106, 3);

INSERT INTO client (id, name, branch_id) VALUES (400, "D", 2);
INSERT INTO client (id, name, branch_id) VALUES (401, "L", 2);
INSERT INTO client (id, name, branch_id) VALUES (402, "F", 3);
INSERT INTO client (id, name, branch_id) VALUES (403, "J", 3);
INSERT INTO client (id, name, branch_id) VALUES (404, "S", 2);
INSERT INTO client (id, name, branch_id) VALUES (405, "T", 3);
INSERT INTO client (id, name, branch_id) VALUES (406, "F", 2);

INSERT INTO works_with (emp_id, client_id, total_salary) VALUES (105, 400, 55000);
INSERT INTO works_with (emp_id, client_id, total_salary) VALUES (102, 401, 55000);
INSERT INTO works_with (emp_id, client_id, total_salary) VALUES (108, 402, 55000);
INSERT INTO works_with (emp_id, client_id, total_salary) VALUES (107, 403, 55000);
INSERT INTO works_with (emp_id, client_id, total_salary) VALUES (108, 403, 55000);
INSERT INTO works_with (emp_id, client_id, total_salary) VALUES (105, 404, 55000);
INSERT INTO works_with (emp_id, client_id, total_salary) VALUES (107, 405, 55000);
INSERT INTO works_with (emp_id, client_id, total_salary) VALUES (102, 406, 55000);
INSERT INTO works_with (emp_id, client_id, total_salary) VALUES (105, 406, 55000);

INSERT INTO branch_supplier (branch_id, supplier_name, supply_type) VALUES (105, 406, 55000);



-- Tasks.

-- 1) Find all employee

SELECT * FROM employee;

-- 2) Find all clients 

SELECT * FROM client;

-- 3) Find all emplyees orderd by salary 
SELECT * FROM employee ORDER BY salary ; 

-- 4) find all employees ordered by sex then name 
SELECT * FROM employee ORDER BY sex, first_name ;

-- 5) fint the first 5 employees in the table
SELECT * FROM employee LIMIT 5; 

-- 6) find the first and last name of all emplyees
SELECT first_name, last_name FROM employee ;

-- 7) find the forename and the surnames names of all employee
SELECT first_name AS forename, last_name AS surnames FROM employee ;


-- 8) Find out all the different genders 
SELECT sex FROM employee WHERE sex IN ("M", "F") GROUP BY sex;
SELECT DISTINCT sex FROM employee;
