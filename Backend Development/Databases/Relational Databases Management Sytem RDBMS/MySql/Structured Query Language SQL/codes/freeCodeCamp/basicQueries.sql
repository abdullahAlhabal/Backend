-- Geting information from the database with SELECT : block of sql that designed to ask RDBMS for particular piece of information

-- all the entries
SELECT * FROM student;

-- we can specify a specific column, select specific columns 
SELECT name FROM student;           -- return all the names of the students
SELECT name, major FROM student;    -- return all the names and majors of the students

-- we can pre-pin with the name of the table 
SELECT student.name, student.major FROM student;    -- same to SELECT name, major FROM student;

-- we can order the information using the ' ORDER BY ' KEY Word
SELECT * FROM student ORDER BY name ASC;
-- This will return all the information of all the students ordering ascending by the name of the student. Alphabetical order.

SELECT * FROM student ORDER BY name DESC;
-- This will return all the information of all the students ordering descending by the name of the student.

SELECT * FROM student ORDER BY major ASC , name DESC;
-- This will return all the information of all the students ordering ascending by the major of the study first , then if any students have the same major study the SELECT will order them by the name of each student. Alphabetical order.