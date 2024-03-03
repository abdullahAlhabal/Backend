SHOW DATABASES ;

CREATE DATABASE DataLemur_matchingSkills;

USE DataLemur_matchingSkills;

SHOW TABLES;

CREATE TABLE candidates (
    candidate_id INTEGER,
    skill VARCHAR(50)
);

INSERT INTO candidates (candidate_id, skill) VALUES (123, "Python");
INSERT INTO candidates (candidate_id, skill) VALUES (123, "Tableau");
INSERT INTO candidates (candidate_id, skill) VALUES (123, "PostgreSQL");
INSERT INTO candidates (candidate_id, skill) VALUES (234, "R");
INSERT INTO candidates (candidate_id, skill) VALUES (234, "PowerBI");
INSERT INTO candidates (candidate_id, skill) VALUES (234, "SQL Server");
INSERT INTO candidates (candidate_id, skill) VALUES (345, "Python");
INSERT INTO candidates (candidate_id, skill) VALUES (345, "Tableau");

-- Question 

-- Given a table of candidates and their skills, you're tasked with finding the candidates best suited for an open Data Science job. You want to find candidates who are proficient in Python, Tableau, and PostgreSQL.
-- Write a query to list the candidates who possess all of the required skills for the job. Sort the output by candidate ID in ascending order.
-- Assumption:
-- There are no duplicates in the candidates table.

-- Solution

-- steps to solve the question

SELECT * FROM candidates ;
SELECT candidate_id FROM candidates ;
SELECT candidate_id FROM candidates WHERE skill IN ("Python", "Tableau", "PostgreSQL");
SELECT candidate_id FROM candidates WHERE skill IN ("Python", "Tableau", "PostgreSQL") GROUP BY candidate_id; -- now we need the candidates that have the three skill 
SELECT candidate_id FROM candidates WHERE skill IN ("Python", "Tableau", "PostgreSQL") GROUP BY candidate_id HAVING COUNT(skill) = 3;  



SELECT candidate_id, COUNT(*) AS skills_count FROM candidates WHERE skill IN ("Python", "Tableau", "PostgreSQL") GROUP BY candidate_id  HAVING COUNT(skill) = 3;


