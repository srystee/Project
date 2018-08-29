
CREATE DATABASE sms_notification

CREATE TABLE adminlogin(
id INT PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(25),
PASSWORD VARCHAR(255),
DATE DATE
)

CREATE TABLE collegedetails(
id INT PRIMARY KEY,
NAME VARCHAR(255),
DATE DATE
)

CREATE TABLE faculty(
id INT PRIMARY KEY AUTO_INCREMENT,
NAME VARCHAR(255),
DATE DATE
)

CREATE TABLE studentdetails(
id INT PRIMARY KEY,
regd_number BIGINT UNIQUE NOT NULL,
NAME VARCHAR(250) NOT NULL,
address VARCHAR(250) NOT NULL,
contact BIGINT UNIQUE NOT NULL,
email VARCHAR(250),
symbol_number INT UNIQUE NOT NULL,
batch INT NOT NULL,
collegeid INT,
facultyid INT,
DATE DATE,
FOREIGN KEY(collegeid) REFERENCES collegedetails(id),
FOREIGN KEY(facultyid) REFERENCES faculty(id)
)


SELECT * FROM collegedetails
SELECT * FROM studentdetails

CREATE VIEW view_studentsdetails
AS
SELECT sd.id, sd.regd_number,sd.name AS'student_name', sd.address, sd.contact, sd.email,sd.symbol_number, sd.batch, 
sd.collegeid, cd.name AS 'college_name', sd.facultyid, fc.name AS 'faculty_name', sd.date 
FROM studentdetails sd JOIN collegedetails cd
ON
sd.collegeid=cd.id
LEFT JOIN faculty fc
ON sd.facultyid=fc.id



SELECT * FROM view_studentsdetails


CREATE TABLE results(
id INT PRIMARY KEY AUTO_INCREMENT,
facultyid INT,
semester INT,
DATE DATE,
FOREIGN KEY(facultyid) REFERENCES faculty(id)
)

SELECT * FROM results


CREATE VIEW view_resultdetails
AS
SELECT rs.id, rs.facultyid, fc.name, rs.semester, rs.date FROM results rs JOIN faculty fc
ON 
rs.facultyid = fc.id

