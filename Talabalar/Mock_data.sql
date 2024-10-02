CREATE DATABASE dars14;

USE dars14;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fio VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    manzil TEXT NOT NULL,
    photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
