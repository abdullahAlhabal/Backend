SHOW DATABASES;

USE test;

SHOW TABLES;

CREATE SCHEMA PM;

SHOW SCHEMAS;

CREATE TABLE PM.Companies(
    cr_num INT PRIMARY KEY,
    company_name VARCHAR(25) NOT NULL
);

CREATE TABLE PM.Managers(
    id INT NOT NULL,
    email VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE PM.Projects(
    prj_num INT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    manager_id INT FOREIGN KEY REFERENCES PM.Managers(id) NOT NULL
    initial_cost DECIMAL(18,2) NOT NULL,
    start_date DATETIME,
    parked BOOLEAN DEFAULT NULL, 
);


