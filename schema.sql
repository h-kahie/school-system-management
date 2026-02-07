CREATE DATABASE soomaal_db;

USE soomaal_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    role ENUM('admin', 'teacher', 'student')
);

CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(50)
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    class_id INT,
    roll_no VARCHAR(20)
);

CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    qualification VARCHAR(100)
);

CREATE TABLE subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_name VARCHAR(100),
    class_id INT,
    teacher_id INT
);

CREATE TABLE exams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exam_name VARCHAR(100),
    class_id INT,
    exam_date DATE
);

CREATE TABLE fees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    amount INT,
    status ENUM('paid', 'unpaid')
);

-- Added missing marks table used by teacher/marks.php and student/results.php.
CREATE TABLE marks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    subject_id INT,
    exam_id INT,
    marks INT
);
