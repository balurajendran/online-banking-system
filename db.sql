CREATE DATABASE IF NOT EXISTS banking_db;
USE banking_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),   -- hashed password
    balance DECIMAL(10,2) DEFAULT 0
);

CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(100),
    type ENUM('deposit', 'withdraw'),
    amount DECIMAL(10,2),
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
