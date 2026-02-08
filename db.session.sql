CREATE DATABASE IF NOT EXISTS db;
USE db;

/*Create table*/
CREATE TABLE IF NOT EXISTS USER (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL UNIQUE,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL

);

CREATE TABLE IF NOT EXISTS student(
    Studentid INT PRIMARY KEY ,
    name VARCHAR(100) NOT NULL,
    identificationNumer VARCHAR(100) NOT NULL UNIQUE, 
    phone VARCHAR(12) NOT NULL,
    address VARCHAR(2550) NOT NULL,
    email VARVCHAR(255) NOT NULL
)

INSERT INTO registrations (id, student_name, coursre_name) VALUES(
    1, 'John Doe', 'Mathematics',
    2, 'Jane Smith', 'Physics',
    3, 'Alice Johnson', 'Chemistry'
)