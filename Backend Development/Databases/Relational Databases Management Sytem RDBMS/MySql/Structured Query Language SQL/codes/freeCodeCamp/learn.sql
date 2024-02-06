-- USE A SPECIFIC DATABASE 
USE school;

-- LIST ALL THE TABLES IN THE CURRENTD DATABASE
SHOW TABLES ;

-- LIST ALL THE DATABASES IN THE CURRENT CONNECTION TO MYSQL
SHOW DATABASES;

-- DROP A SPECIFIC TABLE
DROP TABLE student;

-- SQL CODE TO CREATE A TABLE WITH PRIMARY KEY(PK) AND SOME ATTRIBUTES 
CREATE TABLE student (
    student_id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name TINYTEXT UNIQUE NOT NULL,
    major VARCHAR(20) NOT NULL DEFAULT 'undecided'
);

DESCRIBE student;


SELECT * FROM student ;

-- SQL CODE TO INSERT SOME RECORDES INTO THE DATABASE
INSERT INTO student (name, major) VALUES ("Jack", "Biology");
INSERT INTO student (name, major) VALUES ("Claire", "Chemisty");
INSERT INTO student (name, major) VALUES ("Jake", "Biology");
INSERT INTO student (name, major) VALUES ("Mike", "ITE");
INSERT INTO student (name) VALUES ("kate");

-- CHANGE ALL THE major VALUES IF THE VALUE IS "Biology"
UPDATE student SET major = "Bio" WHERE major = "Biology";

-- ADD A NEW ROW INTO THE TABLES UNDER THE NAME OF gpa      
ALTER TABLE student ADD gpa DECIMAL(3,2);

-- UPDATE ALL THE RECORDS IN THE TABLES AND SET gpa EQUAL TO 3.1 
UPDATE student SET gpa = 3.1 WHERE 1=1 ;

-- DESCRIBE THE student TABLE ( FILEDS, TYPES, EXTRA INFO)
DESCRIBE student;

-- GRAP ALL THE DATA(RECORDS) FROM TABLE student
SELECT * FROM student ;

-- UPDATE THE GPA COLUMN OF THE STUDENT WITH 3 AS A student_id 
UPDATE student SET gpa = 3.2 WHERE student_id = 3;

-- SELECT THE NAME OF THE STUDENTS WHERE THIER GPA IS GREATER THAN 3.1
SELECT name FROM student WHERE gpa > 3.1;

-- DROP AN EXISTS ROW IN THE TABLE
ALTER TABLE student DROP gpa ; 

-- RETURN THE COUNT OF RECORDERS IN THE TABLE
SELECT COUNT(*) FROM student;

-- UPDATE THE TABLE AND CHANGE THE major from Bio|Chemistry into Bio Chimestry , each student study Bio or Chemistry , now the major is "Bio Chemistry"
UPDATE student SET major = "Bio Chemistry" 
WHERE major = "Chemistry" OR major = "Bio";

UPDATE student SET name = "Tom", major = "undecided" WHERE student_id = 1 ;

-- UPDATE EVERY SINGLE ROW IN THE TABLE 
UPDATE student SET major = "undecided" ;
